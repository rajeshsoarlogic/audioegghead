<?php
/**
 * Bottom sidebar group
 * @package Moderne
*/

if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )		
	&& ! is_active_sidebar( 'bottom4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
   
<div id="bottom-sidebar">

<?php if( esc_attr(get_theme_mod( 'moderne_featured_bottom_full', false ) ) ) : ?>  
<aside class="widget-area container-fluid">
		<div class="row no-gutters">	
<?php else : ?>
<aside class="widget-area container">
		<div class="row">
<?php endif; ?>
		   
				<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
					<div id="bottom1" <?php moderne_bottom_group(); ?>>
						<?php dynamic_sidebar( 'bottom1' ); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'bottom2' ) ) : ?>      
					<div id="bottom2" <?php moderne_bottom_group(); ?>>
						<?php dynamic_sidebar( 'bottom2' ); ?>
					</div>         
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'bottom3' ) ) : ?>        
					<div id="bottom3" <?php moderne_bottom_group(); ?>>
						<?php dynamic_sidebar( 'bottom3' ); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'bottom4' ) ) : ?>        
					<div id="bottom4" <?php moderne_bottom_group(); ?>>
						<?php dynamic_sidebar( 'bottom4' ); ?>
					</div>
				<?php endif; ?>		
			</div>

	</aside>         
</div>