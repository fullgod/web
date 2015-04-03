<?php

class AQ_Video_Embed_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Video Embed',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-fw fa-file-video-o"></i>',
			'block_description' => 'Add a Video Embed or self hosted Video to the page.',
			'block_category' => 'misc'
		);
		parent::__construct('aq_video_embed_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'mpfour' => '',
			'ogv' => '',
			'webm' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">oEmbed URL<code><a href="http://codex.wordpress.org/Embeds" target="_blank">List of Acceptable Services Here</a></code><br /><code>This option overrides the self hosted option, leave this blank if you don't need it.</code></p>
		<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
		
		<hr />
		
		<code>Self Hosted Video? Enter these 3 video types.</code>
		
		<div class="one_third">
			<p class="description">.mp4 Background Video</p>
			<?php echo aq_field_upload('mpfour', $block_id, $mpfour, $media_type = 'video') ?>
		</div>
		
		<div class="one_third">
			<p class="description">.ogv Background Video</p>
			<?php echo aq_field_upload('ogv', $block_id, $ogv, $media_type = 'video') ?>
		</div>
		
		<div class="one_third last">
			<p class="description">.webm Background Video</p>
			<?php echo aq_field_upload('webm', $block_id, $webm, $media_type = 'video') ?>
		</div><div class="cf"></div>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		if( $link ){
			echo '<div class="fitvids">' . wp_oembed_get( esc_url( $link ) ) . '</div>';
		} else {
	?>
	
		<div class="inline-video-wrapper">
			<video controls="">
				<source src="<?php echo $webm; ?>" type="video/webm">
				<source src="<?php echo $mpfour; ?>" type="video/mp4">
				<source src="<?php echo $ogv; ?>" type="video/ogg">
			</video>
		</div>
	
	<?php
		}
						
	}//end block
	
}//end class