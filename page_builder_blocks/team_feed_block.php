<?php

class AQ_Team_Feed_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Team Feed',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a feed of "Team" posts to the page.',
			'block_category' => 'feeds',
			'block_icon' => '<i class="fa fa-user-md fa-fw"></i>',
		);
		parent::__construct('aq_team_feed_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'layout' => 'large'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'team_category'
		); 
			
		$filter_options = get_categories( $args );
		
		$layout_options = array(
			'large' => 'Large (2 Columns)',
			'small' => 'Small (3 Columns)',
			'tiny' => 'Tiny (4 Columns)'
		);
	?>
		
		<p class="description">Display Style</p>
		<?php echo aq_field_select('layout', $block_id, $layout_options, $layout) ?>
		
		<p class="description">Posts Per Page</p>
		<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
		
		<p class="description">Show a specific Team Category?</p>
		<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	
		$query_args = array(
			'post_type' => 'team',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'team_category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'team_category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$block_query = new WP_Query( $query_args );	
		
		if( 'large' == $layout ) :
	?>
			
		<div class="col-md-8 col-md-offset-2 col-sm-12">
			<?php 
				if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post(); 

					get_template_part('loop/content','team-large');
					
					if( ($block_query->current_post + 1) % 2 == 0 )
						echo '<div class="clearfix"></div>';
						
				endwhile;
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part('loop/content','none');
					
				endif;
				wp_reset_query();
			?>
		</div>
		
	<?php elseif( 'tiny' == $layout ) : ?>
			
		<div class="team-1">
			<?php 
				if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post(); 

					get_template_part('loop/content','team-tiny');
					
					if( ($block_query->current_post + 1) % 4 == 0 )
						echo '<div class="clearfix"></div>';
						
				endwhile;
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part('loop/content','none');
					
				endif;
				wp_reset_query();
			?>
		</div>
				
	<?php else : ?>
		
		<div class="space-bottom-large team-1"> 
			<?php 
				if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post(); 

					get_template_part('loop/content','team-small');
					
					if( ($block_query->current_post + 1) % 3 == 0 )
						echo '<div class="clearfix"></div>';
						
				endwhile;
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part('loop/content','none');
					
				endif;
				wp_reset_query();
			?>
		</div>
				
	<?php
		endif;
	}//end block
	
}//end class