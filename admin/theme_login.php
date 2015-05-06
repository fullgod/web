<?php 

if(!( function_exists('ebor_custom_admin') )){
	function ebor_custom_admin(){
		$directory = trailingslashit(get_template_directory_uri());
		$protocol = is_ssl() ? 'https' : 'http';
		$body_font = get_option('body_font_url', $protocol . '://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700');
		$heading_font = get_option('heading_font_url', $protocol . '://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700');
		$alt_font = get_option('alt_font_url', $protocol . '://fonts.googleapis.com/css?family=Raleway:700');
	
		//Enqueue Fonts
		if( $body_font )
			echo '<link href="' . $body_font . 'css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
			
		if( $heading_font )
			echo '<link href="' . $heading_font . 'css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
			
		if( $alt_font )
			echo '<link href="' . $alt_font . 'css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
				
		echo '<link href="' . $directory . 'style/css/bootstrap.min.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/flexslider.min.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/line-icons.min.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/elegant-icons.min.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/lightbox.min.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/theme.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/woocommerce.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style.css" rel="stylesheet" type="text/css" />';
		echo '<link href="' . $directory . 'style/css/login.css" rel="stylesheet" type="text/css" />';
		
		//Enqueue Scripts
		wp_enqueue_script( 'ebor-modernizr', $directory . 'style/js/modernizr-2.6.2-respond-1.1.0.min.js', array('jquery'), false, false  );
		wp_enqueue_script( 'ebor-bootstrap', $directory . 'style/js/bootstrap.min.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-plugins', $directory . 'style/js/plugins.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-scripts', $directory . 'style/js/scripts.js', array('jquery'), false, true  );
	}
	add_action('login_enqueue_scripts','ebor_custom_admin', 100);
}

if(!( function_exists('ebor_login_header') )){
	function ebor_login_header(){
		get_template_part('header/content-header-overlay');
		
		/**
		 * Get Wrapper Start - Uses get_template_part for simple child themeing.
		 */
		get_template_part('inc/content','wrapper-start');	
		
		echo '<section class="no-pad login-page fullscreen-element first-child">
				<div class="background-image-holder">
					<img class="background-image" alt="Login Background" src="'. get_option('wp_login_background') .'">
				</div>
				<div class="container align-vertical">
					<div class="row">
						<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">';
	}
	add_action('login_headertitle', 'ebor_login_header');
}

if(!( function_exists('ebor_before_login_form') )){
	function ebor_before_login_form(){
		if( isset($_GET['action']) ){
			echo '<h1 class="text-white">'. get_option('register_title','Register to login') .'</h1><div class="photo-form-wrapper clearfix">';	
		} else {
			echo '<h1 class="text-white">'. get_option('login_title','Login to continue') .'</h1><div class="photo-form-wrapper clearfix">';	
		}
	}
	add_action('login_message', 'ebor_before_login_form');
}

if(!( function_exists('ebor_login_footer') )){
	function ebor_login_footer(){
		echo '</div></div></div></section>';
		
		/**
		 * Get Wrapper Start - Uses get_template_part for simple child themeing.
		 */
		get_template_part('inc/content','wrapper-end');	
	}
	add_action('login_footer', 'ebor_login_footer');
}