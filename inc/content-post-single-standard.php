<?php $header_images = get_post_meta($post->ID, '_ebor_header_images', 1); ?>

<section id="post-<?php the_ID(); ?>" class="article-single dark-wrapper">
	<div class="container">
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<div class="article-body">
					<?php
						if(!( is_array($header_images) )){
							echo '<header class="title">';
							the_title('<h1>', '</h1>');	
							echo '<span class="sub alt-font">'. get_the_date() .' - '. ebor_post_reading_time() .'</span></header>';
						}
						
						the_content();
						wp_link_pages();
						
						the_tags(__('Tags: ','pivot'),', ','');
					?>
				</div><!--end of article body-->
				
				<?php 
					get_template_part('inc/content', 'author'); 
					
					if( comments_open() )
						comments_template();
				?>
				
			</div>
		</div><!--end of row-->
		
	</div><!--end of container-->	
</section>