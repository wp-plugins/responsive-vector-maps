<?php
/**
 * SHORTCODE SECTION
 * ----------------------------------------------------------------------------
 */


add_shortcode( 'rvm_map' , 'rvm_map_shortcode' ) ;
function rvm_map_shortcode( $attr ) {    // $attr manages the shortcode parameter - [rvm_map mapid="xxxx" width="xxxx"]

    //post id to retrieve post and meta data
    //global $id ;
    
    //return 'ehi, I\'m the first shortcode ever!' ;
    $output = '' ;
    
    if( isset( $attr[ 'mapid' ] ) && is_numeric( $attr[ 'mapid' ] ) ) { // Check if mapid attr exists and if is numeric
        
        // Get the post id to chek wheter exists     
        $postid = get_post( $attr[ 'mapid' ]) ;
        
        // And, if not exists or permantely deleted ( in trash it will work yet )
        if( !empty( $postid ) ) {
        
            //$output .= 'post_id= ' . $id ;  
            
            $map_id = esc_attr( $attr[ 'mapid' ] ) ; // sanitize entries
            $map_name = get_post_meta( $map_id, '_rvm_mbe_select_map', true ) ;
                    
            if( isset( $attr[ 'width' ] ) ) {// if an attribut is set on shortcode use it
                
                $rvm_mbe_width = 'style="width:' . $attr[ 'width' ] . ';"' ;
                
            }
            
            else { // else use the database width value if exists
                
                $rvm_mbe_width = get_post_meta( $map_id, '_rvm_mbe_width', true ) ;
                $rvm_mbe_width = !empty( $rvm_mbe_width ) ? 'style="width:' . $rvm_mbe_width . ';"' : '' ;
            
            }
            
            //$rvm_mbe_width =  $attr[ 'width' ]  ;
            
            $map_canvas_color =  get_post_meta( $map_id, '_rvm_mbe_map_canvascolor', true ) ;
            $map_bg_color = get_post_meta( $map_id, '_rvm_mbe_map_bgcolor', true ) ;
            $map_bg_selected_color = get_post_meta( $map_id, '_rvm_mbe_map_bg_selected_color', true ) ;
            
            $map_border_color = get_post_meta( $map_id, '_rvm_mbe_map_bordercolor', true )  ;
            $map_region_link_target = get_post_meta( $map_id, '_rvm_mbe_select_target', true ) ;
            $rvm_mbe_map_marker_bg_color = get_post_meta( $map_id, '_rvm_mbe_map_marker_bg_color', true ) ;
            $rvm_mbe_map_marker_border_color = get_post_meta( $map_id, '_rvm_mbe_map_marker_border_color', true ) ;
            $rvm_mbe_map_marker_dim_min = get_post_meta( $map_id, '_rvm_mbe_map_marker_dim_min', true ) ;
            $rvm_mbe_map_marker_dim_max = get_post_meta( $map_id, '_rvm_mbe_map_marker_dim_max', true ) ;
            
            $map_zoom = get_post_meta( $map_id, '_rvm_mbe_zoom', true ) ;
            
            // set default settings as fallback
            $map_canvas_color = !empty( $map_canvas_color ) ? $map_canvas_color : RVM_CANVAS_BG_COLOUR ;
            $map_bg_color =  !empty( $map_bg_color ) ? $map_bg_color : RVM_MAP_BG_COLOUR ;
            $map_bg_selected_color =  !empty( $map_bg_selected_color ) ? $map_bg_selected_color : RVM_MAP_BG_SELECTED_COLOUR ;
            $map_border_color = !empty( $map_border_color ) ? $map_border_color : RVM_MAP_BORDER_COLOUR ;            
            $rvm_mbe_map_marker_bg_color = !empty( $rvm_mbe_map_marker_bg_color ) ? $rvm_mbe_map_marker_bg_color : RVM_MARKER_BG_COLOUR ;
            $rvm_mbe_map_marker_border_color = !empty( $rvm_mbe_map_marker_border_color ) ? $rvm_mbe_map_marker_border_color : RVM_MARKER_BORDER_COLOUR ;
            
            $rvm_mbe_map_marker_dim_min = !empty( $rvm_mbe_map_marker_dim_min ) ? $rvm_mbe_map_marker_dim_min : RVM_MARKER_DIM_MIN_VALUE ;
            $rvm_mbe_map_marker_dim_max = !empty( $rvm_mbe_map_marker_dim_max ) ? $rvm_mbe_map_marker_dim_max : RVM_MARKER_DIM_MAX_VALUE ;
            
            
            //$map_region_link_target =  !empty( $map_region_link_target ) ? $map_region_link_target : RVM_REGION_LINK_TARGET ;
            $map_zoom = !empty( $map_zoom ) ? 'true' : 'false' ; 
            
            $marker_array_serialized = markers( $map_id, 'retrieve', 'serialized' ) ;
            $marker_array_unserialized = markers( $map_id, 'retrieve', 'unserialized' ) ;
                     
            $array_countries = rvm_countries_array() ;// get all countries value
            
            foreach ( $array_countries as $country_field ) {
                 // save the javascript name of the map Ex. 'it_merc_en' needed for shortcodes
                if( $map_name == $country_field[ 0 ] ) {
                        
                    $map_script = $country_field[ 2 ] ;
                    $js_map_id = $country_field[ 3 ] ;
                    $map_apsect_ratio = $country_field[ 4 ] ;
                                    
                }           
                
            }           
     
            // Load just when yuo need  - dynamically load region map scripts Ex. jquery-jvectormap-it_merc_en.js            
            wp_enqueue_script( $map_script ) ;// enqueuing js and css inside a shortcode works since wordpress 3.3                      

            
            $output .= '<div  data-ver="' . RVM_VERSION . '" class="map-container" id="' . $map_name . '-map-' . $map_id . '"  ' . $rvm_mbe_width . '></div>' ;
            $output .= '<script type="text/javascript">' ;
                                   
            //Include the correct regions file Ex. italy-regions.php       
            @include RVM_INC_PLUGIN_DIR . '/regions/' . $map_name . '-regions.php' ;
                    
            // Let's grab regions' code links        
            $array_regions = $regions ;        

            $output .= '( function($) { $(function(){';
            
            /**
             * START : MARKERS ARRAYS
             * ----------------------------------------------------------------------------
            */
            
            $rvm_marker_array_count = count( $marker_array_unserialized['rvm_marker_name_array'] ) ;// count element of the array starting from 1
                 
            $end_of_array = ',' ;// for arrays building 
            
            if( $rvm_marker_array_count > 0  && is_array( $marker_array_unserialized['rvm_marker_name_array'] )  && !empty( $marker_array_serialized['rvm_marker_name'] ) 
            && !empty( $marker_array_serialized['rvm_marker_lat'] ) && is_array( $marker_array_unserialized['rvm_marker_lat_array'] ) && !empty( $marker_array_serialized['rvm_marker_long'] ) 
            && is_array( $marker_array_unserialized['rvm_marker_long_array'] ) ) {
                
                
                //$end_of_array = ',' ;// for arrays building                
                                             
                
                $output .= 'var markers = [';
                                
                    
                for( $i=0; $i < $rvm_marker_array_count; $i++ ) {
                    
                    if( !empty( $marker_array_unserialized['rvm_marker_name_array'][ $i ] ) && !empty( $marker_array_unserialized['rvm_marker_lat_array'][ $i ] ) && !empty( $marker_array_unserialized['rvm_marker_long_array'][ $i ] ) ) { //display markers ONLY if all valus but the link are filled
                    
                        $output_is_markers = 1 ;// variable fo later reference in javascript
                        $output .= '{latLng: [' . esc_attr( $marker_array_unserialized['rvm_marker_lat_array'][ $i ] ) . ', ' . esc_attr( $marker_array_unserialized['rvm_marker_long_array'][ $i ] ) . ' ],' ;
                        $output .= 'name: "' . esc_attr( $marker_array_unserialized['rvm_marker_name_array'][ $i ] ) . '", '; 
                        $output .= 'weburl : "' . esc_attr( $marker_array_unserialized['rvm_marker_link_array'][ $i ] ) . '"} ' ;
                                                
                    } //if( !empty( $rvm_marker_name_array[ $i ] ) && ... 
                    
                    else {
                        
                        $output .= '""';//prevent displaying the wrong label and dimension for array misallineament
                    }

                    $output .= $end_of_array  ;               

                                        
                } //for( $i=0; $i < $rvm_marker_array_count; $i++ )     
                
                
                if( isset( $output_is_markers ) && $output_is_markers ) {// if exist at least one value in DB
                    
                    $output_temp = delete_last_character( $output ) ; //get rid of last comma     
                    $output = $output_temp ;
                  
                }
 

                $output .= '];' ;
                
                //echo '$output_is_markers:' . $output_is_markers ;
                
                //echo '$rvm_marker_array_count:' . $rvm_marker_array_count ;
                
                $output .= 'var marker_dimensions = [' ; // create markers dimensions array
                
                $rvm_is_dim_value_more_then_two = 0 ;    
                    
                for( $i=0; $i < $rvm_marker_array_count; $i++ ) {                   
                    
                    // load marker dimension for marker radius             
                    if( !empty( $marker_array_unserialized['rvm_marker_dim_array'][ $i ] ) ) {
                        
                        $rvm_is_dim_value_more_then_two++ ; // will use it later in javascript to check if use the dimension scale or not ( not if counter is lower then 2 )
                        
                        $output_is_marker_dim = 1 ;// variable fo later reference in javascript
                        $output .= esc_attr( $marker_array_unserialized['rvm_marker_dim_array'][ $i ] ) ; //replace all comma occurencies with '': it will lead in a issue in javascript array
                        
                    } else { $output .= '0' ; } // when empty value substitute with a "0" so to not show undefined
                    
                    $output .= $end_of_array ;
                    
                    //echo '$marker_array_unserialized[\'rvm_marker_dim_array\'][ $i ]:' . $marker_array_unserialized['rvm_marker_dim_array'][ $i ] .'<br>';
                    
                }

                //echo '$rvm_is_dim_value_more_then_two :' .$rvm_is_dim_value_more_then_two ;
                //echo '$output_is_marker_dim :' .$output_is_marker_dim ;
                $output_temp = delete_last_character( $output ) ; //get rid of last comma anyway    
                $output = $output_temp ;
                
                $output .= '];' ;
                
                $output .= 'var marker_popup = [' ; // create markers popup label array
            
                for( $i=0; $i < $rvm_marker_array_count; $i++ ) {
                                
                    if( !empty( $marker_array_unserialized['rvm_marker_popup_array'][ $i ] ) ) {
                        
                        $output_is_marker_popup = 1 ;
                        $output .= '"' .  force_balance_tags( $marker_array_unserialized['rvm_marker_popup_array'][ $i ] ) . '"' ;//close unclosed html tags
                        
                    } else { $output .= '""' ; } // when empty value substitute with a "" so to not show undefined
                    
                    $output .= $end_of_array ;
                    
                }
                
                    
                $output_temp = delete_last_character( $output ) ; //get rid of last comma anyway     
                $output = $output_temp ;

                
                // create the onlabelshow function to use later in the javascript: evoid the undefined vales in case no entries in db
                $output_marker_popup = ', onMarkerLabelShow: function(event, label, code) {' ;// show popup onmouseover
                $output_marker_popup .= 'var marker_br ;' ;
                //$output_marker_popup .= 'if( marker_dimensions[code] === "undefined" || marker_dimensions[code] === "" ) { marker_br = ""; } else { marker_br = "<br>" ; } ' ;
                $output_marker_popup .= 'label.html( label.html() + "<br>" + marker_popup[code] );' ;
                $output_marker_popup .= '}' ;             
                $output .= '];' ;
                
             }
                
           
            /**
             * END  : MARKERS ARRAYS
             * ----------------------------------------------------------------------------
            */
            
            
            
            /**
             * START  : REGIONS ARRAYS
             * ----------------------------------------------------------------------------
            */                 
                        
            //Region backgrounds
            $output .= 'var region_background = {' ;
            $i=0 ; 
            //echo 'count( $array_regions ):' . count( $array_regions ) ;
            foreach ( $array_regions as $region ) {
                
                $regionsparams_array = regionsparams( $map_id, $region[ 1 ] ) ; // get regions/countries values for links and backgrounds each region '$region[ 1 ]'
                
                if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) ) {                        
                    
                    $rvm_regions_array_count = count( $array_regions ) ;                 
                  
                    if( !empty( $regionsparams_array[ 'field_region_bg' ] ) ) {                       

                        $output .= '"' . $region[ 1 ] . '" : ' ;                        
                        $output .= '"' . esc_attr( $regionsparams_array[ 'field_region_bg' ] ) . '"' . $end_of_array  ;
                        $output_is_regions_bg = 1 ;// variable fo later reference in javascript
                        
                    } 
                    
                    
                } //if( is_array( $regionsparams_array ) and  !empty( $regionsparams_array )                
                
                
            } //foreach ( $array_regions as $region )
            
            if( isset( $output_is_regions_bg ) && $output_is_regions_bg ) {// if exist at least one value in DB
                
                $output_temp = delete_last_character( $output ) ; //get rid of last comma     
                $output = $output_temp ;
              
            }
             
            $output .= '};' ;// var region_background
            
            
            //echo '$output_is_regions_bg: ' . $output_is_regions_bg ;
            
            //Region links/backgrounds
            $output .= 'var region_popup = {' ;
            $i=0 ; 
            //echo 'count( $array_regions ):' . count( $array_regions ) ;
            foreach ( $array_regions as $region ) {
                
                $regionsparams_array = regionsparams( $map_id, $region[ 1 ] ) ; // get regions/countries values for links and backgrounds each region '$region[ 1 ]'
                
                if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) ) {                        
                    
                    $rvm_regions_array_count = count( $array_regions ) ;                 
                                  
                    if( isset( $regionsparams_array[ 'field_region_popup' ] ) && !empty( $regionsparams_array[ 'field_region_popup' ] ) ) {                       

                        $output .= '"' . $region[ 1 ] . '" : ' ;                        
                        $output .= '"' . force_balance_tags( $regionsparams_array[ 'field_region_popup' ] ) . '"' . $end_of_array ;//close unclosed tags
                        $output_is_regions_popup = 1 ;// variable fo later reference in javascript
                        
                    } 

       
                } //if( is_array( $regionsparams_array ) and  !empty( $regionsparams_array )                
                
                
            } //foreach ( $array_regions as $region )
            
            if( isset( $output_is_regions_popup ) && $output_is_regions_popup ) {// if exist at least one value in DB
                
                $output_temp = delete_last_character( $output ) ; //get rid of last comma     
                $output = $output_temp ;
              
            }
             
            $output .= '};' ;// var region_popup
            
            
            /**
             * END  : REGIONS ARRAYS
             * ----------------------------------------------------------------------------
            */
            
            
            
            /**
             * START  : JVECTORMAP BUILDER
             * ----------------------------------------------------------------------------
            */    
      
            $output .= '$("#' . $map_name . '-map-' . $map_id . '").vectorMap({ map: "' . $js_map_id . '" ,' ;
            $output .= ' regionsSelectable: true,' ;
            $output .= ' regionStyle: { initial: { fill: "' . $map_bg_color . '", "fill-opacity": 1, stroke: "' . $map_border_color . '", "stroke-width": 1 }, selected: { fill: "' . $map_bg_selected_color . '" }}, backgroundColor: "' . $map_canvas_color . '",'; 
            $output .= ' zoomButtons: ' . $map_zoom . ', zoomOnScroll: false' ;  
            
             if( isset( $output_is_regions_popup ) && $output_is_regions_popup ) {
                
                $output .= ', onRegionLabelShow : function(event, label, code){' ;
                 
                $output .= 'if(!region_popup.hasOwnProperty(code)) {' ;
                // no text found, return standard state name
                $output .= 'return true ;' ;
                
                $output .= '}' ;

                // else construct label for state with extra text
                $output .= 'label.html(label.html() + "<br/>"  + region_popup[code]); ' ;
    
                $output .= ' }';
            
            }
            
            // Changing cursor from arrow to hand when a map has a link
            $output .= ', onRegionOver : function(event, code){' ;            
            
            foreach ( $array_regions as $region ) {
                
                $regionsparams_array = regionsparams( $map_id, $region[ 1 ] ) ; // get regions/countries values for links and backgrounds each region '$region[ 1 ]'               
                
                if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) ) {
               
                    if( trim( $region[ 1 ] ) == 'IND' ) { $region[ 1 ] = 'ID' ; }  // prevent field to be filled with post ID insteda of link for Indonesia
                    
                    if( !empty( $regionsparams_array[ 'field_region_link' ] ) ) {
                   
                        $output .= 'if( code ==  "' . $region[ 1 ] . '" ) { document.body.style.cursor = "pointer" ; }' ;
                                       
                    }
                
                } //if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) 
                
            } //foreach ( $array_regions as $region )    
         
            $output .= ' }';
 
            // Restoring the default arrow cursor when region is not clickable
            $output .= ', onRegionOut: function(element, code, region) { document.body.style.cursor = "default"; }' ;
            
            // Open link when a region with link is clicked
            $output .= ', onRegionClick : function(event, code){' ;
            
            foreach ( $array_regions as $region ) {
                
                $regionsparams_array = regionsparams( $map_id, $region[ 1 ] ) ; // get regions/countries values for links and backgrounds each region '$region[ 1 ]'
                
                if( trim( $region[ 1 ] ) == 'IND' ) { $region[ 1 ] = 'ID' ; }  // prevent field to be filled with post ID for Indonesia               
                
                if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) ) {
                
                    if( !empty( $regionsparams_array[ 'field_region_link' ] ) ) {
                        // window.open should not work on mobile devices, so let's create a fallback for it
                        
                        if( function_exists ( 'wp_is_mobile' ) && wp_is_mobile() ) { // wp_is_mobile() since 3.4                      
                                
                            $output .= 'if(code == "' . $region[ 1 ] . '") { window.location.assign("' . $regionsparams_array[ 'field_region_link' ] . '" ) ; }' ;
           
                        }  //  if( function_exists ( 'wp_is_mobile' ) && wp_is_mobile() )
                          
                        else {
                            
                            $output .= 'if(code == "' . $region[ 1 ] . '") { window.open("' . $regionsparams_array[ 'field_region_link' ] . '", "' . $map_region_link_target . '" ) ; }' ;
                            
                        }          
                        
                    } // if( !empty( $regionsparams_array[ 'field_region_link' ] ) )
                    
                } //if( is_array( $regionsparams_array ) && !empty( $regionsparams_array ) )         
                
            } //foreach ( $array_regions as $region )   
            
            $output .= '}' ;
                                    
                    
            /**
             * START  : SERIES
             * ----------------------------------------------------------------------------
            */                
                    
            $output .= ', series: { ';
                
            //}// if( isset( $output_is_regions_bg ) && $output_is_regions_bg &&  !empty( $marker_array_unserialized['rvm_marker_name'] ) )
            
            if( isset( $output_is_regions_bg ) && $output_is_regions_bg ) {
                
                $output .= 'regions: [{ values: region_background, attribute: "fill" }]' ;
                $is_regions_series_comma = ',';
                
            }
            
            
            /**
             * START  : DISPLAY MARKERS
             * ----------------------------------------------------------------------------
            */ 
            
            if( isset( $output_is_markers ) && $output_is_markers ) {
                
                if( isset( $output_is_marker_dim ) && $output_is_marker_dim && isset( $rvm_is_dim_value_more_then_two ) && $rvm_is_dim_value_more_then_two > 1 ) {
                        
                    
                    if( isset( $is_regions_series_comma ) ) { $is_regions_series_comma = $is_regions_series_comma ; } else { $is_regions_series_comma = '' ; }
                    $output .= $is_regions_series_comma ;
                    
                    // Display markers dimensions                      
                    $output .= 'markers: [{ attribute: "r",  scale: [' . $rvm_mbe_map_marker_dim_min . ', ' . $rvm_mbe_map_marker_dim_max . '] , values: marker_dimensions }] ';
                
                }// isset( $output_is_marker_dim ) && $output_is_marker_dim
                
                //if( isset( $output_is_marker_dim ) && $output_is_marker_dim && isset( $rvm_is_dim_value_more_then_two ) && $rvm_is_dim_value_more_then_two > 1 ) {
                
                $output_markers = ', markers: markers' ; // display markers on the map
            
            } //if( $output_is_markers )
                 
            if( isset( $output_markers ) ) { $output_markers = $output_markers ; } else { $output_markers = '' ; }
                
            $output .= '}' . $output_markers ; // series 
            
            /**
             * END  : SERIES
             * ----------------------------------------------------------------------------
            */
            
            
            // Markers popup labels
            if( isset( $output_is_marker_popup ) && $output_is_marker_popup && isset( $output_marker_popup ) ) { $output .= $output_marker_popup ; }
            
            $output .= ', onMarkerClick: function(event, index) {' ; // markers links        
            
            if( function_exists ( 'wp_is_mobile' ) && wp_is_mobile() ) { // wp_is_mobile() since 3.4    
            
                $output .= 'if( markers[index].weburl ) { window.location.assign( markers[index].weburl ) ; } }' ;// check if link available
             
            } 
            
            else  {
                
                $output .= 'if( markers[index].weburl ) { window.open( markers[index].weburl, "' . $map_region_link_target . '" ) ; } }' ;                   
                
            }
            
            $output .= ', markerStyle: {initial: { fill: "' . $rvm_mbe_map_marker_bg_color . '", stroke: "' . $rvm_mbe_map_marker_border_color .'" }}' ;           
            

            /**
             * END  : DISPLAY MARKERS
             * ----------------------------------------------------------------------------
            */ 
  
            $output .= '});';
            $output .= '});})(jQuery);</script>' ;
            
            
            /**
             * END  : JVECTORMAP BUILDER
             * ----------------------------------------------------------------------------
            */
            
            
            
            
            /**
             * START  : RESIZE FUNCTIONS
             * ----------------------------------------------------------------------------
            */            

            // Set an height accordingly with container width
            // It ensures: liquid map when screensize reduces
            // fix the small height calculation of some browsers like Firefox
            // fix the extreme height of some other browser: ex. Chrome or Safari
            
            /* get width of map container in order to set an height using the aspect ratio variable*/
            $output .= '<script type="text/javascript">( function($) {' ;
            
            $output .= 'var map_container_width = $( "#' . $map_name . '-map-' . $map_id . '").width();' ;
            //$output .= 'alert( map_container_width );' ;
            $output .= 'var map_container_height = map_container_width / ' .  $map_apsect_ratio  . '; ' ; // calculate height dividing map container width per aspect ratio
            $output .= '$("#' . $map_name . '-map-' . $map_id . '").css( { "height" : map_container_height ,  "max-height" : map_container_height } );' ; // finally assign height to the container
            //$output .= 'alert( map_container_height );' ;
            
            // Repeat same stuff but within resize() function: this function is triggered whenever windows resize
            // solving the problem when switching from landscape to portrait and viceversa
            // If you may notice some performance issue, just delete next 5 lines of code.
                
            // Start: 5 lines for resizing function
            $output .= '$( window ).resize( function() {' ;//resize stuff
            $output .= 'var map_container_width = $( "#' . $map_name . '-map-' . $map_id . '").width();' ;
            $output .= 'var map_container_height = map_container_width / ' .  $map_apsect_ratio  . '; ' ; // calculate height dividing map container width per aspect ratio
            $output .= '$( "#' . $map_name . '-map-' . $map_id . '").css( { "height" : map_container_height ,  "max-height" : map_container_height } );' ;
            $output .= '});' ;// $( window ).resize(function()
           // End: 5 lines for resizing function
             
            $output .= '})(jQuery);</script>' ;
            
            /**
             * END  : RESIZE FUNCTIONS
             * ----------------------------------------------------------------------------
            */           
             
            
        } //if( !empty( $postid ) )        
    

    } //if( isset( $attr ) ) 
    
    return $output ;
        
} //function rvm_map_shortcode( $attr )


?>