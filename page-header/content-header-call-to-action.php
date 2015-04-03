<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<section class="action-banner overlay ebor-pad-me">

	<div class="background-image-holder parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
				<?php
					if( $small )
						echo '<span class="text-white alt-font">'. htmlspecialchars_decode($small) .'</span>';
						
					if( $big )
						echo '<h1 class="text-white">'. htmlspecialchars_decode($big) .'</h1>';
					
					if( $sub )	
						echo '<h2 class="text-white">'. htmlspecialchars_decode($sub) .'</h2>';
				
					if( $shortcode )
						echo do_shortcode(htmlspecialchars_decode($shortcode));
				?>
			</div>
		</div>
	</div>
	
</section>

<?php endif;