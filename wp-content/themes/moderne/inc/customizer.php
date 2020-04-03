<?php
/**
 * Blog Writer Pro Theme Customizer
 * @package Moderne
 */

 
 
// Add postMessage support for site title and description for the Theme Customizer.
function moderne_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control('background_color')->label = esc_html__( 'Page Body Background', 'moderne' );
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#site-title a',
			'render_callback' => 'moderne_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '#site-description',
			'render_callback' => 'moderne_customize_partial_blogdescription',
		) );
	}


 /**
 * Control type.
 * For Upsell content in the customizer
 */
if ( ! class_exists( 'Moderne_Customize_Static_Text_Control' ) ){
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class Moderne_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="moderne-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="moderne-description moderne-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('Moderne Pro', 'moderne') ?></h1>
			
			<p><?php esc_html_e('If you decide to upgrade to the pro version of this theme, use this discount code on checkout.','moderne'); ?></p>	
			<div id="promotion-header"><p class="main-title"><?php esc_html_e('Upgrade to Pro (Save 5%)', 'moderne') ?><br><?php esc_html_e('Use Code:', 'moderne') ?> <strong><?php esc_html_e('SAVEFIVE', 'moderne') ?></strong></p>
			<p><a href="https://www.bloggingthemestyles.com/wordpress-themes/moderne-pro/" target="_blank" class="button button-primary"><?php esc_html_e('Get the Pro - Save 5%', 'moderne') ?></a></p></div>

			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'moderne') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 15 Blog Styles', 'moderne')?></li>
				<li><?php esc_html_e('&bull; 13 Dynamic Sidebar Positions', 'moderne')?></li>
				<li><?php esc_html_e('&bull; 2 Header Styles', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'moderne')?></li>
				<li><?php esc_html_e('&bull; An Author Info Widget', 'moderne')?></li>
				<li><?php esc_html_e('&bull; An Image Box Widget with Overlay Caption', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Custom MailChimp Styles for an Optional Plugin', 'moderne')?></li>
				<li><?php esc_html_e('&bull; 1 Click Demo Content Import', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Add More Google Fonts', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Typography Options', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Featured Image Captions for Posts', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Blog Home Page with Customizable Title and Intro', 'moderne')?></li>
				<li><?php esc_html_e('&bull; Premium Support', 'moderne')?></li>
			</ul>
			
			<?php
			endif;
		}
	}
}
	
 // This loads categories for our slider dropdown select
function moderne_cats() {
	$cats = array();
	$cats[0] = 'All';

	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}
	return $cats;
}

// SECTION - UPGRADE
    $wp_customize->add_section( 'moderne_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'moderne' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'moderne_upgrade_pro', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Moderne_Customize_Static_Text_Control( $wp_customize, 'moderne_upgrade_pro', array(
			'label'	=> esc_html__('Get The Pro Version:','moderne'),
			'section'	=> 'moderne_upgrade',
			'description' => array('')
		) ) );	
		
// Begin theme settings
// ADD TO SITE IDENTITY	
	// Show site title
	$wp_customize->add_setting( 'moderne_show_site_title',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_site_title', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Site Title', 'moderne' ),
		'section'  => 'title_tagline',
	) );		
		
	// Show site description
	$wp_customize->add_setting( 'moderne_show_site_desc',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_site_desc', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Site Description', 'moderne' ),
		'section'  => 'title_tagline',
	) );		

// Site Title Colour
 	$wp_customize->add_setting( 'moderne_sitetitle', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'moderne' ),
		'section' => 'title_tagline',
		'settings'   => 'moderne_sitetitle',
	) ) );
	
