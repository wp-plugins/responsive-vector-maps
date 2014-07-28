<?php 
/**
 * CORE SCRIPT
 * ----------------------------------------------------------------------------
 */


// Fields input arrays 
function rvm_fields_array() {
    
    $fields = array() ;
    $fields[ 'rvm_mbe_select_map' ] = array( 'rvm_mbe_select_map', 'select', __( 'Select Map' , RVM_TEXT_DOMAIN ) , '', '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_zoom' ] = array( 'rvm_mbe_zoom', 'checkbox', __( 'Map zoom buttons' , RVM_TEXT_DOMAIN ) , '', '', '', 1, 'main' ) ;
    $fields[ 'rvm_mbe_select_target' ] = array( 'rvm_mbe_select_target', 'select', __( 'Target of Region Links' , RVM_TEXT_DOMAIN ) , __( '( Ex. "_blank" will open the link in a new window )' , RVM_TEXT_DOMAIN ), '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_mapid' ] = array( 'rvm_mbe_map_mapid', 'hidden', '' , '', '', '', 1, 'main' ) ; // this is for map id container - will be used by jvectormap to address div map container
    $fields[ 'rvm_mbe_width' ] = array( 'rvm_mbe_width', 'text', __( 'Map width' , RVM_TEXT_DOMAIN ) ,  __( '( You can use em, %, px etc.. Leave it blank if you want a responsive map )' , RVM_TEXT_DOMAIN ), '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_canvascolor' ] = array( 'rvm_mbe_map_canvascolor', 'text', __( 'Canvas Background Color', RVM_TEXT_DOMAIN ) , '( Hexadecimal color Ex.: #333333 )', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_bgcolor' ] = array( 'rvm_mbe_map_bgcolor', 'text', __( 'Map Color', RVM_TEXT_DOMAIN ) , '( Hexadecimal color Ex.: #333333 )', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_bordercolor' ] = array( 'rvm_mbe_map_bordercolor', 'text', __( 'Map Border Color', RVM_TEXT_DOMAIN ) , '( Hexadecimal color Ex.: #333333 )', 7, 7, 1, 'main' ) ; 
    return $fields;
    
}

// Country arrays for select
function rvm_countries_array() {
    
    $countries = array() ;
    // 'country name', 'select value', 'javascript wp filename for enqueuing', 'javascript filename', 'aspect ratio --> width/height'
    $countries[ 'Italy' ] =  array( 'italy', __( 'Italy' , RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-it_merc_js', 'it_merc_en', 0.7687125 ) ;
    $countries[ 'Germany' ] = array( 'germany', __( 'Germany', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-de_merc_js' , 'de_merc_en', 0.7353884 ) ;
    $countries[ 'France' ] = array( 'france', __( 'France', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-fr_merc_js' , 'fr_merc_en', 0.8057915 ) ;
    $countries[ 'Netherlands' ] = array( 'netherlands', __( 'Netherlands', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-nl_merc_js' , 'nl_merc_en', 0.8399607 ) ;
    $countries[ 'Poland' ] = array( 'poland', __( 'Poland', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-pl_merc_js' , 'pl_merc_en', 1.0555115 ) ; 
    $countries[ 'Sweden' ] = array( 'sweden', __( 'Sweden', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-se_merc_js' , 'se_merc_en', 0.4359546) ;
    $countries[ 'Switzerland' ] = array( 'switzerland', __( 'Switzerland', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-ch_merc_js' , 'ch_merc_en', 1.614945 ) ;
    $countries[ 'Norway' ] = array( 'norway', __( 'Norway', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-no_merc_js' , 'no_merc_en', 0.7592786 ) ;
    $countries[ 'Spain' ] = array( 'spain', __( 'Spain', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-es_merc_js' , 'es_merc_en', 1.3405912 ) ;
    $countries[ 'Portugal' ] = array( 'portugal', __( 'Portugal', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-pt_merc_js' , 'pt_merc_en', 0.3636363 ) ;
    $countries[ 'United-Kingdom' ] = array( 'unitedkingdom', __( 'United Kingdom', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-uk_merc_js' , 'uk_merc_en', 0.5354944 ) ;
    
    return $countries;
    
}

add_action( 'init', 'rvm_post_type' );
function rvm_post_type() {
        
    // set dashicons class for RVM post icon
    $menu_icon = 'dashicons-location-alt' ;
    
    // fallback for menu icon in case wp vesrsion previous then 3.8 ( dashicons era )
    if ( version_compare( RVM_WP_VERSION , '3.8', '<' ) ) {
        
        $menu_icon = RVM_IMG_PLUGIN_DIR . '/map-icon-16x16.png' ;
        
    }    
    
    register_post_type( 'rvm',
        array(
        'labels' => array(
        'name' => __( 'RVM - Maps' ),
        'singular_name' => __( 'RVM Singular Name', RVM_TEXT_DOMAIN ),
        'add_new' => __( 'Add New Map' , RVM_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Map' , RVM_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Map' , RVM_TEXT_DOMAIN ),
        'new_item' => __( 'New Map' , RVM_TEXT_DOMAIN ),
        'view_item' => __( 'View This Map' , RVM_TEXT_DOMAIN ),
        'search_items' => __( 'Search Maps' , RVM_TEXT_DOMAIN ),
        'not_found' => __( 'No Maps Found' , RVM_TEXT_DOMAIN ),
        'not_found_in_trash' => __( 'No Maps Found in Trash' , RVM_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Maps Colon' , RVM_TEXT_DOMAIN ),                
        'menu_name' => __( 'RVM Maps' , RVM_TEXT_DOMAIN )
        ),
        'description' => __( 'Responsive Vector Map Wherever You Like' , RVM_TEXT_DOMAIN ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 65, //After plugin menu 
        'menu_icon' => $menu_icon,         
        'supports' => array( 'title' )
        )
    );
    
    
    // Retrieve all default options from DB
    $options = get_option( 'rvm_options' ) ;
    $old_version = $options['ver'] ;
    
    // Update current plugin version or create it if do not exist
    if ( empty ( $old_version ) || version_compare( RVM_VERSION, $old_version, '>' ) ) {
       
        //this install defaults values
        $rvm_options = array( 
        
            'ver' => RVM_VERSION // actual version plugin number
               
        );
        
        update_option( 'rvm_options', $rvm_options ) ; 
            
            
    } //!empty ( $options['ver'] ) || version_compare( RVM_VERSION, 1.0, '>' )
        
}

add_action( 'add_meta_boxes' , 'rvm_meta_boxes_create' );
function rvm_meta_boxes_create() {
    
    add_meta_box( 'rvm_meta' , __( 'Settings For ' . get_the_title(), RVM_TEXT_DOMAIN ) , 'rvm_mb_function', 'rvm', 'normal', 'high' );
    
}

function rvm_mb_function( $post ) {    
    
    $array_countries = rvm_countries_array() ;
    $array_fields = rvm_fields_array() ;
    $output = '' ;
    
    foreach ( $array_fields as $field ) {
        
        $field_value = get_post_meta( $post->ID, '_' . $field[ 0 ], true );
        
        // echo the fields
        $id_and_class = 'id="' . $field[ 0 ] . '" class="' . PREFIX  . $field[ 1 ] . '" ' ; //add specific id and classes for fields
        
        $output .= '<p>' ;       
        
        if ( $field[ 1 ] == 'text' ) {
            
            if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_canvascolor' ) { $field_value = RVM_CANVAS_BG_COLOR ; }
            if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bgcolor' ) { $field_value = RVM_MAP_BG_COLOR ; }
            if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bordercolor' ) { $field_value = RVM_MAP_BORDER_COLOR ; }
            
            $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;           
            $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" ' ;            
            if ( !empty( $field[ 4 ] ) ) { $output .= ' maxlength="'. $field[ 4 ]. '" '; }
            if ( !empty( $field[ 5 ] ) ) { $output .= ' size="' . $field[ 5 ] . '" '; }
            $output .= ' />&nbsp;' . $field[ 3 ];
            
        }

        if ( $field[ 1 ] == 'select') {
            
            if ( $field[ 0 ] == 'rvm_mbe_select_map' ) {           
       
        
                if ( empty( $field_value ) ) { // If is a new map and we have no value create the select                
                    
                    $output .= '<label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                    $output .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;                    
                    $output .= '<option value="select_country" ' . selected( '', $field_value, false ) . '>Select a country</option>' ;
                    foreach ( $array_countries as $country_field ) {
                        
                        $output .= '<option value="' . $country_field[ 0 ] . '" ' . selected( $country_field[ 0 ] , $field_value, false ) . '>' . $country_field[ 1 ] . '</option>' ;
                        
                    }
                    
                    $output .= '</select>' ;  
                    
                } else { // else a readonly input field will be created               
                    
                    $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . __( 'Selected Map' , RVM_TEXT_DOMAIN ) . '</label>' ;
                    $output .= '<input ' . $id_and_class . ' type="text" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) ;            
                    if ( !empty( $field[ 3 ] ) ) { $output .= ' maxlength="'. $field[ 3 ]. '" '; }
                    if ( !empty( $field[ 4 ] ) ) { $output .= ' size="' . $field[ 4 ] . '" '; }
                    $output .= '" readonly="readonly">' ;                   
                    
                }            
            
            }// if ( $field[ 0 ] == 'rvm_mbe_select_map' )
        
        } // $if ( $field[ 1 ] == 'select')
        
        
        if ( $field[ 1 ] == 'hidden' ) {
            
            if ( empty( $field_value ) ) { $field_value = 'mapid-' . rand() ; } // check if the map id is already created, if not it create using the random number generator rand() function
            
            $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" >' ;
            
        }

        $output .= '</p>' ;
        
        
        if ( $field[ 1 ] == 'checkbox' ) {
            $output .= '<label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
            $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '"  value="1" ' . checked( 1, $field_value, false ) . ' />'; 
            
        }

        $output .= '</p>' ;
        
        
    } //foreach ( $array_fields as $field )
    
    
    $output .= '<input type="button" id="preview_button" class="button-primary" value=" ' . __( 'Map Layout Preview' , RVM_TEXT_DOMAIN ) . '" />' ;
    $output .= '<input type="button" id="close_preview_button" class="button-primary" style="display: none;" value=" ' . __( 'Close Map Preview' , RVM_TEXT_DOMAIN ) . '" />' ;
    $output .= '<div class="rvm_clear_left"></div>' ;
    $output .= '<div id="rvm_map_preview"></div>' ; //new regions fields will be loaded here via ajax
    
    //create the nonce for region ajax include
    $output .= '<span id="' . PREFIX . 'ajax_nonce" class="hidden" style="visibility: hidden;">' . wp_create_nonce( 'rvm_ajax_nonce' ) . '</span>' ;    
    $output .= '<div id="rvm_regions"></div>' ; //new regions fields will be loaded here via ajax
    
    echo $output ;// echo the fields  
    

    if( get_post_meta( $post->ID, '_rvm_mbe_select_map', true ) ) { //include regions by selected country
        
        $region_include = new rvm_regions_include ;
        $region_include->rvm_set_variables( get_post_meta( $post->ID, '_rvm_mbe_select_map', true ) , $post->ID ) ;
        $region_include->rvm_display_regions_form( $post->ID ) ;
        
        // generate the shortcode ;
        
        echo '<div id="rvm_shortcode" class="updated"><p>' . __( 'Use following shortcode to display this map whenever you like ( only once per post/sidebar per page ):' , RVM_TEXT_DOMAIN ) . ' <strong>[rvm_map mapid="' . $post->ID .'"]</strong> .</p></div>'  ;
        echo '<div id="rvm_donation" class="updated"><p>' . __( 'Do you like <strong>RVM</strong> ? Please consider making a donation now' , RVM_TEXT_DOMAIN )   . '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40responsivemapsplugin%2ecom&lc=IT&item_name=responsive%20Vector%20Maps%20Plugin&item_number=rvm%2dplugin%2dwordpress%2dadmin&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">
<img style="vertical-align:middle;margin-left:5px;" src="' . RVM_IMG_PLUGIN_DIR . '/donate_button.png" /></a></p></div>' ;
             
    }

}// function rvm_mb_function( $post )

// Save data into DB
add_action( 'save_post' , 'rvm_mb_save_meta' );
function rvm_mb_save_meta( $post_id ) {
    
    $array_fields = rvm_fields_array() ;
    
    if ( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country'  ) {
        
        foreach ( $array_fields as $field ) {
                 
            if ( $field[ 0 ] == 'rvm_mbe_zoom' ) {
                update_post_meta( $post_id, '_' . $field[ 0 ] ,  empty( $_POST[ $field[ 0 ] ] ) ? 0 : 1 ) ;
            }
            
            else {
                
                update_post_meta( $post_id, '_' . $field[ 0 ] , strip_tags( $_POST[ $field[ 0 ] ] ) ) ;
            }
            
   
        }

        $region_include = new rvm_regions_include ;
        $region_include->rvm_set_variables( $_POST[ 'rvm_mbe_select_map' ] , $post_id ) ;
        $region_include->rvm_display_regions_update( $post_id ) ; 
        
    } //if ( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country'  )
    
}// function rvm_mb_save_meta( $post_id )

class rvm_regions_include { // dynamically include regions files
        
    var $region ;
    var $link_target ;

    
    function rvm_set_variables( $args, $post_id ) {
        
        $this->region = $args ;
        $this->link_target = rvm_fields_array() ;
        $field_value = get_post_meta( $post_id, '_rvm_mbe_select_target' , true ) ;
 
        foreach( $this->link_target as $field ) {
            
            if( $field[ 0 ] == 'rvm_mbe_select_target' ) {
                
                $id_and_class = 'id="' . $field[ 0 ] . '" class="' . PREFIX  . $field[ 1 ] . '" ' ; //add specific id and classes for fields  
                $this->link_target = '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                $this->link_target .= '<select ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;
                $this->link_target .= '<option value="_blank" ' . selected( '_blank' , $field_value, false ) . '>_blank</option>' ;
                $this->link_target .= '<option value="_self" ' . selected( '_self' , $field_value, false ) . '>_self</option>' ;
                $this->link_target .= '<option value="_parent" ' . selected( '_parent' , $field_value, false ) . '>_parent</option>' ;
                $this->link_target .= '</select>&nbsp;' . $field[ 3 ] ;
                
            }
        }// foreach( $this->link_target as $field )
   
    }
    
    function rvm_display_regions_form( $post_id ) { // used in the ajax call when a country is selected      
        
        @include RVM_INC_PLUGIN_DIR . '/regions/' . $this->region . '-regions.php' ;        
        $array_regions = $regions ; // $regions is an array in the included file
        $output = '<div id="rvm_regions_from_db"><h4>' . __( 'Choose an url each region if you need' , RVM_TEXT_DOMAIN ) . '</h4>' ;                             
                        
        foreach( $array_regions as $region ) {
            
            $field_value = get_post_meta( $post_id, '_' . $region[ 1 ], true );
            $id_and_class = 'id="' . $region[ 0 ] . '" ' . RVM_REGION_LINK_CLASS ; //add specific id and classes for fields  
            $output .= '<p>' ;                               
            $output .= '<label for="' . $region[ 0 ] . '" ' . RVM_LABEL_CLASS . ' >' . $region[ 2 ] . '</label>' ;           
            $output .= '<input ' . $id_and_class . ' type="text" name="' . $region[ 1 ] . '" value="' . esc_url( $field_value ) . '" >' ; 
            $output .= '</p>' ;
    
        } //foreach( $array_fields as $field) 
               
        $output .= '</div>' ; // close id="rvm_regions_from_db"
        echo $output ;
        echo $this->link_target ;
        
           
    } //function rvm_display_regions_form()
    
    
    function rvm_display_regions_update( $post_id ) { // used when update form data
        
        @include RVM_INC_PLUGIN_DIR . '/regions/' . $this->region . '-regions.php' ;        
        $array_fields = $regions ; // $regions is an array in the included file                                   
                        
        foreach ( $array_fields as $field ) {
        
            update_post_meta( $post_id, '_' . $field[ 1 ] , esc_url_raw( $_POST[ $field[ 1 ] ] ) ) ;
            
        }     
        
    }

}// class rvm_regions_include

/* Ajax for country region generation */
add_action( 'wp_ajax_rvm_regions', 'rvm_ajax_regions' );
function rvm_ajax_regions( $post_id ) {    
    
    if( isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] != 'select_country' ) {

        // Verify that the incoming request is coming with the security nonce
        if( wp_verify_nonce( $_REQUEST[ 'nonce' ] , 'rvm_ajax_nonce' ) ) {
           
            $region = $_REQUEST[ 'map' ] ; 
            $region_include = new rvm_regions_include ;
            $region_include->rvm_set_variables( $region, $post_id ) ;
            $region_include->rvm_display_regions_form( $post_id ) ;
                
            die() ;
    
        } else {
                     
             die( __( 'There was a security issue with the region generation tool' , RVM_TEXT_DOMAIN ) );
    
        } 
    
    } 
    
    else {
                     
        die( __( 'Choose a valid region from the drop down menu' , RVM_TEXT_DOMAIN ) );
    
    } 

}// add_action( 'wp_ajax_rvm_regions', 'rvm_ajax_regions' )


/* Ajax for map preview */
add_action( 'wp_ajax_rvm_preview', 'rvm_ajax_preview' );
function rvm_ajax_preview( $post_id ) {    
    
    if( isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] != 'select_country' ) {

        // Verify that the incoming request is coming with the security nonce
        if( wp_verify_nonce( $_REQUEST[ 'nonce' ] , 'rvm_ajax_nonce' ) ) {
           
            //inject html and javascript to create teh map preview
            
            $array_countries = rvm_countries_array() ; 
            foreach ( $array_countries as $country_field ) {
                
                if( $_REQUEST[ 'map' ] == $country_field[ 0 ] ) {
                    
                    $js_map_id = $country_field[ 3 ] ;
                    $js_vectormap = $country_field[ 2 ] ;
                    
                }
            }// foreach ( $array_countries as $country_field )
            
            
            $map_zoom = empty( $_REQUEST[ 'zoom' ] ) ? 'false' : 'true' ;
            
            // Load just when yuo need - dynamically load region map scripts Ex. jquery-jvectormap-it_merc_en.js           
            echo '<script type="text/javascript" src="' . RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-' . $js_map_id . '.js"></script>' ;           
            
                        
            $map_name = $_REQUEST[ 'map' ] ;
            $map_canvas_color = !empty( $_REQUEST[ 'canvascolor' ] ) ? $_REQUEST[ 'canvascolor' ] : RVM_CANVAS_BG_COLOR ; //default setting fallback
            $map_bgcolor = !empty( $_REQUEST[ 'bgcolor' ] ) ? $_REQUEST[ 'bgcolor' ]  : RVM_MAP_BG_COLOR ;
            $map_border_color = !empty( $_REQUEST[ 'bordercolor' ] ) ? $_REQUEST[ 'bordercolor' ] : RVM_MAP_BORDER_COLOR ;
            
            
            $map_width = !empty( $_REQUEST[ 'width' ] ) ? 'style="width: ' . $_REQUEST[ 'width' ] . ';"' : '' ;             
     
            echo '<div class="preview-map-container" id="' . $map_name . '-map" ' . $map_width . '></div>' ;
            echo '<script>' ;
            echo '(function($) { $(function(){' ;
            echo '$("#' . $map_name . '-map").vectorMap({ map: "' . $js_map_id . '",';
            echo 'regionStyle: { initial: { fill: "' . $map_bgcolor . '", "fill-opacity": 1, stroke: "' . $map_border_color . '", "stroke-width": 1 }, selected: { fill: "' . $map_bgcolor . '" }},
            backgroundColor: "' . $map_canvas_color . '",' ;
            echo 'zoomButtons: ' . $map_zoom . ', zoomOnScroll: false });' ;
            echo '});})(jQuery);</script>';            
            
            die() ;
    
        } else {
                     
             die( __( 'There was a security issue with the preview generation tool' , RVM_TEXT_DOMAIN ) );
    
        } 
    
    } 
    
    else {
                     
        die( __( 'Choose a valid region from the drop down menu' , RVM_TEXT_DOMAIN ) );
    
    } 

}// add_action( 'wp_ajax_rvm_preview', 'rvm_ajax_preview' );



// Adding custom columns to display maps list
//this works before 3.1
add_filter( 'manage_edit-rvm_columns', 'add_new_rvm_columns' );
function add_new_rvm_columns( $columns ) {    

    $new_columns[ 'cb' ] = '<input type="checkbox" />';
    $new_columns[ 'title' ] = __( 'Map name', RVM_TEXT_DOMAIN );
    $new_columns[ 'shortcode' ] = __( 'Shortcode', RVM_TEXT_DOMAIN );
    $new_columns[ 'date' ] = __( 'Date', RVM_TEXT_DOMAIN ); 
    return $new_columns;
    
}

//Populate shortcodes column
add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );
function custom_columns( $column, $post_id ) {
    switch ( $column ) {
        
    case 'shortcode' :        
        echo '[rvm_map mapid="' . $post_id . '"]' ;
        break;
        
    }
}

?>