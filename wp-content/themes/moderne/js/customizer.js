/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'rmoderne'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// h1
	wp.customize( 'moderne_h1', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h1' ).css( newval );
	  } );
	} );
	
	// h1
	wp.customize( 'moderne_h1', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h1' ).css( newval );
	  } );
	} );

	// h2
	wp.customize( 'moderne_h2', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h2' ).css( newval );
	  } );
	} );

	// h3
	wp.customize( 'moderne_h3', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h3' ).css( newval );
	  } );
	} );

	// h4
	wp.customize( 'moderne_h4', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h4' ).css( newval );
	  } );
	} );

	// h5
	wp.customize( 'moderne_h5', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h5' ).css( newval );
	  } );
	} );

	// h6
	wp.customize( 'moderne_h6', function( value ) {
	  value.bind( function( newval ) {
	    $( 'h6' ).css( newval );
	  } );
	} );	

	// site title size
	wp.customize( 'moderne_sitetitle_size', function( value ) {
	  value.bind( function( newval ) {
	    $( '#site-title' ).css( newval );
	  } );
	} );
	
	// site description size
	wp.customize( 'moderne_sitedesc_size', function( value ) {
	  value.bind( function( newval ) {
	    $( '#site-description' ).css( newval );
	  } );
	} );	

	// main content font size
	wp.customize( 'moderne_post_font_size', function( value ) {
	  value.bind( function( newval ) {
	    $( '.entry-content' ).css( newval );
	  } );
	} );	
	
	// widget title
	wp.customize( 'moderne_widget_title', function( value ) {
	  value.bind( function( newval ) {
	    $( '.widget-title' ).css( newval );
	  } );
	} );	

	// widget text
	wp.customize( 'moderne_widget_text', function( value ) {
	  value.bind( function( newval ) {
	    $( '.widget' ).css( newval );
	  } );
	} );	

	// main menu size
	wp.customize( 'moderne_menu_size', function( value ) {
	  value.bind( function( newval ) {
	    $( '.main-navigation .primary-menu' ).css( newval );
	  } );
	} );

	// submenu size
	wp.customize( 'moderne_submenu_size', function( value ) {
	  value.bind( function( newval ) {
	    $( '.main-navigation ul ul' ).css( newval );
	  } );
	} );	
	
	// blog heading title
	wp.customize( 'moderne_blog_title', function( value ) {
	  value.bind( function( newval ) {
	    $( '.blog .page-title' ).html( newval );
	  } );
	} );	
	
	// blog intro
	wp.customize( 'moderne_blog_intro', function( value ) {
	  value.bind( function( newval ) {
	    $( '.blog #blog-description' ).html( newval );
	  } );
	} );	

	// copyright
	wp.customize( 'moderne_copyright', function( value ) {
	  value.bind( function( newval ) {
	    $( '#copyright' ).html( newval );
	  } );
	} );	
	
	
} )( jQuery );
