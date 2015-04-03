<?php
	global $post;
	$job = get_post_meta( $post->ID, '_ebor_the_job_title', true );
	$icons = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
?>

<div class="col-sm-4 col-md-3">
	<div class="team-1-member">
		
		<div class="ebor-team-1-image">
			<?php the_post_thumbnail('team-small'); ?>
		</div>
		
		<?php 
			the_title('<h5><a href="'. get_permalink() .'">', '</a></h5>'); 
			
			if( $job )
				echo '<span>'. $job .'</span><br>';
		?>
				
		<?php if( is_array($icons) ) : ?>
			<ul class="social-icons">
				<?php 
					foreach( $icons as $key => $icon ){
						if(!( isset( $icon['_ebor_social_icon_url'] ) ))
							continue;
							
						echo '<li><a href="'. $icon['_ebor_social_icon_url'] .'" target="_blank"><i class="icon '. $icon['_ebor_social_icon'] .'"></i></a></li>';
					}
				?>
			</ul>	
		<?php endif; ?>
		
	</div><!--end of team member-->
</div>