<?php 

/**
 * The Shortcode
 */
function ebor_twitter_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'title' => ''
			), $atts 
		) 
	);
	
	$output = '<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
					<i class="icon icon-jumbo social_twitter"></i>
					<div id="tweets" data-widget-id="'. $title .'"></div>
					'. wpautop(do_shortcode(htmlspecialchars_decode($content))) .'
				</div>
			</div>';
	
	return $output;
}
add_shortcode( 'pivot_twitter', 'ebor_twitter_shortcode' );

/**
 * The VC Functions
 */
function ebor_twitter_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'pivot-vc-block',
			"name" => __("Pivot - Twitter Feed"),
			"base" => "pivot_twitter",
			"category" => __('Pivot - Social', 'pivot'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => __("Twitter Widget ID", 'pivot'),
					"param_name" => "title",
					"value" => '',
					"description" => "Twitter Widget ID <code>e.g: 492085717044981760</code><br /><br />
					<strong>Note!</strong> You need to generate this ID from your account, do this by going to the 'Settings' page of your Twitter account and clicking 'Widgets'. Click 'Create New' and then 'Create Widget'. One done, go back to the 'Widgets' page and click 'Edit' on your newly created widget. From here you need to copy the widget id out of the url bar. The widget id is the long numerical string after /widgets/ and before /edit."
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content Under Feed", 'pivot'),
					"param_name" => "content",
					"value" => '',
					"description" => '',
					'holder' => 'div'
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_twitter_shortcode_vc' );