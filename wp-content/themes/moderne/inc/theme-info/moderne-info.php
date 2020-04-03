<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page to be used as a foundation.
 * @package Moderne
 */
 
function moderne_info() {    


	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// translators: %1$s: menu title under appearance
		'menu_name'             => sprintf( esc_html__( 'About %1$s', 'moderne' ), ucfirst( $theme_name ) ),
		// translators: %1$s: page name 
		'page_name'             => sprintf( esc_html__( 'About %1$s', 'moderne' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome title 
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %1$s - v', 'moderne' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome content 
		'welcome_content'       => sprintf( esc_html__(  '%1$ is a unique design concept where retro and modern merged into a vibrant and dynamic theme designed for bloggers that love to tell stories and express words to capture attention. With a choice of many blog layouts, full post layouts, dynamic width sidebars, a flexible featured post slider, unlimited colours, and a ton of customization settings, Moderne provides all you need to quickly and easily create a stunning blog that you and your readers will love.', 'moderne' ), ucfirst( $theme_name ) ),
		
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => 'https://www.bloggingthemestyles.com/wordpress-themes/moderne-pro/',
			'price_discount'  => __( 'Upgrade and Save 5%', 'moderne' ),
			'price_normal'	  => __( 'Use coupon at checkout.', 'moderne' ),
			'coupon'	      =>  __( 'SAVEFIVE', 'moderne' ),
			'button'	      => __( 'Get the Pro', 'moderne' ),
		),		
		'tabs'                 => array(
			'getting_started'  => esc_html__( 'Getting Started', 'moderne' ),
			'support_content'  => esc_html__( 'Support', 'moderne' ),
			'changelog'           => esc_html__( 'Changelog', 'moderne' ),
			'free_pro'         => esc_html__( 'Free VS PRO', 'moderne' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'moderne' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out our detailed setup documentation.', 'moderne' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'moderne' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/documentation/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'moderne' ),
				'text'                => esc_html__( 'Using the WordPress Customizer, you can easily customize every aspect of the theme.', 'moderne' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'moderne' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'moderne' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'moderne' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'moderne' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'moderne' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'moderne' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'moderne' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'If you experience any problems, please post your questions to support and we will be more than happy to help you out.', 'moderne' ),
				'button_label' => esc_html__( 'Get Free Support', 'moderne' ),
				'button_link'  => esc_url( '//www.bloggingthemestyles.com/support' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'moderne' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'moderne' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'moderne' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),	
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => esc_html__('Moderne Pro','moderne' ),
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/moderne-pro/',
			'get_pro_theme_label' => sprintf( esc_html__( 'Get Moderne Pro', 'moderne' ) ),
			'features'            => array(
				array(
					'title'            => esc_html__( 'Mobile Friendly', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Unlimited Colours', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Featured Post Slider', 'moderne' ),
					'description'      => esc_html__('Showcase featured posts with the Owl Slider.', 'moderne'),
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Adjustable Page Width', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
							
				array(
					'title'            => esc_html__( 'Background Image', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Menu', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Show or Hide Elements', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Custom Error Page', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Styles', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '15',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '5',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '9',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '4',
					'hidden'           => '',
				),

				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Related Posts with Thumbnails', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
			
				array(
					'title'            => esc_html__( 'Theme Options', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'moderne' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),				

				array(
					'title'            => esc_html__( 'Custom Blog Title &amp; Introduction', 'moderne' ),
					'description'      => esc_html__('WordPress does not have this, but we have added a customizable blog title and intro option.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'moderne' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading for up to 14 blog styled layouts.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Author Widget', 'moderne' ),
					'description'      => esc_html__('We included a custom widget for an author photo plus social links.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Image Box Widget', 'moderne' ),
					'description'      => esc_html__('We included an Image Box widget with an upload and caption overlay.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				
				array(
					'title'            => esc_html__( 'MailChimp Widget Styling', 'moderne' ),
					'description'      => esc_html__('We included custom styling for an optional MailChimp widget.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Demo Content Import Compatible', 'moderne' ),
					'description'      => esc_html__('We included the ability to let you import the demo site content.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Add Google Fonts', 'moderne' ),
					'description'      => esc_html__('Add up to 2 more Google Fonts.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Typography Options', 'moderne' ),
					'description'      => esc_html__('Includes several settings for the main elements of your web page like headings, content, and more.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Custom Styled Archive Titles', 'moderne' ),
					'description'      => esc_html__('We customized the style of archive titles for tags, categories, etc.', 'moderne'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
		
				
			),
		),
	);
	moderne_info_page::init( $config );

}

add_action('after_setup_theme', 'moderne_info');

?>