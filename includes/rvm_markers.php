<?php
/**
 * MARKERS SECTION
 * ----------------------------------------------------------------------------
 */
 
$rvm_div_class = !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_markers' )  ? ' class="rvm_active hidden" >' : ' class="hidden">' ; 
$output .= '<div id="rvm_markers" ' . $rvm_div_class ;    
     
$output .= '<div id="rvm_mbe_fields_wrap">' ;
$output .= '<input type="button" id="rvm_mbe_add_field_button" class="button-primary" value="' . __( 'Add Markers' , RVM_TEXT_DOMAIN ) . '" >';      
$output .= '<div style="clear:left;"></div>' ;

// function markers() can be found in rvm_core.php
$marker_array_serialized = markers( $post->ID, 'retrieve', 'serialized' ) ;
$marker_array_unserialized = markers( $post->ID, 'retrieve', 'unserialized' ) ;
   
$rvm_marker_array_count =  count( $marker_array_unserialized[ 'rvm_marker_name_array' ]  ) ;  // count element of the array starting from 1
       
if( is_array( $marker_array_unserialized[ 'rvm_marker_name_array' ] ) && $rvm_marker_array_count > 0  ) {            
                        
    $rvm_is_marker = 1 ;
            
    $output .= '<h4>' . __( 'Added Markers' , RVM_TEXT_DOMAIN ) .'<span>' . __( ' ( Not visible in map preview )' , RVM_TEXT_DOMAIN ) . '</span></h4>' ;
    
    for( $i=0; $i < $rvm_marker_array_count; $i++ ) {
        
        $output .= '<div class="rvm_markers">' ;            
        $output .= '<p><label for="marker_name" ' . RVM_LABEL_CLASS . '>' . __( 'Name' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_name[]" value="' . strip_tags( wp_unslash( $marker_array_unserialized[ 'rvm_marker_name_array' ][ $i ] ) ) . '" /></p>' ;            
        $output .= '<p><label for="marker_lat" ' . RVM_LABEL_CLASS . '>' . __( 'Latitude' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_lat[]" value="' . strip_tags( $marker_array_unserialized[ 'rvm_marker_lat_array' ][ $i ] ) . '" placeholder="e.g. 48.921537" /></p>' ;            
        $output .= '<p><label for="marker_long" ' . RVM_LABEL_CLASS . '>' . __( 'Longitude' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_long[]" value="' . strip_tags( $marker_array_unserialized[ 'rvm_marker_long_array' ][ $i ] ) . '" placeholder="e.g. -66.829834" /></p>' ;       
        $output .= '<p><label for="marker_link" ' . RVM_LABEL_CLASS . '>' . __( 'Link' , RVM_TEXT_DOMAIN ) . '</label><input type="text" name="rvm_marker_link[]" value="' . esc_url( $marker_array_unserialized[ 'rvm_marker_link_array' ][ $i ] ) . '" /></p>' ;
        $output .= '<p><label for="marker_dim" ' . RVM_LABEL_CLASS . '>' . __( 'Dimension' , RVM_TEXT_DOMAIN ) . '<br><span class="rvm_small_text">'  . __( 'Use only integer or decimal' , RVM_TEXT_DOMAIN ) .  '</span></label><input type="text" name="rvm_marker_dim[]" value="' . strip_tags( $marker_array_unserialized[ 'rvm_marker_dim_array' ][ $i ] ) . '" placeholder="' . __( 'e.g. 591.20' , RVM_TEXT_DOMAIN ) . '" /></p>' ;
        $output .= '<p><label for="marker_popup" ' . RVM_LABEL_CLASS . ' style="vertical-align:top;">' . __( 'Popup label' , RVM_TEXT_DOMAIN ) . '</label><textarea name="rvm_marker_popup[]" placeholder="' . __( 'e.g. Rome precipitation (mm) long term averages' , RVM_TEXT_DOMAIN ) . '" >' . esc_attr( wp_unslash( $marker_array_unserialized[ 'rvm_marker_popup_array' ][ $i ] ) ) . '</textarea></p>' ;                
        $output .= '<input type="submit" class="rvm_remove_field button-secondary" value="' . __( 'Remove' , RVM_TEXT_DOMAIN ) . '">' ;              
        $output .= '</div>' ;            
                    
    }   

} //!empty( $rvm_marker_name ))

//$output .= 'count: ' . $rvm_marker_array_count . '<br>'; 
//$output .= '$marker_array[ \'rvm_marker_dim_array\' ][ $i ]: ' . $marker_array_unserialized[ 'rvm_marker_name_array' ] . '<br>';
$output .= '</div>' ; // <div id="rvm_mbe_fields_wrap">
$output .= '<div style="clear:left;"></div>' ;

//if( isset( $rvm_is_marker ) && $rvm_is_marker ) {
    

$output .= '<div id="rvm_settings_wrap">' ;    
$output .= '<h3>' . __( 'Markers settings' , RVM_TEXT_DOMAIN ) . '</h3>' ; 
$output .=  '<div class="rvm_markers_values">' ;
$output .=  '<div id="rvm_bg_color_wrapper">' ;
$output .= isset( $output_markers_bg_colour ) ? $output_markers_bg_colour : '' ;
$output .=  '</div>' ;
$output .=  '<div id="rvm_border_color_wrapper">' ;
$output .= isset( $output_markers_border_colour ) ? $output_markers_border_colour : '' ;
$output .=  '</div>' ;
$output .=  '</div>' ; //.rvm_markers_values
$output .= '<div style="clear:left;"></div>' ;
$output .= '<h4>' . __( 'Markers dimensions' , RVM_TEXT_DOMAIN ) . '</h4>' ;
$output .= '<p>' . __( 'Minimum and maximum values will affect the radius dimensions of the markers. Basically they are a scale within input values for marker dimensions will be represented. The smallest will be equal to "minimum value" while the biggest will be equal to "maximum value". Default values are ' . RVM_MARKER_DIM_MIN_VALUE . ' and ' . RVM_MARKER_DIM_MAX_VALUE , RVM_TEXT_DOMAIN ) . '.</p>' ;
$output .= isset( $output_marker_dim_min ) ? $output_marker_dim_min : '' ;
$output .= isset( $output_marker_dim_max ) ? $output_marker_dim_max : '' ;  
$output .= '<div style="clear:left;"></div>' ;   

$output .= '</div>' ;// #rvm_settings_wrap
    
//} // if( isset( $rvm_is_marker ) && $rvm_is_marker )

$output .= '</div>' ; // <div id="rvm_markers">

?>