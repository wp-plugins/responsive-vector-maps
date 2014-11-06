<?php
/**
 * REGION SECTION
 * ----------------------------------------------------------------------------
 */
 
 
$output .= '<div id="rvm_regions_countries" class="hidden">' ; 
    
@include RVM_INC_PLUGIN_DIR . '/regions/' . $rvm_selected_map . '-regions.php' ;        
$array_regions = $regions ; // $regions is an array in the included file     
    
$output .= '<h4>' . __( 'Choose an url and a background colour each region if you need' , RVM_TEXT_DOMAIN ) . '<span>' . __( '( Not visible in map preview )' , RVM_TEXT_DOMAIN ) . '</span></h4>' ;
$output .= '<div id="rvm_regions_from_db">' ;                                         
                    
foreach( $array_regions as $region ) {
    
    $regionsparams_array = regionsparams( $post->ID, $region[ 1 ] ) ; // get regions/countries values for links and backgrounds each region '$region[ 1 ]'
   
    // region link array            
    $id_and_class = 'id="' . $region[ 0 ] . '" ' . RVM_REGION_LINK_CLASS ; //add specific id and classes for fields  
    $output .= '<p>' ;                               
    $output .= '<label for="' . $region[ 0 ] . '" ' . RVM_LABEL_CLASS . ' >' . $region[ 2 ] . '</label>' ;                     
    $output .= '<input ' . $id_and_class . ' type="text" name="' . $region[ 1 ]  . '[]" value="' . esc_url( $regionsparams_array[ 'field_region_link' ] ) . '" >' ; 
    $output .= '<input class="rvm_color_picker" type="text" name="' . $region[ 1 ]  . '[]" value="' . esc_attr( $regionsparams_array[ 'field_region_bg' ] ) . '" >' ;
    $output .= '</p>' ;
    

} //foreach( $array_fields as $field) 
           
$output .= '</div>' ; // close id="rvm_regions_from_db"

/**************** Start: Donation *****************/

@include RVM_INC_PLUGIN_DIR . '/rvm_donation.php';

/**************** End: Donation *****************/  
     
$output .= '</div>' ; // close id="rvm_regions_countries"  

?>