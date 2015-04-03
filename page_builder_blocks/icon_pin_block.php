<?php

class AQ_Icon_Pin_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Icon Block',
			'size' => 'span3',
			'block_icon' => '<i class="fa fa-flag-o fa-fw"></i>',
			'block_description' => 'Use to add some text with a Highlighted Icon.',
			'block_category' => 'text'
		);
		parent::__construct('aq_icon_pin_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'sub' => '',
			'small' => '',
			'icon' => '',
			'link' => ''
		);
		
		$icon_options = ebor_get_icons();
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Title Text <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<p class="description">Subtitle Text <code>Optional</code></p>
		<?php echo aq_field_input('sub', $block_id, $sub, $size = 'full') ?>
		
		<p class="description">Small Text <code>Optional</code></p>
		<?php echo aq_field_input('small', $block_id, $small, $size = 'full') ?>
		
		<p class="description">Link icon? Enter URL. <code>Optional</code></p>
		<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
		
		<hr />
		
		<div class="description cf">
			<div class="icon-modal">
				<div class="icon-modal-inner">
				
					<div class="icon-modal-title">
						<a href="#" class="icon-modal-closer"><i class="fa fa-times"></i></a>
						<h3>Choose an Icon</h3>
						<div class="cf"></div>
					</div>
					
					<div class="ebor-modal-content">
						<?php
							foreach($icon_options as $key) {
								$class = ( $key == $icon ) ? 'active' : '';
								echo '<div class="ebor-modal-icon '. $class .'" data-ebor-icon="'. $key .'"><i class="icon '. $key .'"></i></div>';
							}
						?>
					</div>
					
				</div>
			</div>
			<p class="description">Icon <code>Leave Blank for No Icon</code></p>
			<a href="#" class="ebor-icon-modal-launcher button button-primary one_third text-center">Choose Icon</a>
			<div class="two_thirds last">
				<?php echo aq_field_input('icon', $block_id, $icon, $size = 'full') ?>
			</div>
		</div>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if(!( isset($link) ))
			$link = false;
	?>
		
		<div class="text-center milestones">
			<div class="feature feature-icon-large">
				
				<?php 
					if( $icon ){
						if( $link ){
							echo '<a href="'. esc_url($link) .'"><i class="icon '. $icon .'"></i></a><div class="pin-body"></div><div class="pin-head"></div>';
						} else {
							echo '<i class="icon '. $icon .'"></i><div class="pin-body"></div><div class="pin-head"></div>';
						}
					}
						
					if( $title )
						echo '<h5>'. htmlspecialchars_decode($title) .'</h5>';
						
					if( $sub )
						echo '<span>'. htmlspecialchars_decode($sub) .'</span>';
						
					if( $small )
						echo '<span class="sub">'. htmlspecialchars_decode($small) .'</span>';
				?>
				
			</div>
		</div>
		
	<?php			
	}//end block
	
}//end class