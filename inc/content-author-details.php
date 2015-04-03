<?php 
	global $post;
	
	$icons = get_user_meta( $post->post_author, '_ebor_user_social_icons', true ); 
?>

<div class="author-image">
	<?php echo get_avatar( get_the_author_meta('email'), 172 ); ?>
</div>

<h5><?php echo the_author_posts_link(); ?></h5>
<?php echo wpautop( htmlspecialchars_decode( get_the_author_meta('description') ) ); ?>

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
<?php endif;