<?php
/**
 * Template part for the blog navigation - previous and next
 * @package Moderne
*/

the_posts_pagination( array(
	'prev_text' => '<span class="prev"><span class="nav-arrow">&laquo;</span>' . esc_html__( ' Previous page', 'moderne' ) . '</span>',
	'next_text' => '<span class="next">' . esc_html__( 'Next page', 'moderne' ) . '<span class="nav-arrow">&raquo;</span></span>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'moderne' ) . ' </span>',
) );


?>