// Site Title tagline
 	$wp_customize->add_setting( 'moderne_site_tagline', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_site_tagline', array(
		'label'   => esc_html__( 'Site Tagline Colour', 'moderne' ),
		'section' => 'title_tagline',
		'settings'   => 'moderne_site_tagline',
	) ) );	
	
    // header size
    $wp_customize->add_setting( 'moderne_header_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '28',
        ) );
    $wp_customize->add_control( 'moderne_header_size', array(
        'type'        => 'number',
        'section'     => 'title_tagline',
        'label'       => esc_html__('Header Size', 'moderne'),
		'description' => esc_html__('You can change the height of your site header in increments of 1px. The default is 28, but you can go as high as 50.', 'moderne'), 
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );	
	
// SECTION - THEME OPTIONS
	$wp_customize->add_section( 'moderne_theme_options', array(
		'title'    => __( 'Theme Options', 'moderne' ),
		'priority' => 20, 
	) );	

	
    // Boxed layout size
    $wp_customize->add_setting( 'moderne_boxed_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '2560',
        ) );
    $wp_customize->add_control( 'moderne_boxed_size', array(
        'type'        => 'number',
        'section'     => 'moderne_theme_options',
        'label'       => __('Boxed Layout Width', 'moderne'),
		'description' => __('Change the max-width for your site content for a boxed layout. You can go from 1300px to 2560px (for really wide screens). Using the up/down arrows will change the size in increments of 100px. Default is size 2560', 'moderne'), 
        'input_attrs' => array(
            'min'   => 1300,
            'max'   => 2560,
            'step'  => 100,
        ),
    ) );	
	
	// Setting group for blog layout
	$wp_customize->add_setting( 'moderne_blog_layout', array(
		'default' => 'blog1',
		'sanitize_callback' => 'moderne_sanitize_select',
	) );  
	$wp_customize->add_control( 'moderne_blog_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Layout', 'moderne' ),
		  'section' => 'moderne_theme_options',
		  'choices' => array(	
				'blog1' => esc_html__( 'Default With Right Sidebar', 'moderne' ),	  
				'blog2' => esc_html__( 'Default With Left Sidebar', 'moderne' ),	
				'blog3' => esc_html__( 'Default With Left &amp; Right Sidebars', 'moderne' ),								
				'blog13' => esc_html__( 'Centered With No Sidebar', 'moderne' ),			
		) ) );	

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'moderne_single_layout', array(
		'default' => 'single1',
		'sanitize_callback' => 'moderne_sanitize_select',
	) );  
	$wp_customize->add_control( 'moderne_single_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Full Post Style', 'moderne' ),
		  'section' => 'moderne_theme_options',
		  'choices' => array(	
				'single1' => esc_html__( 'Single With Right Sidebar', 'moderne' ),	 
				'single2' => esc_html__( 'Single With Left Sidebar', 'moderne' ), 
				'single3' => esc_html__( 'Single With No Sidebars', 'moderne' ),
				'single4' => esc_html__( 'Single With Featured Image Above Title', 'moderne' ),
		) ) );	
	
	
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'moderne_use_excerpt',  array(
		  'default' => false,
		  'sanitize_callback' => 'moderne_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'moderne_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'moderne' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'moderne_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
        ) );
    $wp_customize->add_control( 'moderne_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'moderne_theme_options',
        'label'       => esc_html__('Excerpt Size', 'moderne'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'moderne'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),
    ) );	  

	// Use Font Awesome 
	$wp_customize->add_setting( 'moderne_enable_fontawesome',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_enable_fontawesome', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Font Awesome Icons', 'moderne' ),
		'description' => esc_html__( 'You can disable Font Awesome icons from the theme if you are using a plugin instead.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// Show featured label
	$wp_customize->add_setting( 'moderne_show_featured_tag',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_featured_tag', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Tag', 'moderne' ),
		'description' => esc_html__( 'This lets you show the featured tag in the post meta info. Note: It does not show on the Photowall blog style.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
		
	// Show post date
	$wp_customize->add_setting( 'moderne_show_post_date',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_post_date', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Date', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post date in the meta info group for the summary.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );	
	
	// Show post author
	$wp_customize->add_setting( 'moderne_show_post_author',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_post_author', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Author', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post author in the meta info group for the summary.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );	
	
	// Show post comments
	$wp_customize->add_setting( 'moderne_show_post_comments',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_post_comments', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Comment Link', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post comment link in the meta info group for the summary.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );		
	
	// show hide edit link
	$wp_customize->add_setting( 'moderne_show_edit_link',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_edit_link', array(
		'type'     => 'checkbox',
		'label'    => __( 'Show the Edit Link', 'moderne' ),
		'description' => __( 'This lets you show or hide the front-end edit link.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// Show author bio section
	$wp_customize->add_setting( 'moderne_show_single_featured',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_single_featured', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Featured Image', 'moderne' ),
		'description' => esc_html__( 'This lets you show the featured image also on the full post view.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );	
	
	// Show full post nav
	$wp_customize->add_setting( 'moderne_show_post_nav',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Navigation', 'moderne' ),
		'description' => esc_html__( 'This lets you show the Next and Previous post navigation on the full post view.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );		

	// Show related posts section
	$wp_customize->add_setting( 'moderne_show_author_bio',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_author_bio', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Author Bio Section', 'moderne' ),
		'description' => esc_html__( 'This lets you show the author biography section in the full article view.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// Show related posts section
	$wp_customize->add_setting( 'moderne_show_related_posts',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_related_posts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Related Posts Section', 'moderne' ),
		'description' => esc_html__( 'This lets you show the related posts section on the full article view.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// Related Posts by
   $wp_customize->add_setting('moderne_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'moderne_sanitize_select'
   ));

   $wp_customize->add_control('moderne_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Displayed From:', 'moderne'),
      'section' => 'moderne_theme_options',
      'settings' => 'moderne_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'moderne'),
         'tags' => esc_html__('Related Posts By Tags', 'moderne')
      )
   ));		
	
	// Enable attachment comments
	$wp_customize->add_setting( 'moderne_show_attachment_comments',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_attachment_comments', array(
		'type'     => 'checkbox',
		'label'    => __( 'Show Image Attachment Page Comments', 'moderne' ),
		'description' => __( 'If you are using a WP gallery shortcode and want to showcase your images on the custom attachment page, you can enable or disable comments for images.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );	

	// hide image shadow
	$wp_customize->add_setting( 'moderne_show_shadow',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_shadow', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Image Drop Shadow', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// hide content and widget shadow
	$wp_customize->add_setting( 'moderne_show_content_shadow',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_content_shadow', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show or hide the content, left sidebar, and right sidebar widget outer shadow.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
	
	// hide widget title shadow
	$wp_customize->add_setting( 'moderne_show_widget_title_shadow',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_widget_title_shadow', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the widget title bottom Shadow for the left and right sidebar widgets.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );	

	// show hide archive heading labels
	$wp_customize->add_setting( 'moderne_show_archive_labels',	array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_archive_labels', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show or hide the archive heading labels like Category:  or Tags: that show just before the names. Default is enabled to hide the label.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );		
	
	// Show dropcaps
	$wp_customize->add_setting( 'moderne_show_dropcap',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_show_dropcap', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Full Post Dropcap', 'moderne' ),
		'description' => esc_html__( 'This lets you show the drop cap style on the first letter of the first paragraph.', 'moderne' ),
		'section'  => 'moderne_theme_options',
	) );
		
	// Copyright
	$wp_customize->add_setting( 'moderne_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'moderne_copyright', array(
		'settings' => 'moderne_copyright',
		'label'    => __( 'Your Copyright Name', 'moderne' ),
		'section'  => 'moderne_theme_options',		
		'type'     => 'text',
	) ); 
	

// SECTION - TOP BAR		
	$wp_customize->add_section('moderne_top_bar',array(
		'title'     => __('Top Bar Options', 'moderne'),
		'priority' => 21,
	));

	// setting to show top bar
	$wp_customize->add_setting('moderne_show_topbar',array(
		'default'     => true,
		'sanitize_callback'	=> 'moderne_sanitize_checkbox'
	));
	$wp_customize->add_control( 'moderne_show_topbar', array(
		'section'	=> 'moderne_top_bar',
	    'label' => __('Show Top Bar','moderne'),
		'type'	 => 'checkbox'
	) );

	$wp_customize->add_setting('moderne_show_topbar_left',array(
		'default'     => false,
		'sanitize_callback'	=> 'moderne_sanitize_checkbox'
	));
	$wp_customize->add_control( 'moderne_show_topbar_left', array(
		'section'	=> 'moderne_top_bar',
	    'label' => __('Show Top Bar Left','moderne'),
		'type'	 => 'checkbox'
	) );
	
	// setting to show top bar social
	$wp_customize->add_setting('moderne_show_topbar_right',array(
		'default'     => false,
		'sanitize_callback'	=> 'moderne_sanitize_checkbox'
	));
	$wp_customize->add_control( 'moderne_show_topbar_right', array(
		'section'	=> 'moderne_top_bar',
	    'label' => __('Show Top Bar Search','moderne'),
		'type'	 => 'checkbox'
	) );	
	
// top bar background
 	$wp_customize->add_setting( 'moderne_topbar_bg', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_topbar_bg', array(
		'label'   => esc_html__( 'Top Bar Background', 'moderne' ),
		'section' => 'moderne_top_bar',
		'settings'   => 'moderne_topbar_bg',
	) ) );	
	
// SECTION - THUMBNAILS
	$wp_customize->add_section( 'moderne_thumbnail_options' , array(
		'title'      => esc_html__( 'Thumbnail Options', 'moderne' ),
		'priority' => 32,
	) );
	
	// Enable default thumbnails
	$wp_customize->add_setting( 'moderne_default_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_default_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Default Style Blog Thumbnails', 'moderne' ),
		'description' => esc_html__( 'This will create featured images for the blog 1 and 2 styled layouts. Size = 760x440 pixels.', 'moderne' ),
		'section'  => 'moderne_thumbnail_options',
	) );	

	// Enable Centered thumbnails
	$wp_customize->add_setting( 'moderne_centered_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_centered_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Centered Style Blog Thumbnails', 'moderne' ),
		'description' => esc_html__( 'This will create featured images for the centered styled layouts. Size 1130x600 pixels. Best for really large photo uploads.', 'moderne' ),
		'section'  => 'moderne_thumbnail_options',
	) );	

	// Enable full post thumbnails
	$wp_customize->add_setting( 'moderne_singlepost_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_singlepost_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Full Post Thumbnail Creation', 'moderne' ),
		'description' => __( 'When enabled, a custom thumbnail will be created for the Single Style 5 featured image. (Images will be 1130x450 pixels.', 'moderne' ),
		'section'  => 'moderne_thumbnail_options',
	) );	
	
	// Enable related post thumbnails
	$wp_customize->add_setting( 'moderne_related_post_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_related_post_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Related Post Thumbnail Creation', 'moderne' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the related posts sections on the full post view.', 'moderne' ),
		'section'  => 'moderne_thumbnail_options',
	) );		

	// Enable widget gallery thumbnails
	$wp_customize->add_setting( 'moderne_widget_gallery_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'moderne_widget_gallery_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Widget Gallery Thumbnails', 'moderne' ),
		'description' => esc_html__( 'This will create smaller thumbnails when creating galleries with the Gallery Widget by WordPress. Size will be 100x100 pixels.', 'moderne' ),
		'section'  => 'moderne_thumbnail_options',
	) );	

	

