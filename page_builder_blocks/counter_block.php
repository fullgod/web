<?php

class AQ_Counter_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Stat Counter',
			'size' => 'span3',
			'block_icon' => '<i class="fa fa-lightbulb-o fa-fw"></i>',
			'block_description' => 'Adds a fact counter, use for "Projects Completed.." etc.',
			'block_category' => 'misc'
		);
		
		//create the block
		parent::__construct('aq_counter_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'text' => '75',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Number</p>
		<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
		
		<p class="description">Fact</p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<div class="stat-counters">
			<div class="stat feature">
				<?php
					echo '<div class="stat-bubble"><span>'. htmlspecialchars_decode($text) .'</span></div>';
				
					if( $title )
						echo '<h3>'. htmlspecialchars_decode($title) .'</h3>';
				?>
			</div>
		</div>
	
	<?php		
	}//end block
	
}//end class