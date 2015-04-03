<footer class="details">
	<div class="container">
	
		<div class="row">
		
			<?php
				if( is_active_sidebar('footer-sidebar') && !( is_active_sidebar('footer-sidebar-2') ) && !( is_active_sidebar('footer-sidebar-3') ) && !( is_active_sidebar('footer-sidebar-4') ) ){
					echo '<div class="col-sm-12">';
						dynamic_sidebar('footer-sidebar');
					echo '</div>';
				}
					
				if( is_active_sidebar('footer-sidebar-2') && !( is_active_sidebar('footer-sidebar-3') ) && !( is_active_sidebar('footer-sidebar-4') ) ){
					echo '<div class="col-sm-6">';
						dynamic_sidebar('footer-sidebar');
					echo '</div><div class="col-sm-6">';
						dynamic_sidebar('footer-sidebar-2');
					echo '</div><div class="clear"></div>';
				}
					
				if( is_active_sidebar('footer-sidebar-3') && !( is_active_sidebar('footer-sidebar-4') ) ){
					echo '<div class="col-sm-4">';
						dynamic_sidebar('footer-sidebar');
					echo '</div><div class="col-sm-4">';
						dynamic_sidebar('footer-sidebar-2');
					echo '</div><div class="col-sm-4">';
						dynamic_sidebar('footer-sidebar-3');
					echo '</div><div class="clear"></div>';
				}
				
				if( is_active_sidebar('footer-sidebar-4') ){
					echo '<div class="col-sm-3">';
						dynamic_sidebar('footer-sidebar');
					echo '</div><div class="col-sm-3">';
						dynamic_sidebar('footer-sidebar-2');
					echo '</div><div class="col-sm-3">';
						dynamic_sidebar('footer-sidebar-3');
					echo '</div><div class="col-sm-3">';
						dynamic_sidebar('footer-sidebar-4');
					echo '</div><div class="clear"></div>';
				}
			?>
			
		</div><!--end of row-->
		
		<div class="row">
			<div class="col-sm-12">
				<span class="sub"><?php echo htmlspecialchars_decode(get_option('subfooter_text','Copyright 2014 TommusRhodus - All Rights Reserved')); ?></span>
			</div>
		</div>
		
	</div><!--end of container-->
</footer>