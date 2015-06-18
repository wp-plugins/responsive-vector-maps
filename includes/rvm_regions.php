<?php
/**
 * REGION SECTION
 * ----------------------------------------------------------------------------
 */
$rvm_div_class = !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_regions_countries' ) ? ' class="rvm_active hidden"' : ' class="hidden"';
$output .= '<div id="rvm_regions_countries"' . $rvm_div_class . " >";    
$array_regions = rvm_include_custom_map_settings( $post->ID,  $rvm_selected_map );
$output .= '<h4><span>' . __( '( Not visible in map preview )', RVM_TEXT_DOMAIN ) . '</span></h4>';
$output .= '<div id="rvm_regions_from_db">';
$output .= '<table id="rvm_region_table">';
$output .= '<tbody>';
$output .= '<th>Region/Country</th>';
$output .= '<th>Link</th>';
$output .= '<th id="rvm_region_bg_col">Backgroung</th>';
$output .= '<th>Label popup</th>';

foreach ( $array_regions as $region ) {
            // function regionsparams() can be found in rvm_core.php
            $regionsparams_array = regionsparams( $post->ID, $region[ 1 ] ); // get regions/countries values for links , backgrounds and popup each region '$region[ 1 ]'
            // region link, background anfd popup in array
            $output .= '<tr>';
            $output .= '<td><p><label for="' . $region[ 0 ] . '" ' . RVM_LABEL_CLASS . ' >' . $region[ 2 ] . '</label></p></td>';
            $output .= '<td><p><input ' . RVM_REGION_LINK_CLASS . ' type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . esc_url( $regionsparams_array[ 'field_region_link' ] ) . '" ></p></td>';
            $output .= '<td><p><input class="rvm_color_picker" type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . strip_tags( $regionsparams_array[ 'field_region_bg' ] ) . '" ></p></td>';
            //if( !empty( $regionsparams_array[ 'field_region_popup' ] ) ) { $regionsparams_array[ 'field_region_popup' ] = esc_attr( wp_unslash( $regionsparams_array[ 'field_region_popup' ] ) ) ;  } else { $regionsparams_array[ 'field_region_popup' ] = '' ; }
            $output .= '<td><p><textarea rows="1" name="' . strval( $region[ 1 ] ) . '[]" >' . esc_attr( wp_unslash( $regionsparams_array[ 'field_region_popup' ] ) ) . '</textarea></p></td>';
            $output .= '</tr>';
} //foreach( $array_fields as $field) 

$output .= '</tbody>';
$output .= '</table>';
$output .= '</div>'; // close id="rvm_regions_from_db"     
$output .= '</div>'; // close id="rvm_regions_countries"  
?>