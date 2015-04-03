<?php
	global $post;
	$job = get_post_meta( $post->ID, '_ebor_the_job_title', true );
?>

<div class="col-sm-4">
	<div class="team-1-member">
		<div class="ebor-team-1-image">
			<?php the_post_thumbnail('team-small'); ?>
		</div>
		<?php
			the_title('<h2><a href="'. get_permalink() .'">', '</a></h2>');
			
			if( $job )
				echo '<h5>'. $job .'</h5>';
				
			echo '<div class="space-top-small"></div>';
			the_excerpt();
		?>
	</div><!--end of team member-->
</div>