<?php
/**
 * GENERAL FUNCTIONS
 * ----------------------------------------------------------------------------
 */
 
//Get rid of last character in a  string
function rvm_delete_last_character( $str ) {

    $output_temp = substr( $str, 0, -1 ) ;
    return $output_temp ;

}

//check numeric entry values for array
function rvm_check_is_number_in_array( $array_to_check ) {//check if numeric, used e.g. for markers lat and long
    
    $rvm_checked_number_array = $array_to_check ;                                
    
    foreach( $rvm_checked_number_array as $key => $rvm_single_value ) {
        
        if( !is_numeric( $rvm_single_value ) ) {
            
            $rvm_checked_number_array[ $key ] = '' ;
            
        } else { $rvm_checked_number_array[ $key ] = $rvm_single_value ; }
        
    }
    
    return $rvm_checked_number_array ;
    
}

//check html entry values for array and change it into html entities + close unclosed tags
function check_is_html_in_array( $array_to_check ) {//check if numeric, used e.g. for markers lat and long
    
    $rvm_checked_html_array = $array_to_check ;                                
    
    foreach( $rvm_checked_html_array as $key => $rvm_single_value ) {
        
        if( empty( $rvm_single_value ) ) {
            
            $rvm_checked_html_array[ $key ] = '' ;
            
        } else { $rvm_checked_html_array[ $key ] =  $rvm_single_value ; } // codify single and double quotes
      
    }
    
    return $rvm_checked_html_array ;
    
}

?>