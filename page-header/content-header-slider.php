<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	

	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<section class="hero-slider ebor-pad-me">

	<ul class="slides">
		
		<?php foreach( $attachments as $attachment ) : ?>
			
			<li class="overlay">
				<div class="background-image-holder parallax-background">
					<?php echo wp_get_attachment_image( $attachment, 'full', 0, array('class' => 'background-image') ); ?>
				</div>
				
				<div class="container align-vertical">
					<div class="row">
						<div class="col-md-6 col-sm-9">
							<?php
								if( $small )
									echo '<span class="text-white alt-font">'. htmlspecialchars_decode($small) .'</span>';
									
								if( $big )
									echo '<h1 class="text-white">'. do_shortcode(htmlspecialchars_decode($big)) .'</h1>';
									
								if( $sub )	
									echo '<p class="lead text-white">'. htmlspecialchars_decode($sub) .'</p>';
								
								if( $shortcode )
									echo do_shortcode(htmlspecialchars_decode($shortcode));
							?>
						</div>
					</div>
				</div>
			</li>
			
		<?php endforeach; ?>

	</ul>
	
</section>

<?php 
	endif;