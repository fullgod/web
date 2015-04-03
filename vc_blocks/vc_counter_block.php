<?php 

/**
 * The Shortcode
 */
function ebor_counter_shortcode( $atts ) {
	extract( 
		shortcode_atts( 
			array(
				'subtitle' => '',
				'title' => ''
			), $atts 
		) 
	);
	
	$output = '<div class="stat-counters">
		<div class="stat feature">
			<div class="stat-bubble"><span>'. htmlspecialchars_decode($subtitle) .'</span></div>';
			
	if( $title )
		$output .= '<h3>'. htmlspecialchars_decode($title) .'</h3>';

	$output .= '</div></div>';
	
	return $output;
}
add_shortcode( 'pivot_counter', 'ebor_counter_shortcode' );

/**
 * The VC Functions
 */
function ebor_counter_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'pivot-vc-block',
			"name" => __("Pivot - Counter"),
			"base" => "pivot_counter",
			"category" => __('Pivot - Misc', 'pivot'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => __("Fact Title", 'pivot'),
					"param_name" => "title",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Fact Number", 'pivot'),
					"param_name" => "subtitle",
					"value" => '',
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_counter_shortcode_vc' );