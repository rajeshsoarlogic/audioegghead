<?php
/**
 * Custom template tags for this theme
 * Eventually, some of the functionality here could be replaced by core features.
 * @package Moderne
 */
 
if ( ! function_exists( 'moderne_post_format' ) ) :
	function moderne_post_format() {
		
	$bloglayout = esc_attr(get_theme_mod( 'moderne_blog_layout', 'blog1' ));
 	if( esc_attr(get_theme_mod( 'moderne_show_post_format', true ) ) && $bloglayout !== 'blog14' ) :
		// Show the post format label
		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<li class="entry-format"><a href="%1$s">%2$s</a></li>',
				esc_url( get_post_format_link( $format ) ),
				esc_html( get_post_format_string( $format ) )
			);
		}
	endif;
	}
endif;
	
// Prints HTML with meta information for the current post-date/time.
if ( ! function_exists( 'moderne_posted_on' ) ) :
	function moderne_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			//esc_html_x( 'Posted %s', 'post date', 'moderne' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<li class="posted-on">' . $posted_on . '</li>'; // WPCS: XSS OK.
	}
endif;

// Prints HTML with meta information for the current author.
if ( ! function_exists( 'moderne_posted_by' ) ) :
	function moderne_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			//esc_html_x( 'by %s', 'post author', 'moderne' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<li class="byline"> ' . $byline . '</li>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'moderne_comments_count' ) ) :
	function moderne_comments_count() {
		// Add the comments link to the post meta info
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'moderne' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</li>';
		}
}

endif;


// Add categories to the post meta info
if ( ! function_exists( 'moderne_categories' ) ) :
function moderne_categories() {
		
	echo get_the_category_list(); // WPCS: XSS OK.
	}
endif;


if ( ! function_exists( 'moderne_entry_footer' ) ) :

	//Prints HTML with meta information for the tags
	function moderne_entry_footer() {
		
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {			
			// Get tag list
			if(get_the_tag_list()) {
				echo wp_kses_post(get_the_tag_list('<ul class="tag-list"><li>','</li><li>','</li></ul>'));
			}
		}	
	}
endif;

	/**
	 * Displays an optional post thumbnail.
	 * Wraps the post thumbnail in an anchor element on index views, or a div element when on single views.
	 */
if ( ! function_exists( 'moderne_post_thumbnail' ) ) :

	function moderne_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="featured-image">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="featured-image" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'featured-image', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

// Edit link function
if ( ! function_exists( 'moderne_edit_link' ) ) :
	function moderne_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'moderne' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);
	}
endif;


/**
 * Lets create a custom archive title set.
 * This will remove the labels from archive titles if the theme option is enabled from the customizer.
 * To show the labels like Category: or Tags: etc....uncheck the theme option.
 */
 if ( esc_attr(get_theme_mod( 'moderne_show_archive_labels', true ) ) ) :
 
if ( ! function_exists( 'moderne_archive_title' ) ) :

function moderne_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = sprintf( 
		/* translators: %s: Name of tag */
		esc_html__( 'Articles with %s', 'moderne' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( 
		/* translators: %s: Name of author */
		esc_html__( 'Articles by %s', 'moderne' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( 
		/* translators: %s: Name of year */
		esc_html__( 'Articles from: %s', 'moderne' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'moderne' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( 
		/* translators: %s: Name of month  */
		esc_html__( 'Articles from %s', 'moderne' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'moderne' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( 
		/* translators: %s: Name of day */
		esc_html__( 'Articles from %s', 'moderne' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'moderne' ) ) );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( 
		/* translators: %s: Name of archive title */
		esc_html__( 'Archives: %s', 'moderne' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( 
		/* translators: %s: Name of title  */
		esc_html__( '%1$s: %2$s', 'moderne' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'moderne' );
	}

	/**
	 * Filter the archive title.
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;
endif;

