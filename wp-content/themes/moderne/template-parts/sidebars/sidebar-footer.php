<?php
/**
 * For the Footer Sidebar
 * @package Moderne
*/

if (   ! is_active_sidebar( 'footer'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>


<aside id="footer-sidebar" class="widget-area">		             
	<?php dynamic_sidebar( 'footer' ); ?> 	
</aside> 