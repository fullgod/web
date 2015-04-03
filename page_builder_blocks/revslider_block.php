<?php

class AQ_Revslider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Revolution Slider',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-image fa-fw"></i>',
			'block_description' => 'Add a registered Revolution Slider to your page.',
			'block_category' => 'sliders'
		);
		
		//create the block
		parent::__construct('aq_revslider_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'slider' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		// Get Rev Sliders
		global $wpdb;
		$table_name = $wpdb->prefix . 'revslider_sliders';
		$sliders = $wpdb->get_results( "SELECT id, title, alias FROM $table_name" );
		$amount = count($sliders);
		
		$slider_choices = array();
		
		if( is_array($sliders) ){
			for( $i = 0; $i < $amount; $i++ ){
				$slider_choices[$sliders[$i]->alias] = $sliders[$i]->title;
			}
		}
		
		if( is_array($sliders) ) :
	?>
		
		<p class="description">Choose Revolution Slider to Display</p>
		<?php echo aq_field_select('slider', $block_id, $slider_choices, $slider) ?>
		
	<?php else : ?>
	
		<p class="description">Please Add Some Revolution Sliders</p>
		
	<?php
		endif;
	}// end form
	
	function block($instance) {
		extract($instance);
		
		putRevSlider( $slider );
		
	}//end block
	
}//end class