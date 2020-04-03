<?php
/**
 * Add inline styles to the head area
 * @package Moderne
*/
 
 // Dynamic styles
function moderne_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	
	
// content
	$moderne_topbar_bg = get_theme_mod( 'moderne_topbar_bg', '#1b1b1b' );
	$moderne_sitetitle = get_theme_mod('moderne_sitetitle', '#000' );
	$moderne_site_tagline = get_theme_mod('moderne_site_tagline', '#868686' );
	$moderne_page_bg = get_theme_mod('moderne_page_bg', '#f5f2ed' );
	$moderne_content_bg = get_theme_mod('moderne_content_bg', '#fff' );
	$moderne_content_title_borders = get_theme_mod('moderne_content_title_borders', '#afafaf' );	
	$moderne_body_text = get_theme_mod('moderne_body_text', '#686868' );
	$moderne_breadcrumbs_text = get_theme_mod('moderne_breadcrumbs_text', '#8e8e8e' );
	$moderne_headings = get_theme_mod('moderne_headings', '#000' );
	$moderne_meta_hover = get_theme_mod('moderne_meta_hover', '#d67a61' );
	$moderne_links = get_theme_mod('moderne_links', '#d67a61' );
	$moderne_visited_links = get_theme_mod('moderne_visited_links', '#eab5a7' );
	$moderne_hover_links = get_theme_mod('moderne_hover_links', '#7094d0' );
	$moderne_post_categories_bg = get_theme_mod('moderne_post_categories_bg', '#d67a61' );
	$moderne_post_categories_label = get_theme_mod('moderne_post_categories_label', '#fff' );
	$moderne_post_categories_hbg = get_theme_mod('moderne_post_categories_hbg', '#d67a61' );
	$moderne_post_categories_hlabel = get_theme_mod('moderne_post_categories_hlabel', '#fff' );	
	$moderne_featured_bg = get_theme_mod('moderne_featured_bg', '#d67a61' );
	$moderne_featured_text = get_theme_mod('moderne_featured_text', '#fff' );
	$moderne_tag_hover_bg = get_theme_mod('moderne_tag_hover_bg', '#d67a61' );
	$moderne_tag_hover_text = get_theme_mod('moderne_tag_hover_text', '#fff' );
	$moderne_about_social_icon = get_theme_mod('moderne_about_social_icon', '#848484' );
	$moderne_about_social_hover_icon = get_theme_mod('moderne_about_social_hover_icon', '#d67a61' );
	$moderne_bottom_sidebar_bg = get_theme_mod('moderne_bottom_sidebar_bg', '#f5f2ed' );
	$moderne_bottom_sidebar_text = get_theme_mod('moderne_bottom_sidebar_text', '#686868' );
	$moderne_caption_bg = get_theme_mod('moderne_caption_bg', '#3e4a5f' );
	$moderne_caption_text = get_theme_mod('moderne_caption_text', '#fff' );
	$moderne_footer_bg = get_theme_mod('moderne_footer_bg', '#d67a61' );
	$moderne_footer_text = get_theme_mod('moderne_footer_text','#fff1ee' );
	$moderne_error = get_theme_mod('moderne_error','#d67a61' );
	$custom .= "body {color: " . esc_attr($moderne_body_text) . "; }
	#topbar {background-color:" . esc_attr($moderne_topbar_bg) . "}	
	#page, #masthead { border-color: " . esc_attr($moderne_topbar_bg) . "; }	
	#site-title a, #site-title a:visited { color: " . esc_attr($moderne_sitetitle) . "; }
	#site-description { color: " . esc_attr($moderne_site_tagline) . "; }
	#page, #nav-wrapper { background-color: " . esc_attr($moderne_page_bg) . "; }
	#main,#left-sidebar .widget, #right-sidebar .widget { background-color: " . esc_attr($moderne_content_bg) . "; }
	.blog .page-title:before, .blog .page-title:after, .archive .page-title:before, .archive .page-title:after { border-color: " . esc_attr($moderne_content_title_borders) . "; }	
	#breadcrumbs-sidebar, #breadcrumbs-sidebar a, #breadcrumbs-sidebar a:visited {color: " . esc_attr($moderne_breadcrumbs_text) . ";}
	h1, h2, h3, h4, h5, h6, .entry-title a, .entry-title a:visited {color: " . esc_attr($moderne_headings) . ";}
	.entry-meta a:focus,.entry-meta a:hover, #breadcrumbs-sidebar a, aside a:hover {color: " . esc_attr($moderne_meta_hover) . ";}
	a {color: " . esc_attr($moderne_links) . ";}
	a:visited {color: " . esc_attr($moderne_visited_links) . ";}
	a:hover, a:focus, a:active {color: " . esc_attr($moderne_hover_links) . ";}
	.post-categories a,.post-categories a:visited, .tag-list a, .tag-list a:visited {background-color: " . esc_attr($moderne_post_categories_bg) . "; color: " . esc_attr($moderne_post_categories_label) . ";}
	.post-categories a:hover, .post-categories a:focus, .tag-list a:hover, .tag-list a:focus {background-color: " . esc_attr($moderne_post_categories_hbg) . "; color: " . esc_attr($moderne_post_categories_hlabel) . ";}	
	.ribbon-featured {background-color: " . esc_attr($moderne_featured_bg) . "; color: " . esc_attr($moderne_featured_text) . ";}
	.tag-cloud-link:hover {background-color: " . esc_attr($moderne_tag_hover_bg) . "; border-color: " . esc_attr($moderne_tag_hover_bg) . ";color: " . esc_attr($moderne_tag_hover_text) . ";}
	.about-widget-social .fa.fab, .about-widget-social .fa.fab:visited {color: " . esc_attr($moderne_about_social_icon) . ";}
	.about-widget-social .fa.fab:hover { color: " . esc_attr($moderne_about_social_hover_icon) . ";}	
	#bottom-sidebar {background-color: " . esc_attr($moderne_bottom_sidebar_bg) . "; color: " . esc_attr($moderne_bottom_sidebar_text) . ";}
	#bottom-sidebar a, #bottom-sidebar a:visited, #bottom-sidebar .widget-title {color: " . esc_attr($moderne_bottom_sidebar_text) . ";}
	#site-footer {background-color: " . esc_attr($moderne_footer_bg) . ";}	
	.site-info, .site-info a, .site-info a:visited, #site-footer .widget-title  {color:" . esc_attr($moderne_footer_text) . ";}
	.wp-caption-text, .gallery-icon {background-color: " . esc_attr($moderne_caption_bg) . "; color: " . esc_attr($moderne_caption_text) . ";}
	#error-type  {color:" . esc_attr($moderne_error) . ";}
	"."\n";
	
