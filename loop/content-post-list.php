<div class="blog-snippet-3">
	<div class="container">
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			
				<?php the_title('<h1><a href="'. get_permalink() .'">', '</a></h1>'); ?>
				
				<div class="lead">
					<?php the_excerpt(); ?>
				</div>
				
				<i class="icon icon_calendar"></i>
				<span class="alt-font">
					<?php 
						_e('Published ','pivot'); 
						the_time( get_option('date_format') );
					?>
				</span>
				
				<br />
				
				<i class="icon icon_clock_alt"></i>
				<span class="alt-font">
					<?php echo ebor_post_reading_time(); ?>
				</span>
				
			</div>
			
		</div><!--end of row-->
	</div><!--end of container-->	
</div><!--end of blog-snippet-3-->