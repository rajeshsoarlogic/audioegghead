/**
 * Theme scripts.
 * Includes all the script functions for this theme.
 */
 
/* window.onscroll = function() {myFunction()};

var header = document.getElementById("nav-wrapper");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky-nav");
  } else {
    header.classList.remove("sticky-nav");
  }
} */


 // owlCarousel
( function( $ ) {
	'use strict';
   
	// Global
	var $doc = $( document ),
	$body = $( 'body' );
		
	function caliOwlCarousel() {
        if ( $.fn.owlCarousel ) {
            
            // Article Carousel/Slider
            $( '.owlslider' ).each( function() {
				$( this ).owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive:{
                        0:{
                            items: 2,
                            margin: 5
                        },
                        768:{
                            items: 3,
                            margin: 10
                        },
                        1200:{
                            items: 4
                        }
                    }
                });
            } );
		}
	}

    /* Function init */
	$doc.ready( function() {
        caliOwlCarousel();
	} );
	
	
	
 // ScrollUp
 $(function($) {
	var goTop = $('#back-to-top');
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 600 ) {
			goTop.addClass('show');
		} else {
			goTop.removeClass('show');
		}
	}); 

	goTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});
});	
	
	
	
} )( jQuery );