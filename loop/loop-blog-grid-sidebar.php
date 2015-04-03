<section class="dark-wrapper">
	<div class="container">
		<div class="row">
		
			<div class="col-md-9">
				<div class="row">
				
					<?php 
						global $wp_query;
						
						if ( have_posts() ) : while ( have_posts() ) : the_post();
				
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', 'post-grid-sidebar');
							
							if( ($wp_query->current_post + 1) % 2 == 0 && !( ($wp_query->current_post + 1) == $wp_query->post_count ) )
								echo '</div><div class="row">';
						
						endwhile;	
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
					?>
					
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
						?>
					</div>
				</div>
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>	
	</div>
</section>