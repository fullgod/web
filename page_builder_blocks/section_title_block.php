<?php

class AQ_Section_Title_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Section Title',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-font fa-fw"></i>',
			'block_description' => 'Use to add a title & subtitle to the page section.',
			'block_category' => 'text'
		);
		
		//create the block
		parent::__construct('aq_section_title_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'subtitle' => '',
			'text_white' => 0,
			'vertical' => 0,
			'center' => 1
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Title <code>Accepts basic HTML</code> <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Subtitle <code>Accepts basic HTML</code> <code>Optional</code> <code>Shows above title</code></p>
		<?php echo aq_field_input('subtitle', $block_id, $subtitle, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Block Content</p>
		<?php echo aq_field_editor('text', $block_id, $text) ?>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('text_white', $block_id, $text_white) ?>
			<p class="description">Use white text? <code>If placed on dark background</code></p>
		</div>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('vertical', $block_id, $vertical) ?>
			<p class="description">Vertically Align Text Within Row? <code>Use Sparingly!</code></p>
		</div>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('center', $block_id, $center) ?>
			<p class="description">Centre Align Text?</p>
		</div>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		$white_text = ( $text_white == 1 ) ? 'text-white': '';
		$center_text = ( $center == 1 ) ? 'text-center' : ''; 
		
		if( $vertical )
			echo '<div class="ebor-align-vertical no-align-mobile">';
		
			if( $subtitle )
				echo '<span class="'. $white_text .' alt-font '. $center_text .' ebor-block">'. htmlspecialchars_decode($subtitle) .'</span>';
			
			if( $title )
				echo '<div class="'. $center_text .'"><h1 class="'. $white_text .'">'. htmlspecialchars_decode($title) .'</h1></div>';
	
			if( $text )
				echo '<div class="lead '. $center_text .' '. $white_text .'">'. wpautop(do_shortcode(htmlspecialchars_decode($text))) . '</div>';
			
		if( $vertical )
			echo '</div>';

	}//end block
	
}//end class