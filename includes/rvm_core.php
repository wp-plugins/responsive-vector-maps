<?php
/**
 * CORE SCRIPT
 * ----------------------------------------------------------------------------
 */
 
// Fields input arrays 
function rvm_fields_array( )
{
            $fields = array( );
            /* 'field name', 'input type',  
             * 'field label', 
             * 'field bonus expl.', '
             * input maxlenght', 
             * 'input size', 
             * 'required', 
             * 'which section belongs to?', '
             * class' */
            $fields[ 'rvm_mbe_select_map' ] = array(
                         'rvm_mbe_select_map',
                        'select',
                        __( 'Select Map', RVM_TEXT_DOMAIN ),
                        '',
                        '',
                        10,
                        1,
                        'main',
                        '' 
            );
            $fields[ 'rvm_mbe_zoom' ] = array(
                         'rvm_mbe_zoom',
                        'checkbox',
                        __( 'Map zoom buttons', RVM_TEXT_DOMAIN ),
                        '',
                        '',
                        '',
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_mapid' ] = array(
                         'rvm_mbe_map_mapid',
                        'hidden',
                        '',
                        '',
                        '',
                        '',
                        1,
                        'main',
                        '' 
            ); // this is for map id container - will be used by jvectormap to address div map container
            $fields[ 'rvm_mbe_width' ] = array(
                         'rvm_mbe_width',
                        'text',
                        __( 'Map width', RVM_TEXT_DOMAIN ),
                        __( '( You can use em, %, px etc.. Leave it blank if you want a responsive map )', RVM_TEXT_DOMAIN ),
                        '',
                        10,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_canvascolor' ] = array(
                         'rvm_mbe_map_canvascolor',
                        'text',
                        __( 'Canvas Background Color', RVM_TEXT_DOMAIN ),
                        '',
                        7,
                        7,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_bgcolor' ] = array(
                         'rvm_mbe_map_bgcolor',
                        'text',
                        __( 'Map Color', RVM_TEXT_DOMAIN ),
                        '',
                        7,
                        7,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_bg_selected_color' ] = array(
                         'rvm_mbe_map_bg_selected_color',
                        'text',
                        __( 'Selected Region Color', RVM_TEXT_DOMAIN ),
                        '',
                        7,
                        7,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_bordercolor' ] = array(
                         'rvm_mbe_map_bordercolor',
                        'text',
                        __( 'Map Border Color', RVM_TEXT_DOMAIN ),
                        '',
                        7,
                        7,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );
            $fields[ 'rvm_mbe_map_delete_padding' ] = array(
                         'rvm_mbe_map_delete_padding',
                        'checkbox',
                        __( 'Get rid of map padding', RVM_TEXT_DOMAIN ),
                        '',
                        '',
                        '',
                        '',
                        'main',
                        'hidden_when_custom_map' 
            );
            /*$fields[ 'rvm_mbe_select_target' ] = array(
                         'rvm_mbe_select_target',
                        'select',
                        __( 'Links target', RVM_TEXT_DOMAIN ),
                        __( '( Ex. "_blank" will open all the links in a new window )', RVM_TEXT_DOMAIN ),
                        '',
                        10,
                        1,
                        'main',
                        'hidden_when_custom_map' 
            );*/
            $fields[ 'rvm_mbe_tab_active' ] = array(
                         'rvm_mbe_tab_active',
                        'hidden',
                        '',
                        '',
                        '',
                        '',
                        '',
                        'main',
                        '' 
            );
            // Markers fields
            $fields[ 'rvm_mbe_map_marker_bg_color' ] = array(
                         'rvm_mbe_map_marker_bg_color',
                        'text',
                        __( 'Markers Background Color', RVM_TEXT_DOMAIN ),
                        __( 'Not visible in map preview', RVM_TEXT_DOMAIN ),
                        7,
                        7,
                        1,
                        'markers' 
            );
            $fields[ 'rvm_mbe_map_marker_border_color' ] = array(
                         'rvm_mbe_map_marker_border_color',
                        'text',
                        __( 'Markers Border Color', RVM_TEXT_DOMAIN ),
                        __( 'Not visible in map preview', RVM_TEXT_DOMAIN ),
                        7,
                        7,
                        1,
                        'markers' 
            );
            $fields[ 'rvm_mbe_map_marker_dim_min' ] = array(
                         'rvm_mbe_map_marker_dim_min',
                        'select',
                        __( 'Minimum value', RVM_TEXT_DOMAIN ),
                        '',
                        '',
                        '',
                        1,
                        'markers' 
            );
            $fields[ 'rvm_mbe_map_marker_dim_max' ] = array(
                         'rvm_mbe_map_marker_dim_max',
                        'select',
                        __( 'Maximum value', RVM_TEXT_DOMAIN ),
                        '',
                        '',
                        '',
                        1,
                        'markers' 
            );
            return $fields;
}

