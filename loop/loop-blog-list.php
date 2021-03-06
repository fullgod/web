<section class="blog-list-3 bg-white">

	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			
			/**
			 * Get blog posts by blog layout.
			 */
			get_template_part('loop/content', 'post-list');
		
		endwhile;	
		else : 
			
			/**
			 * Display no posts message if none are found.
			 */
			get_template_part('loop/content','none');
			
		endif;
	?>
	
	<?php if( ebor_pagination() ) : ?>
		<div class="blog-snippet-3">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
						?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
</section>