// ADD TO COLOUR SECTION	
	
// page  background
 	$wp_customize->add_setting( 'moderne_page_bg', array(
		'default'        => '#f5f2ed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_page_bg', array(
		'label'   => esc_html__( 'Page Background', 'moderne' ),	
		'description' => esc_html__( 'This is the page container background colour. Default colour is a light tan.', 'moderne' ),		
		'settings'   => 'moderne_page_bg',
		'section' => 'colors',
	) ) );
	
// content  background
 	$wp_customize->add_setting( 'moderne_content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_content_bg', array(
		'label'   => esc_html__( 'Content and Widget Backgrounds', 'moderne' ),	
		'description' => esc_html__( 'This is the content, left sidebar, and right sidebar widget background colour. Default is white.', 'moderne' ),		
		'settings'   => 'moderne_content_bg',
		'section' => 'colors',
	) ) );	
	
// content title  borders
 	$wp_customize->add_setting( 'moderne_content_title_borders', array(
		'default'        => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_content_title_borders', array(
		'label'   => esc_html__( 'Content Area Borders', 'moderne' ),	
		'description' => esc_html__( 'This is the content area borders page title left and right lines.', 'moderne' ),		
		'settings'   => 'moderne_content_title_borders',
		'section' => 'colors',
	) ) );		
	
