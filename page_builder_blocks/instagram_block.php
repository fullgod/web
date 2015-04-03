<?php

class AQ_Instagram_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Instagram',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-instagram fa-fw"></i>',
			'block_description' => 'Use to add a feed of recent instagram images.',
			'block_category' => 'social',
			'resizable' => false
		);
		
		//create the block
		parent::__construct('aq_instagram_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'title' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Instagram Username</p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	?>
	
		
		<div class="instagram-feed">
			<div class="container">
				<div class="row text-center">
					<div><span class="alt-font">Insta <i class="icon social_instagram"></i> Gram</span></div>
				</div><!--end of row-->
			</div><!--end of container-->
			
			<div class="instafeed" data-user-name="<?php echo $title; ?>">
				<ul></ul>
			</div>
		</div>
	
	<?php		
	}//end block
	
}//end class