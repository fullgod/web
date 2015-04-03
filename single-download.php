<?php
	get_header();
	the_post();
	
	$featured_image = has_post_thumbnail();
	$price = ( edd_has_variable_prices( $post->ID ) ) ? edd_price_range( $post->ID ) : edd_price( $post->ID );
?>
	
	<?php if( $featured_image ) : ?>
		<header class="title ebor-pad-me">
				
			<div class="background-image-holder parallax-background">
				<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('class' => 'background-image')); ?>
			</div>
			
			<div class="container align-bottom">
				<div class="row">
					<div class="col-xs-12">
						<?php 
							the_title('<h1 class="text-white">', '</h1>');
							echo '<span class="sub alt-font text-white">'. $price .'</span>';
						?>
					</div>
				</div>
			</div>
				
		</header>
	<?php endif; ?>
	
	<section id="post-<?php the_ID(); ?>" class="article-single dark-wrapper">
		<div class="container">
		
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					<div class="article-body">
						<?php
							if(!( $featured_image )){
								echo '<header class="title">';
								the_title('<h1>', '</h1>');	
								echo '<span class="sub alt-font">'. $price .'</span></header>';
							}
							
							the_content();
							wp_link_pages();
						?>
					</div><!--end of article body-->
				</div>
			</div><!--end of row-->
			
		</div><!--end of container-->	
	</section>
	
<?php
	get_footer();					