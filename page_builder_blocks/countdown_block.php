<?php
class AQ_Countdown_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Text',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-calendar fa-fw"></i>',
			'block_description' => 'Use to add a countdown to a specific date.',
			'block_category' => 'misc'
		);
		
		//create the block
		parent::__construct('aq_countdown_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
				
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<div class="text-center">
			<img alt="logo" class="logo" src="img/logo-light.png">
			<h1 class="text-white">We're getting ready to launch</h1>
			<div class="countdown" data-date="2016, 02, 02"></div>
		</div>
		
	<?php
	}//end block
	
}//end class