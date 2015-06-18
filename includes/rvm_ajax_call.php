<?php
/**
 * Ajax calls
 * ----------------------------------------------------------------------------
 */
/* Map Preview */
add_action( 'wp_ajax_rvm_preview', 'rvm_ajax_preview' );
function rvm_ajax_preview( )
{
            if ( isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] != 'select_country' ) {
                        // Verify that the incoming request is coming with the security nonce
                        if ( wp_verify_nonce( $_REQUEST[ 'nonce' ], 'rvm_ajax_nonce' ) ) {
                                    //inject html and javascript to create teh map preview
                                    $array_countries = rvm_countries_array();
                                    
                                    foreach ( $array_countries as $country_field ) {
                                                if ( $_REQUEST[ 'map' ] == $country_field[ 0 ] ) {
                                                            $js_map_id = $country_field[ 3 ];
                                                            $js_vectormap = $country_field[ 2 ];
                                                            $map_group = $country_field[ 5 ];
                                                            $js_map_path = $country_field[ 7 ];
                                                } //$_REQUEST[ 'map' ] == $country_field[ 0 ]
                                    } // foreach( $array_countries as $country_field )*/
                                    
                                    $map_zoom = empty( $_REQUEST[ 'zoom' ] ) ? 'false' : 'true';
                                                                 
                                   // If custom map load javascript from upload map subdir 
                                   if ( $map_group === 'custom_maps' && $js_map_path ) {
                                                $rvm_custom_map_url = $js_map_path;
                                                $output = '<script type="text/javascript" src="' . $rvm_custom_map_url . '/jquery-jvectormap-' . $js_map_id . '.js"></script>';
                                    }
                                    
                                    else {
                                                $output = '<script type="text/javascript" src="' . RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-' . $js_map_id . '.js"></script>';
                                    }
                                    
                                    $map_name = $_REQUEST[ 'map' ];
                                    $map_canvas_color = !empty( $_REQUEST[ 'canvascolor' ] ) ? $_REQUEST[ 'canvascolor' ] : RVM_CANVAS_BG_COLOUR; //default setting fallback
                                    $map_bg_color = !empty( $_REQUEST[ 'bgcolor' ] ) ? $_REQUEST[ 'bgcolor' ] : RVM_MAP_BG_COLOUR;
                                    $map_bg_selected_color = !empty( $_REQUEST[ 'bgselectedcolor' ] ) ? $_REQUEST[ 'bgselectedcolor' ] : RVM_MAP_BG_SELECTED_COLOUR;
                                    $map_border_color = !empty( $_REQUEST[ 'bordercolor' ] ) ? $_REQUEST[ 'bordercolor' ] : RVM_MAP_BORDER_COLOUR;
                                    $map_width = !empty( $_REQUEST[ 'width' ] ) ? 'style="width: ' . $_REQUEST[ 'width' ] . ';"' : '';
                                    $output .= '<div class="preview-map-container" id="' . $map_name . '-map" ' . $map_width . '></div>';
                                    $output .= '<script>';
                                    $output .= '(function($) { $(function(){';
                                    $output .= '$("#' . $map_name . '-map").vectorMap({ map: "' . $js_map_id . '",';
                                    $output .= 'regionsSelectable: true,';
                                    $output .= 'regionStyle: { initial: { fill: "' . $map_bg_color . '", "fill-opacity": 1, stroke: "' . $map_border_color . '", "stroke-width": 1 }, selected: { fill: "' . $map_bg_selected_color . '" }},
                                    backgroundColor: "' . $map_canvas_color . '",';
                                    $output .= 'zoomButtons: ' . $map_zoom . ', zoomOnScroll: false });';
                                    $output .= '});})(jQuery);</script>';
                                    echo $output;
                                    die( );
                        } //wp_verify_nonce( $_REQUEST[ 'nonce' ], 'rvm_ajax_nonce' )
                        else {
                                    die( __( 'There was a security issue with the preview generation tool', RVM_TEXT_DOMAIN ) );
                        }
            } //isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] != 'select_country'
            
            else {
                        die( __( 'Choose a valid region from the drop down menu', RVM_TEXT_DOMAIN ) );
            }
} // add_action( 'wp_ajax_rvm_preview', 'rvm_ajax_preview' );