// page content body text
 	$wp_customize->add_setting( 'moderne_body_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_body_text', array(
		'label'   => esc_html__( 'Page Content Body Text', 'moderne' ),		
		'settings'   => 'moderne_body_text',
		'section' => 'colors',
	) ) );
	
// breadcrumbs text
 	$wp_customize->add_setting( 'moderne_breadcrumbs_text', array(
		'default'        => '#8e8e8e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_breadcrumbs_text', array(
		'label'   => esc_html__( 'Breadcrumbs Text', 'moderne' ),		
		'settings'   => 'moderne_breadcrumbs_text',
		'section' => 'colors',
	) ) );
	
// headings
 	$wp_customize->add_setting( 'moderne_headings', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_headings', array(
		'label'   => esc_html__( 'Headings Colour', 'moderne' ),		
		'settings'   => 'moderne_headings',
		'section' => 'colors',
	) ) );	

	// dropcap colour
	$wp_customize->add_setting( 'moderne_dropcap_colour', array(
		'default'        => '#e4c9c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_dropcap_colour', array(
		'label'   => esc_html__( 'Dropcap Letter Colour', 'moderne' ),
		'section' => 'colors',
		'settings'   => 'moderne_dropcap_colour',
	) ) );	
			
//  widget title background
 	$wp_customize->add_setting( 'moderne_widget_title_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_widget_title_bg', array(
		'label'   => esc_html__( 'Widget Title Background', 'moderne' ),	
		'description' => esc_html__( 'This will change the background colour on the widget titles  for the left and right sidebar widgets.', 'moderne' ),		
		'settings'   => 'moderne_widget_title_bg',
		'section' => 'colors',
	) ) );
	
// widget title
 	$wp_customize->add_setting( 'moderne_widget_title', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_widget_title', array(
		'label'   => esc_html__( 'Widget Title', 'moderne' ),	
		'description' => esc_html__( 'This will change the colour for your widget title on the left and right sidebar widgets.', 'moderne' ),		
		'settings'   => 'moderne_widget_title',
		'section' => 'colors',
	) ) );
	
// meta info hover
 	$wp_customize->add_setting( 'moderne_meta_hover', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_meta_hover', array(
		'label'   => esc_html__( 'Post Meta Info Hover Links', 'moderne' ),		
		'settings'   => 'moderne_meta_hover',
		'section' => 'colors',
	) ) );	
	
// links
 	$wp_customize->add_setting( 'moderne_links', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_links', array(
		'label'   => esc_html__( 'Link Colour', 'moderne' ),		
		'settings'   => 'moderne_links',
		'section' => 'colors',
	) ) );	

