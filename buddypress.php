<?php
	/**
	 * The default page template for Pivot
	 * Various checks used to see if we're running a template for various plugins
	 * Falls back to a standard page with a sidebar if that's what we need.
	 * 
	 * @author tommusrhodus
	 * @since 1.0.0
	 */
	get_header();
	the_post();
?>

	<section class="article-single dark-wrapper">
		<div class="container">
		
			<div class="row">
			
				<div class="col-md-9">
					<div id="page-<?php the_ID(); ?>" <?php post_class('article-body'); ?>>
						<?php
							the_content();
							wp_link_pages();
						?>
					</div><!--end of article body-->
				</div>
				
				<?php get_sidebar('buddypress'); ?>
				
			</div><!--end of row-->
			
		</div><!--end of container-->	
	</section>

<?php get_footer();			