<?php
/**
 * For displaying breadcrumbs
 * @package Moderne
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}

$singlelayout = get_theme_mod( 'moderne_single_layout', 'single1' );
?>

<div class="col-lg-12">
	<div id="breadcrumbs-sidebar">	

<?php // alternating no sidebars
if ( $singlelayout == 'single3' || $singlelayout == 'single4' )  : ?>
	
			<div id="breadcrumbs" class="text-center">
				<?php dynamic_sidebar( 'breadcrumbs' ); ?>
			</div>
			
<?php else: ?>

			<div id="breadcrumbs">
				<?php dynamic_sidebar( 'breadcrumbs' ); ?>
			</div>

<?php endif; ?>			
			
			
			
	</div>
</div>