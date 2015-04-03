<?php 
	$directory = trailingslashit(get_template_directory_uri()); 
	$dark = get_option('dark_logo', $directory . 'style/img/logo-dark.png');
	$light = get_option('light_logo', $directory . 'style/img/logo-light.png');
?>

<nav class="fullscreen-nav overlay-bar">

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo home_url(); ?>">
					<?php
						if( $dark )
							echo '<img class="outer-logo" alt="Logo" src="'. $dark .'">';
					?>
				</a>
			</div>
		</div>
	</div>	

	<div class="fullscreen-nav-toggle">
		<i class="icon icon_menu"></i>
		<i class="icon icon_close"></i>
	</div>
	
	<div class="fullscreen-nav-container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				
					<a href="<?php echo home_url(); ?>">
						<?php
							if( $light )
								echo '<img class="logo logo-light" alt="Logo" src="'. $light .'">';
						?>
					</a>
					
					<?php 
						if ( has_nav_menu( 'fullscreen' ) ){
						    wp_nav_menu( 
						    	array(
							        'theme_location'    => 'fullscreen',
							        'depth'             => 1,
							        'container'         => false,
							        'container_class'   => false,
							        'menu_class'        => 'menu'
						        )
						    );  
						} else {
							echo '<ul class="menu"><li><a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a></li></ul>';
						}
					?>
					
				</div>
			</div>
		</div>
		
	</div>	
</nav>