// links visited
 	$wp_customize->add_setting( 'moderne_visited_links', array(
		'default'        => '#eab5a7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_visited_links', array(
		'label'   => esc_html__( 'Link Visited Colour', 'moderne' ),		
		'settings'   => 'moderne_visited_links',
		'section' => 'colors',
	) ) );	

// links focus active hover
 	$wp_customize->add_setting( 'moderne_hover_links', array(
		'default'        => '#7094d0',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_hover_links', array(
		'label'   => esc_html__( 'Link Active &amp; Hover Colour', 'moderne' ),		
		'settings'   => 'moderne_hover_links',
		'section' => 'colors',
	) ) );	

// post categories background
 	$wp_customize->add_setting( 'moderne_post_categories_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_post_categories_bg', array(
		'label'   => esc_html__( 'Post Category &amp; Post Tags Background', 'moderne' ),		
		'settings'   => 'moderne_post_categories_bg',
		'section' => 'colors',
	) ) );	
	
// post categories label
 	$wp_customize->add_setting( 'moderne_post_categories_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_post_categories_label', array(
		'label'   => esc_html__( 'Post Category &amp; Post Tags Label', 'moderne' ),		
		'settings'   => 'moderne_post_categories_label',
		'section' => 'colors',
	) ) );	
	
// post categories hover background
 	$wp_customize->add_setting( 'moderne_post_categories_hbg', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_post_categories_hbg', array(
		'label'   => esc_html__( 'Post Category &amp; Post Tags Hover Background', 'moderne' ),		
		'settings'   => 'moderne_post_categories_hbg',
		'section' => 'colors',
	) ) );		

// post categories hover label
 	$wp_customize->add_setting( 'moderne_post_categories_hlabel', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_post_categories_hlabel', array(
		'label'   => esc_html__( 'Post Category &amp; Post Tags Hover Label', 'moderne' ),		
		'settings'   => 'moderne_post_categories_hlabel',
		'section' => 'colors',
	) ) );	
	
// featured background
 	$wp_customize->add_setting( 'moderne_featured_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_featured_bg', array(
		'label'   => esc_html__( 'Featured Label Background', 'moderne' ),		
		'settings'   => 'moderne_featured_bg',
		'section' => 'colors',
	) ) );	
	
// featured text
 	$wp_customize->add_setting( 'moderne_featured_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_featured_text', array(
		'label'   => esc_html__( 'Featured Label', 'moderne' ),		
		'settings'   => 'moderne_featured_text',
		'section' => 'colors',
	) ) );		
	
// tag cloud hover background
 	$wp_customize->add_setting( 'moderne_tag_hover_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_tag_hover_bg', array(
		'label'   => esc_html__( 'Tags Background Hover', 'moderne' ),		
		'settings'   => 'moderne_tag_hover_bg',
		'section' => 'colors',
	) ) );		
	
// tag cloud hover text
 	$wp_customize->add_setting( 'moderne_tag_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_tag_hover_text', array(
		'label'   => esc_html__( 'Tags Text Hover', 'moderne' ),		
		'settings'   => 'moderne_tag_hover_text',
		'section' => 'colors',
	) ) );		

// about widget social icon
 	$wp_customize->add_setting( 'moderne_about_social_icon', array(
		'default'        => '#848484',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_about_social_icon', array(
		'label'   => esc_html__( 'About Author Social Icon', 'moderne' ),		
		'settings'   => 'moderne_about_social_icon',
		'section' => 'colors',
	) ) );		
	
// about widget hover social icon
 	$wp_customize->add_setting( 'moderne_about_social_hover_icon', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_about_social_hover_icon', array(
		'label'   => esc_html__( 'About Author Social Hover Icon', 'moderne' ),		
		'settings'   => 'moderne_about_social_hover_icon',
		'section' => 'colors',
	) ) );	
	
// mobile menu toggle button
 	$wp_customize->add_setting( 'moderne_mobile_toggle_button', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_mobile_toggle_button', array(
		'label'   => esc_html__( 'Mobile Toggle Button', 'moderne' ),		
		'settings'   => 'moderne_mobile_toggle_button',
		'section' => 'colors',
	) ) );			
	
// mobile menu toggle label
 	$wp_customize->add_setting( 'moderne_mobile_toggle_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_mobile_toggle_label', array(
		'label'   => esc_html__( 'Mobile Toggle Label', 'moderne' ),		
		'settings'   => 'moderne_mobile_toggle_label',
		'section' => 'colors',
	) ) );		
	
// mobile menu toggle button on
 	$wp_customize->add_setting( 'moderne_mobile_toggle_button_on', array(
		'default'        => '#0f0f0f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_mobile_toggle_button_on', array(
		'label'   => esc_html__( 'Mobile Toggle Button On', 'moderne' ),		
		'settings'   => 'moderne_mobile_toggle_button_on',
		'section' => 'colors',
	) ) );		
	
