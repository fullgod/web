<?php 
	get_header(); 
	
	$title = get_option('team_title','Our Team');
	$subtitle = get_option('team_subtitle','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta.');
?>

	<section class="dark-wrapper">
	
		<?php if( $title || $subtitle ) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
						<?php
							if( $title )
								echo '<h1>'. htmlspecialchars_decode($title) .'</h1>';
							
							if( $subtitle )
								echo '<div class="lead">'. wpautop(do_shortcode(htmlspecialchars_decode($subtitle))) .'</div>';
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="container">	
			<div class="row">
				
				<?php get_template_part('loop/loop', get_option('team_layout', 'team-large')); ?>
				
			</div>
		</div>
		
	</section>

<?php get_footer();