// navigation
	$moderne_mobile_toggle_button = get_theme_mod( 'moderne_mobile_toggle_button', '#d67a61' );	
	$moderne_mobile_toggle_label = get_theme_mod( 'moderne_mobile_toggle_label', '#fff' );
	$moderne_mobile_toggle_button_on = get_theme_mod( 'moderne_mobile_toggle_button_on', '#0f0f0f' );
	$moderne_mobile_toggle_label_on = get_theme_mod( 'moderne_mobile_toggle_label_on', '#fff' );
	$moderne_mobile_menu_lines = get_theme_mod( 'moderne_mobile_menu_lines', '#d1d1d1' );	
	$moderne_menu_topbottom_lines = get_theme_mod( 'moderne_menu_topbottom_lines', '#afafaf' );
	$moderne_menu_links = get_theme_mod( 'moderne_menu_links', '#000' );
	$moderne_menu_hover_links = get_theme_mod( 'moderne_menu_hover_links', '#d67a61' );
	$moderne_menu_active_link_border = get_theme_mod( 'moderne_menu_active_link_border', '#d67a61' );
	$moderne_submenu_dropdown_arrow_hover = get_theme_mod( 'moderne_submenu_dropdown_arrow_hover', '#d67a61' );	
	$moderne_submenu_dropdown_bg = get_theme_mod( 'moderne_submenu_dropdown_bg', '#f5f2ed' );	
	$moderne_submenu_top_border = get_theme_mod( 'moderne_submenu_top_border', '#afafaf' );
	$moderne_submenu_bg_hover = get_theme_mod( 'moderne_submenu_bg_hover', '#d67a61' );	
	$moderne_submenu_link_hover = get_theme_mod( 'moderne_submenu_link_hover', '#fff' );	
	$moderne_single_nav_bg = get_theme_mod( 'moderne_single_nav_bg', '#222' );
	$moderne_single_nav_text = get_theme_mod( 'moderne_single_nav_text', '#fff' );		
	$moderne_topbar_social_icon = get_theme_mod( 'moderne_topbar_social_icon', '#fff' );
	$moderne_owl_button_bg = get_theme_mod( 'moderne_owl_button_bg', '#d67a61' );
	$moderne_owl_button_icons = get_theme_mod( 'moderne_owl_button_icons', '#fff' );
	$moderne_owl_content = get_theme_mod( 'moderne_owl_content', '#fff' );
	$moderne_readmore_label = get_theme_mod( 'moderne_readmore_label', '#fff' );
	$moderne_readmore_button = get_theme_mod( 'moderne_readmore_button', '#d67a61' );
	$moderne_readmore_hbutton = get_theme_mod( 'moderne_readmore_hbutton', '#222' );	
	$custom .= ".menu-toggle {background-color:" . esc_attr($moderne_mobile_toggle_button) . "; border-color:" . esc_attr($moderne_mobile_toggle_button) . "; color:" . esc_attr($moderne_mobile_toggle_label) . ";}	
	.menu-toggle.toggled-on, .menu-toggle.toggled-on:hover, .menu-toggle.toggled-on:focus {background-color:" . esc_attr($moderne_mobile_toggle_button_on) . "; border-color:" . esc_attr($moderne_mobile_toggle_button_on) . "; color:" . esc_attr($moderne_mobile_toggle_label_on) . ";}	
	.toggled-on .main-navigation li {border-color:" . esc_attr($moderne_mobile_menu_lines) . ";}	
	#nav-wrapper {border-color:" . esc_attr($moderne_menu_topbottom_lines) . ";}
	.main-navigation a, .dropdown-toggle {color:" . esc_attr($moderne_menu_links) . ";}
	.main-navigation li:hover > a,	.main-navigation li.focus > a {color:" . esc_attr($moderne_menu_hover_links) . ";}
	.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a,.widget_nav_menu .current-menu-item a, .widget_pages .current-menu-item a {border-color:" . esc_attr($moderne_menu_active_link_border) . ";}	
	.dropdown-toggle:hover,.dropdown-toggle:focus {color:" . esc_attr($moderne_submenu_dropdown_arrow_hover) . ";}		
	@media (min-width: 768px){.main-navigation ul ul li { background-color:" . esc_attr($moderne_submenu_dropdown_bg) . ";}}
	@media (min-width: 992px) {.main-navigation ul ul {border-color:" . esc_attr($moderne_submenu_top_border) . ";}
	.main-navigation ul ul a:hover {background-color:" . esc_attr($moderne_submenu_bg_hover) . "; color:" . esc_attr($moderne_submenu_link_hover) . ";} }
	.single .nav-links {background-color:" . esc_attr($moderne_single_nav_bg) . "; }
	.single .nav-links a,.single .nav-links a:visited {color:" . esc_attr($moderne_single_nav_text) . ";}
	#topbar .social-menu a, #topbar .social-menu a:visited {color:" . esc_attr($moderne_topbar_social_icon) . ";}
	.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next { background-color:" . esc_attr($moderne_owl_button_bg) . ";color:" . esc_attr($moderne_owl_button_icons) . ";}
	.flex-caption .post-categories, .slide-excerpt {color:" . esc_attr($moderne_owl_content) . ";}
	.flex-caption .read-more a, .flex-caption .read-more a:visited {background-color:" . esc_attr($moderne_readmore_button) . "; color:" . esc_attr($moderne_readmore_label) . ";}
	.flex-caption .read-more a:hover, .flex-caption .read-more a:focus { background-color:" . esc_attr($moderne_readmore_hbutton) . ";}	
	"."\n";	

