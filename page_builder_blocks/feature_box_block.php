<?php

class AQ_Feature_Box_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Feature Box',
			'size' => 'span6',
			'block_description' => 'Use to add a punchy feature box to the page.',
			'block_category' => 'text',
			'block_icon' => '<i class="fa fa-fw fa-folder-o"></i>'
		);
		
		//create the block
		parent::__construct('aq_feature_box_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'link' => '',
			'image' => '',
			'button_text' => '',
			'sub' => '',
			'target' => 0
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Title <code>Accepts basic HTML</code> <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>

		<p class="description">Subitle <code>Accepts basic HTML</code> <code>Optional</code> <code>Shows above title</code></p>
		<?php echo aq_field_input('sub', $block_id, $sub, $size = 'full') ?>
		
		<p class="description">Block Content</p>
		<?php echo aq_field_editor('text', $block_id, $text) ?>
		
		<hr />
		
		<p class="description">Upload Background Image <code>Required</code></p>
		<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
		
		<hr />
		
		<p class="description">Button Text</p>
		<?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
		
		<p class="description">Button URL</p>
		<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('target', $block_id, $target) ?>
			<p class="description">Open link in new window?</p>
		</div>
	
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if(!( isset($target) ))
			$target = 0;
			
		$target = ( 1 == $target ) ? '_blank': '_self';
	?>
		
		<div class="feature-box">
		
			<div class="background-image-holder overlay">
				<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="background-image" />
			</div>
			
			<div class="inner">
				<?php 
					if( $sub )
						echo '<span class="alt-font text-white">'. htmlspecialchars_decode($sub) .'</span>';
						
					if( $title )
						echo '<h1 class="text-white">'. htmlspecialchars_decode($title) .'</h1>';
				
					if( $text )
						echo '<div class="text-white">'. wpautop(do_shortcode(htmlspecialchars_decode($text))) .'</div>';
					
					if( $link || $button_text )
						echo '<a href="'. esc_url($link) .'" class="btn btn-primary btn-white" target="'. esc_attr($target) .'">'. htmlspecialchars_decode($button_text) .'</a>';
				?>
			</div>
			
		</div>
		
	<?php
	}//end block
	
}//end class