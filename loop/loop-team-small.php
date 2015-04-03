<?php global $wp_query; ?>

<div class="space-bottom-large team-1">
	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			
			/**
			 * Get blog posts by blog layout.
			 */
			get_template_part('loop/content', 'team-small');
			
			if( ($wp_query->current_post + 1) % 3 == 0 )
				echo '<div class="clearfix"></div>';
		
		endwhile;	
		else : 
			
			/**
			 * Display no posts message if none are found.
			 */
			get_template_part('loop/content','none');
			
		endif;
	?>
</div>