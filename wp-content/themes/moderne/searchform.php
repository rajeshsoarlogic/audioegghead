<?php
/**
 * Template for displaying search forms
 * @package Moderne
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'moderne' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search and Hit Enter', 'placeholder', 'moderne' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'moderne' ); ?></span><i class="fa fas fa-search"></i></button>
</form>