// mobile menu toggle label on
 	$wp_customize->add_setting( 'moderne_mobile_toggle_label_on', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_mobile_toggle_label_on', array(
		'label'   => esc_html__( 'Mobile Toggle Label On', 'moderne' ),		
		'settings'   => 'moderne_mobile_toggle_label_on',
		'section' => 'colors',
	) ) );		
	
// mobile menu lines
 	$wp_customize->add_setting( 'moderne_mobile_menu_lines', array(
		'default'        => '#d1d1d1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_mobile_menu_lines', array(
		'label'   => esc_html__( 'Mobile Menu Lines', 'moderne' ),		
		'settings'   => 'moderne_mobile_menu_lines',
		'section' => 'colors',
	) ) );		

// submenu toggle arrow hover
 	$wp_customize->add_setting( 'moderne_submenu_dropdown_arrow_hover', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_submenu_dropdown_arrow_hover', array(
		'label'   => esc_html__( 'Mobile Submenu Toggle Arrow Hover Colour', 'moderne' ),		
		'settings'   => 'moderne_submenu_dropdown_arrow_hover',
		'section' => 'colors',
	) ) );	
	
// main menu wrapper top bottom lines
 	$wp_customize->add_setting( 'moderne_menu_links', array(
		'default'        => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_menu_links', array(
		'label'   => esc_html__( 'Main Menu Top &amp; Bottom Lines', 'moderne' ),		
		'settings'   => 'moderne_menu_links',
		'section' => 'colors',
	) ) );	
	
// menu links
 	$wp_customize->add_setting( 'moderne_menu_links', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_menu_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'moderne' ),		
		'settings'   => 'moderne_menu_links',
		'section' => 'colors',
	) ) );		
	
// menu hover links
 	$wp_customize->add_setting( 'moderne_menu_hover_links', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_menu_hover_links', array(
		'label'   => esc_html__( 'Main Menu Hover Links', 'moderne' ),		
		'settings'   => 'moderne_menu_hover_links',
		'section' => 'colors',
	) ) );		
	
// submenu top border
 	$wp_customize->add_setting( 'moderne_submenu_top_border', array(
		'default'        => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_submenu_top_border', array(
		'label'   => esc_html__( 'Submenu Top Border', 'moderne' ),		
		'settings'   => 'moderne_submenu_top_border',
		'section' => 'colors',
	) ) );		
	
// submenu background
 	$wp_customize->add_setting( 'moderne_submenu_dropdown_bg', array(
		'default'        => '#f5f2ed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_submenu_dropdown_bg', array(
		'label'   => esc_html__( 'Submenu Background', 'moderne' ),		
		'settings'   => 'moderne_submenu_dropdown_bg',
		'section' => 'colors',
	) ) );	
	
// submenu hover background
 	$wp_customize->add_setting( 'moderne_submenu_bg_hover', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_submenu_bg_hover', array(
		'label'   => esc_html__( 'Submenu Link Background Hover', 'moderne' ),		
		'settings'   => 'moderne_submenu_bg_hover',
		'section' => 'colors',
	) ) );	
	
// submenu hover link
 	$wp_customize->add_setting( 'moderne_submenu_link_hover', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_submenu_link_hover', array(
		'label'   => esc_html__( 'Submenu Link Hover', 'moderne' ),		
		'settings'   => 'moderne_submenu_link_hover',
		'section' => 'colors',
	) ) );	

	
// topbar social icon
 	$wp_customize->add_setting( 'moderne_topbar_social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_topbar_social_icon', array(
		'label'   => esc_html__( 'Topbar Social Icon Colour', 'moderne' ),		
		'settings'   => 'moderne_topbar_social_icon',
		'section' => 'colors',
	) ) );		
	
// full post nav background
 	$wp_customize->add_setting( 'moderne_single_nav_bg', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_single_nav_bg', array(
		'label'   => esc_html__( 'Full Post Navigation Background', 'moderne' ),		
		'settings'   => 'moderne_single_nav_bg',
		'section' => 'colors',
	) ) );	

// full post nav text
 	$wp_customize->add_setting( 'moderne_single_nav_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_single_nav_text', array(
		'label'   => esc_html__( 'Full Post Navigation Text', 'moderne' ),		
		'settings'   => 'moderne_single_nav_text',
		'section' => 'colors',
	) ) );	

// bottom sidebar background
 	$wp_customize->add_setting( 'moderne_bottom_sidebar_bg', array(
		'default'        => '#f5f2ed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_bottom_sidebar_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Background', 'moderne' ),		
		'settings'   => 'moderne_bottom_sidebar_bg',
		'section' => 'colors',
	) ) );	

