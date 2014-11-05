(function($) {
	$(function() {	
		
		// Setup a click handler to initiate the Ajax request and handle the response to generate the map
		$( '#preview_button' ).click( function() {			
			
			$( '#close_preview_button' ).css( 'display' , 'block' ) ;
			
			//alert( 'preview_button fired!' ) ;
			var ajax_loader = '<div id=\"rvm_ajax_loader\"><h1>Loading...</h1>' ;
			/*ajax_loader = ajax_loader + '<img src=\"' ;
			ajax_loader = ajax_loader + objectL10n.images_js_path ;
			ajax_loader = ajax_loader + '\/ajax-loader.gif"></div>' ;*/
			$( '#rvm_map_preview' ).html( ajax_loader );
			
			var data = {
																
				action : 'rvm_preview', // The function for handling the request
				map : $( '#rvm_mbe_select_map' ).val(), // map
				nonce : $( '#rvm_ajax_nonce' ).text(),// The security nonce				
				canvascolor : $( '#rvm_mbe_map_canvascolor' ).val(), // canvas background color
				bgcolor : $( '#rvm_mbe_map_bgcolor' ).val(), // map background color
				bgselectedcolor : $( '#rvm_mbe_map_bg_selected_color' ).val(), // map background color on select
				bordercolor : $( '#rvm_mbe_map_bordercolor' ).val(), // map border color
				zoom : $( '#rvm_mbe_zoom:checked' ).val(), // zoom	
				width: $( '#rvm_mbe_width' ).val()	// width				
		
			};
			
			$.post( ajaxurl, data , function( response ) {											

				$( '#rvm_map_preview' ).html( response ) ;										
	
			});		
	
	
		});// $( '#rvm_mbe_select_map' ).change( function()
		
		
		$( '#close_preview_button' ).click( function() {// when Close Map Preview button is clicked...			

			$( '#close_preview_button' ).css( 'display' , 'none' ) ;
			$( '#rvm_map_preview' ).html( '' ) ;
			
		});// $( '#preview_button' ).click( function()
		
		
		/****************  colour picker *****************/
		
		$( '.rvm_color_picker,#rvm_mbe_map_canvascolor,#rvm_mbe_map_bgcolor,#rvm_mbe_map_bg_selected_color,#rvm_mbe_map_bordercolor,#rvm_mbe_map_marker_bg_color ,#rvm_mbe_map_marker_border_color' ).wpColorPicker();
		
		
		/****************  tabs show/hide functionality *****************/
		
		$( '.rvm_tabs' ).click( function(event) {
			event.preventDefault();
			$( '#rvm_meta div, #rvm_meta #rvm_tabs ul li' ).removeClass( 'rvm_active' );			
			var activeTab = $( this ).attr( 'rel' );
			$( "#"+activeTab ).addClass( 'rvm_active' );
			$( this ).addClass( 'rvm_active' );
		});
		
		
		/****************  Add marker fields *****************/
		    			   
	    
	    var marker_fields = '' ;
	    var wrapper = $( '#rvm_mbe_fields_wrap' ) ; //Fields wrapper
	    //var wrapper_h3 = $( '#rvm_mbe_fields_wrap h3' ) ; //Fields wrapper
	    var add_button = $( '#rvm_mbe_add_field_button' ) ;
	    //var rvm_mbe_marker_count = $( '#rvm_mbe_marker_count' ) ;
	    //var x = rvm_mbe_marker_count.val() ; //initlal text box count    
	     
	    
	    
		add_button.click( function(e) {//on add input button click
					    
	        e.preventDefault();
	        //alert('fired');
	        	        
            //x++; //text box increment
            
            marker_fields = '<div class="rvm_markers">' ;
           	marker_fields = marker_fields + '<p><label for="marker_name" class="rvm_label">' + objectL10n.marker_name + '*</label><input type="text" name="rvm_marker_name[]" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_lat" class="rvm_label">' + objectL10n.marker_lat + '*</label><input type="text" name="rvm_marker_lat[]" placeholder="e.g. 48.921537" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_long" class="rvm_label">' + objectL10n.marker_long + '*</label><input type="text" name="rvm_marker_long[]" placeholder="e.g. -66.829834" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_link" class="rvm_label">' + objectL10n.marker_link + '</label><input type="text" name="rvm_marker_link[]" /></p>' ;       
            marker_fields = marker_fields + '<p><label for="marker_dim" class="rvm_label">' + objectL10n.marker_dim + '<br><span class="rvm_small_text">' + objectL10n.marker_dim_expl +  '</span></label><input type="text" name="rvm_marker_dim[]" placeholder="' + objectL10n.marker_dim_placeholder + '" /></p>' ;
    		marker_fields = marker_fields + '<p><label for="marker_popup" class="rvm_label">' + objectL10n.marker_popup + '</label><input type="text" name="rvm_marker_popup[]" value="" placeholder="' + objectL10n.marker_popup_placeholder + '" /></p>' ;
            marker_fields = marker_fields + '<input type="submit" class="rvm_remove_field button-secondary" value="' + objectL10n.marker_remove + '">' ;            
            marker_fields = marker_fields + '</div>' ; //class="rvm_markers" 
                       
            wrapper.append( marker_fields ); //add input box          
	    	//rvm_mbe_marker_count.val( x ) ;     
		    
		});
		
    	wrapper.on( 'click','.rvm_remove_field', function(e){ //user click on remove text*/        	
        	e.preventDefault(); 
        	$( this ).parent( 'div' ).remove();        	
        	//x-- ;
        	//alert( x ) ;
        	//rvm_mbe_marker_count.val( x ) ;
        	
    	});       		

		
		/****************  End Add marker fields *****************/	
	
	
	});
})(jQuery);
