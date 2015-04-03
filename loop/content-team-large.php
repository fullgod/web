<?php
	global $post;
	$job = get_post_meta( $post->ID, '_ebor_the_job_title', true );
	$icons = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
?>

<div class="col-md-6 team-2-member">

	<div class="image-holder">
	
		<?php the_post_thumbnail('full', array('class' => 'background-image')); ?>
		
		<div class="hover-state">
			<?php if( is_array($icons) ) : ?>
			<ul class="social-icons align-vertical">
				<?php 
					foreach( $icons as $key => $icon ){
						if(!( isset( $icon['_ebor_social_icon_url'] ) ))
							continue;
							
						echo '<li><a href="'. $icon['_ebor_social_icon_url'] .'" target="_blank"><i class="icon '. $icon['_ebor_social_icon'] .'"></i></a></li>';
					}
				?>
			</ul>	
			<?php endif; ?>
		</div>
		
	</div>
	
	<?php
		the_title('<span class="name"><a href="'. get_permalink() .'">', '</a></span>');
		the_excerpt();
	?>
	
</div>