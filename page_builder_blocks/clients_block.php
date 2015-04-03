<?php

class AQ_Clients_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Clients',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add your "Clients" posts to the page.',
			'block_category' => 'feeds',
			'block_icon' => '<i class="fa fa-users fa-fw"></i>',
		);
		parent::__construct('aq_clients_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '8',
			'filter' => 'all',
			'type' => 'grid'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'client_category'
		); 
			
		$filter_options = get_categories( $args );
		
		$display_types = array(
			'grid' => 'Bordered Grid',
			'row' => 'Row',
		);
	?>
		
		<p class="description">Display Style</p>
		<?php echo aq_field_select('type', $block_id, $display_types, $type) ?>

		<p class="description">Show how many clients?</p>
		<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
		
		<p class="description">Show Clients from a specific category?</p>
		<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	
		$query_args = array(
			'post_type' => 'client',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'client_category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'client_category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$block_query = new WP_Query( $query_args );
		
		if( 'row' == $type ) :
	?>
		
		<div class="clients-2">
			<?php
				$amount = (12 / $pppage);
				
				if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
					
					echo '<div class="col-md-'. $amount .' col-sm-4">';
					get_template_part('loop/content','client');
					echo '</div>';
					
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
		
		<div class="row client-row">
			<div class="row-wrapper">
				
				<?php 
					if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
						
						get_template_part('loop/content','client-alt');
						
					if( ($block_query->current_post + 1) % 4 == 0 && !( ($block_query->current_post) + 1 == $pppage ) )
						echo '</div></div><div class="row client-row"><div class="row-wrapper">';
						
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
		</div>

	<?php	
		endif;
		
	}//end block
	
}//end class