// Country arrays for select
function rvm_countries_array( )
{
            $countries = array( );
            // 'country name', 'select value', 'javascript wp filename for enqueuing', 'javascript filename', 'aspect ratio --> width/height', optgroup (custom, default etc...), map dir, map url
            /*countries*/
            $countries[ 'italy' ] = array(
                         'italy',
                        __( 'Italy', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-it_merc_js',
                        'it_merc_en',
                        0.7687125,
                        'default_maps',
                        '',
                        ''
            );
            $countries[ 'belgium' ] = array(
                         'belgium',
                        __( 'Belgium', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-be_merc_js',
                        'be_merc_en',
                        1.2244422,
                        'default_maps',
                        '',
                        ''
            );
            $countries[ 'france' ] = array(
                         'france',
                        __( 'France', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-fr_merc_js',
                        'fr_merc_en',
                        0.8057915,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'germany' ] = array(
                         'germany',
                        __( 'Germany', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-de_merc_js',
                        'de_merc_en',
                        0.7353884,
                        'default_maps',
                        '',
                        '' 
            );

            $countries[ 'netherlands' ] = array(
                         'netherlands',
                        __( 'Netherlands', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-nl_merc_js',
                        'nl_merc_en',
                        0.8399607,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'norway' ] = array(
                         'norway',
                        __( 'Norway', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-no_merc_js',
                        'no_merc_en',
                        0.7592786,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'poland' ] = array(
                         'poland',
                        __( 'Poland', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-pl_merc_js',
                        'pl_merc_en',
                        1.0555115,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'portugal' ] = array(
                         'portugal',
                        __( 'Portugal', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-pt_merc_js',
                        'pt_merc_en',
                        0.6724137,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'spain' ] = array(
                         'spain',
                        __( 'Spain', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-es_merc_js',
                        'es_merc_en',
                        1.3405912,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'sweden' ] = array(
                         'sweden',
                        __( 'Sweden', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-se_merc_js',
                        'se_merc_en',
                        0.4359546,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'switzerland' ] = array(
                         'switzerland',
                        __( 'Switzerland', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-ch_merc_js',
                        'ch_merc_en',
                        1.614945,
                        'default_maps',
                        '',
                        ''
            );
            $countries[ 'unitedkingdom' ] = array(
                         'unitedkingdom',
                        __( 'United Kingdom', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-uk_merc_js',
                        'uk_merc_en',
                        0.5354944,
                        'default_maps',
                        '',
                        '' 
            );
            /*world*/
            $countries[ 'europe' ]  = array(
                         'europe',
                        __( 'Europe', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-europe_merc_js',
                        'europe_merc_en',
                        0.8991364,
                        'default_maps',
                        '',
                        '' 
            );
            $countries[ 'usa' ] = array(
                         'usa',
                        __( 'Usa', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-us_merc_js',
                        'us_merc_en',
                        1.3110130,
                        'default_maps', 
                        '',
                        ''
            );
            $countries[ 'world' ] = array(
                         'world',
                        __( 'World', RVM_TEXT_DOMAIN ),
                        'rvm_jquery-jvectormap-world_merc_js',
                        'world_merc_en',
                        1.5435268,
                        'default_maps',
                        '',
                        ''
            );
            
            
             /**************** Custom maps *****************/
             
            //Get custom maps if exist on DB
            $rvm_custom_maps_options = rvm_retrieve_custom_maps_options();

            //Here $key is the javascript name and $value the path to javascript itself
            if ( !empty( $rvm_custom_maps_options ) ) {
                         // get last value entered temporally
                        $rvm_custom_maps_options = array_reverse ( $rvm_custom_maps_options );
                        foreach ( $rvm_custom_maps_options as $key => $value ) {
                                    $rvm_retrieve_custom_map_dir_and_url_path = rvm_retrieve_custom_map_dir_and_url_path( $value );
                                    // Check if custom map is still in original upload subdir: if not do not show it in drop down
                                    $rvm_is_map_in_download_dir_yet = rvm_is_map_in_download_dir_yet( $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] , $key ) ;

                                    if ( $rvm_is_map_in_download_dir_yet ) {
                                        @include $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] . $key .  '/rvm-cm-settings.php';
                                        
                                        //echo $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] . $key .  '/rvm-cm-settings.php';
                                        $countries[ $key ] = array(
                                                    $key,
                                                    $key,
                                                    'rvm_jquery-jvectormap-' . $key,
                                                    $key,
                                                    $rvm_aspect_ratio,
                                                    'custom_maps',
                                                    $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] . $key, // map dir
                                                    $rvm_retrieve_custom_map_dir_and_url_path[ 1 ] . $key // map url
                                        );
                                    } //if ( $rvm_is_map_in_download_dir_yet ) 
                        } //$rvm_custom_maps_options as $key => $value
            } //!empty($rvm_custom_maps_options)
            return $countries;
}

// Fields input arrays  for custom maps
function rvm_custom_map_fields_array( )
{
            $custom_map_fields = array(
                        'rvm_custom_map_url',
                        'rvm_custom_map_dir_path' 
            );
            return $custom_map_fields;
}

add_action( 'init', 'rvm_post_type' );
function rvm_post_type( )
{
            // set dashicons class for RVM post icon
            $menu_icon = 'dashicons-location-alt';
            // fallback for menu icon in case wp vesrsion previous then 3.8 ( dashicons era )
            if ( version_compare( RVM_WP_VERSION, '3.8', '<' ) ) {
                        $menu_icon = RVM_IMG_PLUGIN_DIR . '/map-icon-16x16.png';
            } //version_compare(RVM_WP_VERSION, '3.8', '<')
            
            register_post_type( 'rvm', array(
                         'labels' => array(
                                     'name' => __( 'RVM - Maps' ),
                                    'singular_name' => __( 'RVM Singular Name', RVM_TEXT_DOMAIN ),
                                    'add_new' => __( 'Add New Map', RVM_TEXT_DOMAIN ),
                                    'add_new_item' => __( 'Add New Map', RVM_TEXT_DOMAIN ),
                                    'edit_item' => __( 'Edit Map', RVM_TEXT_DOMAIN ),
                                    'new_item' => __( 'New Map', RVM_TEXT_DOMAIN ),
                                    'view_item' => __( 'View This Map', RVM_TEXT_DOMAIN ),
                                    'search_items' => __( 'Search Maps', RVM_TEXT_DOMAIN ),
                                    'not_found' => __( 'No Maps Found', RVM_TEXT_DOMAIN ),
                                    'not_found_in_trash' => __( 'No Maps Found in Trash', RVM_TEXT_DOMAIN ),
                                    'parent_item_colon' => __( 'Parent Maps Colon', RVM_TEXT_DOMAIN ),
                                    'menu_name' => __( 'RVM Maps', RVM_TEXT_DOMAIN ) 
                        ),
                        'description' => __( 'Responsive Vector Map Wherever You Like', RVM_TEXT_DOMAIN ),
                        'public' => true,
                        'has_archive' => true,
                        'menu_position' => 65, //After plugin menu 
                        'menu_icon' => $menu_icon,
                        'supports' => array(
                                     'title' 
                        ) 
            ) );
            // Retrieve all default options from DB
           $rvm_options = rvm_retrieve_options(); 
            $old_version = !empty( $rvm_options[ 'ver' ] ) ? $rvm_options[ 'ver' ] : '' ;
            // Update current plugin version or create it if do not exist
             if ( empty( $old_version ) || version_compare( RVM_VERSION , $old_version, '>' ) ) {
                      
                        // Alter just the version field of multidimensiona array
                        $rvm_options['ver'] = RVM_VERSION ;                        
                        update_option( 'rvm_options', $rvm_options );
            } //!empty ( $options['ver'] ) || version_compare( RVM_VERSION, 1.0, '>' )
}

add_action( 'add_meta_boxes', 'rvm_meta_boxes_create' );
function rvm_meta_boxes_create( )
{
            add_meta_box( 'rvm_meta', __( 'Settings For ' . get_the_title(), RVM_TEXT_DOMAIN ), 'rvm_mb_function', 'rvm', 'normal', 'high' );
}

// manage markers arrays from db
function markers( $postid, $method, $array_type )
{
            if ( $method == 'retrieve' ) { // get markers
                        $marker_array = array( );
                        $marker_array_serialized[ 'rvm_marker_name' ]  = get_post_meta( $postid, '_rvm_marker_name', true ) ;
                        $marker_array_serialized[ 'rvm_marker_lat' ] = get_post_meta( $postid, '_rvm_marker_lat', true );
                        $marker_array_serialized[ 'rvm_marker_long' ] = get_post_meta( $postid, '_rvm_marker_long', true );
                        $marker_array_serialized[ 'rvm_marker_link' ] = get_post_meta( $postid, '_rvm_marker_link', true );
                        $marker_array_serialized[ 'rvm_marker_dim' ] = get_post_meta( $postid, '_rvm_marker_dim', true );
                        $marker_array_serialized[ 'rvm_marker_popup' ] = get_post_meta( $postid, '_rvm_marker_popup', true );
                        $marker_array_unserialized[ 'rvm_marker_name_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_name' ] );
                        $marker_array_unserialized[ 'rvm_marker_lat_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_lat' ] );
                        $marker_array_unserialized[ 'rvm_marker_long_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_long' ] );
                        $marker_array_unserialized[ 'rvm_marker_link_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_link' ] );
                        $marker_array_unserialized[ 'rvm_marker_dim_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_dim' ] );
                        $marker_array_unserialized[ 'rvm_marker_popup_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_popup' ] );
                        
                        if ( $array_type == 'serialized' ) {
                                    return $marker_array_serialized;
                        } //$array_type == 'serialized'
                        
                        else {
                                    return $marker_array_unserialized;
                        }
            } //$method == 'retrieve'
}

//manage region/countries link and background from db
function regionsparams( $postid, $region )
{
            $field_value = get_post_meta( $postid, '_' . $region, true ); // get regions link ver < 2.0 for retrocompatibility    
            $regionsparams_array = array( );
            
            if ( empty( $field_value ) ) {
                        $regionsparams_array[ 'field_region_link' ]  = '';
                        $regionsparams_array[ 'field_region_bg' ]    = '';
                        $regionsparams_array[ 'field_region_popup' ] = '';
            } //empty($field_value)
            
            else {
                        if ( is_array( unserialize( $field_value ) ) ) {
                                    $field_value = unserialize( $field_value );
                                    $regionsparams_array[ 'field_region_link' ] = $field_value[ 0 ];
                                    $regionsparams_array[ 'field_region_bg' ]   = $field_value[ 1 ];
                                    /* from now on isset is mandatory for any added values */
                                    if ( isset( $field_value[ 2 ] ) ) {
                                                $regionsparams_array[ 'field_region_popup' ] = $field_value[ 2 ];
                                    } //legacy with old versions
                        } //is_array(unserialize($field_value))
                        else {
                                    if ( $field_value = 'http://N;' ) {
                                                $field_value = '';
                                    } // erase old wrong links
                                    $regionsparams_array[ 'field_region_link' ] = $field_value; // legacy with previous version
                        }
            }

            return $regionsparams_array;
}

function rvm_mb_function( $post )
{
            //$rvm_custom_maps_options = get_option( 'rvm_custom_maps_options' );
            $output = ''; //initialize output
            $rvm_selected_map = get_post_meta( $post->ID, '_rvm_mbe_select_map', true );
            $array_countries = rvm_countries_array();
            $array_fields = rvm_fields_array();
            $rvm_tab_active = get_post_meta( $post->ID, '_rvm_mbe_tab_active', true );
            $screen = get_current_screen();
            
            if ( $screen->action == 'add' || empty( $rvm_tab_active ) ) { //if new post or editing an existing one without any value in DB for active tab
                        $rvm_tab_active_default = 'rvm_main_settings';
            } //$screen->action == 'add' || empty($rvm_tab_active)
            
            /*$output = '$screen->id : ' . $screen->id .'<br>' ;
            $output .= '$screen->action : ' . $screen->action .'<br>' ;
            $output .= '$screen->base : ' . $screen->base .'<br>' ;*/
            
            if ( isset( $rvm_tab_active_default ) || ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_main_settings' ) ) {
                        $rvm_tab_class_main_settings = 'rvm_active';
            } //isset($rvm_tab_active_default) || (isset($rvm_tab_active) && $rvm_tab_active == 'rvm_main_settings')
            
            else {
                        $rvm_tab_class_main_settings = '';
            }

            $output .= '<div id="rvm_tabs"><ul><li id="rvm_main_settings_tab" class="rvm_tabs ' . $rvm_tab_class_main_settings . '" rel="rvm_main_settings"><a href="#">Main settings</a></li>';
            
            if ( !empty( $rvm_selected_map ) ) {
                        if ( !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_regions_countries' ) ) {
                                    $rvm_tab_class_region_countries = 'rvm_active';
                        } //!isset($rvm_tab_active_default) && (isset($rvm_tab_active) && $rvm_tab_active == 'rvm_regions_countries')
                        else {
                                    $rvm_tab_class_region_countries = '';
                        }
                        if ( !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_markers' ) ) {
                                    $rvm_tab_class_markers = 'rvm_active';
                        } //!isset($rvm_tab_active_default) && (isset($rvm_tab_active) && $rvm_tab_active == 'rvm_markers')
                        else {
                                    $rvm_tab_class_markers = '';
                        }
                        $output .= '<li id="rvm_regions_countries_tab" class="rvm_tabs ' . $rvm_tab_class_region_countries . '" rel="rvm_regions_countries"><a href="#">'  .  __( 'Subdivisions ', RVM_TEXT_DOMAIN )  . '</a></li>';
                        $output .= '<li id="rvm_markers_tab" class="rvm_tabs  ' . $rvm_tab_class_markers . '" rel="rvm_markers"><a href="#">Markers</a></li>';
            } //if( !empty( $rvm_selected_map ) )
            $output .= '</ul></div>';
            
            
            /**************** Start: Main settings *****************/
            
            
            // Check if is a custom map and if still the files are in the upload subdir            
            if ( rvm_is_custom_map( $post->ID ) ) {                        
                        $rvm_custom_map_name = get_post_meta( $post->ID, '_rvm_mbe_select_map', true );                
                        $rvm_custom_maps_options = rvm_retrieve_custom_maps_options();
                        if ( !empty( $rvm_custom_maps_options ) && !empty( $rvm_custom_map_name ) ) {
                                    $rvm_custom_maps_options = array_reverse( $rvm_custom_maps_options );
                                    foreach ( $rvm_custom_maps_options as $key => $value ) {
                                                if ( $key === $rvm_custom_map_name ) {
                                                            $rvm_retrieve_custom_map_dir_and_url_path = rvm_retrieve_custom_map_dir_and_url_path ( $value ) ;   
                                                            $rvm_custom_map_dir_path = $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] ;
                                                }//  if ( $key === $rvm_custom_map_name )
                                    } // foreach ( $rvm_custom_maps_options as $key => $value )                        

                                    //Check if custom map is still in original upload subdir: if not do not show it in drop down
                                    if ( !rvm_is_map_in_download_dir_yet( $rvm_custom_map_dir_path , $rvm_custom_map_name ) ) {
                                                $output .= '<div>' ;
                                                $output .= '<p class="rvm_cm_messages"><img  src="' . RVM_IMG_PLUGIN_DIR . '/warning-icon.png" alt="check" /><span>' .  __( 'It seems custom map is not in upload dir anymore', RVM_TEXT_DOMAIN ) . '</span></p>';
                                                $output .= '<p>' . __( '<strong>Please, do not click on "Update"</strong> ', RVM_TEXT_DOMAIN )   . '</p>' ;
                                                $output .= '<p>' . __( 'This is the path where custom map should be :  ', RVM_TEXT_DOMAIN ) . $rvm_custom_map_dir_path  . '</p>';
                                                $output .= '<p>' . __( 'Please remove this map from posts / pages / widgets ', RVM_TEXT_DOMAIN )  . '</p>' ;
                                                $output .= '<p>' . __( 'In order to use this map upload again using the media uploader and use "Add Custom Map" in the select drop down ', RVM_TEXT_DOMAIN )   . '</p>' ;
                                                $output .= '</div>';
                                    }// if ( $rvm_is_map_in_download_dir_yet )                        
                         } // if ( !empty( $rvm_custom_maps_options ) && !empty( $rvm_custom_map_name ) )                       
            } //if ( rvm_is_custom_map( $post->ID ) )

            $rvm_div_class = isset( $rvm_tab_active_default ) || ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_main_settings' ) ? ' class="rvm_active hidden"  ' : ' class="hidden"  ';
            $output .= '<div id="rvm_main_settings" ' . $rvm_div_class . '>';
            
            foreach ( $array_fields as $field ) {
                        $field_value  = get_post_meta( $post->ID, '_' . $field[ 0 ], true );
                        $id_and_class = 'id="' . $field[ 0 ] . '" class="' . PREFIX . $field[ 1 ] . '" '; //add specific id and classes for fields
                        if ( $field[ 7 ] == 'main' ) {
                                    // echo the fields
                                    $output .= '<p ';
                                    if ( $field[ 1 ] == 'text' ) {
                                                $output .= 'class="' . PREFIX . $field[ 8 ] . '" >'; // close tag p specifying the class
                                                if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_canvascolor' ) {
                                                            $field_value = RVM_CANVAS_BG_COLOUR;
                                                } //empty($field_value) && $field[0] == 'rvm_mbe_map_canvascolor'
                                                if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bgcolor' ) {
                                                            $field_value = RVM_MAP_BG_COLOUR;
                                                } //empty($field_value) && $field[0] == 'rvm_mbe_map_bgcolor'
                                                if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bg_selected_color' ) {
                                                            $field_value = RVM_MAP_BG_SELECTED_COLOUR;
                                                } //empty($field_value) && $field[0] == 'rvm_mbe_map_bg_selected_color'
                                                if ( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bordercolor' ) {
                                                            $field_value = RVM_MAP_BORDER_COLOUR;
                                                } //empty($field_value) && $field[0] == 'rvm_mbe_map_bordercolor'
                                                $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" ';
                                                if ( !empty( $field[ 4 ] ) ) {
                                                            $output .= ' maxlength="' . $field[ 4 ] . '" ';
                                                } //!empty($field[4])
                                                if ( !empty( $field[ 5 ] ) ) {
                                                            $output .= ' size="' . $field[ 5 ] . '" ';
                                                } //!empty($field[5])
                                                $output .= ' />&nbsp;' . $field[ 3 ];
                                    } // if( $field[ 1 ] == 'text' )
                                    if ( $field[ 1 ] == 'select' ) {
                                                if ( $field[ 0 ] == 'rvm_mbe_select_map' ) {
                                                            $output .= ' >'; // close tag p specifying the class 
                                                            if ( empty( $field_value ) ) { // If is a new map and we have no value create the select                
                                                                        $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                                        $output .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '">';
                                                                        $output .= '<option value="select_country" ' . selected( '', $field_value, false ) . '>' . __( 'Select...', RVM_TEXT_DOMAIN ) . '</option>';
                                                                        $output .= '<optgroup label="' . __( 'Custom Maps', RVM_TEXT_DOMAIN ) . '" >';
                                                                        $output .= '<option value="rvm_custom_map" id="rvm_add_custom_map">' . __( 'Add Custom Map &raquo;', RVM_TEXT_DOMAIN ) . '</option>';
                                                                        
                                                                        foreach ( $array_countries as $country_field ) {
                                                                                    if ( $country_field[ 5 ] === 'custom_maps' ) {
                                                                                                $output .= '<option value="' . $country_field[ 0 ] . '" ' . selected( $country_field[ 0 ], $field_value, false ) . '>' . rvm_retrieve_custom_map_name_without_underscore( $country_field[ 1 ] ) . '</option>';
                                                                                    } //$country_field[5] === 'custom_maps'
                                                                        } //$array_countries as $country_field
                                                                        
                                                                        $output .= '<optgroup label="' . __( 'Default Maps', RVM_TEXT_DOMAIN ) . '" >';

                                                                        foreach ( $array_countries as $country_field ) {
                                                                                    if ( $country_field[ 5 ] === 'default_maps' ) {
                                                                                                $output .= '<option value="' . $country_field[ 0 ] . '" ' . selected( $country_field[ 0 ], $field_value, false ) . '>' . $country_field[ 1 ] . '</option>';
                                                                                    } //$country_field[5] === 'default_maps'
                                                                        } //$array_countries as $country_field

                                                                        $output .= '</optgroup>';
                                                                        $output .= '</select>';
                                                            } //empty($field_value)
                                                            
                                                            else { // else a readonly input field will be created  
                                                                        $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . __( 'Selected Map', RVM_TEXT_DOMAIN ) . '</label>';
                                                                        if ( rvm_is_custom_map( $post->ID ) ) {
                                                                                    //echo 'rvm_is_custom_map<br>';
                                                                                    $rvm_custom_map_name = get_post_meta( $post->ID, '_rvm_mbe_select_map', true );
                                                                                    $output .= '<input ' . $id_and_class . ' type="text" name="' . $field[ 0 ] . '" value="' . esc_attr(  $rvm_custom_map_name  );
                                                                        } //rvm_is_custom_map($post->ID)
                                                                        
                                                                        else {
                                                                                    $output .= '<input ' . $id_and_class . ' type="text" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value );
                                                                        }
                                                                        
                                                                        if ( !empty( $field[ 3 ] ) ) {
                                                                                    $output .= ' maxlength="' . $field[ 3 ] . '" ';
                                                                        } //!empty($field[3])
                                                                        
                                                                        if ( !empty( $field[ 4 ] ) ) {
                                                                                    $output .= ' size="' . $field[ 4 ] . '" ';
                                                                        } //!empty($field[4])
                                                                        $output .= '" readonly="readonly">';
                                                            }
                                                } // if( $field[ 0 ] == 'rvm_mbe_select_map' )
                                                else if ( $field[ 0 ] == 'rvm_mbe_select_target' ) {
                                                            $output .= 'class="' . PREFIX . $field[ 8 ] . '" >'; // close tag p specifying the class 
                                                            $field_value = !empty( $field_value ) ? $field_value : RVM_REGION_LINK_TARGET;
                                                            $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                            $output .= '<select ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">';
                                                            $output .= '<option value="_blank" ' . selected( '_blank', $field_value, false ) . '>_blank</option>';
                                                            $output .= '<option value="_parent" ' . selected( '_parent', $field_value, false ) . '>_parent</option>';
                                                            $output .= '<option value="_self" ' . selected( '_self', $field_value, false ) . '>_self</option>';
                                                            $output .= '<option value="_top" ' . selected( '_top', $field_value, false ) . '>_top</option>';
                                                            $output .= '</select>&nbsp;' . $field[ 3 ];
                                                } //$field[0] == 'rvm_mbe_select_target'
                                    } // $if( $field[ 1 ] == 'select')
                                    if ( $field[ 1 ] == 'hidden' ) {
                                                $output .= ' >'; // close tag p specifying the class 
                                                if ( $field[ 0 ] == 'rvm_mbe_map_mapid' ) {
                                                            if ( empty( $field_value ) ) {
                                                                        $field_value = 'mapid-' . rand();
                                                            } //empty($field_value)
                                                } // check if the map id is already created, if not it create using the random number generator rand() function
                                                if ( $field[ 0 ] == 'rvm_mbe_tab_active' ) {
                                                            if ( ( empty( $field_value ) || ( isset( $rvm_tab_active_default ) && $rvm_tab_active_default == 'rvm_main_settings' ) ) ) {
                                                                        $field_value = RVM_MAP_TAB_ACTIVE;
                                                            } //(empty($field_value) || (isset($rvm_tab_active_default) && $rvm_tab_active_default == 'rvm_main_settings'))
                                                } //$field[0] == 'rvm_mbe_tab_active'
                                                $output .= '<input  ' . $id_and_class . '  type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" >';
                                    } // if( $field[ 1 ] == 'hidden' )
                                    if ( $field[ 1 ] == 'checkbox' ) {
                                                $output .= 'class="' . PREFIX . $field[ 8 ] . '" >'; // close tag p specifying the class
                                                $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '"  value="1" ' . checked( 1, $field_value, false ) . ' />';
                                    } //$field[1] == 'checkbox'
                                    $output .= '</p>';
                        } //if( $field[ 7 ] == 'main' )
                        if ( $field[ 7 ] == 'markers' && !empty( $rvm_selected_map ) ) {
                                    if ( $field[ 1 ] == 'text' ) {
                                                if ( $field[ 0 ] == 'rvm_mbe_map_marker_bg_color' ) {
                                                            if ( empty( $field_value ) ) {
                                                                        $field_value = RVM_MARKER_BG_COLOUR;
                                                            } //empty($field_value)
                                                            $output_markers_bg_colour = '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                            $output_markers_bg_colour .= '<input class="rvm_color_picker" type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" />';
                                                } // $field[ 0 ] == 'rvm_mbe_map_marker_bg_color'
                                                if ( $field[ 0 ] == 'rvm_mbe_map_marker_border_color' ) {
                                                            if ( empty( $field_value ) ) {
                                                                        $field_value = RVM_MARKER_BORDER_COLOUR;
                                                            } //empty($field_value)
                                                            $output_markers_border_colour = '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                            $output_markers_border_colour .= '<input class="rvm_color_picker" type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" />';
                                                } //$field[ 0 ] == 'rvm_mbe_map_marker_border_color'
                                    } //$field[1] == 'text'
                                    if ( $field[ 1 ] == 'select' ) {
                                                if ( $field[ 0 ] == 'rvm_mbe_map_marker_dim_min' ) {
                                                            $output_marker_dim_min = '<p id="rvm_dim_min_value_wrapper"><label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                            $output_marker_dim_min .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">';
                                                            for ( $i = 1; $i < 21; $i++ ) {
                                                                        $field_value = empty( $field_value ) ? RVM_MARKER_DIM_MIN_VALUE : $field_value;
                                                                        $output_marker_dim_min .= '<option ' . selected( $i, $field_value, false ) . ' >' . $i . '</option>';
                                                            } //$i = 1; $i < 21; $i++
                                                            $output_marker_dim_min .= '</select></p>';
                                                } //$field[0] == 'rvm_mbe_map_marker_dim_min'
                                                if ( $field[ 0 ] == 'rvm_mbe_map_marker_dim_max' ) {
                                                            $output_marker_dim_max = '<p id="rvm_dim_max_value_wrapper"><label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>';
                                                            $output_marker_dim_max .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">';
                                                            for ( $i = 1; $i < 21; $i++ ) {
                                                                        $field_value = empty( $field_value ) ? RVM_MARKER_DIM_MAX_VALUE : $field_value;
                                                                        $output_marker_dim_max .= '<option ' . selected( $i, $field_value, false ) . ' >' . $i . '</option>';
                                                            } //$i = 1; $i < 21; $i++
                                                            $output_marker_dim_max .= '</select></p>';
                                                } //$field[0] == 'rvm_mbe_map_marker_dim_max'
                                    } //if( $field[ 1 ] == 'select' )
                        } //if( $field[ 7 ] == 'markers' )
            } //foreach( $array_fields as $field )
            //$output .= '<input type="hidden"  id="rvm_mbe_post_id" value="' .  $post->ID. '" />' ;
            
           
             /**************** Custom Maps input field *****************/
             
            $output .= '<div id="rvm_mbe_custom_map_wrapper"></div>';
            //$output .= '<input type="button" id="unzip_button" class="button-primary" value="Unzip"/>';
            $output .= '<div id="rvm_custom_map_unzip_progress"></div>'; 
            
            //Check if we are in an existing map and id if is a custom map
            if( !empty( $rvm_selected_map ) && rvm_is_custom_map( $post->ID ) ) {                
                        //Get custom maps if exist on DB
                        $rvm_custom_maps_options = rvm_retrieve_custom_maps_options();
            
                        //Here $key is the javascript name and $value the path to javascript itself
                        if ( !empty( $rvm_custom_maps_options ) ) {
                                     // get last value entered temporally
                                    $rvm_custom_maps_options = array_reverse ( $rvm_custom_maps_options );
                                    foreach ( $rvm_custom_maps_options as $key => $value ) {
                                                if( $rvm_selected_map == $key ) {
                                                            $rvm_retrieve_custom_map_dir_and_url_path = rvm_retrieve_custom_map_dir_and_url_path( $value );
                                                            // Check if custom map is still in original upload subdir: if not do not show it in drop down
                                                            $rvm_is_map_in_download_dir_yet = rvm_is_map_in_download_dir_yet( $rvm_retrieve_custom_map_dir_and_url_path[ 0 ] , $key ) ;
                                                            
                                                            // If map not in original subdir we do not show the preview button evoiding issues
                                                            if ( $rvm_is_map_in_download_dir_yet ) {
                                                                        $output .= '<input type="button" id="preview_button" class="button-primary  ' . PREFIX . 'hidden_when_custom_map"  value=" ' . __( 'Map Colours Preview', RVM_TEXT_DOMAIN ) . '" />';
                                                                        $output .= '<input type="button" id="close_preview_button" class="button-primary" style="display: none;" value=" ' . __( 'Close Map Preview', RVM_TEXT_DOMAIN ) . '" />';
                                                            }// if ( $rvm_is_map_in_download_dir_yet )
                                                    
                                                    
                                                }// if( $rvm_selected_map == $key )
                                                
                                    }// foreach ( $rvm_custom_maps_options as $key => $value )
                            
                        }//if ( !empty( $rvm_custom_maps_options ) )

            }// if( !empty( $rvm_selected_map ) && rvm_is_custom_map( $post->ID ) )

            else {
                        $output .= '<input type="button" id="preview_button" class="button-primary  ' . PREFIX . 'hidden_when_custom_map"  value=" ' . __( 'Map Colours Preview', RVM_TEXT_DOMAIN ) . '" />';
                        $output .= '<input type="button" id="close_preview_button" class="button-primary" style="display: none;" value=" ' . __( 'Close Map Preview', RVM_TEXT_DOMAIN ) . '" />';
            }

            $output .= '<div class="rvm_clear_both"></div>';
            $output .= '<div id="rvm_map_preview"></div>'; //new regions fields will be loaded here via ajax
            $output .= '</div>'; // close id="rvm_main_settings" ;
            
            /**************** End: Main settings *****************/
            
            
            //create nonce for ajax call    
            $output .= '<span id="' . PREFIX . 'ajax_nonce" class="hidden" style="visibility: hidden;">' . wp_create_nonce( 'rvm_ajax_nonce' ) . '</span>';
            
            if ( !empty( $rvm_selected_map ) ) { //display regions/countries and markers only if a map is selected
            
            
                        /**************** Start: Regions *****************/
                        
                        @include_once RVM_INC_PLUGIN_DIR . '/rvm_regions.php';
                        
                        /**************** End: Regions *****************/
                        
                        
                        /**************** Start: Markers *****************/
                        
                        @include_once RVM_INC_PLUGIN_DIR . '/rvm_markers.php';
                        
                        /**************** End: Markers *****************/
                        
                        
                        $output .= '<div id="rvm_shortcode" class="updated"><p>' . __( 'Use following shortcode to display this map whenever you like ( only once per post/sidebar per page ):', RVM_TEXT_DOMAIN ) . ' <strong>[rvm_map mapid="' . $post->ID . '"]</strong> .</p></div>';
                        $output .= '<div id="rvm_donation" class="updated"><p>' . __( 'Do you like <strong>RVM</strong> ? Please consider making a donation now', RVM_TEXT_DOMAIN ) . '<a class="rvm_donate_link" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40responsivemapsplugin%2ecom&lc=IT&item_name=responsive%20Vector%20Maps%20Plugin&item_number=rvm%2dplugin%2dwordpress%2dadmin&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">
        <img style="vertical-align:middle;margin-left:5px;" src="' . RVM_IMG_PLUGIN_DIR . '/donate_button.png" /></a></p></div>';
            } //if( !empty( $rvm_selected_map ) )
            
            
            /**************** Start: Download Custom Maps Link *****************/
            
            @include RVM_INC_PLUGIN_DIR . '/rvm_download_custom_maps.php';
            
            /**************** End: Download Custom Maps Link  *****************/
            
            
            echo $output; // echo the fields  
} // function rvm_mb_function( $post )

// Save data into DB
add_action( 'save_post', 'rvm_mb_save_meta' );
function rvm_mb_save_meta( $post_id )
{
            $array_fields = rvm_fields_array();
            if ( ( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country' ) || ( isset( $_POST[ 'rvm_custom_map_filename' ] ) && !empty( $_POST[ 'rvm_custom_map_filename' ] ) ) ) {
                        foreach ( $array_fields as $field ) {
                                    if ( isset( $_POST[ $field[ 0 ] ] ) ) {
                                                if ( $field[ 0 ] == 'rvm_mbe_zoom' || $field[ 0 ] == 'rvm_mbe_map_delete_padding' ) {
                                                            $_POST[ $field[ 0 ] ] = 1;
                                                } //$field[0] == 'rvm_mbe_zoom'
                                                // If we have  custom post type sent assign this value to rvm_mbe_select_map
                                                if ( isset( $_POST[ 'rvm_custom_map_filename' ] ) && $field[ 0 ] == 'rvm_mbe_select_map' ) {
                                                            //Get just the map name without the extension
                                                            $_POST[ $field[ 0 ] ] = rvm_retrieve_custom_map_raw_name( $_POST[ 'rvm_custom_map_filename' ] );
                                                } //isset($_POST['rvm_custom_map_filename']) && $field[0] == 'rvm_mbe_select_map'
                                                //check if minimum and maximum values exists and if  minimum is not bigger then the maximum value
                                                if ( isset( $_POST[ 'rvm_mbe_map_marker_dim_min' ] ) && isset( $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) && ( $_POST[ 'rvm_mbe_map_marker_dim_min' ] > $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) ) {
                                                            $_POST[ 'rvm_mbe_map_marker_dim_min' ] = RVM_MARKER_DIM_MIN_VALUE;
                                                            $_POST[ 'rvm_mbe_map_marker_dim_max' ] = RVM_MARKER_DIM_MAX_VALUE;
                                                } //f( isset( $_POST[ 'rvm_mbe_map_marker_dim_min' ] ) && isset( $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) && ( $_POST[ 'rvm_mbe_map_marker_dim_min' ] > $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) )
                                                update_post_meta( $post_id, '_' . $field[ 0 ], strip_tags( $_POST[ $field[ 0 ] ] ) );
                                    } // if( isset( $_POST[ $field[ 0 ] ] )
                                    else if ( $field[ 0 ] == 'rvm_mbe_zoom' || $field[ 0 ] == 'rvm_mbe_map_delete_padding' ) { // if zoom or delete padding checkbox not isset means is unchecked
                                                update_post_meta( $post_id, '_' . $field[ 0 ], 0 );
                                    } //$field[0] == 'rvm_mbe_zoom'
                        } //foreach( $array_fields as $field )                     
          

                      /****************  Start: Save region fields to DB *****************/

                        $array_regions = rvm_include_custom_map_settings( $post_id ,  $_POST[ 'rvm_mbe_select_map' ] );   
                        
                        foreach ( $array_regions as $field ) {
                                    if ( isset( $_POST[ $field[ 1 ] ] ) ) {
                                                $rvm_region_array = $_POST[ $field[ 1 ] ];
                                                $rvm_regions_data = wp_slash( serialize( $rvm_region_array ) ); //escape quote with slash
                                                update_post_meta( $post_id, '_' . $field[ 1 ], $rvm_regions_data );
                                    } //if( isset( $_POST[ $field[ 1 ] ] ) )
                        } //foreach( $array_fields as $field ) 
                        
                        /****************  End: Save region fields to DB *****************/
                        
                        
                        /****************  Start marker fields save to DB *****************/
                        
                        if ( isset( $_POST[ 'rvm_marker_name' ] ) ) {
                                    if ( !empty( $_POST[ 'rvm_marker_name' ] ) ) {
                                                $rvm_marker_name_serialize = wp_slash( serialize( $_POST[ 'rvm_marker_name' ] ) );
                                                update_post_meta( $post_id, '_rvm_marker_name', $rvm_marker_name_serialize );
                                    } //!empty($_POST['rvm_marker_name'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_name', '' );
                                    }
                                    if ( !empty( $_POST[ 'rvm_marker_lat' ] ) ) {
                                                $rvm_marker_lat_array     = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_lat' ] ); //check if is valid entry          
                                                $rvm_marker_lat_serialize = serialize( $rvm_marker_lat_array );
                                                $rvm_marker_lat_serialize = str_replace( ',', '.', $rvm_marker_lat_serialize ); // substitute all commas with dots
                                                update_post_meta( $post_id, '_rvm_marker_lat', $rvm_marker_lat_serialize );
                                    } //!empty($_POST['rvm_marker_lat'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_lat', '' );
                                    }
                                    if ( !empty( $_POST[ 'rvm_marker_long' ] ) ) {
                                                $rvm_marker_long_array     = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_long' ] ); //check if is valid entry                
                                                $rvm_marker_long_serialize = serialize( $rvm_marker_long_array );
                                                $rvm_marker_long_serialize = str_replace( ',', '.', $rvm_marker_long_serialize );
                                                update_post_meta( $post_id, '_rvm_marker_long', $rvm_marker_long_serialize );
                                    } //!empty($_POST['rvm_marker_long'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_long', '' );
                                    }
                                    if ( !empty( $_POST[ 'rvm_marker_link' ] ) ) {
                                                $rvm_marker_link_serialize = serialize( $_POST[ 'rvm_marker_link' ] );
                                                update_post_meta( $post_id, '_rvm_marker_link', $rvm_marker_link_serialize );
                                    } //!empty($_POST['rvm_marker_link'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_link', '' );
                                    }
                                    if ( !empty( $_POST[ 'rvm_marker_dim' ] ) ) {
                                                $rvm_marker_dim_array     = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_dim' ] ); //check if is valid entry                
                                                $rvm_marker_dim_serialize = serialize( $rvm_marker_dim_array );
                                                $rvm_marker_dim_serialize = str_replace( ',', '.', $rvm_marker_dim_serialize );
                                                update_post_meta( $post_id, '_rvm_marker_dim', $rvm_marker_dim_serialize );
                                    } //!empty($_POST['rvm_marker_dim'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_dim', '' );
                                    }
                                    if ( !empty( $_POST[ 'rvm_marker_popup' ] ) ) {
                                                $rvm_marker_label_array     = $_POST[ 'rvm_marker_popup' ];
                                                $rvm_marker_popup_serialize = wp_slash( serialize( $rvm_marker_label_array ) ); //escape quote with slash
                                                update_post_meta( $post_id, '_rvm_marker_popup', $rvm_marker_popup_serialize ); // enable closing tags function and change tags into html entities
                                    } //!empty($_POST['rvm_marker_popup'])
                                    else {
                                                update_post_meta( $post_id, '_rvm_marker_popup', '' );
                                    }
                        } //if( isset( $_POST[ 'rvm_marker_name' ] ) )
                        else { // if nothing is sent reset all data 
                                    delete_post_meta( $post_id, '_rvm_marker_name' );
                                    delete_post_meta( $post_id, '_rvm_marker_lat' );
                                    delete_post_meta( $post_id, '_rvm_marker_long' );
                                    delete_post_meta( $post_id, '_rvm_marker_link' );
                                    delete_post_meta( $post_id, '_rvm_marker_dim' );
                                    delete_post_meta( $post_id, '_rvm_marker_popup' );
                        }
                        
                        /****************  End: Save marker fields to DB *****************/
                        
                        
            } //if( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country'  )
} // function rvm_mb_save_meta( $post_id )


