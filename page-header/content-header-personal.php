<?php
	/**
	 * First we want to gather together all our meta, and perform appropriate checks.
	 */	
	
	//images
	$attachments = explode(',', $image);
	
	if(is_array($attachments)) :
?>

<header class="header-icons overlay ebor-pad-me">

	<div class="background-image-holder parallax-background">
		<?php echo wp_get_attachment_image($attachments[0], 'full', false, array('class' => 'background-image')); ?>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
					if( $small )
						echo '<div class="row">
					            <div class="col-sm-4">
					              <h1 class="block-title">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="webpro">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="webpro-reg">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>							  
							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="Futura">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="ProximaNovaT-Thin">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="MonoCondensed-Bold">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="PTSerif-Regular">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="PTSansPro-Caption">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="ProximaNova-Regular">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="ProximaNova-Extrabld">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>							  							  
							  
							  <div class="row">
					            <div class="col-sm-4">
					              <h1 class="Gothic725BlkBT">'. htmlspecialchars_decode($small) .'</h1>
							    </div>
							    <div class="col-sm-8">
								  <hr>
							    </div>
							  </div>
							  
							  ';
						
					if( $big )
						echo '<h1 class="text-white">'. htmlspecialchars_decode($big) .'</h1>';
						
					if( $sub )	
						echo '<p class="lead text-white">'. htmlspecialchars_decode($sub) .'</p>';
				?>
			</div>
		</div>
		
		<div class="row">
			<?php
				if( $shortcode )
					echo do_shortcode(htmlspecialchars_decode($shortcode));
			?>
		</div>

	</div>	
	
</header>

<?php endif;