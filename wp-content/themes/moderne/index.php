<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. E.g., it puts together the home page when no home.php file exists.
 * @package Moderne
 */

$bloglayout = esc_attr(get_theme_mod( 'moderne_blog_layout', 'blog1' ));
 
get_header();
?>

<?php // for our archive headers and custom blog intro group
get_template_part( 'template-parts/page-headers' ); ?>


<?php // centered no sidebar
if ( $bloglayout == 'blog13')  : ?>

	<div id="primary" class="content-area col-lg-12">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/layouts/blog', 'centered' ); ?>
		</main>
	</div>
	
<?php // standard with both sidebars
elseif ( $bloglayout == 'blog3')  : ?>

	<div id="primary" class="content-area col-lg-6 order-lg-2">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/layouts/blog', 'default' ); ?>
		</main>
	</div>
	<div class="col-lg-3 order-3 order-lg-1">        
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>

	<div class="col-lg-3 order-12">        
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>       
	</div>

<?php // standard blog left sidebar
elseif ( $bloglayout == 'blog2')  : ?>

	<div id="primary" class="content-area col-lg-8 order-lg-2">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/layouts/blog', 'default' ); ?>
		</main>
	</div>
	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>		
	
<?php // standard blog right sidebar
else : ?>

	<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/layouts/blog', 'default' ); ?>
		</main>
		
	</div>
	<div class="col-lg-4">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>
	
<?php endif; ?>


<?php
get_footer();