/****************  Start: Ajax calls i.e. preview *****************/

@include_once RVM_INC_PLUGIN_DIR . '/rvm_ajax_call.php';

/****************  End: Ajax calls i.e. preview  *****************/


// Adding custom columns to display maps list
//this works before 3.1
add_filter( 'manage_edit-rvm_columns', 'add_new_rvm_columns' );
function add_new_rvm_columns( $columns )
{
            $new_columns[ 'cb' ]  = '<input type="checkbox" />';
            $new_columns[ 'title' ] = __( 'Map name', RVM_TEXT_DOMAIN );
            $new_columns[ 'shortcode' ] = __( 'Shortcode', RVM_TEXT_DOMAIN );
            $new_columns[ 'date' ] = __( 'Date', RVM_TEXT_DOMAIN );
            return $new_columns;
}

//Populate shortcodes column
add_action( 'manage_rvm_posts_custom_column', 'rvm_custom_columns', 10, 2 );
function rvm_custom_columns( $column, $post_id )
{
            switch ( $column ) {
            case 'shortcode':
                        echo '[rvm_map mapid="' . $post_id . '"]';
                        break;
            } //$column
}


 /****************  Start: Global Settings ( Options page ) *****************/
@include_once RVM_INC_PLUGIN_DIR . '/rvm_global_settings.php';

?>