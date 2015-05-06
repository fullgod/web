<?php 

function ebor_theme_customize($wp_customize){
	$wp_customize->remove_section( 'colors' );
}
add_action('customize_register', 'ebor_theme_customize', 99999);

/**
 * Build theme options
 * Uses the Ebor_Options class found in the ebor-framework plugin
 * Panels are WP 4.0+!!!
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if( class_exists('Ebor_Options') ){
	$ebor_options = new Ebor_Options;
	
	/**
	 * Variables
	 */
	$theme = wp_get_theme();
	$theme_name = $theme->get( 'Name' );
	$directory = trailingslashit(get_template_directory_uri());
	$social_options = ebor_get_social_icons();
	$header_layouts = ebor_get_header_options();
	$footer_layouts = ebor_get_footer_options();
	$post_layouts = ebor_get_post_layouts();
	$footer_default = 'Copyright 2014 TommusRhodus';
	$subtitle_default = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta.';
	$portfolio_layouts = array(
		'portfolio-fullwidth' => 'Full Width',
		'portfolio-contained' => 'Contained'	
	);
	$team_layouts = array(
		'team-tiny' => 'Tiny (4 Columns)',	
		'team-small' => 'Small (3 Columns)',	
		'team-large' => 'Large (2 Columns)',	
	);
	$blog_layouts = array(
		'preview' => 'Preview List',
		'grid' => '3 Column Grid',
		'grid-sidebar' => '2 Column Grid & Sidebar',
		'masonry' => 'Masonry Grid',
		'masonry-sidebar' => 'Masonry Grid & Sidebar',
		'list' => 'Big List',
		'list-images' => 'Big List With Background Images'
	);
	$pagination_sizes = array(
		'pagination-sm' => 'Small',
		'pagination-md' => 'Medium',
		'pagination-lg' => 'Large',	
	);
	$fonts_description = 'Fonts: ' . $theme_name . ' uses Google Fonts, <a href="https://www.google.com/fonts" target="_blank">all of which are viewable here</a>. Unlike some themes, ' . $theme_name . ' does not load all of these fonts into these options, in avoiding this ' . $theme_name . ' can work faster and more reliably.<br /><br />
	
	To customize the fonts on your website use the URL above and the inputs below accordingly. Full details of this process (and the default values) can be found in the theme documentation!';
	
	/**
	 * Panels
	 * 
	 * add_panel($name, $priority, $description)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Demo Data', 5, '');
	$ebor_options->add_panel( $theme_name . ': Site Settings', 200, 'All of the controls in this section directly relate to the site settings of ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Styling Settings', 205, 'All of the controls in this section directly relate to the styling page of ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': WP-Login Settings', 210, 'All of the controls in this section directly relate to wp-login.php page of ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Header Settings', 215, 'All of the controls in this section directly relate to the header and logos of ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Blog Settings', 225, 'All of the controls in this section directly relate to the control of blog items within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Portfolio Settings', 230, 'All of the controls in this section directly relate to the control of portfolio items within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Team Settings', 235, 'All of the controls in this section directly relate to the control of team items within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Shop Settings', 240, 'All of the controls in this section directly relate to the control of the shop within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Forum Settings', 245, 'All of the controls in this section directly relate to the control of the forums within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': One-Page Settings', 250, 'All of the controls in this section directly relate to the control of the one-page layout within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Footer Settings', 290, 'All of the controls in this section directly relate to the control of the footer within ' . $theme_name);
	
	/**
	 * Sections
	 * 
	 * add_section($name, $title, $priority, $panel, $description)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	//Demo Data
	$ebor_options->add_section('demo_data_section', 'Import Demo Data', 10, $theme_name . ': Demo Data', '<strong>Please read this before importing demo data via this control:</strong><br /><br />The demo data this will install includes images from my demo site with <strong>heavy blurring applied</strong> this is due to licensing restrictions. Simply replace these images with your own.<br /><br />');
	
	//Site Settings
	$ebor_options->add_section('site_settings_section', 'Site Settings', 10, $theme_name . ': Site Settings');
	
	//Styling Sections
	$ebor_options->add_section('fonts_section', 'Fonts', 5, $theme_name . ': Styling Settings', $fonts_description);
	$ebor_options->add_section('colours_section', 'Colours', 10, $theme_name . ': Styling Settings');
	$ebor_options->add_section('spacing_section', 'Spacing', 15, $theme_name . ': Styling Settings');
	$ebor_options->add_section('corners_section', 'Rounded Corners', 20, $theme_name . ': Styling Settings');
	$ebor_options->add_section('transitions_section', 'Animation Speeds', 25, $theme_name . ': Styling Settings');
	$ebor_options->add_section('pagination_section', 'Pagination Styling', 30, $theme_name . ': Styling Settings');
	$ebor_options->add_section('favicon_section', 'Favicons', 30, $theme_name . ': Styling Settings');
	$ebor_options->add_section('custom_css_section', 'Custom CSS', 40, $theme_name . ': Styling Settings');
	
	//Blog Sections
	$ebor_options->add_section('blog_settings', 'Blog Settings', 1, $theme_name . ': Blog Settings');
	$ebor_options->add_section('blog_text_section', 'Blog Texts', 5, $theme_name . ': Blog Settings');
	$ebor_options->add_section('blog_layout_section', 'Blog Layout', 10, $theme_name . ': Blog Settings');
	
	//Portfolio Sections
	$ebor_options->add_section('portfolio_text_section', 'Portfolio Texts', 5, $theme_name . ': Portfolio Settings');
	$ebor_options->add_section('portfolio_layout_section', 'Portfolio Layout', 10, $theme_name . ': Portfolio Settings');
	
	//WP Login Settings
	$ebor_options->add_section('wp_login_section', 'WP-Login Settings', 10, $theme_name . ': WP-Login Settings');
	
	//Header Settings
	$ebor_options->add_section('header_layout_section', 'Header Layout', 5, $theme_name . ': Header Settings', 'This setting controls the theme header site-wide. If you need to you can override this setting on specific posts and pages from within that posts edit screen.');
	$ebor_options->add_section('logo_settings_section', 'Logo Settings', 10, $theme_name . ': Header Settings');
	$ebor_options->add_section('subheader_settings_section', 'Sub-Header Settings', 30, $theme_name . ': Header Settings');
	$ebor_options->add_section('header_social_settings_section', 'Header Icons Settings', 40, $theme_name . ': Header Settings', 'These social icons are only shown in certain header layouts.');
	
	//Footer Settings
	$ebor_options->add_section('footer_layout_section', 'Footer Layout', 5, $theme_name . ': Footer Settings', 'This setting controls the theme footer site-wide. If you need to you can override this setting on specific posts and pages from within that posts edit screen.');
	$ebor_options->add_section('subfooter_settings_section', 'Sub-Footer Settings', 30, $theme_name . ': Footer Settings');
	$ebor_options->add_section('footer_social_settings_section', 'Footer Icons Settings', 40, $theme_name . ': Footer Settings', 'These social icons are only shown in certain footer layouts.');
	$ebor_options->add_section('cta_footer_settings_section', 'Call To Action Footer Layout Settings', 50, $theme_name . ': Footer Settings', 'These settings are for the Call To Action footer layout, this footer style also uses a navigation menu that can be set to the "footer" menu location in "appearance" -> "menus".');
	$ebor_options->add_section('social_footer_settings_section', 'Centered Social Footer Layout Settings', 60, $theme_name . ': Footer Settings', 'These settings are for the Centered Social Footer layout, this footer style also uses the footer social icons settings');
	
	//Team Settings
	$ebor_options->add_section('team_text_section', 'Team Texts', 5, $theme_name . ': Team Settings');
	$ebor_options->add_section('team_settings_section', 'Team Layout Settings', 10, $theme_name . ': Team Settings');
	
	//Shop Settings
	$ebor_options->add_section('shop_section', 'Shop Settings', 5, $theme_name . ': Shop Settings');
	
	//One Page Settings
	$ebor_options->add_section('one_page_section', 'One Page Settings', 5, $theme_name . ': One-Page Settings', 'Use the header offset function to align your header during single page scrolling if it is not perfect to where you want it.');
	
	//Forum Settings
	$ebor_options->add_section('forum_section', 'Forum Settings', 5, $theme_name . ': Forum Settings');
	
	/**
	 * Settings (The Actual Options)
	 * Repeated settings are stepped using a for() loop and counter
	 * 
	 * add_setting($type, $option, $title, $section, $default, $priority, $select_options)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	//Site Settings
	$ebor_options->add_setting('select', 'site_version', 'Site Version', 'site_settings_section', 'multi-page', 10, array('multi-page' => 'Multipage', 'one-page' => 'Single Page (Enables URL Rewriting)'));
	
	//Favicons
	$ebor_options->add_setting('image', 'custom_favicon', 'Custom Favicon Upload (Use .png)', 'favicon_section', '', 10);
	$ebor_options->add_setting('image', 'mobile_favicon', 'Mobile Favicon Upload (Use .png)', 'favicon_section', '', 15);
	$ebor_options->add_setting('image', '72_favicon', '72x72px Favicon Upload (Use .png)', 'favicon_section', '', 20);
	$ebor_options->add_setting('image', '114_favicon', '114x114px Favicon Upload (Use .png)', 'favicon_section', '', 25);
	$ebor_options->add_setting('image', '144_favicon', '144x144px Favicon Upload (Use .png)', 'favicon_section', '', 30);
	
	//Demo Data
	$ebor_options->add_setting('demo_import', 'demo_import', 'Import Demo Data', 'demo_data_section', '', 10);
	
	//Fonts
	$ebor_options->add_setting('input', 'body_font', 'Body Font', 'fonts_section', 'Open Sans', 10);
	$ebor_options->add_setting('textarea', 'body_font_url', 'Body Font URL Parameter', 'fonts_section', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700', 15);
	$ebor_options->add_setting('input', 'heading_font', 'Heading Font', 'fonts_section', 'Open Sans', 20);
	$ebor_options->add_setting('textarea', 'heading_font_url', 'Heading Font URL Parameter', 'fonts_section', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700', 25);
	$ebor_options->add_setting('input', 'alt_font', 'Alternate Font', 'fonts_section', 'Raleway', 40);
	$ebor_options->add_setting('textarea', 'alt_font_url', 'Alternate Font URL Parameter', 'fonts_section', 'http://fonts.googleapis.com/css?family=Raleway:700', 45);
	
	//Colour Options
	$ebor_options->add_setting('color', 'color-primary', 'Primary Colour', 'colours_section', '#e74c3c', 5);
	$ebor_options->add_setting('color', 'color-secondary-1', 'Secondary Colour', 'colours_section', '#2c3e50', 10);
	$ebor_options->add_setting('color', 'color-secondary-2', 'Tertiary Colour', 'colours_section', '#3498db', 15);
	$ebor_options->add_setting('color', 'color-bg-muted', 'Muted Background Colour', 'colours_section', '#f4f4f4', 20);
	$ebor_options->add_setting('color', 'color-bg-primary', 'Background Colour', 'colours_section', '#ffffff', 25);
	$ebor_options->add_setting('color', 'color-text', 'Text Colour', 'colours_section', '#777777', 30);
	$ebor_options->add_setting('color', 'color-heading', 'Headings Colour', 'colours_section', '#333333', 35);
	$ebor_options->add_setting('color', 'color-link', 'Links Colour', 'colours_section', '#333333', 37);
	$ebor_options->add_setting('color', 'color-link-hover', 'Links Hover Colour', 'colours_section', '#e74c3c', 38);
	$ebor_options->add_setting('color', 'color-twitter', 'Twitter Colour', 'colours_section', '#00a0d1', 40);
	$ebor_options->add_setting('color', 'color-facebook', 'Facebook Colour', 'colours_section', '#3b5998', 45);
	$ebor_options->add_setting('color', 'color-tumblr', 'Tumblr Colour', 'colours_section', '#34526f', 50);
	$ebor_options->add_setting('color', 'color-pinterest', 'Pinterest Colour', 'colours_section', '#910101', 55);
	$ebor_options->add_setting('color', 'color-dribbble', 'Dribbble Colour', 'colours_section', '#ea4c89', 60);
	$ebor_options->add_setting('color', 'color-googleplus', 'Google+ Colour', 'colours_section', '#C63D2D', 65);
	
	//Styling Options
	$ebor_options->add_setting('range', 'theme_corners', 'Standard Rounded Corners (25 Default)', 'corners_section', '25', 30, array('min' => '0', 'max' => '100', 'step' => '1'));
	$ebor_options->add_setting('range', 'theme_spacing', 'Standard Spacing (80 Default)', 'spacing_section', '80', 30, array('min' => '0', 'max' => '200', 'step' => '1'));
	$ebor_options->add_setting('textarea', 'custom_css', 'Custom CSS', 'custom_css_section', '', 30);
	$ebor_options->add_setting('range', 'short_transition', 'Short Animation Speed (Milliseconds)(300 Default)', 'transitions_section', '300', 10, array('min' => '0', 'max' => '5000', 'step' => '100'));
	$ebor_options->add_setting('range', 'medium_transition', 'Medium Animation Speed (Milliseconds)(500 Default)', 'transitions_section', '500', 20, array('min' => '0', 'max' => '5000', 'step' => '100'));
	$ebor_options->add_setting('range', 'long_transition', 'Long Animation Speed (Milliseconds)(2000 Default)', 'transitions_section', '2000', 30, array('min' => '0', 'max' => '5000', 'step' => '100'));
	$ebor_options->add_setting('select', 'pagination_size', 'Pagination Size', 'pagination_section', 'pagination-sm', 10, $pagination_sizes);
	
	//Blog Options
	$ebor_options->add_setting('image', 'blog_header_background', 'Blog Archives: Header Background', 'blog_settings', '', 10);
	$ebor_options->add_setting('input', 'blog_continue', '"Read More" Text', 'blog_text_section', 'Read More', 10);
	$ebor_options->add_setting('input', 'blog_title', 'Blog Archives: Title', 'blog_text_section', 'Our Journal', 20);
	$ebor_options->add_setting('input', 'blog_subtitle', 'Blog Archives: Subtitle', 'blog_text_section', 'News & Thoughts', 30);
	$ebor_options->add_setting('select', 'blog_layout', 'Blog Index Layout', 'blog_layout_section', 'grid-sidebar', 10, $blog_layouts);
	$ebor_options->add_setting('select', 'post_layout', 'Blog Posts Layout', 'blog_layout_section', 'sidebar', 20, $post_layouts);
	
	//Portfolio options
	$ebor_options->add_setting('select', 'portfolio_layout', 'Portfolio Layout', 'portfolio_layout_section', 'portfolio-fullwidth', 10, $portfolio_layouts);
	$ebor_options->add_setting('checkbox', 'portfolio_filters', 'Portfolio Archives: Show Filters?', 'portfolio_layout_section', '1', 20);
	$ebor_options->add_setting('input', 'portfolio_continue', '"See Project" Text', 'portfolio_text_section', 'See Project', 10);
	$ebor_options->add_setting('input', 'portfolio_title', 'Portfolio Archives: Title', 'portfolio_text_section', 'Our Work', 20);
	$ebor_options->add_setting('textarea', 'portfolio_subtitle', 'Portfolio Archives: Subtitle', 'portfolio_text_section', $subtitle_default, 30);
	
	//WP-Login Options
	$ebor_options->add_setting('checkbox', 'custom_login', 'Use Custom WP-Login Styles?', 'wp_login_section', 1, 5);
	$ebor_options->add_setting('image', 'wp_login_background', 'WP-Login Background', 'wp_login_section', '', 10);
	$ebor_options->add_setting('input', 'login_title', 'Login Title', 'wp_login_section', 'Login to continue', 20);
	$ebor_options->add_setting('input', 'register_title', 'Register Title', 'wp_login_section', 'Register to login', 30);
	
	//Logo Options
	$ebor_options->add_setting('image', 'light_logo', 'Light Logo', 'logo_settings_section', $directory . 'style/img/logo-light.png', 5);
	$ebor_options->add_setting('image', 'dark_logo', 'Dark Logo', 'logo_settings_section', $directory . 'style/img/logo-dark.png', 10);
	
	//Header Layout Option
	$ebor_options->add_setting('select', 'header_layout', 'Global Header Layout', 'header_layout_section', 'overlay', 5, $header_layouts);
	
	//Subheader Options
	$ebor_options->add_setting('input', 'header_address', 'Address', 'subheader_settings_section', '300 Collins St Melbourne', 10);
	$ebor_options->add_setting('input', 'header_email', 'Email', 'subheader_settings_section', 'hello@pivot.net', 20);
	$ebor_options->add_setting('checkbox', 'header_login', 'Show Login Button?', 'subheader_settings_section', 1, 30);
	$ebor_options->add_setting('checkbox', 'header_signup', 'Show Signup Button?', 'subheader_settings_section', 1, 30);
	
	//Header Icons
	$ebor_options->add_setting('checkbox', 'cart_icon', 'Show Shopping Cart Icon?', 'header_social_settings_section', 1, 10);
	for( $i = 1; $i < 4; $i++ ){
		$ebor_options->add_setting('select', 'header_social_icon_' . $i, 'Header Social Icon ' . $i, 'header_social_settings_section', 'none', 20 + $i + $i, $social_options);
		$ebor_options->add_setting('input', 'header_social_url_' . $i, 'Header Social URL ' . $i, 'header_social_settings_section', '', 21 + $i + $i);
	}
	
	//Header Layout Option
	$ebor_options->add_setting('select', 'footer_layout', 'Global Footer Layout', 'footer_layout_section', 'columns', 5, $footer_layouts);
	
	//Footer Options
	$ebor_options->add_setting('textarea', 'subfooter_text', 'Copyright Message', 'subfooter_settings_section', $footer_default, 20);
	$ebor_options->add_setting('input', 'cta_footer_url', 'Button URL', 'cta_footer_settings_section', home_url(), 10);
	$ebor_options->add_setting('input', 'cta_footer_text', 'Button Text', 'cta_footer_settings_section', 'Get in touch with us', 20);
	$ebor_options->add_setting('input', 'social_footer_title', 'Footer Title', 'social_footer_settings_section', 'Get In Touch', 10);
	$ebor_options->add_setting('input', 'social_footer_subtitle', 'Footer Subtitle', 'social_footer_settings_section', 'hello@email.com', 20);
	
	//Footer Icons
	for( $i = 1; $i < 7; $i++ ){
		$ebor_options->add_setting('select', 'footer_social_icon_' . $i, 'Footer Social Icon ' . $i, 'footer_social_settings_section', 'none', 20 + $i + $i, $social_options);
		$ebor_options->add_setting('input', 'footer_social_url_' . $i, 'Footer Social URL ' . $i, 'footer_social_settings_section', '', 21 + $i + $i);
	}
	
	//Team Options
	$ebor_options->add_setting('select', 'team_layout', 'Team Layout', 'team_settings_section', 'team-large', 10, $team_layouts);
	$ebor_options->add_setting('input', 'team_title', 'Team Archives: Title', 'team_text_section', 'Our Team', 20);
	$ebor_options->add_setting('textarea', 'team_subtitle', 'Team Archives: Subtitle', 'team_text_section', $subtitle_default, 30);
	
	//Shop Options
	$ebor_options->add_setting('image', 'shop_background', 'Shop Archives Background', 'shop_section', '', 10);
	$ebor_options->add_setting('select', 'single_product_header', 'Show large header on single product posts?', 'shop_section', 'yes', 15, array('yes' => 'Yes', 'no' => 'No'));
	
	//One Page Options
	$ebor_options->add_setting('range', 'header_offset', 'Header Offset for Scroll (96 Default)', 'one_page_section', '96', 30, array('min' => '0', 'max' => '200', 'step' => '1'));
	
	//Forum Options
	$ebor_options->add_setting('image', 'forum_header', 'Forums Header Image Background', 'forum_section', '', 10);
}