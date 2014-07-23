<?php
/**
 * WIDGET SECTION
 * ----------------------------------------------------------------------------
 */

// use widgets_init action hook to execute custom function
add_action( 'widgets_init', 'rvm_register_widgets' );

 //register our widget
function rvm_register_widgets() {
    register_widget( 'rvm_widget' );
}

//rvm_widget class
class rvm_widget extends WP_Widget {

    //process the new widget
    function rvm_widget() {
        $widget_ops = array( 
            'classname' => 'rvm_widget', 
            'description' => PLUGIN_WIDGET_DESCR 
            ); 
        $this->WP_Widget( 'rvm_widget', PLUGIN_NAME, $widget_ops );
    }
    
    function form ( $instance ) {
        //here we need just the post/map aid and we're done, we can create the shortcode       
        
        //Create da loop through the maps post type    
    
        $loop = new WP_Query(
            array( 'post_type' => 'rvm' )
        );
        
        if ( $loop->have_posts() ) { ?>
            
            <select name="<?php echo $this->get_field_name( 'rvm_map_id' ); ?>">
                <option value="no_choice" <?php if ( isset( $instance[ 'rvm_map_id' ] ) ) { selected( $instance[ 'rvm_map_id' ] , 'no_choice' ); } ?>>Select one map...</option>
            
            <?php
            
                while ( $loop->have_posts() ) {
                    
                    $loop->the_post();
            ?>
                    <option value="<?php echo get_the_ID() ; ?>" <?php if ( isset( $instance[ 'rvm_map_id' ] ) ) { selected( $instance[ 'rvm_map_id' ] , get_the_ID() ); } ?>> <?php the_title(); ?> </option>
                
            <?php
            
                }//while ( $loop->have_posts() )
            
            ?>
            
            </select>         
           
        <?php } //if ( $loop->have_posts() )     
               
        
                
    } //function form ( $instance )


    function update( $new_instance, $old_instance ) {
                
            $instance = $old_instance;
            $instance[ 'rvm_map_id' ] = $new_instance[ 'rvm_map_id' ];            
            return $instance;
            
    }   

    
       //display the widget only if a map was selected
        function widget( $args, $instance ) {
            if( $instance[ 'rvm_map_id' ] != 'no_choice' ) {
                
                extract( $args );
                echo $before_widget;
                $rvm_mbe_width = get_post_meta( $instance[ 'rvm_map_id' ], '_rvm_mbe_width', true ) ;
                $rvm_mbe_width = !empty ( $rvm_mbe_width ) ? ' width="' . $rvm_mbe_width . '"' : '' ;
                // Use the shortcode to generate the map                
                echo do_shortcode('[rvm_map mapid="' . $instance[ 'rvm_map_id' ] . '" ' . $rvm_mbe_width . ' ]') ;        
                echo $after_widget;
                
            }
        }
    

}
?>