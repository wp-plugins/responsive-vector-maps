<?php
/**
 * GENERAL FUNCTIONS
 * ----------------------------------------------------------------------------
 */
 
//Get rid of last character ina  astring
function delete_last_character( $str ) {

    $output_temp = substr( $str, 0, -1 ) ;
    return $output_temp ;

}

//check entry values for array
function check_is_number_in_array( $array_to_check ) {//check if numeric, used e.g. for markers lat and long
    
    $rvm_checked_number_array = $array_to_check ;                                
    
    foreach( $rvm_checked_number_array as $key => $rvm_single_value ) {
        
        if( !is_numeric( $rvm_single_value ) ) {
            
            $rvm_checked_number_array[ $key ] = '' ;
            
        } else {$rvm_checked_number_array[ $key ] = $rvm_single_value ; }
        
    }
    
    return $rvm_checked_number_array ;
    
}

?>