/* Custom Maps */
add_action( 'wp_ajax_rvm_custom_map', 'rvm_ajax_custom_map' );
function rvm_ajax_custom_map( $post_id )
{
            // check if custom_map value is sent
            if ( isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] = 'rvm_custom_map' ) {
                        if ( function_exists( 'unzip_file' ) ) {
                                    $output = '';
                                    $rvm_valid_unzip = false;
                                    $custom_map_filename_ext = '.zip';
                                    $custom_map_separator = '_';
                                    
                                    //Get uploaded map path
                                    $custom_map_filename = $_REQUEST[ 'custom_map_filename' ];
                                    
                                    //check if filename has the .zip extension or not: this is not intended for file extension checking
                                    if ( rvm_retrieve_custom_map_ext( $custom_map_filename, $custom_map_filename_ext ) != $custom_map_filename_ext ) {
                                                // so basically if user copied and pasted map name without the .zip extension, this is the right moment to add it :-)
                                                $custom_map_filename = $custom_map_filename . $custom_map_filename_ext;
                                    } //rvm_retrieve_custom_map_ext( $custom_map_filename, $custom_map_filename_ext ) != $custom_map_filename_ext
                                    
                                    // Access the WP filesystem and upload dir
                                    WP_Filesystem();
                                    $destination = wp_upload_dir();
                                    $destination_dir_path = $destination[ 'path' ];
                                    $destination_url = $destination[ 'url' ];
                                    //echo '<br>$destination_url: ' . $destination_url . '<br>';
                                    //echo '<br>$destination_dir_path: ' . $destination_dir_path . '<br>';
                                    $unzipfile = unzip_file( $destination_dir_path . '/' . $custom_map_filename, $destination_dir_path );

                                    //$output  .= '$custom_map_filename' . $custom_map_filename .'<br>' ;   
                                    //$output .= '$unzipfile' .  $unzipfile  .'<br>' ;
                                    
                                    //Get list of files and directories inside WP uploads
                                    $rvm_upload_list = scandir( $destination_dir_path );
                                    
                                    foreach ( $rvm_upload_list as $rvm_upload_entry ) {
                                                //$output  .=  $rvm_upload_entry . '<br>'; 
                                                //Check if the unzipped file matches the filename sent by user without ".zip" extension
                                                if ( $rvm_upload_entry == rvm_retrieve_custom_map_raw_name( $custom_map_filename, $custom_map_filename_ext ) ) {
                                                            $rvm_valid_unzip = true;
                                                } //$rvm_upload_entry == rvm_retrieve_custom_map_raw_name( $custom_map_filename, $custom_map_filename_ext )
                                    } //  foreach( $rvm_upload_list as  $rvm_upload_entry )
                                    
                                    if ( $unzipfile && $rvm_valid_unzip ) {
                                                //Get custom maps if exist on DB
                                                $rvm_custom_maps_options = rvm_retrieve_custom_maps_options();
                                                //push new value into the arary ( existing or not )
                                                $rvm_custom_maps_options[ rvm_retrieve_custom_map_raw_name( $custom_map_filename, $custom_map_filename_ext ) ] = $destination_dir_path. '/' . RVM_CUSTOM_MAPS_PATHS_DELIMITER . $destination_url . '/';
                                                // Let's save this path into db
                                                // we need this options in order to retrieve it inside the style and script register and enqueue functions
                                                update_option( 'rvm_custom_maps_options', $rvm_custom_maps_options );
                                                //Use following value to enable the publish button ONLY when a map is installed
                                                $output .= '<input type="hidden" id="rvm_custom_map_is_installed" name="rvm_custom_map_is_installed" value="1" />';
                                                $output .= '<p class="rvm_cm_messages"><img  src="' . RVM_IMG_PLUGIN_DIR . '/green-check2.png" alt="check" /><span>' .
                                                __( 'You have succesfully installed your custom map . Well done !', RVM_TEXT_DOMAIN ) 
                                                . '<br>' .__( 'Now you can <strong>Publish</strong> your post.', RVM_TEXT_DOMAIN ) . '</span></p>';
                                                
                                    } //if ( $unzipfile && $rvm_valid_unzip  )
                                    else {
                                                $output .= '<p class="rvm_cm_messages"><img  src="' . RVM_IMG_PLUGIN_DIR . '/warning-icon.png" alt="check" /><span>' . 
                                                __( 'Damned... Something went wrong !  Please check if name of the map is correct  or if you have uploaded the map previous month and try again uploading map now using wordpress media uploader.', RVM_TEXT_DOMAIN ) . '</span></p>';
                                    }
                                    echo $output;
                                    die( );
                        } // if(  function_exists( 'unzip_file' )  )
                        else {
                                    die( __( 'You have not unzip_file() function available for you WP or you did not provided a valid map name... come on !', RVM_TEXT_DOMAIN ) );
                        }
            } // if( isset( $_REQUEST[ 'nonce' ] )
            else {
                        die( __( 'Please select the custom map option from the drop menu ', RVM_TEXT_DOMAIN ) );
            }
} //function rvm_ajax_custom_map
?>