// bottom sidebar text and links
 	$wp_customize->add_setting( 'moderne_bottom_sidebar_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_bottom_sidebar_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text &amp; Links', 'moderne' ),		
		'settings'   => 'moderne_bottom_sidebar_text',
		'section' => 'colors',
	) ) );	
	
// footer background
 	$wp_customize->add_setting( 'moderne_footer_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_footer_bg', array(
		'label'   => esc_html__( 'Footer Background', 'moderne' ),		
		'settings'   => 'moderne_footer_bg',
		'section' => 'colors',
	) ) );	
// footer bottom border
 	$wp_customize->add_setting( 'moderne_footer_border', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_footer_border', array(
		'label'   => esc_html__( 'Footer Bottom Border', 'moderne' ),		
		'settings'   => 'moderne_footer_border',
		'section' => 'colors',
	) ) );	
	
// footer text and links
 	$wp_customize->add_setting( 'moderne_footer_text', array(
		'default'        => '#fff1ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_footer_text', array(
		'label'   => esc_html__( 'Footer Text &amp; Links', 'moderne' ),		
		'settings'   => 'moderne_footer_text',
		'section' => 'colors',
	) ) );	

// caption background
 	$wp_customize->add_setting( 'moderne_caption_bg', array(
		'default'        => '#3e4a5f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_caption_bg', array(
		'label'   => esc_html__( 'Captioan Background', 'moderne' ),		
		'settings'   => 'moderne_caption_bg',
		'section' => 'colors',
	) ) );	

// caption background
 	$wp_customize->add_setting( 'moderne_caption_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_caption_text', array(
		'label'   => esc_html__( 'Captioan Text', 'moderne' ),		
		'settings'   => 'moderne_caption_text',
		'section' => 'colors',
	) ) );	
	
	
// button
 	$wp_customize->add_setting( 'moderne_button', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_button', array(
		'label'   => esc_html__( 'Buttons', 'moderne' ),		
		'settings'   => 'moderne_button',
		'section' => 'colors',
	) ) );		
	
// button label
 	$wp_customize->add_setting( 'moderne_button_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_button_label', array(
		'label'   => esc_html__( 'Button Label', 'moderne' ),		
		'settings'   => 'moderne_button_label',
		'section' => 'colors',
	) ) );		
	
// button hover
 	$wp_customize->add_setting( 'moderne_button_hover', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_button_hover', array(
		'label'   => esc_html__( 'Button Hover', 'moderne' ),		
		'settings'   => 'moderne_button_hover',
		'section' => 'colors',
	) ) );		
	
// button label hover
 	$wp_customize->add_setting( 'moderne_button_label_hover', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_button_label_hover', array(
		'label'   => esc_html__( 'Button Label Hover', 'moderne' ),		
		'settings'   => 'moderne_button_label_hover',
		'section' => 'colors',
	) ) );		

// error page title
 	$wp_customize->add_setting( 'moderne_error', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_error', array(
		'label'   => esc_html__( 'Error Page Title', 'moderne' ),		
		'settings'   => 'moderne_error',
		'section' => 'colors',
	) ) );		
		

