<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','wrapper-end'); 
	
	/**
	 * Get Footer Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','footer-start'); 

		/**
		 * First, we need to check if we're going to override the header layout (with post meta)
		 * Or if we're going to display the global choice from the theme options.
		 * This is what ebor_get_header_layout is in charge of.
		 * 
		 * Oh yeah, exactly the same for the footer as well.
		 */
		get_template_part('footer/content-footer', ebor_get_footer_layout());
		
	/**
	 * Get Footer End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/content','footer-end'); 
	
	wp_footer(); 
?>

</body>
</html>