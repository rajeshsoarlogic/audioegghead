<?php 
/**
 * Featured image slider, displayed on front page for static page and blog. Recommend that you create a
 * featured category where you can create only featured posts to display in your slides.
 *
 * Function excerpt = custom excerpt length for our slides
 * Function featured slider = Second is our structure for building our slides.
 */

function moderne_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
      return $excerpt;
} 

// Get just the first category name for our slides
function moderne_get_first_cat_name() {
	if ( 'post' === get_post_type() ) {
		$cats = get_the_category();
		echo '<div class="post-categories">' . esc_html( $cats[0]->name ) . '</div>';
	}
}

// Build the slides  
 if ( ! function_exists( 'moderne_owl_slider' ) ) :
	function moderne_owl_slider() {
		if ( ( is_home() || is_front_page() ) && get_theme_mod( 'moderne_show_slider' ) == 1 ) {
			
			$spSliderMobile 		= 2;
			$spSliderTablet 		= 3;
			$spSliderDesktop 		= 4;
			$spSliderClasses 		= ' ca-slider-mobile-' . $spSliderMobile . ' ca-slider-tablet-' . $spSliderTablet . ' ca-slider-desktop-' . $spSliderDesktop;	

			$slidesize = get_theme_mod( 'moderne_slider_width', '1150' );
			
			echo '<div class="container-fluid"><div class="row"><div class="col-lg-12"><div class="owl-slider-wrapper" style="max-width: ' . esc_attr($slidesize) . 'px;">';
			echo '<ul class="owlslider slides ca-slider js-ca-article-slider owl-carousel owl-theme ' . esc_attr($spSliderClasses) . '">';
			
			$slidecat = get_theme_mod( 'moderne_featured_cat' );
			$slidelimit = get_theme_mod( 'moderne_featured_limit', 4 );
			$slider_args = array(
				'cat' => $slidecat,
				'posts_per_page' => $slidelimit,
				'meta_query' => array(
					array(
						'key' => '_thumbnail_id',
						'compare' => 'EXISTS',
					),
				),
			);
			$query = new WP_Query( $slider_args );
			if ( $query->have_posts() ) :

				while ( $query->have_posts() ) : $query->the_post();
					if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) :
						echo '<li>';
					
							?>
							
							<div class="slide-image" style="background-image:url(<?php  the_post_thumbnail_url('moderne_slider'); ?>);"></div>
							<?php							
											
							echo '<div class="flex-caption"><div class="caption-inner1"><div class="caption-inner2">';
							 
							// get our first category
							if( esc_attr(get_theme_mod( 'moderne_show_slide_cat', true ) ) ) {
								moderne_get_first_cat_name();
							}
							 
							if ( get_the_title() != '' ) { echo '<a href="' . esc_url(get_permalink()) . '"><h2 class="entry-title">' . get_the_title() . '</h2></a>';
						}
						
						if( esc_attr(get_theme_mod( 'moderne_show_slide_excerpt', false ) ) ) {
							$slide_excerpt_size = get_theme_mod( 'slide_excerpt_size', 10 );
							$slide_excerpt = moderne_excerpt( esc_attr( $slide_excerpt_size) );
							echo '<div  class="slide-excerpt d-none d-sm-none d-md-block">' . esc_attr($slide_excerpt) . '</div>';
						}
						
							if( esc_attr(get_theme_mod( 'moderne_show_slide_readmore', true ) ) ) {			
								echo '<div class="read-more d-none d-lg-block"><a href="' . esc_url(get_permalink()) . '">' . esc_html__( 'Read More', 'moderne' ) . '</a></div>';
							}
							
							
							
							echo '</div></div></div><a href="' . esc_url(get_permalink()) . '"><div class="slide-overlay"></div></a></li>';
						endif;
					endwhile;
				wp_reset_query();
			endif;
			echo '</ul>';
			echo ' </div></div></div></div>';
		}
	}
endif;