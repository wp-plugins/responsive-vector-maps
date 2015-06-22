<?php
/**
 * GLOBAL SETTINGS ( OPTIONS PAGE )
 * ----------------------------------------------------------------------------
 */
 
 // Add settings link on plugin page
add_filter( 'plugin_action_links_' . RVM_PLUGIN_FILE , 'rvm_settings_link' ) ;
function rvm_settings_link( $links ) {
     
  $settings_link = '<a href="options-general.php?page=rvm_options_page.php">' . __( 'Settings', RVM_TEXT_DOMAIN ) . '</a>' ; 
  array_unshift( $links, $settings_link ); 
  return $links; 
  
}

// Add a menu for our option page
add_action( 'admin_menu', 'rvm_options_add_page' ) ;
function rvm_options_add_page() {
    
    add_options_page( 
        'RVM settings', // Page title on browser bar 
        'RVM global settings', // menu item text
        'manage_options', // only administartors can open this
        'rvm_options_page', // unique name of settings page
        'rvm_options_form' //call to fucntion which creates the form
     );
     
}

// Register and define the settings
add_action( 'admin_init', 'rvm_admin_init' ) ;
function rvm_admin_init(){
    
    register_setting(
        'rvm_settings'
        ,'rvm_options'
        ,''
        //,'rvm_validate_options' non need of validation at the moment
    ) ;
    add_settings_section(//Main settings 
        'rvm_main_settings', //id
        __( 'Main settings', RVM_TEXT_DOMAIN ), //title
        'rvm_section_main', //callback
        'rvm_options_page' //page
    ) ;
    
    add_settings_field(            
            'rvm_option_dequeue_wp_emoji', //id
            'Disable wp_emoji', //title
            'rvm_settings_field', //callback
            'rvm_options_page',//page
            'rvm_main_settings'//section
        ) ;
        
}

// Add forms to options page
function rvm_section_main() {
    echo '<p>In case you may notice issues related to wp_emoji enable following checkbox. It\'s well documented this script has problems with svg ( vector images ) on which RVM relies on.</p>';
}


// Add fields to options page
function rvm_settings_field() {
    
    // Retrieve options
    $rvm_options = rvm_retrieve_options();  
    $rvm_option_dequeue_wp_emoji =  !empty( $rvm_options[ 'rvm_option_dequeue_wp_emoji' ] ) ? 'checked="checked"' : '' ;
    
    echo '<input  ' .  $rvm_option_dequeue_wp_emoji  . ' type="checkbox" name="rvm_options[rvm_option_dequeue_wp_emoji]" id="rvm_option_dequeue_wp_emoji" />';
    
    // All options need to eb declared here, otherwise WP will get rid in DB of non declared value 
    $rvm_version = !empty( $rvm_options[ 'ver' ] ) ? $rvm_options[ 'ver' ] : RVM_VERSION ;
    echo '<input type="hidden" value="' . $rvm_version . '" id="rvm_version" name="rvm_options[ver]"/>';

    
}

// Add forms to options page
function rvm_options_form() {
 
    
    // Include of checkin and checkout select
  
    ?>
    
    <div class="wrap">
        <h2>RVM global settings</h2>
                        <form action="options.php" method="post" id="rvm_options_form">
                    <?php settings_fields('rvm_settings'); ?>
                     <?php do_settings_sections('rvm_options_page'); ?>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', RVM_TEXT_DOMAIN ); ?>" />
                </p>
                </form>
    </div>
    
<?php 

} 

?>