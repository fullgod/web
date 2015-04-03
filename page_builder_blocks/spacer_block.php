<?php

class AQ_Spacer_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Spacer',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-arrows-v fa-fw"></i>',
			'block_description' => 'Use to add vertical spacing to your content.',
			'block_category' => 'layout'
		);
		
		//create the block
		parent::__construct('aq_spacer_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'title' => '70',
			'line' => 0
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Spacer Height</p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full', $type = 'number') ?>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('line', $block_id, $line) ?>
			<p class="description">Show Horizontal Line?</p>
		</div>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if( $line == 0 ) :
	?>
		
		<div style="clear: both; width: 100%; height: <?php echo $title; ?>px;"></div>
	
	<?php	
		else : 
	?>
		
		<div style="clear: both; width: 100%; height: <?php echo round($title / 2); ?>px;"></div>
		<hr class="none" />
		<div style="clear: both; width: 100%; height: <?php echo round($title / 2); ?>px;"></div>
	
	<?php
		endif;	
	}//end block
	
}//end class