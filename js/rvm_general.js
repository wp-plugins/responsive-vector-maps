(function($) {
	$(function() {
		
		// Setup a onchange handler to initiate the Ajax request and handle the response to generate region input fields for custom urls s
	$( '#rvm_mbe_select_map' ).change( function() {
			
			$( '#rvm_map_preview' ).html( '' ); // clear preview content
			
		
			var data = {																				

				action : 'rvm_regions', // The function for handling the request
				nonce : $( '#rvm_ajax_nonce' ).text(),// The security nonce				
				map : $( '#rvm_mbe_select_map' ).val() // map									
		
			};	
			
			
			$.post( ajaxurl, data , function( response ) {						
				
				$( '#rvm_regions' ).html( response ) ;										
	
			});		
	
	
		});// $( '#rvm_mbe_select_map' ).change( function()
		
		
		
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

	
	
	});
})(jQuery);
