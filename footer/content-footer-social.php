<?php 
	$protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); 
	$title = get_option('social_footer_title', 'Get In Touch');
	$subtitle = get_option('social_footer_subtitle', 'hello@email.com');
?>

<footer class="social bg-secondary-1">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				
				<?php
					if( $title )
						echo '<h1 class="text-white">' . do_shortcode(htmlspecialchars_decode($title)) . '</h1>';
					
					if( $subtitle )
						echo '<div class="text-white lead"><strong>' . do_shortcode(htmlspecialchars_decode($subtitle)) . '</strong></div>';
				?>
				
				<ul class="social-icons">
					<?php
						for( $i = 1; $i < 7; $i++ ){
							if( get_option("footer_social_url_$i") ) {
								echo '<li>
									      <a href="' . esc_url(get_option("footer_social_url_$i"), $protocols) . '" target="_blank">
										      <i class="icon ' . get_option("footer_social_icon_$i") . '"></i>
									      </a>
									  </li>';
							}
						} 
					?>
				</ul>
				<br />
				
				<span class="sub">
					<?php echo htmlspecialchars_decode(get_option('subfooter_text','Copyright 2014 TommusRhodus - All Rights Reserved')); ?>
				</span>
				
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</footer>