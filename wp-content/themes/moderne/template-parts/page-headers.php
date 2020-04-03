<?php
/**
 * Template file for blog headers
 * @package Moderne
 */
?>

<header id="page-header" class="col-lg-12">	
	
<?php if ( is_home() || is_front_page() ) : ?>	
	<?php if( esc_attr(get_theme_mod( 'moderne_show_blog_heading', false ) ) ) : ?>
			
				<h1 class="page-title"><?php echo esc_html( $moderne_blog_title ); ?></h1>						
				<p id="blog-description" class="lead"><?php echo esc_html( $moderne_blog_intro ); ?></p>			

	<?php endif; ?>
<?php elseif (is_archive() ) : ?>

		<?php
		 if ( esc_attr(get_theme_mod( 'moderne_show_archive_labels', true ) ) ) :
			moderne_archive_title( '<h1 class="page-title">', '</h1>' );
		else: 
			the_archive_title( '<h1 class="page-title">', '</h1>' );
		endif;		
			the_archive_description( '<div id="category-description" class="lead">', '</div>' );
		?>

<?php else : ?>


	<h2 class="page-title screen-reader-text"><?php esc_html_e( 'Posts', 'moderne' ); ?></h2>

<?php endif; ?>

</header>
<div class="w-100"></div>