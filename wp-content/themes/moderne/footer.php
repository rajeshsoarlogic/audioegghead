<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @package Moderne
 */

?>

		</div><!-- .row -->
	</div><!-- #content -->

	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>

	
	<footer id="site-footer">
		<div class="container site-info">
			<div class="row no-gutters">
				<div class="col-lg-6 copyright">
				
					<?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>
					<?php get_template_part( 'template-parts/navigation/nav', 'footer' ); ?>	
					
					<?php esc_html_e('Copyright &copy;', 'moderne'); ?> 
					<?php echo date_i18n( __( 'Y', 'moderne' ) ); // WPCS: XSS OK ?>
					<?php echo esc_html(get_theme_mod( 'moderne_copyright' )); ?>. <?php esc_html_e('All rights reserved.', 'moderne'); ?>
				</div>
				
				<div  class="col-lg-6 footer-social">
					<?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
				</div>

			</div>
		</div>
	</footer>
	
</div>

<?php wp_footer(); ?>

</body>
</html>