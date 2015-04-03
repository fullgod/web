<section class="blog-list-3 bg-white">

	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			
			/**
			 * Get blog posts by blog layout.
			 */
			get_template_part('loop/content', 'post-list-image');
		
		endwhile;	
		else : 
			
			/**
			 * Display no posts message if none are found.
			 */
			get_template_part('loop/content','none');
			
		endif;
	?>
	
	<?php if( ebor_pagination() ) : ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
						?>
					</div>	
				</div><!--end of row-->
			</div><!--end of container-->
		</section>
	<?php endif; ?>
	
</section>