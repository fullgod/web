<?php 

/**
 * The Shortcode
 */
function ebor_pricing_table_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'title' => '',
				'text' => '',
				'type' => 'dark',
				'currency' => '$',
				'amount' => '3',
				'button_text' => 'Sign Me Up',
				'button_url' => '',
				'detail' => '/mo',
				'feature' => 'no',
				'position' => ''
			), $atts 
		) 
	);
	
	$lines = explode( ',', $text );
	
	ob_start();
		
	if( 'dark' == $type ) :
?>
	
	<div class="pricing-tables">
		<div class="<?php echo $position; ?> pricing-table <?php echo ( 'yes' == $feature ) ? 'emphasis': ''; ?>">
			<div class="price">
				<span class="sub"><?php echo htmlspecialchars_decode($currency); ?></span>
				<span class="amount"><?php echo htmlspecialchars_decode($amount); ?></span>
				<span class="sub"><?php echo htmlspecialchars_decode($detail); ?></span>
			</div>
			<ul class="features">
				<?php 
					foreach( $lines as $line ){
						echo '<li>' . htmlspecialchars_decode($line) . '</li>';
					}
				?>
			</ul>
			<a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary btn-white"><?php echo htmlspecialchars_decode($button_text); ?></a>
		</div>
	</div>
	
<?php else : ?>
	
	<div class="pricing-2">
		<div class="pricing-tables">
			<div class="<?php echo $position; ?> pricing-table <?php echo ( 'yes' == $feature ) ? 'emphasis': ''; ?>">
				<ul class="features">
					<?php 
						if($title)
							echo '<li><strong>'. htmlspecialchars_decode($title) .'</strong></li>';
							
						foreach( $lines as $line ){
							echo '<li>' . htmlspecialchars_decode($line) . '</li>';
						}
					?>
				</ul>
				<div class="price">
					<span class="sub"><?php echo htmlspecialchars_decode($currency); ?></span>
					<span class="amount"><?php echo htmlspecialchars_decode($amount); ?></span>
					<span class="sub"><?php echo htmlspecialchars_decode($detail); ?></span>
				</div>
				<a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary <?php echo ( 'yes' == $feature) ? 'btn-white': ''; ?>"><?php echo htmlspecialchars_decode($button_text); ?></a>
			</div>
		</div>
	</div>
	
<?php
	endif;
	
	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}
add_shortcode( 'pivot_pricing_table', 'ebor_pricing_table_shortcode' );

/**
 * The VC Functions
 */
function ebor_pricing_table_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'pivot-vc-block',
			"name" => __("Pivot - Pricing Table"),
			"base" => "pivot_pricing_table",
			"category" => __('Pivot - Text', 'pivot'),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => __("Position in Row", 'pivot'),
					"param_name" => "position",
					"value" => array(
						'Middle' => 'middle',
						'First' => 'first',
						'Last' => 'last'
					),
				),
				array(
					"type" => "dropdown",
					"heading" => __("Display type", 'pivot'),
					"param_name" => "type",
					"value" => array(
						'Dark Background' => 'dark',
						'Light Background' => 'light'
					),
				),
				array(
					"type" => "dropdown",
					"heading" => __("Feature this pricing table?", 'pivot'),
					"param_name" => "feature",
					"value" => array(
						'No' => 'no',
						'Yes' => 'yes'
					),
				),
				array(
					"type" => "textfield",
					"heading" => __("Title", 'pivot'),
					"param_name" => "title",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Currency", 'pivot'),
					"param_name" => "currency",
					"value" => '$',
				),
				array(
					"type" => "textfield",
					"heading" => __("Amount", 'pivot'),
					"param_name" => "amount",
					"value" => '3',
				),
				array(
					"type" => "textfield",
					"heading" => __("Button Text", 'pivot'),
					"param_name" => "button_text",
					"value" => 'Sign me up',
				),
				array(
					"type" => "textfield",
					"heading" => __("Button URL", 'pivot'),
					"param_name" => "button_url",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Small Detail", 'pivot'),
					"param_name" => "detail",
					"value" => '/mo',
				),
				array(
					"type" => "exploded_textarea",
					"heading" => __("Pricing details, one per line", 'pivot'),
					"param_name" => "text",
					"value" => '',
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_pricing_table_shortcode_vc' );