<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
	/**
	 * Get the template preloader markup
	 * Override this by copying the /inc/ folder and content-preloader.php to your child theme.
	 */
	get_template_part('inc/content', 'preloader');
	
	/**
	 * Get Nav Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','nav-start'); 

		/**
		 * First, we need to check if we're going to override the header layout (with post meta)
		 * Or if we're going to display the global choice from the theme options.
		 * This is what ebor_get_header_layout is in charge of.
		 * 
		 * Oh yeah, exactly the same for the footer as well.
		 */
		get_template_part('header/content-header', ebor_get_header_layout());

	/**
	 * Get Nav End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','nav-end');
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','wrapper-start'); 