<?php
/**
 * The header for our theme
 * @package Moderne
 */
 $singlelayout = get_theme_mod( 'moderne_single_layout', 'single1' );
 $moderne_boxed_size = get_theme_mod( 'moderne_boxed_size', '2560' );
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if( esc_attr(get_theme_mod( 'moderne_show_topbar', true ) ) ) :
	echo '<div id="topbar" style="max-width: ' . esc_attr($moderne_boxed_size) . 'px;">';
		get_template_part('template-parts/header/top-bar'); 
	echo '</div>';
	endif; ?>
	
<div id="page" class="hfeed site " style="max-width: <?php echo esc_attr($moderne_boxed_size); ?>px;">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'moderne' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="site-branding" style="padding:<?php echo esc_attr(get_theme_mod( 'moderne_header_size', '20' ) ); ?>px 0;">
			
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			
			<?php if ( esc_attr(get_theme_mod( 'moderne_show_site_title', true ) ) ) : ?>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
			
			<?php	if (esc_attr(get_theme_mod( 'moderne_show_site_desc', true ) ) ) :
				$moderne_description = get_bloginfo( 'description', 'display' );
					if ( $moderne_description || is_customize_preview() ) : ?>
						<p id="site-description"><?php echo $moderne_description;  /* WPCS: xss ok. */ ?></p>
			<?php 
					endif;
				endif; ?>
			</div><!-- .site-branding -->	
		
	</header><!-- #masthead -->

<div id="nav-wrapper" style="max-width: <?php echo esc_attr(get_theme_mod( 'moderne_boxed_size', '2560' ) ) ; ?>px;">	
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<button id="menu-toggle" class="menu-toggle"><?php esc_html_e( 'Menu', 'moderne' ); ?></button>
		<div id="site-header-menu" class="site-header-menu">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'moderne' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
			
		</div><!-- .site-header-menu -->		
	<?php endif; ?>
</div>


	<?php if ( is_front_page() && esc_attr(get_theme_mod( 'moderne_show_slider', false ) ) ) : 
		moderne_owl_slider();
	 endif; ?>
	 
	 	<?php if ( is_front_page() ) :
			//get_template_part( 'template-parts/header/owl' );
		endif; ?>
	 
<?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>

	<?php	// Whenever a page has a featured image
	if ( '' !== get_the_post_thumbnail() && is_page() ) :  
	echo '<div id="featured-image-shadow"><div id="featured-image">';		
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));		
	echo '</div></div>';			
	endif; 
	?>
	
	<div id="content" class="site-content container">
	<div class="row">

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>