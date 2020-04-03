<?php
/**
 * Template part for displaying posts split into multiple pages
 * @package Moderne
*/

wp_link_pages( array(
	'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'moderne' ),
	'after'       => '</div>',
	'link_before' => '<span class="page-number">',
	'link_after'  => '</span>',
) );
							
?>