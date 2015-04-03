<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) : 
?>

<section class="product-right ebor-pad-me">

	<div class="background-image-holder parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<div class="container align-vertical">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<?php
					if( $small )
						echo '<span class="text-white alt-font">'. htmlspecialchars_decode($small) .'</span>';
						
					if( $big )
						echo '<h1>'. htmlspecialchars_decode($big) .'</h1>';
					
					if( $sub )	
						echo '<p class="lead">'. htmlspecialchars_decode($sub) .'</p>';
				
					if( $shortcode )
						echo do_shortcode(htmlspecialchars_decode($shortcode));
				?>
			</div>
		</div>
	</div>
	
	<?php if( isset($attachments[1]) ) : ?>
		<div class="product-image" data-scroll-reveal="enter right and move 100px">
			<?php echo wp_get_attachment_image($attachments[1], 'large', false); ?>
		</div>
	<?php endif; ?>

</section>

<?php endif;