// SECTION - FEATURED SLIDER
	$wp_customize->add_section( 'moderne_featured_slider' , array(
		'title'      => esc_html__( 'Slider Options', 'moderne' ),
		'priority' => 32,
	) );

	// Show Slider
	$wp_customize->add_setting( 'moderne_show_slider', array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'moderne_show_slider', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slider', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post slider on the front page of your website.', 'moderne' ),
		'section'   => 'moderne_featured_slider',
	));	

	// Show category
	$wp_customize->add_setting( 'moderne_show_slide_cat', array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'moderne_show_slide_cat', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slide Category', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post slide category name.', 'moderne' ),
		'section'   => 'moderne_featured_slider',
	));		

	// Show slide excerpt
	$wp_customize->add_setting( 'moderne_show_slide_excerpt', array(
		'default' => false,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'moderne_show_slide_excerpt', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slide Excerpts', 'moderne' ),
		'description' => esc_html__( 'This lets you show an excerpt from each post.', 'moderne' ),
		'section'   => 'moderne_featured_slider',
	));	


	
	// Show slide readmore
	$wp_customize->add_setting( 'moderne_show_slide_readmore', array(
		'default' => true,
		'sanitize_callback' => 'moderne_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'moderne_show_slide_readmore', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slide Read More', 'moderne' ),
		'description' => esc_html__( 'This lets you show the post slide Read More button on each slide.', 'moderne' ),
		'section'   => 'moderne_featured_slider',
	));	
	
	// Slider category
	$wp_customize->add_setting( 'moderne_featured_cat', array(
		'default' => 0,
		'sanitize_callback' => 'moderne_sanitize_slidecat',
	) );

	$wp_customize->add_control( 'moderne_featured_cat', array(
		'type' => 'select',
		'label' => esc_html__( 'Choose a category', 'moderne' ),
		'description' => esc_html__( 'Choose your category to load slides from. Make sure your posts have featured images and we recommend also that you create a special category just for featured slide posts.', 'moderne' ),
		'choices' => moderne_cats(),
		'section' => 'moderne_featured_slider',
	) );
	
	// Slide count
	$wp_customize->add_setting( 'moderne_featured_limit', array(
		'default' => 4,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'moderne_featured_limit', array(
		'type' => 'number',
		'label' => esc_html__( 'Limit posts', 'moderne' ),
		'description' => esc_html__( 'This lets you select how many slides to show, but you need at least 4 and no more than 8.', 'moderne' ),
		'section' => 'moderne_featured_slider',
		'input_attrs' => array(
				'min' => 4, // Required. Minimum value for the slider
				'max' => 8, // Required. Maximum value for the slider
				'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
		),
	) );

	// Setting group for slide width
	$wp_customize->add_setting( 'moderne_slider_width',	array(
		'default' => '1150',
		'sanitize_callback' => 'absint'
		));
		
	$wp_customize->add_control( 'moderne_slider_width', array(
		'type'        => 'number',
		'section'     => 'moderne_featured_slider',
		'label'       => 'Slider Width',
		'description' => 'This controls the width of your slider container. The height is already set at 550px.',
		'input_attrs' => array(
				'min' => 1150, // Required. Minimum value for the slider
				'max' => 2560, // Required. Maximum value for the slider
				'step' => 100, // Required. The size of each interval or step the slider takes between the minimum and maximum values
		),
	) );
	
	// Slide excerpt size
	$wp_customize->add_setting( 'slide_excerpt_size', array(
		'default' => 10,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'slide_excerpt_size', array(
		'type' => 'number',
		'label' => esc_html__( 'Slider Excerpt Size', 'moderne' ),
		'description' => esc_html__( 'This lets you choose how many words to show in your slide excerpt from 4 to 20 words. Default is 10.', 'moderne' ),
		'section' => 'moderne_featured_slider',
		'input_attrs' => array(
				'min' => 4, // Required. Minimum value for the slider
				'max' => 20, // Required. Maximum value for the slider
				'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
		),
	) );
	
	// Owl button  backgrounds
 	$wp_customize->add_setting( 'moderne_owl_button_bg', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_owl_button_bg', array(
		'label'   => esc_html__( 'Slider Nav Backgrounds', 'moderne' ),		
		'settings'   => 'moderne_owl_button_bg',
		'section' => 'moderne_featured_slider',
	) ) );
	
	// Owl button icons
 	$wp_customize->add_setting( 'moderne_owl_button_icons', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_owl_button_icons', array(
		'label'   => esc_html__( 'Slider Nav Icons', 'moderne' ),		
		'settings'   => 'moderne_owl_button_icons',
		'section' => 'moderne_featured_slider',
	) ) );
		
	// Owl category
 	$wp_customize->add_setting( 'moderne_owl_content', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_owl_content', array(
		'label'   => esc_html__( 'Slide Content Text Colour', 'moderne' ),		
		'settings'   => 'moderne_owl_content',
		'section' => 'moderne_featured_slider',
	) ) );	
	
	// Owl readmore label
 	$wp_customize->add_setting( 'moderne_readmore_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_readmore_label', array(
		'label'   => esc_html__( 'Slide Read More Label', 'moderne' ),		
		'settings'   => 'moderne_readmore_label',
		'section' => 'moderne_featured_slider',
	) ) );

	// Owl readmore button
 	$wp_customize->add_setting( 'moderne_readmore_button', array(
		'default'        => '#d67a61',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_readmore_button', array(
		'label'   => esc_html__( 'Slide Read More Button', 'moderne' ),		
		'settings'   => 'moderne_readmore_button',
		'section' => 'moderne_featured_slider',
	) ) );
	
	// Owl readmore hover button
 	$wp_customize->add_setting( 'moderne_readmore_hbutton', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'moderne_readmore_hbutton', array(
		'label'   => esc_html__( 'Slide Read More Hover Button', 'moderne' ),		
		'settings'   => 'moderne_readmore_hbutton',
		'section' => 'moderne_featured_slider',
	) ) );	
	
				
// End theme settings
	
}
add_action( 'customize_register', 'moderne_customize_register' );


/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */
 
  // Text Area
 function moderne_sanitize_textarea($input){
	return wp_kses_post( $input );
}

// Strip Slashes
	function moderne_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function moderne_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function moderne_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function moderne_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


// Adds sanitization callback function: Slider Category
function moderne_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, moderne_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}


// Adds sanitization callback function: Number
function moderne_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function moderne_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function moderne_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function moderne_customize_preview_js() {
	wp_enqueue_script( 'blog-writer-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'moderne_customize_preview_js' );
