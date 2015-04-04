<?php 
/**
 * CORE SCRIPT
 * ----------------------------------------------------------------------------
 */


// Fields input arrays 
function rvm_fields_array() {
    
    $fields = array() ;
    // 'field name', 'input type',  'field label', 'field bonus expl.', 'input maxlenght', 'input size', 'required', 'which section belongs to?'
    $fields[ 'rvm_mbe_select_map' ] = array( 'rvm_mbe_select_map', 'select', __( 'Select Map' , RVM_TEXT_DOMAIN ) , '', '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_zoom' ] = array( 'rvm_mbe_zoom', 'checkbox', __( 'Map zoom buttons' , RVM_TEXT_DOMAIN ) , '', '', '', 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_mapid' ] = array( 'rvm_mbe_map_mapid', 'hidden', '' , '', '', '', 1, 'main' ) ; // this is for map id container - will be used by jvectormap to address div map container
    $fields[ 'rvm_mbe_width' ] = array( 'rvm_mbe_width', 'text', __( 'Map width' , RVM_TEXT_DOMAIN ) ,  __( '( You can use em, %, px etc.. Leave it blank if you want a responsive map )' , RVM_TEXT_DOMAIN ), '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_canvascolor' ] = array( 'rvm_mbe_map_canvascolor', 'text', __( 'Canvas Background Color', RVM_TEXT_DOMAIN ) , '', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_bgcolor' ] = array( 'rvm_mbe_map_bgcolor', 'text', __( 'Map Color', RVM_TEXT_DOMAIN ) , '', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_bg_selected_color' ] = array( 'rvm_mbe_map_bg_selected_color', 'text', __( 'Selected Region Color', RVM_TEXT_DOMAIN ) , '', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_map_bordercolor' ] = array( 'rvm_mbe_map_bordercolor', 'text', __( 'Map Border Color', RVM_TEXT_DOMAIN ) , '', 7, 7, 1, 'main' ) ;
    $fields[ 'rvm_mbe_select_target' ] = array( 'rvm_mbe_select_target', 'select', __( 'Links target' , RVM_TEXT_DOMAIN ) , __( '( Ex. "_blank" will open all the links in a new window )' , RVM_TEXT_DOMAIN ), '', 10, 1, 'main' ) ;
    $fields[ 'rvm_mbe_tab_active' ] = array( 'rvm_mbe_tab_active', 'hidden', '' , '', '', '', '', 'main' ) ;
    
    // Markers fields
    $fields[ 'rvm_mbe_map_marker_bg_color' ] = array( 'rvm_mbe_map_marker_bg_color', 'text', __( 'Markers Background Color', RVM_TEXT_DOMAIN ) , __( 'Not visible in map preview', RVM_TEXT_DOMAIN ), 7, 7, 1, 'markers' ) ;
    $fields[ 'rvm_mbe_map_marker_border_color' ] = array( 'rvm_mbe_map_marker_border_color', 'text', __( 'Markers Border Color', RVM_TEXT_DOMAIN ) , __( 'Not visible in map preview', RVM_TEXT_DOMAIN ), 7, 7, 1, 'markers' ) ;
    $fields[ 'rvm_mbe_map_marker_dim_min' ] = array( 'rvm_mbe_map_marker_dim_min', 'select', __( 'Minimum value' , RVM_TEXT_DOMAIN ) , '', '', '', 1, 'markers' ) ;
    $fields[ 'rvm_mbe_map_marker_dim_max' ] = array( 'rvm_mbe_map_marker_dim_max', 'select', __( 'Maximum value' , RVM_TEXT_DOMAIN ) , '', '', '', 1, 'markers' ) ;        
    
    return $fields;
    
}

// Country arrays for select
function rvm_countries_array() {
    
    $countries = array() ;
    // 'country name', 'select value', 'javascript wp filename for enqueuing', 'javascript filename', 'aspect ratio --> width/height'
    
    /*countries*/
    $countries[ 'Italy' ] =  array( 'italy', __( 'Italy' , RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-it_merc_js', 'it_merc_en', 0.7687125 ) ;
    $countries[ 'Belgium' ] = array( 'belgium', __( 'Belgium', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-be_merc_js' , 'be_merc_en', 1.2244422 ) ; 
    $countries[ 'France' ] = array( 'france', __( 'France', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-fr_merc_js' , 'fr_merc_en', 0.8057915 ) ;
    $countries[ 'Germany' ] = array( 'germany', __( 'Germany', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-de_merc_js' , 'de_merc_en', 0.7353884 ) ;
    $countries[ 'Israel' ] = array( 'israel', __( 'Israel', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-il_mill_js' , 'il_mill_en', 0.3789164 ) ;
    $countries[ 'Netherlands' ] = array( 'netherlands', __( 'Netherlands', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-nl_merc_js' , 'nl_merc_en', 0.8399607 ) ;
    $countries[ 'Norway' ] = array( 'norway', __( 'Norway', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-no_merc_js' , 'no_merc_en', 0.7592786 ) ;
    $countries[ 'Poland' ] = array( 'poland', __( 'Poland', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-pl_merc_js' , 'pl_merc_en', 1.0555115 ) ; 
    $countries[ 'Portugal' ] = array( 'portugal', __( 'Portugal', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-pt_merc_js' , 'pt_merc_en', 0.6724137 ) ;
    $countries[ 'Spain' ] = array( 'spain', __( 'Spain', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-es_merc_js' , 'es_merc_en', 1.3405912 ) ;
    $countries[ 'Sweden' ] = array( 'sweden', __( 'Sweden', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-se_merc_js' , 'se_merc_en', 0.4359546) ;
    $countries[ 'Switzerland' ] = array( 'switzerland', __( 'Switzerland', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-ch_merc_js' , 'ch_merc_en', 1.614945 ) ;
    $countries[ 'United-Kingdom' ] = array( 'unitedkingdom', __( 'United Kingdom', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-uk_merc_js' , 'uk_merc_en', 0.5354944 ) ;
    
    /*world*/
    $countries[ 'Europe' ] = array( 'europe', __( 'Europe', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-europe_merc_js' , 'europe_merc_en', 0.8991364 ) ;       
    $countries[ 'Usa' ] = array( 'usa', __( 'Usa', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-us_merc_js' , 'us_merc_en', 1.3110130 ) ;
    $countries[ 'World' ] = array( 'world', __( 'World', RVM_TEXT_DOMAIN ), 'rvm_jquery-jvectormap-world_merc_js' , 'world_merc_en', 1.5435268 ) ;
        
    return $countries;
    
}

add_action( 'init', 'rvm_post_type' );
function rvm_post_type() {
        
    // set dashicons class for RVM post icon
    $menu_icon = 'dashicons-location-alt' ;
    
    // fallback for menu icon in case wp vesrsion previous then 3.8 ( dashicons era )
    if( version_compare( RVM_WP_VERSION , '3.8', '<' ) ) {
        
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
    if( empty ( $old_version ) || version_compare( RVM_VERSION, $old_version, '>' ) ) {
       
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

// manage markers arrays from db
function markers( $postid, $method, $array_type ) {
    
    if( $method == 'retrieve' ) {// get markers
    
        $marker_array = array() ;
        
        $marker_array_serialized[ 'rvm_marker_name' ] = get_post_meta( $postid, '_rvm_marker_name', true );
        $marker_array_serialized[ 'rvm_marker_lat' ] = get_post_meta( $postid, '_rvm_marker_lat', true );  
        $marker_array_serialized[ 'rvm_marker_long' ] = get_post_meta( $postid, '_rvm_marker_long', true );
        $marker_array_serialized[ 'rvm_marker_link' ] = get_post_meta( $postid, '_rvm_marker_link', true );
        $marker_array_serialized[ 'rvm_marker_dim' ] = get_post_meta( $postid, '_rvm_marker_dim', true );
        $marker_array_serialized[ 'rvm_marker_popup' ] = get_post_meta( $postid, '_rvm_marker_popup', true );
    
        $marker_array_unserialized[ 'rvm_marker_name_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_name' ] ) ;
        $marker_array_unserialized[ 'rvm_marker_lat_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_lat' ] ) ;
        $marker_array_unserialized[ 'rvm_marker_long_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_long' ] ) ;       
        $marker_array_unserialized[ 'rvm_marker_link_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_link' ] ) ;
        $marker_array_unserialized[ 'rvm_marker_dim_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_dim' ] ) ;
        $marker_array_unserialized[ 'rvm_marker_popup_array' ] = unserialize( $marker_array_serialized[ 'rvm_marker_popup' ] ) ;
            

        if( $array_type == 'serialized' ) {
            
            return $marker_array_serialized ;
            
        }
        
        else {
            
            return $marker_array_unserialized;
             
        }
             
   }
   
}

//manage region/countries link and background from db
function regionsparams( $postid, $region ) {
    
    $field_value = get_post_meta( $postid, '_' . $region, true ) ;// get regions link ver < 2.0 for retrocompatibility    
    $regionsparams_array = array();
    
    if( empty( $field_value ) ) {
            
        $regionsparams_array[ 'field_region_link' ] = '' ;
        $regionsparams_array[ 'field_region_bg' ] = '' ;
        $regionsparams_array[ 'field_region_popup' ] = '' ;
     
    }
    
    else {
    
        if( is_array( unserialize( $field_value ) ) ) {         
            
            $field_value = unserialize( $field_value )  ;
            $regionsparams_array[ 'field_region_link' ] = $field_value[ 0 ] ;
            $regionsparams_array[ 'field_region_bg' ] = $field_value[ 1 ] ;
            /* from now on isset is mandatory for any added values */           
            if( isset( $field_value[ 2 ] ) ) { $regionsparams_array[ 'field_region_popup' ] = $field_value[ 2 ] ; } //legacy with old versions
            
        }
        
        else {
            
            if( $field_value = 'http://N;' ) { $field_value = '' ; }// erase old wrong links
            
            $regionsparams_array[ 'field_region_link' ] = $field_value ;// legacy with previous version
            
        }
    
    }
    
    return $regionsparams_array ;
    
}

function rvm_mb_function( $post ) {
    
    $output = '' ; //initialize output
         
    $rvm_selected_map = get_post_meta( $post->ID, '_rvm_mbe_select_map', true ) ;
    $array_countries = rvm_countries_array() ;
    $array_fields = rvm_fields_array() ;
    $rvm_tab_active = get_post_meta( $post->ID, '_rvm_mbe_tab_active', true ) ;    
    $screen = get_current_screen() ;
       
    if ( $screen->action == 'add' || empty( $rvm_tab_active ) ) {//if new post or editing an existing one without any value in DB for active tab
        
        $rvm_tab_active_default = 'rvm_main_settings' ;
        
    }    
    
    /*$output = '$screen->id : ' . $screen->id .'<br>' ;
    $output .= '$screen->action : ' . $screen->action .'<br>' ;
    $output .= '$screen->base : ' . $screen->base .'<br>' ;*/
    
    if( isset( $rvm_tab_active_default ) || ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_main_settings' ) ) {
        
        $rvm_tab_class_main_settings = 'rvm_active' ;
        
    }  else { $rvm_tab_class_main_settings = '' ; }
    
    $output .= '<div id="rvm_tabs"><ul><li id="rvm_main_settings_tab" class="rvm_tabs ' . $rvm_tab_class_main_settings . '" rel="rvm_main_settings"><a href="#">Main settings</a></li>' ;
    
    if( !empty( $rvm_selected_map ) ) {
        
        if(  !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_regions_countries' ) ) {
        
            $rvm_tab_class_region_countries = 'rvm_active' ;
        
        }  else { $rvm_tab_class_region_countries = '' ; }
               
        if( !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_markers' ) ) {
        
            $rvm_tab_class_markers = 'rvm_active' ;
        
        }  else { $rvm_tab_class_markers = '' ; }
        
              
        $output .= '<li id="rvm_regions_countries_tab" class="rvm_tabs ' . $rvm_tab_class_region_countries . '" rel="rvm_regions_countries"><a href="#">Regions/Countries</a></li>' ;
        $output .= '<li id="rvm_markers_tab" class="rvm_tabs  ' . $rvm_tab_class_markers . '" rel="rvm_markers"><a href="#">Markers</a></li>' ;
        
    } //if( !empty( $rvm_selected_map ) )
    
    $output .= '</ul></div>' ;

    /**************** Start: Main settings *****************/

    $rvm_div_class = isset( $rvm_tab_active_default ) || ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_main_settings' )  ?  ' class="rvm_active hidden" >' : ' class="hidden" >' ;
    $output .= '<div id="rvm_main_settings"' .  $rvm_div_class ;
    
    foreach( $array_fields as $field ) {
        
        $field_value = get_post_meta( $post->ID, '_' . $field[ 0 ], true );
        
        $id_and_class = 'id="' . $field[ 0 ] . '" class="' . PREFIX  . $field[ 1 ] . '" ' ; //add specific id and classes for fields
        
        if( $field[ 7 ] == 'main' ) {
        
            // echo the fields

            
            //$output .= '<p>' ;       
            
            if( $field[ 1 ] == 'text' ) {
                
                if( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_canvascolor' ) { $field_value = RVM_CANVAS_BG_COLOUR ; }
                if( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bgcolor' ) { $field_value = RVM_MAP_BG_COLOUR ; }
                if( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bg_selected_color' ) { $field_value = RVM_MAP_BG_SELECTED_COLOUR ; }
                if( empty( $field_value ) && $field[ 0 ] == 'rvm_mbe_map_bordercolor' ) { $field_value = RVM_MAP_BORDER_COLOUR ; }
                
                $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;           
                $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" ' ;            
                if( !empty( $field[ 4 ] ) ) { $output .= ' maxlength="'. $field[ 4 ]. '" '; }
                if( !empty( $field[ 5 ] ) ) { $output .= ' size="' . $field[ 5 ] . '" '; }
                $output .= ' />&nbsp;' . $field[ 3 ];  
    

            } // if( $field[ 1 ] == 'text' )
    
            if( $field[ 1 ] == 'select') {
                
                if( $field[ 0 ] == 'rvm_mbe_select_map' ) {           
           
                    if( empty( $field_value ) ) { // If is a new map and we have no value create the select                
                        
                        $output .= '<label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                        $output .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;                    
                        $output .= '<option value="select_country" ' . selected( '', $field_value, false ) . '>' . __( 'Select...' , RVM_TEXT_DOMAIN ) .'</option>' ;
                        foreach( $array_countries as $country_field ) {
                            
                            $output .= '<option value="' . $country_field[ 0 ] . '" ' . selected( $country_field[ 0 ] , $field_value, false ) . '>' . $country_field[ 1 ] . '</option>' ;
                            
                        }
                        
                        $output .= '</select>' ;  
                        
                    } else { // else a readonly input field will be created               
                        
                        $output .= '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . __( 'Selected Map' , RVM_TEXT_DOMAIN ) . '</label>' ;
                        $output .= '<input ' . $id_and_class . ' type="text" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) ;            
                        if( !empty( $field[ 3 ] ) ) { $output .= ' maxlength="'. $field[ 3 ]. '" '; }
                        if( !empty( $field[ 4 ] ) ) { $output .= ' size="' . $field[ 4 ] . '" '; }
                        $output .= '" readonly="readonly">' ;                   
                        
                    }          
                
                }  // if( $field[ 0 ] == 'rvm_mbe_select_map' )
                
                  
                else if( $field[ 0 ] == 'rvm_mbe_select_target' ) {
                    
                    $field_value = !empty( $field_value ) ? $field_value : RVM_REGION_LINK_TARGET ;               
                    
                    $output .= '<label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                    $output .= '<select ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;
                    $output .= '<option value="_blank" ' . selected( '_blank' , $field_value, false ) . '>_blank</option>' ;
                    $output .= '<option value="_parent" ' . selected( '_parent' , $field_value, false ) . '>_parent</option>' ;
                    $output .= '<option value="_self" ' . selected( '_self' , $field_value, false ) . '>_self</option>' ;
                    $output .= '<option value="_top" ' . selected( '_top' , $field_value, false ) . '>_top</option>' ;
                    $output .= '</select>&nbsp;' . $field[ 3 ] ;
                    
                }
            
            } // $if( $field[ 1 ] == 'select')
            
            
            if( $field[ 1 ] == 'hidden' ) {
                
                    if( $field[ 0 ] == 'rvm_mbe_map_mapid' )  {
                        
                         if( empty( $field_value ) ) { $field_value = 'mapid-' . rand() ; }
                         
                    } // check if the map id is already created, if not it create using the random number generator rand() function
                    
                    if( $field[ 0 ] == 'rvm_mbe_tab_active' ) {
                        
                        if( ( empty( $field_value ) || ( isset( $rvm_tab_active_default ) && $rvm_tab_active_default == 'rvm_main_settings' ) ) ) {
                            
                             $field_value = RVM_MAP_TAB_ACTIVE ;
                              
                        }
                    }
                        
                    $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" >' ;               
             

            }// if( $field[ 1 ] == 'hidden' )
    
            if( $field[ 1 ] == 'checkbox' ) {
                $output .= '<label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                $output .= '<input ' . $id_and_class . ' type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '"  value="1" ' . checked( 1, $field_value, false ) . ' />'; 
                
            }
    
            $output .= '</p>' ;
        
        } //if( $field[ 7 ] == 'main' )
        
        if( $field[ 7 ] == 'markers' && !empty( $rvm_selected_map ) ) {            
            
            if( $field[ 1 ] == 'text' ) {
                
                if( $field[ 0 ] == 'rvm_mbe_map_marker_bg_color' ) { 
                                               
                    if( empty( $field_value ) ) { $field_value = RVM_MARKER_BG_COLOUR ; }
                    $output_markers_bg_colour = '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;           
                    $output_markers_bg_colour .= '<input class="rvm_color_picker" type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" />' ; 
                
                }// $field[ 0 ] == 'rvm_mbe_map_marker_bg_color'
                
                if( $field[ 0 ] == 'rvm_mbe_map_marker_border_color' ) {
                    
                    if( empty( $field_value ) ) { $field_value = RVM_MARKER_BORDER_COLOUR ; }
                    $output_markers_border_colour = '<label for="' . $field[ 0 ] . '" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;           
                    $output_markers_border_colour .= '<input class="rvm_color_picker" type="' . $field[ 1 ] . '" name="' . $field[ 0 ] . '" value="' . esc_attr( $field_value ) . '" />' ; 
                    
                }//$field[ 0 ] == 'rvm_mbe_map_marker_border_color'

            }
    
            if( $field[ 1 ] == 'select' ) {
            
                if( $field[ 0 ] == 'rvm_mbe_map_marker_dim_min' ) {
                        
                    $output_marker_dim_min = '<p id="rvm_dim_min_value_wrapper"><label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                    $output_marker_dim_min .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;
                                    
                    for ( $i=1; $i< 21; $i++ ) {                        
                    
                        $field_value = empty( $field_value ) ? RVM_MARKER_DIM_MIN_VALUE : $field_value  ;
                        $output_marker_dim_min .= '<option ' . selected( $i, $field_value, false ) . ' >' . $i . '</option>' ;
                        
                    }
                        
                    $output_marker_dim_min .= '</select></p>' ;
                        
                }
        
                if( $field[ 0 ] == 'rvm_mbe_map_marker_dim_max' ) {
                        
                    $output_marker_dim_max = '<p id="rvm_dim_max_value_wrapper"><label for="' . $field[ 0 ] .'" ' . RVM_LABEL_CLASS . '>' . $field[ 2 ] . '</label>' ;
                    $output_marker_dim_max .= '<select  ' . $id_and_class . ' name="' . $field[ 0 ] . '" id="' . $field[ 0 ] . '">' ;
                    
                    for ( $i=1; $i< 21; $i++ ) {
                            
                        $field_value = empty( $field_value ) ? RVM_MARKER_DIM_MAX_VALUE : $field_value ;
                        $output_marker_dim_max .= '<option ' . selected( $i, $field_value, false ) .  ' >' . $i . '</option>' ;
                    }
                        
                    $output_marker_dim_max .= '</select></p>' ;
                        
                }

            
            } //if( $field[ 1 ] == 'select' )
            
                  
        } //if( $field[ 7 ] == 'markers' )
        
        
    } //foreach( $array_fields as $field )
    
    $output .= '<input type="button" id="preview_button" class="button-primary" value=" ' . __( 'Map Colours Preview' , RVM_TEXT_DOMAIN ) . '" />' ;
    $output .= '<input type="button" id="close_preview_button" class="button-primary" style="display: none;" value=" ' . __( 'Close Map Preview' , RVM_TEXT_DOMAIN ) . '" />' ;
    $output .= '<div class="rvm_clear_both"></div>' ;
    $output .= '<div id="rvm_map_preview"></div>' ; //new regions fields will be loaded here via ajax
    
    
    $output .= '</div>' ;// close id="rvm_main_settings" ;
    
    /**************** End: Main settings *****************/
    
    
    //create nonce for ajax call    
    $output .= '<span id="' . PREFIX . 'ajax_nonce" class="hidden" style="visibility: hidden;">' . wp_create_nonce( 'rvm_ajax_nonce' ) . '</span>' ;
    
    if( !empty( $rvm_selected_map ) ) { //display regions/countries and markers only if a map is selected
    
    
        /**************** Start: Regions *****************/
        
        @include_once RVM_INC_PLUGIN_DIR . '/rvm_regions.php';
        
        /**************** End: Regions *****************/ 
      
    
        /**************** Start: Markers *****************/    
        
        @include_once RVM_INC_PLUGIN_DIR . '/rvm_markers.php';

        /**************** End: Markers *****************/
        
        
        $output .= '<div id="rvm_shortcode" class="updated"><p>' . __( 'Use following shortcode to display this map whenever you like ( only once per post/sidebar per page ):' , RVM_TEXT_DOMAIN ) . ' <strong>[rvm_map mapid="' . $post->ID .'"]</strong> .</p></div>'  ;
        $output .= '<div id="rvm_donation" class="updated"><p>' . __( 'Do you like <strong>RVM</strong> ? Please consider making a donation now' , RVM_TEXT_DOMAIN )   . '<a class="rvm_donate_link" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40responsivemapsplugin%2ecom&lc=IT&item_name=responsive%20Vector%20Maps%20Plugin&item_number=rvm%2dplugin%2dwordpress%2dadmin&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">
        <img style="vertical-align:middle;margin-left:5px;" src="' . RVM_IMG_PLUGIN_DIR . '/donate_button.png" /></a></p></div>' ;
        
            
    } //if( !empty( $rvm_selected_map ) )   

    
    
    /**************** Start: Donation *****************/
    
    @include RVM_INC_PLUGIN_DIR . '/rvm_donation.php';
    
    /**************** End: Donation *****************/
    
    
    echo $output ;// echo the fields  
    

}// function rvm_mb_function( $post )

// Save data into DB
add_action( 'save_post' , 'rvm_mb_save_meta' );
function rvm_mb_save_meta( $post_id ) {
    
    $array_fields = rvm_fields_array() ;
    
    if( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country'  ) {
        
        foreach( $array_fields as $field ) {
                    
            if( isset( $_POST[ $field[ 0 ] ] ) ) { 
                
                if( $field[ 0 ] == 'rvm_mbe_zoom' ) {
                    
                    $_POST[ $field[ 0 ] ] = 1 ;
                    
                }

                //check if minimum and maximum values exists and if  minimum is not bigger then the maximum value
                if( isset( $_POST[ 'rvm_mbe_map_marker_dim_min' ] ) && isset( $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) && ( $_POST[ 'rvm_mbe_map_marker_dim_min' ] > $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) ) {
                        
                        $_POST[ 'rvm_mbe_map_marker_dim_min' ] = RVM_MARKER_DIM_MIN_VALUE ;
                        $_POST[ 'rvm_mbe_map_marker_dim_max' ] = RVM_MARKER_DIM_MAX_VALUE ;
                    
                } //f( isset( $_POST[ 'rvm_mbe_map_marker_dim_min' ] ) && isset( $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) && ( $_POST[ 'rvm_mbe_map_marker_dim_min' ] > $_POST[ 'rvm_mbe_map_marker_dim_max' ] ) )
                
                                    
                update_post_meta( $post_id, '_' . $field[ 0 ] , strip_tags( $_POST[ $field[ 0 ] ] ) ) ; 
                                
            } // if( isset( $_POST[ $field[ 0 ] ] )
            
            else if( $field[ 0 ] == 'rvm_mbe_zoom' ) {// if zoom checkbox not isset means is unchecked
                        
                update_post_meta( $post_id, '_' . $field[ 0 ] , 0 ) ;
                        
            } 

        } //foreach( $array_fields as $field )
        
        /****************  Start: Save region fields to DB *****************/       

        @include RVM_INC_PLUGIN_DIR . '/regions/' . $_POST[ 'rvm_mbe_select_map' ] . '-regions.php' ;        
        $array_fields = $regions ; // $regions is an array in the included file                                   
                        
        foreach( $array_fields as $field ) {
            
            if( isset( $_POST[ $field[ 1 ] ] ) ) {
                
                    $rvm_region_array = $_POST[ $field[ 1 ] ] ;
                    $rvm_regions_data = wp_slash( serialize( $rvm_region_array ) ) ; //escape quote with slash
                    update_post_meta( $post_id, '_' . $field[ 1 ], $rvm_regions_data ) ;
      
            } //if( isset( $_POST[ $field[ 1 ] ] ) )
           
        } //foreach( $array_fields as $field )

        /****************  End: Save region fields to DB *****************/ 
        
        
        
        /****************  Start marker fields save to DB *****************/ 
        
        if( isset( $_POST[ 'rvm_marker_name' ] ) ) {
                        
            if( !empty( $_POST[ 'rvm_marker_name' ] ) ) {                
                
                $rvm_marker_name_serialize =  wp_slash( serialize( $_POST[ 'rvm_marker_name' ] ) );            
                update_post_meta( $post_id, '_rvm_marker_name',  $rvm_marker_name_serialize ) ;
                
            } else { update_post_meta( $post_id, '_rvm_marker_name', '' ) ; }
            
            if( !empty( $_POST[ 'rvm_marker_lat' ] ) ) {
                
                $rvm_marker_lat_array = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_lat' ] ) ;//check if is valid entry          
               
                $rvm_marker_lat_serialize = serialize( $rvm_marker_lat_array ) ;
                $rvm_marker_lat_serialize = str_replace( ',', '.', $rvm_marker_lat_serialize ) ; // substitute all commas with dots
                update_post_meta( $post_id, '_rvm_marker_lat', $rvm_marker_lat_serialize ) ;
                
            } else { update_post_meta( $post_id, '_rvm_marker_lat', '' ) ; }        
            
            if( !empty( $_POST[ 'rvm_marker_long' ] ) ) {                
                
                $rvm_marker_long_array = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_long' ] ) ; //check if is valid entry                
                           
                $rvm_marker_long_serialize = serialize( $rvm_marker_long_array ) ;
                $rvm_marker_long_serialize = str_replace( ',', '.', $rvm_marker_long_serialize ) ;
                update_post_meta( $post_id, '_rvm_marker_long', $rvm_marker_long_serialize ) ;
                
            }  else { update_post_meta( $post_id, '_rvm_marker_long', '' ) ; }
            
            if( !empty( $_POST[ 'rvm_marker_link' ] ) ) {
                
                $rvm_marker_link_serialize = serialize( $_POST[ 'rvm_marker_link' ] ) ;
                update_post_meta( $post_id, '_rvm_marker_link', $rvm_marker_link_serialize ) ;
                
            }  else { update_post_meta( $post_id, '_rvm_marker_link', '' ) ; }
            
            if( !empty( $_POST[ 'rvm_marker_dim' ] ) ) {
                
                $rvm_marker_dim_array = rvm_check_is_number_in_array( $_POST[ 'rvm_marker_dim' ] ) ; //check if is valid entry                
               
                $rvm_marker_dim_serialize = serialize( $rvm_marker_dim_array ) ;
                $rvm_marker_dim_serialize = str_replace( ',', '.', $rvm_marker_dim_serialize ) ;
                update_post_meta( $post_id, '_rvm_marker_dim', $rvm_marker_dim_serialize ) ;
                
            }  else { update_post_meta( $post_id, '_rvm_marker_dim', '' ) ; }
    
            if( !empty( $_POST[ 'rvm_marker_popup' ] ) ) {              
                
                $rvm_marker_label_array = $_POST[ 'rvm_marker_popup' ] ; 
                $rvm_marker_popup_serialize = wp_slash( serialize( $rvm_marker_label_array ) ) ; //escape quote with slash
                update_post_meta( $post_id, '_rvm_marker_popup', $rvm_marker_popup_serialize ) ; // enable closing tags function and change tags into html entities
                
            }  else { update_post_meta( $post_id, '_rvm_marker_popup', '' ) ; }
            

        } //if( isset( $_POST[ 'rvm_marker_name' ] ) )
        
        else { // if nothing is sent reset all data 
            
            delete_post_meta( $post_id, '_rvm_marker_name' ) ;
            delete_post_meta( $post_id, '_rvm_marker_lat' ) ;
            delete_post_meta( $post_id, '_rvm_marker_long' ) ;
            delete_post_meta( $post_id, '_rvm_marker_link') ;
            delete_post_meta( $post_id, '_rvm_marker_dim') ;
            delete_post_meta( $post_id, '_rvm_marker_popup' ) ;
            
        }

        
        /****************  End: Save marker fields to DB *****************/       


    } //if( isset( $_POST[ 'rvm_mbe_select_map' ] ) && $_POST[ 'rvm_mbe_select_map' ] != 'select_country'  )
    
}// function rvm_mb_save_meta( $post_id )


/* Ajax for map preview */
add_action( 'wp_ajax_rvm_preview', 'rvm_ajax_preview' );
function rvm_ajax_preview( $post_id ) {    
    
    if( isset( $_REQUEST[ 'nonce' ] ) && isset( $_REQUEST[ 'map' ] ) && $_REQUEST[ 'map' ] != 'select_country' ) {

        // Verify that the incoming request is coming with the security nonce
        if( wp_verify_nonce( $_REQUEST[ 'nonce' ] , 'rvm_ajax_nonce' ) ) {
           
            //inject html and javascript to create teh map preview
            
            $array_countries = rvm_countries_array() ; 
            foreach( $array_countries as $country_field ) {
                
                if( $_REQUEST[ 'map' ] == $country_field[ 0 ] ) {
                    
                    $js_map_id = $country_field[ 3 ] ;
                    $js_vectormap = $country_field[ 2 ] ;
                    
                }
            }// foreach( $array_countries as $country_field )
            
            
            $map_zoom = empty( $_REQUEST[ 'zoom' ] ) ? 'false' : 'true' ;
            
            // Load just when yuo need - dynamically load region map scripts Ex. jquery-jvectormap-it_merc_en.js           
            $output = '<script type="text/javascript" src="' . RVM_JS_JVECTORMAP_PLUGIN_DIR . '/jquery-jvectormap-' . $js_map_id . '.js"></script>' ;           
            
                        
            $map_name = $_REQUEST[ 'map' ] ;
            $map_canvas_color = !empty( $_REQUEST[ 'canvascolor' ] ) ? $_REQUEST[ 'canvascolor' ] : RVM_CANVAS_BG_COLOUR ; //default setting fallback
            $map_bg_color = !empty( $_REQUEST[ 'bgcolor' ] ) ? $_REQUEST[ 'bgcolor' ]  : RVM_MAP_BG_COLOUR ;
            $map_bg_selected_color = !empty( $_REQUEST[ 'bgselectedcolor' ] ) ? $_REQUEST[ 'bgselectedcolor' ]  : RVM_MAP_BG_SELECTED_COLOUR ;
            $map_border_color = !empty( $_REQUEST[ 'bordercolor' ] ) ? $_REQUEST[ 'bordercolor' ] : RVM_MAP_BORDER_COLOUR ;            
            
            $map_width = !empty( $_REQUEST[ 'width' ] ) ? 'style="width: ' . $_REQUEST[ 'width' ] . ';"' : '' ;             
     
            $output .= '<div class="preview-map-container" id="' . $map_name . '-map" ' . $map_width . '></div>' ;
            $output .= '<script>' ;
            $output .= '(function($) { $(function(){' ;
            $output .= '$("#' . $map_name . '-map").vectorMap({ map: "' . $js_map_id . '",';
            $output .= 'regionsSelectable: true,' ;
            $output .= 'regionStyle: { initial: { fill: "' . $map_bg_color . '", "fill-opacity": 1, stroke: "' . $map_border_color . '", "stroke-width": 1 }, selected: { fill: "' . $map_bg_selected_color . '" }},
            backgroundColor: "' . $map_canvas_color . '",' ;
            $output .= 'zoomButtons: ' . $map_zoom . ', zoomOnScroll: false });' ;
            $output .= '});})(jQuery);</script>';
            
            echo $output ;         
            
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
add_action( 'manage_rvm_posts_custom_column' , 'rvm_custom_columns', 10, 2 );
function rvm_custom_columns( $column, $post_id ) {
    switch ( $column ) {
        
    case 'shortcode' :        
        echo '[rvm_map mapid="' . $post_id . '"]' ;
        break;
        
    }
}


// General functions

@include_once RVM_INC_PLUGIN_DIR . '/rvm_general_functions.php';

?>