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
    
    if ( isset( $attr[ 'mapid' ] ) && is_numeric( $attr[ 'mapid' ] ) ) { // Check if mapid attr exists and if is numeric
        
        // Get the post id to chek wheter exists     
        $postid = get_post( $attr[ 'mapid' ]) ;
        
        // And, if not exists or permantely deleted ( in trash it will work yet )
        if ( !empty( $postid ) ) {
        
            //$output .= 'post_id= ' . $id ;  
            
            $map_id = esc_attr( $attr[ 'mapid' ] ) ; // sanitize entries
            $map_name = get_post_meta( $map_id, '_rvm_mbe_select_map', true ) ;
                    
            if ( isset( $attr[ 'width' ] ) ) {// if an attribut is set on shortcode use it
                
                $rvm_mbe_width = 'style="width:' . $attr[ 'width' ] . ';"' ;
                
            }
            
            else { // else use the database width value if exists
                
                $rvm_mbe_width = get_post_meta( $map_id, '_rvm_mbe_width', true ) ;
                $rvm_mbe_width = !empty ( $rvm_mbe_width ) ? 'style="width:' . $rvm_mbe_width . ';"' : '' ;
            
            }
            
            //$rvm_mbe_width =  $attr[ 'width' ]  ;
            
            $map_canvas_color =  get_post_meta( $map_id, '_rvm_mbe_map_canvascolor', true ) ;
            $map_bgcolor = get_post_meta( $map_id, '_rvm_mbe_map_bgcolor', true ) ;
            $map_border_color = get_post_meta( $map_id, '_rvm_mbe_map_bordercolor', true )  ;
            $map_region_link_target = get_post_meta( $map_id, '_rvm_mbe_select_target', true ) ;
            $map_zoom =  get_post_meta( $map_id, '_rvm_mbe_zoom', true ) ;
            
            // set default settings as fallback
            $map_canvas_color = !empty ( $map_canvas_color ) ? $map_canvas_color : RVM_CANVAS_BG_COLOR  ;
            $map_bgcolor =  !empty ( $map_bgcolor ) ? $map_bgcolor : RVM_MAP_BG_COLOR ;
            $map_border_color = !empty ( $map_border_color ) ? $map_border_color : RVM_MAP_BORDER_COLOR  ;
            $map_region_link_target =  !empty ( $map_region_link_target ) ? $map_region_link_target : RVM_REGION_LINK_TARGET ;
            $map_zoom = !empty ( $map_zoom ) ? 'true' : 'false' ;            
            
            $array_countries = rvm_countries_array() ;// get all countries value
            
            foreach ( $array_countries as $country_field ) {
                 // save the javascript name of the map Ex. 'it_merc_en' needed for shortcodes
                if ( $map_name == $country_field[ 0 ] ) {
                        
                    $map_script = $country_field[ 2 ] ;
                    $js_map_id = $country_field[ 3 ] ;
                    $map_apsect_ratio = $country_field[ 4 ] ;
                                    
                }           
                
            }           
     
            // Load just when yuo need  - dynamically load region map scripts Ex. jquery-jvectormap-it_merc_en.js            
            wp_enqueue_script( $map_script ) ;// enqueuing js and css inside a shortcode works since wordpress 3.3                      

            
            $output .= '<div class="map-container" id="' . $map_name . '-map-' . $map_id . '"  ' . $rvm_mbe_width . '></div>' ;
            $output .= '<script type="text/javascript">' ;
                                   
            //Include the correct regions file Ex. italy-regions.php       
            @include RVM_INC_PLUGIN_DIR . '/regions/' . $map_name . '-regions.php' ;
                    
            // Let's grab regions' code links        
            $array_regions = $regions ;           
           
            
            $output .= '( function($) { $(function(){';        
            $output .= '$("#' . $map_name . '-map-' . $map_id . '").vectorMap({ map: "' . $js_map_id . '" ,' ;
            $output .= 'regionStyle: { initial: { fill: "' . $map_bgcolor . '", "fill-opacity": 1, stroke: "' . $map_border_color . '", "stroke-width": 1 }, selected: { fill: "' . $map_bgcolor . '" }}, backgroundColor: "' . $map_canvas_color . '",'; 
            $output .= 'zoomButtons: ' . $map_zoom . ', zoomOnScroll: false, ' ;           
            
            // Changing cursor from arrow to hand when a map has a link
            $output .= 'onRegionOver : function(event, code, region){' ;
            
            foreach ( $array_regions as $region ) {
                
                //$region[ 2 ] is region code to target the onRegionClick function
                $map_region_link = get_post_meta( $map_id, '_' . $region[ 1 ] , true ) ;
                
                if( !empty( $map_region_link ) ) {
               
                    $output .= 'if ( code ==  "' . $region[ 1 ] . '" ) { document.body.style.cursor = "pointer" ; } else { event.preventDefault(); }' ;
                                   
                }
            
            } //foreach ( $array_regions as $region )
            
            $output .= ' },';            
            
            // Restoring the default arrow cursor when region is not clickable
            $output .= 'onRegionOut: function (element, code, region) { document.body.style.cursor = "default"; },' ;
            
            // Open link when a region with link is clicked
            $output .= 'onRegionClick : function(event, code){' ;
            
            foreach ( $array_regions as $region ) {
                //$region[ 2 ] is region code to target the onRegionClick function
                $map_region_link = get_post_meta( $map_id, '_' . $region[ 1 ] , true ) ;
    
                
                if( !empty( $map_region_link ) ) {
                    // window.open should not work on mobile devices, so let's create a fallback for it
                    
                    if ( function_exists ( 'wp_is_mobile' ) && wp_is_mobile() ) { // wp_is_mobile() since 3.4                      
                            
                        $output .= 'if (code == "' . $region[ 1 ] . '") { window.location.assign("' . $map_region_link . '" ) ; }' ;
       
                    }  //  if ( function_exists ( 'wp_is_mobile' ) && wp_is_mobile() )
                      
                    else {
                        
                        $output .= 'if (code == "' . $region[ 1 ] . '") { window.open("' . $map_region_link . '", "' . $map_region_link_target . '" ) ; }' ;
                        
                    }          
                    
                } // if( !empty( $map_region_link ) )           
                
            } //foreach ( $array_regions as $region )      
                                   
            $output .= ' } });';
            $output .= '});})(jQuery);</script>' ;
            
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
             
            
        } //if ( !empty( $postid ) )        
    

    } //if ( isset( $attr ) ) 
    
    return $output ;
        
} //function rvm_map_shortcode( $attr )


?>