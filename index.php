<?php 
	/**
	 * index.php
	 * 
	 * This is the main blog and loop template of Pivot.
	 * Uses get template part to load the appropriate blog set by the theme options.
	 * Copy template parts to your child theme to override and make modifications.
	 * Ensure to copy the folder structure when copying to a child theme.
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	get_header(); 

	$background = get_option('blog_header_background');
	$title = get_option('blog_title','Our Blog');
	$sub = get_option('blog_subtitle', 'News & Views');
?>
	
	<header class="page-header">
		
		<?php if( $background ) : ?>
			<div class="background-image-holder parallax-background">
				<img class="background-image" alt="Background Image" src="<?php echo $background; ?>">
			</div>
		<?php endif; ?>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<?php
						if( $sub )
							echo '<span class="text-white alt-font">'. $sub .'</span>';
						
						if( $title )
							echo '<h1 class="text-white">'. $title .'</h1>';
					?>
				</div>
			</div><!--end of row-->
		</div><!--end of container-->
		
	</header>

<?php
	/**
	 * Grab the correct blog loop depending on theme options.
	 */
	get_template_part('loop/loop-blog', get_option('blog_layout','grid-sidebar'));

	get_footer();	