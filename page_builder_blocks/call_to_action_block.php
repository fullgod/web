<?php

class AQ_Call_To_Action_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Call to Action',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-exclamation fa-fw"></i>',
			'block_description' => 'Use to add a Call To Action section to grab attention.',
			'block_category' => 'misc'
		);
		
		//create the block
		parent::__construct('aq_call_to_action_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'lead' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Lead Text</p>
		<?php echo aq_field_input('lead', $block_id, $lead, $size = 'full') ?>
		
		<p class="description">Button Text</p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<p class="description">Button URL</p>
		<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
		
		<div class="row clearfix">
			<div class="col-sm-6 col-xs-12 pull-left">
				<h3 class="text-white"><?php echo htmlspecialchars_decode($lead); ?></h3>
			</div>
			
			<div class="col-sm-4 col-xs-12 pull-right text-right">
				<a href="<?php echo esc_url($text); ?>" class="btn btn-primary btn-white"><?php echo htmlspecialchars_decode($title); ?></a>
			</div>
		</div>
		
	<?php
	}//end block
	
}//end class