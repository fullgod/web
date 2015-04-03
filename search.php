<?php 
	get_header(); 
		global $wp_query;
	
	$total_results = $wp_query->found_posts;
	$items = ( $total_results == '1' ) ? __(' item','pivot') : __(' items','pivot');
	$background = get_option('blog_header_background');
	$title = get_search_query();
	$sub = __('Found ','pivot') . $total_results . $items . __(' matching','pivot');
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