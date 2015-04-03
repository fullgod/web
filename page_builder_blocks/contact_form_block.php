<?php

class AQ_Contact_Form_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Contact Form',
			'size' => 'span12',
			'block_description' => 'Use to add a Contact Form 7 form to the page.',
			'block_category' => 'forms',
			'block_icon' => '<i class="fa fa-fw fa-envelope-o"></i>'
		);
		
		//create the block
		parent::__construct('aq_contact_form_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'filter' => '',
			'post' => ''
		);
		
		$args = array(
			'post_type' => 'wpcf7_contact_form',
			'posts_per_page' => -1
		); 
		

		$filter_options = get_posts( $args );
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Title <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Show which Contact Form?</p>
		<?php echo ebor_post_select('post', $block_id, $filter_options, $post); ?>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if( $title )
			echo '<h5>' . htmlspecialchars_decode($title) . '</h5>';
	?>
		
		<div class="form-wrapper clearfix">
			<div class="form-contact email-form text-center">	
				<?php echo do_shortcode('[contact-form-7 id="'. $post .'"]'); ?>
			</div>
		</div>
	
	<?php	
	}//end block
	
}//end class