<?php

class AQ_Masterslider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Master Slider',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-image fa-fw"></i>',
			'block_description' => 'Add a registered Masterslider to your page.',
			'block_category' => 'sliders'
		);
		
		//create the block
		parent::__construct('aq_masterslider_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'slider' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$sliders = get_masterslider_names();
		
		if( $sliders ) :
	?>
		
		<p class="description">Choose a Masterslider Slider to Display</p>
		<?php echo aq_field_select('slider', $block_id, $sliders, $slider) ?>
		
	<?php else : ?>
	
		<p class="description">Please Add Some Masterslider Sliders</p>
		
	<?php
		endif;
	}// end form
	
	function block($instance) {
		extract($instance);
		
		masterslider( $slider );
		
	}//end block
	
}//end class