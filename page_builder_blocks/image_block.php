<?php

class AQ_Image_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Image',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-camera fa-fw"></i>',
			'block_description' => 'Use to add an Image block to the page.',
			'block_category' => 'images'
		);
		parent::__construct('aq_image_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'image' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Upload Image <code>Required</code></p>
		<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
		
		<p class="description">Link Image? Enter URL here. <code>Optional</code></p>
		<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
		
		<div class="text-center">
		
			<?php if( $link ) : ?>
				<a href="<?php echo esc_url($link); ?>">
			<?php endif; ?>
			
					<img src="<?php echo $image; ?>" alt="<?php echo $block_id; ?>" />
			
			<?php if( $link ) : ?>
				</a>
			<?php endif; ?>
		
		</div>
		
	<?php
	}//end block
	
}//end class