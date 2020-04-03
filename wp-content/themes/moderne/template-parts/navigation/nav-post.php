<?php
/**
 * Template part for displaying post navigation - next and previous posts
 * @package Moderne
*/

the_post_navigation( array(
	'next_text' => '<p class="meta-nav clear" aria-hidden="true">' . esc_html__( 'Next', 'moderne' ) . '<span class="nav-arrow-next">&raquo;</span></p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Next post:', 'moderne' ) . '</p> ' .
		'<p class="post-title">%title</p>',
	'prev_text' => '<p class="meta-nav clear" aria-hidden="true"><span class="nav-arrow-prev">&laquo;</span>' . esc_html__( 'Previous', 'moderne' ) . '</p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Previous post:', 'moderne' ) . '</p> ' .
		'<p class="post-title">%title</p>',
) );	
							
?>