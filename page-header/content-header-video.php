<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<section class="hero-divider ebor-pad-me">

	<div class="background-image-holder parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<?php if( $youtube ) : ?>
		<div class="video-wrapper youtube-bg">
			<?php echo wp_oembed_get($youtube, array( 'background' => 1 )); ?>
		</div>
	<?php else : ?>
		<div class="video-wrapper">
			<video autoplay="" muted="" loop="">
				<source src="<?php echo $webm; ?>" type="video/webm">
				<source src="<?php echo $mpfour; ?>" type="video/mp4">
				<source src="<?php echo $ogv; ?>" type="video/ogg">	
			</video>
		</div>
	<?php endif; ?>
	
	<div class="container align-vertical">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
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
			
</section>

<?php 
	endif;