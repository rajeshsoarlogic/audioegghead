<?php
/**
 * The default template for displaying the full post with title above featured image
 * @package Moderne
*/
?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'inset-top' ); ?>

<?php
while ( have_posts() ) : the_post(); ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header post-width">		
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );									
			if ( 'post' === get_post_type()) {
			echo '<ul class="entry-meta">';
				moderne_post_format();			
				moderne_posted_on();
				moderne_posted_by();	
				
				moderne_comments_count();	
				if ( esc_attr(get_theme_mod( 'moderne_show_edit_link', false ) ) ) :				
					moderne_edit_link();
				endif;
			echo '</ul>';
			moderne_categories();
		};
		?>												
	</header>	
	<?php	if ( '' !== get_the_post_thumbnail() && esc_attr(get_theme_mod( 'moderne_show_single_featured', 1 ) ) ) :  
	echo '<div id="featured-image-shadow"><div id="featured-image">';		
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));		
	echo '</div></div>';			
	endif; 
	?>	
	<div class="entry-content post-width">
		<?php	the_content();?>	
		
		
	</div>
	<div id="entry-footer" class="post-width">
	<?php moderne_entry_footer(); ?>
	</div>
	
	<?php if ( get_the_author_meta( 'description' ) && esc_attr(get_theme_mod( 'moderne_show_author_bio', true ) ) ) : ?>		
		
			<?php get_template_part( 'author-bio' ); ?>
		
	<?php endif; ?>

</article>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'inset-bottom' ); ?>

<div class="post-width">
<?php
	// Related Posts.
	if( esc_attr(get_theme_mod( 'moderne_show_related_posts', true ) ) ) :
	 get_template_part( 'inc/related-posts' );
	endif;
?>
					  


<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>

<?php 	// single post navigation
	if ( esc_attr(get_theme_mod( 'moderne_show_post_nav', true )) ) :
		get_template_part( 'template-parts/navigation/nav', 'post' );
	endif;
?>	
</div>