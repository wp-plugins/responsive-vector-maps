<?php
// Initialize css for plugin initialization
add_action( 'init', 'rvm_add_styles' );
function rvm_add_styles( )
{
            wp_register_style( 'rvm_jvectormap_css', RVM_CSS_PLUGIN_DIR . '/jquery-jvectormap-1.2.3.css' );
            wp_register_style( 'rvm_settings_css', RVM_CSS_PLUGIN_DIR . '/rvm_settings.css', '', '1.3' );
}

// Make the style available just for plugin settings page
add_action( 'admin_enqueue_scripts', 'rvm_add_settings_styles' );
function rvm_add_settings_styles( $hook )
{
            if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
                        wp_enqueue_style( 'wp-color-picker' ); // default WP colour picker
                        wp_enqueue_style( 'rvm_settings_css' );
                        wp_enqueue_style( 'rvm_jvectormap_css' );
            } //'post.php' == $hook || 'post-new.php' == $hook
}

// Make the style available for public pages after main theme style
add_action( 'wp_enqueue_scripts', 'rvm_add_style', 11 );
function rvm_add_style( )
{
            wp_enqueue_style( 'rvm_jvectormap_css' );
}

//Register script to WP
add_action( 'init', 'rvm_add_scripts' );
function rvm_add_scripts( )
{
            wp_register_script( 'rvm_jquery-jvectormap-js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-1.2.2.js', array(
                         'jquery' 
            ), '1.2.2' ); //dependency from jquery   
            //setting the dependency of following script to the above, means it will be loaded JUST if the parent is loaded
            wp_register_script( 'rvm_jquery-jvectormap-fr_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-fr_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-de_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-de_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-it_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-it_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-nl_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-nl_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-no_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-no_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-pl_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-pl_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-pt_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-pt_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-es_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-es_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-se_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-se_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-ch_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-ch_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-uk_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-uk_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-europe_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-europe_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-world_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-world_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-be_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-be_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            wp_register_script( 'rvm_jquery-jvectormap-us_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-us_merc_en.js', array(
                         'rvm_jquery-jvectormap-js' 
            ), '' );
            
            //Get custom maps if exist on DB
            $rvm_custom_maps_options = rvm_retrieve_custom_maps_options();

            //Here $key is the javascript name and $value the path to javascript itself
            if ( !empty( $rvm_custom_maps_options ) ) {
                        // get last value entered temporally
                        $rvm_custom_maps_options = array_reverse( $rvm_custom_maps_options );
                        foreach ( $rvm_custom_maps_options as $key => $value ) {
                                    $rvm_retrieve_custom_map_dir_and_url_path = rvm_retrieve_custom_map_dir_and_url_path( $value );
                                    // Check if custom map is still in original upload subdir: if not do not show it in drop down
                                    $rvm_is_map_in_download_dir_yet = rvm_is_map_in_download_dir_yet( $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] , $key ) ;
                                    
                                     if ( $rvm_is_map_in_download_dir_yet ) {
                                                @include $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] . $key . '/rvm-cm-settings.php';
                                                //wp_register_script( 'rvm_jquery-jvectormap-' . $key , rvm_retrieve_custom_map_destination_url( $value ) .'/jquery-jvectormap-' . $key  . '.js', array( 'rvm_jquery-jvectormap-js' ), '' );
                                                wp_register_script( 'rvm_jquery-jvectormap-' . $key, $rvm_retrieve_custom_map_dir_and_url_path[ 1 ]  . $key . '/jquery-jvectormap-' . $key . '.js', array(
                                                             'rvm_jquery-jvectormap-js' 
                                                ), '' );
                                     }//if ( $rvm_is_map_in_download_dir_yet )
                        } //$rvm_custom_maps_options as $key => $value
            } //!empty( $rvm_custom_maps_options )
            
            wp_register_script( 'rvm_general_js', RVM_JS_PLUGIN_DIR . '/rvm_general.js', array(
                         'jquery' 
            ), '', true );
            //Localize in javascript rvm_general_js
            wp_localize_script( 'rvm_general_js', 'objectL10n', array(
                         'loading' => __( 'Loading...', RVM_TEXT_DOMAIN ),
                        'marker_name' => __( 'Name', RVM_TEXT_DOMAIN ),
                        'marker_lat' => __( 'Latitude', RVM_TEXT_DOMAIN ),
                        'marker_long' => __( 'Longitude', RVM_TEXT_DOMAIN ),
                        'marker_link' => __( 'Link', RVM_TEXT_DOMAIN ),
                        'marker_dim' => __( 'Dimension', RVM_TEXT_DOMAIN ),
                        'marker_popup' => __( 'Popup label', RVM_TEXT_DOMAIN ),
                        'marker_remove' => __( 'Remove', RVM_TEXT_DOMAIN ),
                        'marker_dim_expl' => __( 'Use only integer or decimal', RVM_TEXT_DOMAIN ),
                        'marker_dim_placeholder' => __( 'e.g. 591.20', RVM_TEXT_DOMAIN ),
                        'marker_popup_placeholder' => __( 'e.g. Rome precipitation (mm) long term averages', RVM_TEXT_DOMAIN ),
                        'unzip_custom_map' => __( 'Unzip custom map', RVM_TEXT_DOMAIN ),
                        'unzipping' => __( 'Installing...', RVM_TEXT_DOMAIN ),
                        //set the path for javascript files
                        'images_js_path' => RVM_IMG_PLUGIN_DIR //path for images to be called from javascript  
            ) );
}
// Make the script available just for plugin post pages
add_action( 'admin_enqueue_scripts', 'rvm_add_settings_scripts' );
function rvm_add_settings_scripts( $hook )
{
            if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
                        wp_enqueue_script( 'jquery' );
                        wp_enqueue_script( 'rvm_general_js' );
                        wp_enqueue_script( 'rvm_jquery-jvectormap-js' );
                        wp_enqueue_script( 'wp-color-picker' );
                        // Retrieve options
                        $rvm_options = rvm_retrieve_options();  
                        //Remove emoji error in console
                        if( !empty( $rvm_options[ 'rvm_option_dequeue_wp_emoji' ] ) ) {
                                    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
                        }
            } //'post.php' == $hook || 'post-new.php' == $hook
}
// Make the scripts available for public pages
add_action( 'wp_enqueue_scripts', 'rvm_add_pub_scripts' );
function rvm_add_pub_scripts( )
{
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'rvm_jquery-jvectormap-js' );
            // Retrieve options
            $rvm_options = rvm_retrieve_options();  
            //Remove emoji error in console
            if( !empty( $rvm_options[ 'rvm_option_dequeue_wp_emoji' ] ) ) {
                        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
                        remove_action( 'wp_print_styles', 'print_emoji_styles' );
            }
}

?>