<?php 
	/**
	 * 404.php
	 * 
	 * The 404 Post Template for Pivot.
	 * Modify this by copying the 404.php file to your child theme and then modify away.
	 * Or translate the text with the included .po file.
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	get_header(); 
?>

	<div class="main-container">
		<section class="no-pad error-page bg-primary fullscreen-element">
			<div class="container align-vertical">
				<div class="row">
					<div class="col-sm-12 text-center">
						<i class="icon icon-compass"></i>
						<h1 class="jumbo"><?php _e('404', 'pivot'); ?></h1>
						<h1><strong><?php _e('Oh dear, we seem to have led you astray!', 'pivot'); ?></strong><br><?php _e("Let's get back on track...", 'pivot'); ?></h1>
						<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-white" target="default"><?php _e('Take Me Home', 'pivot'); ?></a>
					</div>
				</div><!--end of row-->
			</div><!--end of container-->
		</section>
	</div>

<?php get_footer();				