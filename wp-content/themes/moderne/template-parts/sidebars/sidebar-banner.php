<?php
/**
 * For displaying banner
 * @package Moderne
*/

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
 
?>
	
<?php if ( is_active_sidebar( 'banner' ) ) : ?>
<div id="banner-sidebar">
	<div id="banner" class="widget-area">
			<?php dynamic_sidebar( 'banner' ); ?>
	</div>
</div>

<?php endif; ?>