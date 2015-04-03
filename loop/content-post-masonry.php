<?php 
	$format = get_post_format(); 
	$author = get_post_meta( $post->ID, '_ebor_quote_author', true ); 
	$date = get_post_meta( $post->ID, '_ebor_quote_date', true );
?>

<div class="col-md-4 col-sm-6 blog-masonry-item">

	<?php if( 'quote' == $format ) : ?>
		
		<div class="item-inner quote-post">
			<div class="post-title">
				<?php the_title('<h1>', '</h1>'); ?>
				<div class="post-meta">
					<?php
						if( $author )
							echo '<span class="sub alt-font">'. $author .'</span>';
							
						if( $date )
							echo '<span class="sub alt-font">'. $date .'</span>';
					?>
				</div>
				<a href="<?php the_permalink(); ?>" class="link-text">
					<?php echo get_option('blog_continue', 'Read More'); ?>
				</a>
			</div>
		</div>
		
	<?php else : ?>
	
		<div class="item-inner">
			
			<?php if( 'video' == $format ) : ?>
			
				<?php 
					$oembed = get_post_meta( $post->ID, '_ebor_videos', true ); 
					
					if( is_array( $oembed) ){
						foreach( $oembed as $item ){
							echo '<div class="fitvids">'. wp_oembed_get(esc_url($item['_ebor_the_oembed'])) .'</div>';
						}	
					}
				?>
				
			<?php elseif( has_post_thumbnail() ) : ?>
			
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('blog-grid'); ?>
				</a>
				
			<?php endif; ?>
			
			<div class="post-title">
				<?php 
					the_title('<h2><a href="'. get_permalink() .'">', '</a></h2>'); 
					the_excerpt();
				?>
				<div class="post-meta">
					<span class="sub alt-font"><?php the_time( get_option('date_format') ); ?></span>
					<span class="sub alt-font"><?php echo ebor_post_reading_time(); ?></span>
				</div>
				<a href="<?php the_permalink(); ?>" class="link-text">
					<?php echo get_option('blog_continue', 'Read More'); ?>
				</a>
			</div>
			
		</div>
		
	<?php endif; ?>
	
</div>