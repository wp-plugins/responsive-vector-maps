(function($) {
	$(function() {	
		
		// Setup a click handler to initiate the Ajax request and handle the response to generate the map
		
		/****************  Start: Preview *****************/
		
		$( '#preview_button' ).click( function() {			
			
			$( '#close_preview_button' ).css( 'display' , 'block' ) ;
			
			//alert( 'preview_button fired!' ) ;
			var ajax_loader = '<div class=\"rvm_ajax_loader\"><h1>' + objectL10n.loading + '</h1></div>' ;
			/*ajax_loader = ajax_loader + '<img src=\"' ;
			ajax_loader = ajax_loader + objectL10n.images_js_path ;
			ajax_loader = ajax_loader + '\/ajax-loader.gif"></div>' ;*/
			$( '#rvm_map_preview' ).html( ajax_loader );
			
			var data = {
																
				action : 'rvm_preview', // The function for handling the request
				map : $( '#rvm_mbe_select_map' ).val(), // map
				rvm_mbe_post_id : $( '#post_ID' ).val(), // post ID
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
		
		/****************  End: Preview *****************/
		
		
		/****************  Colour Picker *****************/
		
		$( '.rvm_color_picker,#rvm_mbe_map_canvascolor,#rvm_mbe_map_bgcolor,#rvm_mbe_map_bg_selected_color,#rvm_mbe_map_bordercolor,#rvm_mbe_map_marker_bg_color ,#rvm_mbe_map_marker_border_color' ).wpColorPicker();
		
		
		/****************  Start: Tabs Show/Hide Functionality *****************/
		
		$( '.rvm_tabs' ).click( function(event) {
			
			event.preventDefault();
			$( '#rvm_meta div, #rvm_meta #rvm_tabs ul li' ).removeClass( 'rvm_active' ) ;			
			var activeTab = $( this ).attr( 'rel' ) ;
			$( "#"+activeTab ).addClass( 'rvm_active' ) ;
			$( this ).addClass( 'rvm_active' ) ;
			$( "#rvm_mbe_tab_active" ).val( activeTab ) ;// change the value to be saved into DB
			
		});
				
		/****************  End: Tabs Show/Hide Functionality *****************/
		
				
		/****************  Start: Add Marker Fields *****************/

	    var marker_fields = '' ;
	    var wrapper = $( '#rvm_mbe_fields_wrap' ) ; //Fields wrapper
	    var add_button = $( '#rvm_mbe_add_field_button' ) ;

		add_button.click( function(e) {//on add input button click
					    
	        e.preventDefault();
	        //alert('fired');
            
            marker_fields = '<div class="rvm_markers">' ;
           	marker_fields = marker_fields + '<p><label for="marker_name" class="rvm_label">' + objectL10n.marker_name + '*</label><input type="text" name="rvm_marker_name[]" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_lat" class="rvm_label">' + objectL10n.marker_lat + '*</label><input type="text" name="rvm_marker_lat[]" placeholder="e.g. 48.921537" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_long" class="rvm_label">' + objectL10n.marker_long + '*</label><input type="text" name="rvm_marker_long[]" placeholder="e.g. -66.829834" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_link" class="rvm_label">' + objectL10n.marker_link + '</label><input type="text" name="rvm_marker_link[]" /></p>' ;       
            marker_fields = marker_fields + '<p><label for="marker_dim" class="rvm_label">' + objectL10n.marker_dim + '<br><span class="rvm_small_text">' + objectL10n.marker_dim_expl +  '</span></label><input type="text" name="rvm_marker_dim[]" placeholder="' + objectL10n.marker_dim_placeholder + '" /></p>' ;
            marker_fields = marker_fields + '<p><label for="marker_popup" class="rvm_label" style="vertical-align:top;">' + objectL10n.marker_popup + '</label><textarea name="rvm_marker_popup[]" placeholder="' + objectL10n.marker_popup_placeholder + '" ></textarea></p>' ;
            marker_fields = marker_fields + '<input type="submit" class="rvm_remove_field button-secondary" value="' + objectL10n.marker_remove + '">' ;            
            marker_fields = marker_fields + '</div>' ; //class="rvm_markers" 
                       
            wrapper.append( marker_fields ); //add input box          
     
		    
		});
		
    	wrapper.on( 'click','.rvm_remove_field', function(e){ //user click on remove text*/        	
        	e.preventDefault(); 
        	$( this ).parent( 'div' ).remove();        	
        	
    	});       		

		/****************  End: Add Marker Fields *****************/	
		
		
		/****************  Start: Add Custom Map Field *****************/	
		
		$( '#rvm_mbe_select_map' ).change( function() {
			//console.log('select map fired');
			
			if( $( '#rvm_mbe_select_map' ).val() === 'rvm_custom_map' ) {
				
				$('.rvm_hidden_when_custom_map').hide();
				var rvm_custom_map_filename = '';
				
				rvm_custom_map_filename = rvm_custom_map_filename + '<h3 class="rvm_custom_map_filename_title">Paste here the map name ( i.e.:  italy_merc_en ) loaded via Media Uploader</h3>';
				rvm_custom_map_filename = rvm_custom_map_filename + '<p>';
				rvm_custom_map_filename = rvm_custom_map_filename + '<input type="text" id="rvm_custom_map_filename" value="" name="rvm_custom_map_filename"  size="50" />';
				rvm_custom_map_filename = rvm_custom_map_filename + '<input type="button" id="unzip_button" class="button-primary" value="Install your map" />';
				rvm_custom_map_filename = rvm_custom_map_filename + '</p>';
				
				$('#rvm_mbe_custom_map_wrapper').append( rvm_custom_map_filename );
				
				// Check if map is installed, if not and if in custom map stop publishing
			    $( 'form#post' ).submit( function( event ) {
	                       var  rvm_custom_map_is_installed = $( '#rvm_custom_map_is_installed' ) ;
				 
                			    if (  rvm_custom_map_is_installed.length ) {                			        
                	                       // let's rock 'n roll ... save into DB
                	                       console.log('Map is installed');
                                        return true ;                 			         
                			    }
                			    
                			    else {
                                            alert("Click on Install your map before publishing");
                                            return false ;                      
                             }
			    
	               });
				
			}
			
			else { //show again standard field
				$('#rvm_mbe_custom_map_wrapper, #rvm_custom_map_unzip_progress').empty();// empty the rvm fields appended
				$('.rvm_hidden_when_custom_map').show();
			}
			
		});
		
		/****************  End: Add Custom Map Field *****************/
		
		
		/****************  Start: Unzip Custom Map *****************/
		
		//using the 'on' method on wrapper make it work even if DOM is already loaded
		$( '#rvm_mbe_custom_map_wrapper' ).on( 'click','#unzip_button', function(e){        	
        	e.preventDefault(); 
        	//console.log( 'unzip custom map button  fired!' ) ; 
        	
        	var ajax_loader = '<div class=\"rvm_ajax_loader\"><h1>' + objectL10n.unzipping + '</h1></div>' ;
			/*ajax_loader = ajax_loader + '<img src=\"' ;
			ajax_loader = ajax_loader + objectL10n.images_js_path ;
			ajax_loader = ajax_loader + '\/ajax-loader.gif"></div>' ;*/
			$( '#rvm_custom_map_unzip_progress' ).html( ajax_loader );
			
			var data = {
																
				action : 'rvm_custom_map', // The function for handling the request
				map : $( '#rvm_mbe_select_map' ).val(), // map
				custom_map_filename : $( '#rvm_custom_map_filename' ).val(), // path to zipped custom map
				nonce : $( '#rvm_ajax_nonce' ).text()// The security nonce							
		
			};
			
			$.post( ajaxurl, data , function( response ) {											
				
				$( '#rvm_custom_map_unzip_progress' ).html( response ) ;										
	
			}); 	
        	
    	});  // $( '#rvm_mbe_unzip_custom_map' ).click( function()  
	
	
		/****************  End: Unzip Custom Map *****************/
	
	});
})(jQuery);
