<?php 

/**
 * The Shortcode
 */
function ebor_section_title_ui_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'title' => '',
				'subtitle' => '',
				'f_size' => '',
				'f_color' => '',
				'text_white' => 'No',
				'vertical' => 'No',
				'center' => 'Yes'
			), $atts 
		) 
	);
	
	$output = false;
	
	$font_size = htmlspecialchars_decode($f_size);
	$font_color = htmlspecialchars_decode($f_color);
	$misc_style = htmlspecialchars_decode($m_style);
	$center_text = ( $center == 'Yes' ) ? 'text-center' : ''; 
		
		if( 'Yes' == $vertical )
			$output .= '<div class="ebor-align-vertical no-align-mobile">';
		
			if( $subtitle )
				$output .= '<span class="'. $white_text .' alt-font '. $center_text .' ebor-block">'. htmlspecialchars_decode($subtitle) .'</span>';
			
			if( $title )
				$output .= '<div class="space-top-bottom '. $center_text .'"><h1 class="webpro-reg" style="font-color:' .$misc_style. ''. $font_color .'px; font-size:'. $font_size .'px">'. htmlspecialchars_decode($title) .'</h1></div>';
	
			if( $content )
				$output .= '<div class="lead '. $center_text .' '. $white_text .'">'. wpautop(do_shortcode(htmlspecialchars_decode($content))) . '</div>';
			
		if( 'Yes' == $vertical )
			$output .= '</div>';
	
	return $output;
}
add_shortcode( 'pivot_section_title_ui', 'ebor_section_title_ui_shortcode' );

/**
 * The VC Functions
 */
function ebor_section_title_ui_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'pivot-vc-block',
			"name" => __("Pivot - Заголовок блока"),
			"base" => "pivot_section_title_ui",
			"category" => __('Pivot - Text', 'pivot'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => __("Заголовок", 'pivot'),
					"param_name" => "title",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Размер шрифта заголовка", 'pivot'),
					"param_name" => "f_size",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Цвет шрифта заголовка", 'pivot'),
					"param_name" => "f_color",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Подзаголовок", 'pivot'),
					"param_name" => "subtitle",
					"value" => '',
					"description" => ''
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Контент", 'pivot'),
					"param_name" => "content",
					"value" => '',
					'holder' => 'div'
				),
				array(
					"type" => "dropdown",
					"heading" => __("Использовать белый текст?", 'pivot'),
					"param_name" => "text_white",
					"value" => array(
						'No',
						'Yes'
					),
				),				
				array(
					"type" => "dropdown",
					"heading" => __("Текст по центру?", 'pivot'),
					"param_name" => "center",
					"value" => array(
						'Yes',
						'No'
					),
				),
				array(
					"type" => "dropdown",
					"heading" => __("Выравнивание по вертикали?", 'pivot'),
					"param_name" => "vertical",
					"value" => array(
						'No',
						'Yes'
					),
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_section_title_ui_shortcode_vc' );