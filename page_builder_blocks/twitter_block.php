<?php

class AQ_Twitter_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Twitter',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-twitter fa-fw"></i>',
			'block_description' => 'Use to add a carousel of recent tweets to the page.',
			'block_category' => 'social',
			'resizable' => false
		);
		
		//create the block
		parent::__construct('aq_twitter_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'title' => '',
			'text' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Twitter Widget ID <code>e.g: 492085717044981760</code><br /><br />
		<strong>Note!</strong> You need to generate this ID from your account, do this by going to the 'Settings' page of your Twitter account and clicking 'Widgets'. Click 'Create New' and then 'Create Widget'. One done, go back to the 'Widgets' page and click 'Edit' on your newly created widget. From here you need to copy the widget id out of the url bar. The widget id is the long numerical string after /widgets/ and before /edit.</p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<p class="description">Content Under Feed</p>
		<?php echo aq_field_editor('text', $block_id, $text) ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
				<i class="icon icon-jumbo social_twitter"></i>
				<div id="tweets" data-widget-id="<?php echo $title; ?>"></div>
				<?php echo wpautop(do_shortcode(htmlspecialchars_decode($text))); ?>
			</div>
		</div>
	
	<?php		
	}//end block
	
}//end class