<?php
/**
 * MARKERS SECTION
 * ----------------------------------------------------------------------------
 */
 
 
$output .= '<div id="rvm_markers" class="hidden">' ;    
     
$output .= '<div id="rvm_mbe_fields_wrap">' ;
$output .= '<input type="button" id="rvm_mbe_add_field_button" class="button-primary" value="' . __( 'Add Markers' , RVM_TEXT_DOMAIN ) . '" >';      
$output .= '<div style="clear:left;"></div>' ;

$marker_array_serialized = markers( $post->ID, 'retrieve', 'serialized' ) ;
$marker_array_unserialized = markers( $post->ID, 'retrieve', 'unserialized' ) ;
   
$rvm_marker_array_count =  count( $marker_array_unserialized[ 'rvm_marker_name_array' ]  ) ;  // count element of the array starting from 1
       
if ( is_array( $marker_array_unserialized[ 'rvm_marker_name_array' ] ) && $rvm_marker_array_count > 0  ) {            
                        
    $rvm_is_marker = 1 ;
            
    $output .= '<h4>' . __( 'Added Markers' , RVM_TEXT_DOMAIN ) .'<span>' . __( '( Not visible in map preview )' , RVM_TEXT_DOMAIN ) . '</span></h4>' ;
    
    for( $i=0; $i < $rvm_marker_array_count; $i++ ) {
        
        $output .= '<div class="rvm_markers">' ;            
        $output .= '<p><label for="marker_name" class="rvm_label">' . __( 'Name' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_name[]" value="' . esc_attr( $marker_array_unserialized[ 'rvm_marker_name_array' ][ $i ] ) . '" /></p>' ;            
        $output .= '<p><label for="marker_lat" class="rvm_label">' . __( 'Latitude' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_lat[]" value="' . esc_attr( $marker_array_unserialized[ 'rvm_marker_lat_array' ][ $i ] ) . '" placeholder="e.g. 48.921537" /></p>' ;            
        $output .= '<p><label for="marker_long" class="rvm_label">' . __( 'Longitude' , RVM_TEXT_DOMAIN ) . '*</label><input type="text" name="rvm_marker_long[]" value="' . esc_attr( $marker_array_unserialized[ 'rvm_marker_long_array' ][ $i ] ) . '" placeholder="e.g. -66.829834" /></p>' ;       
        $output .= '<p><label for="marker_link" class="rvm_label">' . __( 'Link' , RVM_TEXT_DOMAIN ) . '</label><input type="text" name="rvm_marker_link[]" value="' . esc_url_raw( $marker_array_unserialized[ 'rvm_marker_link_array' ][ $i ] ) . '" /></p>' ;
        $output .= '<p><label for="marker_dim" class="rvm_label">' . __( 'Dimension' , RVM_TEXT_DOMAIN ) . '<br><span class="rvm_small_text">'  . __( 'Use only integer or decimal' , RVM_TEXT_DOMAIN ) .  '</span></label><input type="text" name="rvm_marker_dim[]" value="' . esc_attr( $marker_array_unserialized[ 'rvm_marker_dim_array' ][ $i ] ) . '" placeholder="' . __( 'e.g. 591.20' , RVM_TEXT_DOMAIN ) . '" /></p>' ;
        $output .= '<p><label for="marker_popup" class="rvm_label">' . __( 'Popup label' , RVM_TEXT_DOMAIN ) . '</label><input type="text" name="rvm_marker_popup[]" value="' . esc_attr( $marker_array_unserialized[ 'rvm_marker_popup_array' ][ $i ] ) . '" placeholder="' . __( 'e.g. Rome precipitation (mm) long term averages' , RVM_TEXT_DOMAIN ) . '" /></p>' ;                
        $output .= '<input type="submit" class="rvm_remove_field button-secondary" value="' . __( 'Remove' , RVM_TEXT_DOMAIN ) . '">' ;              
        $output .= '</div>' ;            
                    
    }           
    

} //!empty( $rvm_marker_name ))

//$output .= 'count: ' . $rvm_marker_array_count . '<br>'; 
//$output .= '$marker_array[ \'rvm_marker_dim_array\' ][ $i ]: ' . $marker_array_unserialized[ 'rvm_marker_name_array' ] . '<br>';
$output .= '</div>' ; // <div id="rvm_mbe_fields_wrap">
$output .= '<div style="clear:left;"></div>' ;

if( $rvm_is_marker ) {
    
    $output .= '<div id="rvm_settings_wrap">' ;    
    $output .= '<h3>' . __( 'Markers settings' , RVM_TEXT_DOMAIN ) . '</h3>' ;    
    $output .= $output_markers_value ;
    $output .= '<div style="clear:left;"></div>' ;
    $output .= '<h4>' . __( 'Markers dimensions' , RVM_TEXT_DOMAIN ) . '</h4>' ;
    $output .= '<p>' . __( 'Minimum and maximum values will affect the radius dimensions of the markers. Basically they are a scale within input values for marker dimensions will be represented. The smallest will be equal to "minimum value" while the biggest will be equal to "maximum value". Default values are ' . RVM_DIM_MIN_VALUE . ' and ' . RVM_DIM_MAX_VALUE , RVM_TEXT_DOMAIN ) . '.</p>' ;
    $output .= $output_markers_dim_value ;
    $output .= '<div style="clear:left;"></div>' ;
    $output .= '</div>' ;// #rvm_settings_wrap
}

    /**************** Start: Donation *****************/
    
    @include RVM_INC_PLUGIN_DIR . '/rvm_donation.php';
    
    /**************** End: Donation *****************/
    
$output .= '</div>' ; // <div id="rvm_markers">

?>