<?php
	get_header();
	the_post();
	
	$icons = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
?>
	
	<section id="post-<?php the_ID(); ?>" class="article-single dark-wrapper">
		<div class="container">
		
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					<div <?php post_class('article-body'); ?>>
					
						<header class="title text-center">
							<div class="author-image">
								<?php the_post_thumbnail('team-small'); ?>
							</div>
							<?php if( is_array($icons) ) : ?>
								<ul class="social-icons text-center">
									<?php 
										foreach( $icons as $key => $icon ){
											if(!( isset( $icon['_ebor_social_icon_url'] ) ))
												continue;
												
											echo '<li><a href="'. $icon['_ebor_social_icon_url'] .'" target="_blank"><i class="icon '. $icon['_ebor_social_icon'] .'"></i></a></li>';
										}
									?>
								</ul>	
							<?php endif; ?>
							<?php
								the_title('<h1>', '</h1>');	
								echo '<span class="sub alt-font">'. get_post_meta( $post->ID, '_ebor_the_job_title', true ) .'</span>';
							?>
						</header>
							
						<?php	
							the_content();
							wp_link_pages();
						?>
						
					</div><!--end of article body-->
					
				</div>
			</div><!--end of row-->
			
		</div><!--end of container-->	
	</section>

<?php	
	get_footer();					