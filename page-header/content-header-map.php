<?php 
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	 
	//images
	$attachments = explode(',', $image);
	
	if( '' == $big || !(isset( $big )) || false == $big )
		$big = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5009.805747396725!2d144.97845929871335!3d-37.86445163302962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6686626d1c9bf%3A0x24b207169447a3a5!2sClyde+St%2C+St+Kilda+VIC+3182!5e1!3m2!1sen!2sau!4v1405985274446"></iframe>';
?>

<section class="map-overlay ebor-pad-me">

	<div class="map-holder">
		<?php echo htmlspecialchars_decode($big); ?>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
				<div class="details-holder">
					<div class="align-vertical">
						<?php 
							if( is_array($attachments) )
								echo wp_get_attachment_image($attachments[0], 'full'); 
								
							if( $shortcode )
								echo wpautop(do_shortcode(htmlspecialchars_decode($shortcode)));
						?>
					</div>
				</div>
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
	
</section>