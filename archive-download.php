<?php 
	global $wp_query;
	
	get_header(); 
	$background = get_option('blog_header_background');
?>
	
	<header class="page-header title ebor-pad-me">
		
		<?php if( $background ) : ?>
			<div class="background-image-holder parallax-background">
				<img class="background-image" alt="Background Image" src="<?php echo $background; ?>">
			</div>
		<?php endif; ?>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<?php echo '<h1 class="text-white">'. __('Downloads','pivot') .'</h1>'; ?>
				</div>
			</div><!--end of row-->
		</div><!--end of container-->
		
	</header>
	
	<section class="dark-wrapper">
		<div class="container">
			<div class="row">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<div class="col-md-4 col-sm-6">
						<div class="blog-snippet-1">
							
							<?php if( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('blog-grid'); ?>
								</a>
							<?php endif; ?>
							
							<?php the_title('<h2><a href="'. get_permalink() .'">', '</a></h2>'); ?>
							
							<span class="sub alt-font">
								<?php 
									if(!( edd_has_variable_prices( $post->ID ) )){
										echo edd_price( $post->ID );
									} else {
										echo edd_price_range( $post->ID ); 
									}
								?>
							</span>
							
							<?php the_excerpt(); ?>
							
							<?php echo edd_get_purchase_link(get_the_ID(), 'Add to Cart', 'button'); ?>
							
						</div>
					</div>
					
				<?php		
						if( ($wp_query->current_post + 1) % 3 == 0 && !( ($wp_query->current_post + 1) == $wp_query->post_count ) )
							echo '</div><div class="row">';
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
				
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
	</section>

<?php
	get_footer();	