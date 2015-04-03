<?php

class AQ_Testimonial_Carousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Testimonial Carousel',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a carousel of testimonials to the page.',
			'block_category' => 'carousels',
			'block_icon' => '<i class="fa fa-quote-left fa-fw"></i>',
		);
		parent::__construct('aq_testimonial_carousel_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'filter' => 'all'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'testimonial_category'
		); 
			
		$filter_options = get_categories( $args );
	?>
	
		<p class="description">Show Testimonials from a specific category?</p>
		<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
	
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	
		$query_args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => -1
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'testimonial_category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'testimonial_category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$testimonial_query = new WP_Query( $query_args );	
	?>
		
		<div class="col-sm-8 col-sm-offset-2">
			<div class="testimonials-slider text-center">
				<ul class="slides">
					
					<?php 
						if ( $testimonial_query->have_posts() ) : while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); 
					?>
					
						<li>
							<?php 
								echo '<p class="text-white lead">'. htmlspecialchars_decode( get_the_content() ) .'</p>';
								the_title('<span class="author text-white">', '</span>');
							?>
						</li>
					
					<?php
						endwhile;
						else : 
					?>
						
						<li>
							<?php get_template_part('loop/content','none'); ?>
						</li>
						
					<?php		
						endif;
						wp_reset_query();
					?>

				</ul>
			</div>
		</div>
			
	<?php	
	}//end block
	
}//end class