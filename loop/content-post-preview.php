<li id="post-<?php the_ID(); ?>">

	<div class="icon">
		<i class="icon icon-pencil"></i>
	</div>
	
	<div class="title">
		<?php the_title('<a href="'. get_permalink() .'">', '</a>'); ?>
		<span class="sub alt-font">
			<?php 
				_e('Published on ','pivot');
				the_time( get_option('date_format') );
			?>
		</span>
	</div>
	
</li>