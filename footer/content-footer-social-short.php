<?php $protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); ?>

<footer class="short bg-secondary-1">
	<div class="container">
		<div class="row">
		
			<div class="col-sm-10">
				<span class="sub"><?php echo htmlspecialchars_decode(get_option('subfooter_text','Copyright 2014 TommusRhodus - All Rights Reserved')); ?></span>
				<?php
					/**
					 * Subfooter nav menu, allows top level items only
					 */
					if ( has_nav_menu( 'footer' ) ) { 
					    wp_nav_menu( 
						    array(
						        'theme_location'    => 'footer',
						        'depth'             => 1,
						        'container'         => false,
						        'container_class'   => false,
						        'menu_class'        => false
						    ) 
					    );
					}
				?>
			</div>
			
			<div class="col-sm-2 text-right">
				<ul class="social-icons">
					<?php
						for( $i = 1; $i < 3; $i++ ){
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
			</div>
			
		</div><!--end of row-->
	</div><!--end of container-->
</footer>