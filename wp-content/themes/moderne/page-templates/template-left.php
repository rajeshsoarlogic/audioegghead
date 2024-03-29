<?php
/**
 * Template Name: Left Column
 * @package Moderne
*/

get_header(); ?>

<div id="primary" class="content-area col-lg-8 order-lg-2">
		<main id="main" class="site-main ">	
			<?php while ( have_posts() ) : the_post(); 
			get_template_part( 'template-parts/page/content', 'page' ); 
			if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;
			endwhile; ?>
		</main>
</div>

<div class="col-lg-4 order-4 order-lg-1">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
</div>

<?php 
get_footer();