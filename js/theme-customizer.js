/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	//Update site accent color in real time...
	wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.blog-title a').css('color', newval );
			$('.post-title a:hover').css('color', newval );
			$('.post-content a').css('color', newval );
			$('.widget-content a').css('color', newval );
			$('.post-header:after').css('background', newval );
		} );
	} );
	
} )( jQuery );