<?php

class AQ_HTML_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Raw HTML',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-font fa-fw"></i>',
			'block_description' => 'Use to add Raw HTML',
			'block_category' => 'text'
		);
		
		//create the block
		parent::__construct('aq_html_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		echo aq_field_textarea('text', $block_id, $text, $size = 'full');
		
	}// end form
	
	function block($instance) {
		extract($instance);

		echo do_shortcode(htmlspecialchars_decode($text));

	}//end block
	
}//end class