// forms
	$moderne_button = get_theme_mod( 'moderne_button', '#222' );	
	$moderne_button_label = get_theme_mod( 'moderne_button_label', '#fff' );
	$moderne_button_hover = get_theme_mod( 'moderne_button_hover', '#d67a61' );	
	$moderne_button_label_hover = get_theme_mod( 'moderne_button_label_hover', '#fff' );	
	$custom .= "button, .button:visited,button[disabled]:hover, button[disabled]:focus, input[type=button], input[type=button][disabled]:hover, input[type=button][disabled]:focus, input[type=reset], input[type=reset][disabled]:hover, input[type=reset][disabled]:focus, input[type=submit], input[type=submit][disabled]:hover, input[type=submit][disabled]:focus  {background-color: " . esc_attr($moderne_button) . "; color: " . esc_attr($moderne_button_label) . ";}	
	.button:hover,button:hover, button:focus, input[type=button]:hover, input[type=button]:focus, input[type=reset]:hover, input[type=reset]:focus, input[type=submit]:hover, input[type=submit]:focus  {background-color: " . esc_attr($moderne_button_hover) . "; color: " . esc_attr($moderne_button_label_hover) . ";}	
	"."\n";

// widgets
	$moderne_widget_title_bg = get_theme_mod( 'moderne_widget_title_bg', '#d67a61' );	
	$moderne_widget_title = get_theme_mod( 'moderne_widget_title', '#fff' );		
	$custom .= "#left-sidebar .widget-title, #right-sidebar .widget-title {background-color:" . esc_attr($moderne_widget_title_bg) . "; color:" . esc_attr($moderne_widget_title) . ";} "."\n";

