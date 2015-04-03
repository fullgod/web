<?php

class AQ_Slider_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Slider',
			'size' => 'span12',
			'block_description' => 'Add a slider of images into the page.',
			'block_icon' => '<i class="fa fa-image fa-fw"></i>',
			'block_category' => 'sliders'
		);
		parent::__construct('AQ_Slider_Block', $block_options);
	}//end construct
	
	function form($instance) {
	
		$defaults = array(
			'image' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>

		<p class="description">Manage Images<br /><small>Add and manage your images for this slider here, drag to reorder.</small></p>
		<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'gallery') ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$slides = explode(',', $image);
		
		if( is_array($slides) ) :
	?>
		
		<div class="image-slider image-gallery">
			<ul class="slides">
				<?php 
					foreach( $slides as $ID ){
						echo '<li>'. wp_get_attachment_image( $ID, 'full' ) .'</li>';	
					}
				?>
			</ul>
		</div>
		
	<?php
		endif;
		
	}//end block

}