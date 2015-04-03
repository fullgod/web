<?php

class AQ_Social_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Big Social Icons',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-instagram fa-fw"></i>',
			'block_description' => 'Use to add a block of social icon links to the page.',
			'block_category' => 'social',
			'resizable' => false
		);
		
		//create the block
		parent::__construct('aq_social_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'twitter_text' => 'Follow On Twitter',
			'facebook_text' => 'Follow On Facebook',
			'dribbble_text' => 'Follow On Dribbble',
			'tumblr_text' => 'Follow On Tumblr',
			'twitter_url' => '',
			'facebook_url' => '',
			'dribbble_url' => '',
			'tumblr_url' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Twitter Text</p>
		<?php echo aq_field_input('twitter_text', $block_id, $twitter_text, $size = 'full') ?>
		
		<p class="description">Twitter URL</p>
		<?php echo aq_field_input('twitter_url', $block_id, $twitter_url, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Facebook Text</p>
		<?php echo aq_field_input('facebook_text', $block_id, $facebook_text, $size = 'full') ?>
		
		<p class="description">Facebook URL</p>
		<?php echo aq_field_input('facebook_url', $block_id, $facebook_url, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Dribbble Text</p>
		<?php echo aq_field_input('dribbble_text', $block_id, $dribbble_text, $size = 'full') ?>
		
		<p class="description">Dribbble URL</p>
		<?php echo aq_field_input('dribbble_url', $block_id, $dribbble_url, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Tumblr Text</p>
		<?php echo aq_field_input('tumblr_text', $block_id, $tumblr_text, $size = 'full') ?>
		
		<p class="description">Tumblr URL</p>
		<?php echo aq_field_input('tumblr_url', $block_id, $tumblr_url, $size = 'full') ?>
		
		<hr />
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$text = array(
			'twitter' => $twitter_text,
			'facebook' => $facebook_text,
			'dribbble' => $dribbble_text,
			'tumblr' => $tumblr_text,
		);
		
		$urls = array(
			'twitter' => $twitter_url,
			'facebook' => $facebook_url,
			'dribbble' => $dribbble_url,
			'tumblr' => $tumblr_url,
		);
		
		$urls = array_filter(array_map(NULL, $urls));
		$amount = count($urls);
		
		if(!( 0 == $amount )) :
		$count = 12 / $amount;
	?>
	
		<div class="social-bar">
			<?php foreach( $urls as $key => $url ) : ?>
				<div class="col-sm-<?php echo $count; ?> no-pad">
					<a href="<?php echo esc_url($url); ?>" target="_blank">
						<div class="link bg-<?php echo $key; ?>">
							<div class="initial">
								<i class="icon social_<?php echo $key; ?>"></i>
							</div>
						
							<div class="hover-state">
								<span class="text-white"><?php echo $text[$key]; ?></span>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	
	<?php
		endif;		
	}//end block
	
}//end class