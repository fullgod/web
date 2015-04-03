<?php

class AQ_Lightbox_Gallery_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Lightbox Gallery',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-camera fa-fw"></i>',
			'block_description' => 'Use to add a gallery of images, with a lightbox.',
			'block_category' => 'images'
		);
		parent::__construct('aq_lightbox_gallery_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'image' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Manage Images<br /><small>Add and manage your images for this slider here, drag to reorder.</small></p>
		<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'gallery') ?>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		$slides = explode(',', $image);
		
		if( is_array($slides) ) :
	?>
		
		<div class="image-gallery lightbox-gallery-mrv">
			
			<?php foreach( $slides as $id ) : ?>
				<div class="col-sm-4 lightbox-thumbnail-mrv">
					<div class="image-holder" data-scroll-reveal="enter bottom and move 30px">
					
						<?php 
							$item = get_post($id); 
							$image = wp_get_attachment_image_src($id, 'full');
						?>
						
						<a href="<?php echo $image[0]; ?>" class="lightbox-link-mrv" data-lightbox="true" data-title="<?php echo $item->post_title; ?>">
							<div class="background-image-holder">
								<?php echo wp_get_attachment_image($id, 'large', false, array('class' => 'background-image lightbox-image')); ?>
							</div>
						</a>
						
					</div>
				</div>
			<?php endforeach; ?>
		
		</div>
		
	<?php
		endif;
	}//end block
	
}//end class