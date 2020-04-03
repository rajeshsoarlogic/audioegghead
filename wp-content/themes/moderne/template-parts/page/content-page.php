<?php
/**
 * Template part for displaying page content in page.php
 * @package Moderne
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header id="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		the_content();

		get_template_part( 'template-parts/navigation/nav', 'paged' );
		
		?>
	</div><!-- .entry-content -->

	<?php if ( esc_attr(get_theme_mod( 'blog_writer_pro_show_edit_link', false ) ) ) : ?>
		<ul class="entry-footer">
			<?php blog_writer_pro_edit_link(); ?>
		</ul><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