// content shadow
if( esc_attr(get_theme_mod( 'moderne_show_content_shadow', true ) ) ) :
	$moderne_show_content_shadow = get_theme_mod( 'moderne_show_content_shadow', true );
	$custom .= "#main, #left-sidebar .widget, #right-sidebar .widget {box-shadow: 0 0 6px 6px rgba(195,195,195,0.10);} "."\n";
endif;	
	
// shadow under widget titles	
if( esc_attr(get_theme_mod( 'moderne_show_widget_title_shadow', true ) ) ) :
	$moderne_show_widget_title_shadow = get_theme_mod( 'moderne_show_widget_title_shadow', true );
	$custom .= "#left-sidebar .widget-title, #right-sidebar .widget-title, #inset-top .widget-title, #inset-bottom .widget-title {	-webkit-box-shadow:0 5px 10px rgba(0, 0, 0, 0.10); 	-moz-box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10); box-shadow: 0 5px 10px rgba(0, 0, 0, 0.10);} "."\n";
endif;
	
// shadow under banner image	
if( esc_attr(get_theme_mod( 'moderne_show_shadow', true ) ) ) :
	$moderne_show_shadow = get_theme_mod( 'moderne_show_shadow', true );	
	$custom .= "#banner-sidebar:after, #featured-image-shadow:after {	-webkit-box-shadow:0 0 60px rgba(0,0,0,0.8); 	-moz-box-shadow: 0 0 60px rgba(0,0,0,0.8); box-shadow:0 0 60px rgba(0,0,0,0.8);}	"."\n";
endif;

// dropcap		
if( esc_attr(get_theme_mod( 'moderne_show_dropcap', false ) ) ) :
	$moderne_dropcap_colour = get_theme_mod( 'moderne_dropcap_colour', '#e4c9c1' );		
	$custom .= ".single-post .entry-content > p:first-of-type::first-letter {
    font-weight: 700;
    font-style: normal;
    font-family: \"Times New Roman\", Times, serif;
    font-size: 9rem;
    /* font-weight: normal; */
    line-height: 6rem;
    float: left;
    margin: 8px 0 0;
    overflow: hidden;
    padding-right: 1rem;
    text-transform: uppercase;
}
	.single-post .entry-content h2 ~ p:first-of-type::first-letter {
		font-size: initial;	
		font-weight: initial;	
		line-height: initial; 
		float: initial;	
		margin-bottom: initial;	
		padding-right: initial;	
		text-transform: initial;
	}	
	.single-post .entry-content > p:first-of-type::first-letter {color:" . esc_attr($moderne_dropcap_colour) . ";}"."\n";
endif;

 
// END CUSTOM CSS
//Output all the styles
	wp_add_inline_style( 'moderne-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'moderne_inline_styles' );	