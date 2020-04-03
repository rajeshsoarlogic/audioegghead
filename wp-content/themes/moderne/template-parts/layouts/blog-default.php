<?php
/**
 * Template file for the default blog content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moderne
 */
?>

<?php if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>			

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		
			<?php if ( '' !== get_the_post_thumbnail() ) : ?>
				<div class="featured-image">						
					<?php if( is_sticky()  && esc_attr(get_theme_mod( 'moderne_show_featured_tag', true ) ) ) : 
					echo '<div class="ribbon-wrapper-featured d-none d-sm-block"><div class="ribbon-featured">', esc_html_e('Featured', 'moderne'), '</div></div>';
					endif; ?>
					
					<a href="<?php esc_url(the_permalink()); ?>">			
						<?php 
						if ( esc_attr(get_theme_mod( 'moderne_default_thumbnails', false )) ) :
							the_post_thumbnail( 'moderne-default' );  
						else :
							the_post_thumbnail( 'post-thumbnails' ); 
						endif;				
						?>
					</a>							
				</div>
			<?php endif; ?>	
			
			<header class="entry-header">	
					
				<?php // get the post meta information - each one can be disabled.
					if ( 'post' === get_post_type() ) {
						echo '<ul class="entry-meta">';
						if( esc_attr(get_theme_mod( 'moderne_show_post_format', true ) ) ) :
							moderne_post_format();
						endif;								
						if( is_multi_author() && esc_attr(get_theme_mod( 'moderne_show_post_author', true ) ) ) :	
							moderne_posted_by();
						endif;	
						if( esc_attr(get_theme_mod( 'moderne_show_post_date', true ) ) ) :
							moderne_posted_on();
						endif;	

						if( esc_attr(get_theme_mod( 'moderne_show_post_comments', true ) ) ) :	
							moderne_comments_count();
						endif;	
							echo '</ul>';
					} 							
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );							
			
				?>
																
			</header>
				

			
			<div class="entry-summary">
				<?php
				if ( esc_attr(get_theme_mod( 'moderne_use_excerpt', false )) ) :
					the_excerpt();
				else :
				
					the_content( sprintf(
					/* translators: %s: Name of current post */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moderne' ),
						get_the_title()
					) );
					
					get_template_part( 'template-parts/navigation/nav', 'paged' );
					
					endif;
				?>
			</div>

		</article>			
	<?php
	endwhile;
		get_template_part( 'template-parts/navigation/nav', 'blog' );
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>
