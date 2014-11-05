<?php
/**
     * Plugin Name: RVM - Responsive Vector Maps
     * Plugin URI: http://www.responsivemapsplugin.com/
     * Description: Use RVM to create as many responsive vector maps as you want... stop using area tag to create your linkable maps.
     * Version: 1.2
     * Author: Enrico Urbinati
     * Author URI: http://www.responsivemapsplugin.com/
     * License: GPL2
     */
     
     
     /*  Copyright 2014  Enrico Urbinati  (email : info@responsivemapsplugin.com)
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        You should have received a copy of the GNU General Public License 
        along with this program; if not, write to the Free Software 
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    */

define( 'RVM_VERSION' , '2.0' ) ; 
define( 'RVM_PLUGIN_FILE' , plugin_basename( __FILE__ ) ) ;    
define( 'RVM_PLUGIN_DIR_PATH' , plugin_dir_path( __FILE__ ) ) ;
define( 'RVM_PLUGIN_DIR_URL' , plugin_dir_url( __FILE__ ) ) ;
define( 'RVM_TEXT_DOMAIN' , 'rvm_text_domain' ) ;
define( 'RVM_INC_PLUGIN_DIR' , RVM_PLUGIN_DIR_PATH . 'includes' ) ;
define( 'RVM_INC_REGIONS_PLUGIN_DIR' , RVM_PLUGIN_DIR_PATH . 'includes/regions' ) ;
define( 'RVM_JS_PLUGIN_DIR', RVM_PLUGIN_DIR_URL . 'js' ) ;
define( 'RVM_JS_JVECTORMAP_PLUGIN_DIR', RVM_JS_PLUGIN_DIR . '/regions-data' ) ;
define( 'RVM_CSS_PLUGIN_DIR' , RVM_PLUGIN_DIR_URL . 'css' ) ;
define( 'RVM_IMG_PLUGIN_DIR' , RVM_PLUGIN_DIR_URL . 'images' ) ;
define( 'PLUGIN_NAME' , 'RVM - Responsive Vector Maps' ) ;
define( 'PLUGIN_WIDGET_DESCR' ,  __( 'Display the map widget' , RVM_TEXT_DOMAIN ) ) ;
define( 'RVM_WP_VERSION' , get_bloginfo( 'version' ) ) ;
define( 'PREFIX' , 'rvm_' ) ;
define( 'RVM_LABEL_CLASS' , 'class="' . PREFIX . 'label"' ) ;
define( 'RVM_REGION_LINK_CLASS' , 'class="' . PREFIX . 'region_links"' ) ;


//default settings for fallback
define( 'RVM_CANVAS_BG_COLOR' , '#A5BFDD' ) ;
define( 'RVM_MAP_BG_COLOR' , '#FFFFFF' ) ;
define( 'RVM_MAP_BG_SELECTED_COLOR' , '#FFFFFF' ) ;
define( 'RVM_MAP_BORDER_COLOR' , '#6FB4FF' ) ;
define( 'RVM_MAP_MARKER_BG_COLOR' , '#6FB4FF' ) ;
define( 'RVM_MAP_MARKER_BORDER_COLOR' , '#000000' ) ;
define( 'RVM_REGION_LINK_TARGET' , '_blank' ) ;
define( 'RVM_DIM_MIN_VALUE' , 4 ) ;
define( 'RVM_DIM_MAX_VALUE' , 12 ) ;

@include_once RVM_INC_PLUGIN_DIR . '/rvm_style_and_script.php';
@include_once RVM_INC_PLUGIN_DIR . '/rvm_core.php';
@include_once RVM_INC_PLUGIN_DIR . '/rvm_shortcode.php';
@include_once RVM_INC_PLUGIN_DIR . '/rvm_widget.php';


?>