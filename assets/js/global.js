jQuery(document).ready(function($) {
	
	
	// Toggle blog-menu
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".navigation").slideToggle();
		return false;
	});
	
	
	// Load Flexslider
    $(".flexslider").flexslider({
        animation: "slide",
        controlNav: false,
        prevText: "",
        nextText: "",
        smoothHeight: true   
    });
    
	// Display dropdowns on focus
	$( '.main-menu a' ).on( 'blur focus', function( e ) {
		$( this ).parents( 'li.menu-item-has-children' ).toggleClass( 'focus' );
	} );
    
    // Post meta tabs
    $( '.tab-selector a' ).click( function() {
		$( '.tab-selector a' ).removeClass( 'active' );
		$( this ).addClass( 'active' );
    	$( '.post-meta-tabs .tab' ).removeClass( 'active' );
		$( '.post-meta-tabs ' + $( this ).attr( 'data-target' ) ).addClass( 'active' );
		return false;
    } );
	
	// Resize videos after container
	var vidSelector = "iframe, object, video";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).resize(function() {
		resizeVideo(vidSelector);
	});
	
	
});

// After Jetpack Infinite Scroll posts have loaded
( function( $ ) {
	$( document.body ).on( 'post-load', function () {
		
		// Run Flexslider
		$(".flexslider").flexslider({
		    animation: "slide",
		    controlNav: false,
		    prevText: "",
		    nextText: "",
		    smoothHeight: true   
		});
		
	} );
} )( jQuery );