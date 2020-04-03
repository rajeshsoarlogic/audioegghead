<?php 
/**
 * Register theme sidebars
 * @package Moderne
*/
 
function moderne_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'moderne' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'moderne' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'moderne' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'moderne' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'moderne' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'moderne' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'moderne' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'moderne' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'moderne' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'moderne' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'moderne' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	// Register recent posts widget
	register_widget( 'Moderne_Recent_Posts_Widget' );
	
}
add_action( 'widgets_init', 'moderne_widgets_init' );

// Count the number of widgets to enable resizable widgets in the bottom group.
function moderne_bottom_group() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr( $class ) . '"';
}