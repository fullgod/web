<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	 
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<header class="fullscreen-element no-pad centered-text">
		
	<div class="background-image-holder overlay parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<div class="container align-vertical">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					if( $small )
						echo '<span class="text-white alt-font">'. htmlspecialchars_decode($small) .'</span>';
					
					if( $big )
						echo '<h1 class="text-white">'. htmlspecialchars_decode($big) .'</h1>';
					
					if( $sub )	
						echo '<p class="lead text-white">'. htmlspecialchars_decode($sub) .'</p>';
						
					if( $shortcode )
						echo do_shortcode(htmlspecialchars_decode($shortcode));
				?>
			</div>
		</div>
	</div>
	
	<?php if ( $blog_posts == 1 ) : ?>
		<div class="bottom-band">
			<div class="container">
				<div class="row">
					
					<?php
						$query_args = array(
							'post_type' => 'post',
							'posts_per_page' => 3
						);
					
						$block_query = new WP_Query( $query_args );
					?>
					
					<?php if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post(); ?>
						<div class="col-sm-4">
							<?php the_title('<span class="sub alt-font text-white">'. get_the_time( get_option('date_format') ) .'</span><h3 class="text-white">', '</h3><a href="'. get_permalink() .'" class="link-text text-white">'. get_option('blog_continue', 'Read More') .'</a>'); ?>
						</div>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
	
				</div>
			</div>
		</div>
	<?php endif; ?>
	
</header>

<?php endif;