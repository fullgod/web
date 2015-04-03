<?php $header_images = get_post_meta($post->ID, '_ebor_header_images', 1); ?>

<section class="article-single dark-wrapper">
	<div class="container">
		<div class="row">

			<?php get_template_part('inc/content','author-alt'); ?>
						
			<div class="col-sm-8">
				<div class="article-body">
					<?php
						if(!( is_array($header_images) )){
							echo '<header class="title">';
							the_title('<h1>', '</h1>');	
							echo '<span class="sub alt-font">'. get_the_date() .' - '. ebor_post_reading_time() .'</span></header>';
						}
						
						the_content();
						wp_link_pages();

						if( comments_open() )
							comments_template();
					?>
				</div><!--end of article body-->
			</div>
			
		</div><!--end of row-->
	</div><!--end of container-->	
</section>