//Masonry init

jQuery(function($) {
	"use strict";
	
	$(document).ready(function() {
			
		if ( $( '#masonry-layout' ).length ) {
			var $container = $('#masonry-layout').masonry();
			$container.imagesLoaded(function(){
				$container.masonry({
				  columnWidth: '.grid-sizer',
				  itemSelector: '.hentry',
				  transitionDuration: '0.3s',
				  animationOptions: {
					duration: 500,
					easing: 'linear',
				}
				});
			});
		}
	});
});




