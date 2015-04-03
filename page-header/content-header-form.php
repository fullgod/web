<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	 
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<header class="signup ebor-pad-me">

	<div class="background-image-holder parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
				<?php
					if( $small )
						echo '<span class="text-white alt-font">'. htmlspecialchars_decode($small) .'</span>';
						
					if( $big )
						echo '<h1 class="text-white">'. htmlspecialchars_decode($big) .'</h1>';
					
					if( $sub )	
						echo '<p class="lead text-white">'. htmlspecialchars_decode($sub) .'</p>';
				?>
			</div>
		</div>
		
		<?php if( $shortcode ) : ?>
			<div class="row text-center">
				<div class="col-sm-12 text-center">
					<div class="photo-form-wrapper clearfix">
						<?php echo do_shortcode(htmlspecialchars_decode($shortcode)); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
	</div>	
		
</header>

<?php endif;