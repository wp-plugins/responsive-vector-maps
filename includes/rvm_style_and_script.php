<?php

// Initialize css for plugin initialization
add_action( 'init', 'rvm_add_styles' );
function rvm_add_styles() {
    
    wp_register_style( 'rvm_jvectormap_css', RVM_CSS_PLUGIN_DIR .'/jquery-jvectormap-1.2.2.css' );
    wp_register_style( 'rvm_colorpicker_css', RVM_JS_PLUGIN_DIR .'/colorpicker/css/colorpicker.css' );
    wp_register_style( 'rvm_settings_css', RVM_CSS_PLUGIN_DIR .'/rvm_settings.css', '' , '1.0' );
    
}

// Make the style available just for plugin settings page
add_action('admin_enqueue_scripts', 'rvm_add_settings_styles');
function rvm_add_settings_styles( $hook ) {
    
    if( 'post.php' == $hook || 'post-new.php' == $hook ) {
        
        wp_enqueue_style( 'rvm_colorpicker_css' );
        wp_enqueue_style( 'rvm_settings_css' );
        wp_enqueue_style( 'rvm_jvectormap_css' );
    }
    
}

// Make the style available for public pages after main theme style
add_action( 'wp_enqueue_scripts', 'rvm_add_style', 11 );
function rvm_add_style() {
       
    wp_enqueue_style( 'rvm_jvectormap_css' ); 
    
}

//Register script to WP
add_action( 'init', 'rvm_add_scripts' );
function rvm_add_scripts() {    
  
    wp_register_script( 'rvm_jquery-jvectormap-js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-1.2.2.js', array( 'jquery' ), '1.2.2' );//dependency from jquery   
    //setting the dependency of following script to the above, means it will be loaded JUST if the parent is loaded
    
    wp_register_script( 'rvm_jquery-jvectormap-fr_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-fr_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-de_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-de_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-it_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-it_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-nl_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-nl_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );     
    wp_register_script( 'rvm_jquery-jvectormap-no_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-no_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-pl_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-pl_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-pt_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-pt_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-es_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-es_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-se_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-se_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-ch_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-ch_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_jquery-jvectormap-uk_merc_js', RVM_JS_JVECTORMAP_PLUGIN_DIR .'/jquery-jvectormap-uk_merc_en.js', array( 'rvm_jquery-jvectormap-js' ), '' );
    wp_register_script( 'rvm_colorpicker_js', RVM_JS_PLUGIN_DIR .'/colorpicker/js/colorpicker.js', array( 'jquery' ), '', true );//dependency from jquery
    wp_register_script( 'rvm_eye_js', RVM_JS_PLUGIN_DIR .'/colorpicker/js/eye.js', array( 'rvm_colorpicker_js' ), '', true );
    wp_register_script( 'rvm_utils_js', RVM_JS_PLUGIN_DIR .'/colorpicker/js/utils.js', array( 'rvm_colorpicker_js' ), '', true );   
    wp_register_script( 'rvm_layout_js', RVM_JS_PLUGIN_DIR .'/colorpicker/js/layout.js', array( 'rvm_colorpicker_js' ), '', true );
    wp_register_script( 'rvm_general_js', RVM_JS_PLUGIN_DIR .'/rvm_general.js', array( 'jquery' ), '', true );     
      
}

// Make the script available just for plugin post pages
add_action( 'admin_enqueue_scripts', 'rvm_add_settings_scripts' );
function rvm_add_settings_scripts( $hook ) {
    
    if( 'post.php' == $hook || 'post-new.php' == $hook ) {
        
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'rvm_colorpicker_js' );        
        wp_enqueue_script( 'rvm_eye_js' );
        wp_enqueue_script( 'rvm_utils_js' );
        wp_enqueue_script( 'rvm_layout_js' );
        wp_enqueue_script( 'rvm_general_js' );        
        wp_enqueue_script( 'rvm_jquery-jvectormap-js' );
                
    }
    
}

// Make the scripts available for public pages
add_action( 'wp_enqueue_scripts', 'rvm_add_pub_scripts' );
function rvm_add_pub_scripts() {
       
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'rvm_jquery-jvectormap-js' );
    
}

?>