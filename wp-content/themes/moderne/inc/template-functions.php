<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Moderne
 */

/**
 * Adds custom classes to the array of body classes.
 * @param array $classes Classes for the body element.
 * @return array
 */
function moderne_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'moderne_body_classes' );

// Add odd even classes to post article	
function moderne_post_class ( $classes ) {
   global $current_class;
   $classes[] = $current_class;
   $current_class = ($current_class == 'odd') ? 'even' : 'odd';
   return $classes;
}
add_filter ( 'post_class' , 'moderne_post_class' );
global $current_class;
$current_class = 'odd';





/**
 * Add CSS class to image navigation links.
 *
 * @wp-hook previous_image_link
 * @wp-hook next_image_link
 * @param   string $link Complete markup
 * @return  string
 */
add_filter( 'previous_image_link', 'moderne_img_link_class' );
add_filter( 'next_image_link',     'moderne_img_link_class' );

function moderne_img_link_class( $link )
{
    $class = 'next_image_link' === current_filter() ? 'button' : 'button';
    return str_replace( '<a ', "<a class='$class'", $link );
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function moderne_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'moderne_pingback_header' );


//	Move the read more link outside of the post summary paragraph	
add_filter( 'the_content_more_link', 'moderne_move_more_link' );
	function moderne_move_more_link() {
	return '<p class="more-link-wrapper"><a class="readmore" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Read More', 'moderne' ) . '</a></p>';
}
	
// Replaces the excerpt "Read More" text by a link
function moderne_excerpt_more($more) {
       global $post;
	return '&hellip;<p><a class="excerpt-readmore" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__( 'Read More', 'moderne' ) . '</a></p>';
}
add_filter('excerpt_more', 'moderne_excerpt_more');
	
	
// Custom excerpt size
function moderne_custom_excerpt_length( $length ) { 
	$moderne_excerpt_size = esc_attr(get_theme_mod( 'moderne_excerpt_size', '35' ));
	if ( is_admin() ) :
		return 55;		
	else: 	
		return $moderne_excerpt_size;
	endif;
	}
add_filter( 'excerpt_length', 'moderne_custom_excerpt_length', 999 );

	
// Display the related posts
if ( ! function_exists( 'moderne_related_posts' ) ) {

   function moderne_related_posts() {
      wp_reset_postdata();
      global $post;

      // Define shared post arguments
      $args = array(
         'no_found_rows'            => true,
         'update_post_meta_cache'   => false,
         'update_post_term_cache'   => false,
         'ignore_sticky_posts'      => 1,
         'orderby'               => 'rand',
         'post__not_in'          => array($post->ID),
         'posts_per_page'        => 3
      );
      // Related by categories
      if ( get_theme_mod('moderne_related_posts', 'categories') == 'categories' ) {

         $cats = get_post_meta($post->ID, 'related-posts', true);

         if ( !$cats ) {
            $cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
            $args['category__in'] = $cats;
         } else {
            $args['cat'] = $cats;
         }
      }
      // Related by tags
      if ( get_theme_mod('moderne_related_posts', 'categories') == 'tags' ) {

         $tags = get_post_meta($post->ID, 'related-posts', true);

         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }

      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }

}

