<?php

class AQ_Blog_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Blog Feed',
			'size' => 'span12',
			'block_description' => 'Add a feed of blog posts to the page.',
			'block_category' => 'feeds',
			'block_icon' => '<i class="fa fa-fw fa-pencil"></i>'
		);
		parent::__construct('aq_blog_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'type' => 'preview',
			'pagination' => 0
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'category'
		); 
			
		$filter_options = get_categories( $args );
		
		$blog_types = array(
			'preview' => 'Preview List',
			'grid' => '3 Column Grid',
			'grid-sidebar' => '2 Column Grid & Sidebar',
			'masonry' => 'Masonry Grid',
			'masonry-sidebar' => 'Masonry Grid & Sidebar',
			'list' => 'Big List',
			'list-images' => 'Big List With Background Images'
		);
	?>
		
		<p class="description">Blog Style</p>
		<?php echo aq_field_select('type', $block_id, $blog_types, $type) ?>
		
		<p class="description">Posts Per Page</p>
		<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
		
		<p class="description">Show posts from a specific category?</p>
		<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('pagination', $block_id, $pagination) ?>
			<p class="description">Show Pagination?</p>
		</div>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		// Fix for pagination
		if( is_front_page() ) { 
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
		} else { 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
		}
		
		/**
		 * Setup post query
		 */
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => $pppage,
			'paged' => $paged
		);
		
		/**
		 * Set up category query if needed
		 */
		if (!( $filter == 'all' )) {
			
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'category', true);
			}
			
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $filter
				)
			);
			
		}
	
		$block_query = new WP_Query( $query_args );
	?>
	
		<?php if( $type == 'preview' ) : ?>
			
			<ul class="blog-snippet-2">
				<?php 
					if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'post-preview');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
			</ul>	
			<?php if( 1 == $pagination ) : ?>
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
						?>
					</div>
				</div>
			<?php endif; wp_reset_query(); ?>
			
		<?php elseif( $type == 'grid' ) : ?>
			
			<div class="row">
				<?php 
					if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
			
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'post-grid');
						
						if( ($block_query->current_post + 1) % 3 == 0 && !( ($block_query->current_post + 1) == $block_query->post_count ) )
							echo '</div><div class="row">';
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
				<?php if( 1 == $pagination ) : ?>
					<div class="col-sm-12">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
						?>
					</div>
				<?php endif; wp_reset_query(); ?>
			</div>
			
		<?php elseif( $type == 'grid-sidebar' ) : ?>
		
			<div class="row">
				<div class="col-md-9">
					<div class="row">
					
						<?php 
							if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
					
								/**
								 * Get blog posts by blog layout.
								 */
								get_template_part('loop/content', 'post-grid-sidebar');
								
								if( ($block_query->current_post + 1) % 2 == 0 && !( ($block_query->current_post + 1) == $block_query->post_count ) )
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
					<?php if( 1 == $pagination ) : ?>
						<div class="row">
							<div class="col-sm-12">
								<?php
									/**
									 * Post pagination, use ebor_pagination() first and fall back to default
									 */
									echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
								?>
							</div>
						</div>
					<?php endif; wp_reset_query(); ?>
				</div>
				
				<?php get_sidebar(); ?>
			</div>
			
		<?php elseif( $type == 'masonry' ) : ?>
			
			<div class="row">
				<div class="blog-masonry-container">
					
					<?php 
						if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
							
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', 'post-masonry');
						
						endwhile;	
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
					?>
				
				</div><!--end of blog masonry container-->
				<?php if( 1 == $pagination ) : ?>
					<div class="col-sm-12">
						<?php
							/**
							 * Post pagination, use ebor_pagination() first and fall back to default
							 */
							echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
						?>
					</div>
				<?php endif; wp_reset_query(); ?>
			</div><!--end of row-->
			
		<?php elseif( $type == 'masonry-sidebar' ) : ?>
			
			<div class="row">
			
				<div class="col-md-9">
					<div class="row">
						<div class="blog-masonry-container">
				
							<?php 
								if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
									
									/**
									 * Get blog posts by blog layout.
									 */
									get_template_part('loop/content', 'post-masonry-sidebar');
								
								endwhile;	
								else : 
									
									/**
									 * Display no posts message if none are found.
									 */
									get_template_part('loop/content','none');
									
								endif;
							?>
				
						</div><!--end of blog masonry container-->
						<?php if( 1 == $pagination ) : ?>
							<div class="col-sm-12">
								<?php
									/**
									 * Post pagination, use ebor_pagination() first and fall back to default
									 */
									echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
								?>
							</div>
						<?php endif; wp_reset_query(); ?>
					</div>
				</div>
				
				<?php get_sidebar(); ?>
				
			</div><!--end of row-->
			
		<?php elseif( $type == 'list' ) : ?>
			
			<section class="blog-list-3 bg-white">
			
				<?php 
					if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
						
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
				
				<?php if( 1 == $pagination ) : ?>
					<div class="blog-snippet-3">
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
									<?php
										/**
										 * Post pagination, use ebor_pagination() first and fall back to default
										 */
										echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
									?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; wp_reset_query(); ?>
				
			</section>
			
		<?php elseif( $type == 'list-images' ) : ?>
		
			<section class="blog-list-3 bg-white">
			
				<?php 
					if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
						
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
				
				<?php if( 1 == $pagination ) : ?>
					<section>
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<?php
										/**
										 * Post pagination, use ebor_pagination() first and fall back to default
										 */
										echo function_exists('ebor_pagination') ? ebor_pagination($block_query->max_num_pages) : posts_nav_link();
									?>
								</div>	
							</div><!--end of row-->
						</div><!--end of container-->
					</section>
				<?php endif; wp_reset_query(); ?>
				
			</section>
			
		<?php endif; ?>
			
	<?php	
	}//end block
	
}//end class