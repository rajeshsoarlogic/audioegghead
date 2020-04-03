<?php 
/*
 * Header top bar
 * @package Moderne
 */
?>


<div class="container-fluid">
	<div class="row align-items-center">
			<div class="col-lg-6">
				<div id="topbar-left">
					<?php if( esc_attr(get_theme_mod( 'moderne_show_topbar_left', false ) ) ) :
					  get_template_part( 'template-parts/navigation/nav', 'social' ); 
					 endif; ?>			
				</div>
			</div>
			<div class="col-lg-6">
				<div id="topbar-right">			
				<?php if( esc_attr(get_theme_mod( 'moderne_show_topbar_right', false ) ) ) :					
					get_search_form();
					endif; ?> 	
				</div>
			</div>			
	</div>
</div>