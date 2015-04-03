<section class="blog-image-snippet">

	<div class="background-image-holder parallax-background">
		<?php the_post_thumbnail('full', array('class' => 'background-image')); ?>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="<?php the_permalink(); ?>">
					<?php the_title('<h1 class="text-white">', '</h1>'); ?>
					<span class="text-white alt-font"><i class="icon icon_calendar"></i> <?php the_time( get_option('date_format') ); ?></span>
					<span class="text-white alt-font"><i class="icon icon_clock"></i> <?php echo ebor_post_reading_time(); ?></span>
				</a>
			</div>	
		</div><!--end of row-->
	</div><!--end of container-->
	
</section>