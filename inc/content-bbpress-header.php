<?php 
	$image = get_option('forum_header');
	$sub = bbp_get_breadcrumb();
?>

	<header class="title ebor-pad-me">
		
		<?php if( $image ) : ?>
			<div class="background-image-holder parallax-background">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
			</div>
		<?php endif; ?>
		
		<div class="container align-bottom">
			<div class="row">
				<div class="col-xs-12">
					<?php 
						the_title('<h1 class="text-white">', '</h1>');
						if( $sub )
							echo '<span class="sub alt-font text-white">'. $sub .'</span>';
					?>
				</div>
			</div>
		</div>
			
	</header>