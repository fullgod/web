<?php
class AQ_Pricing_Table_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Pricing Table',
			'size' => 'span4',
			'block_icon' => '<i class="fa fa-dollar fa-fw"></i>',
			'block_description' => 'Use to add Pricing Tables to the page.',
			'block_category' => 'misc'
		);
		
		//create the block
		parent::__construct('aq_pricing_table_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'type' => 'dark',
			'currency' => '$',
			'amount' => '3',
			'button_text' => 'Sign Me Up',
			'button_url' => '',
			'detail' => '/mo',
			'feature' => 0
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Layout Styles</p>
		<?php echo aq_field_select('type', $block_id, array('dark' => 'Dark Background', 'light' => 'Light Background'), $type) ?>
		
		<hr />
		
		<p class="description">Title <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Price Detail <code>Optional</code></p>
		<?php echo aq_field_input('detail', $block_id, $detail, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Currency <code>Optional</code></p>
		<?php echo aq_field_input('currency', $block_id, $currency, $size = 'full') ?>
		
		<p class="description">Amount</p>
		<?php echo aq_field_input('amount', $block_id, $amount, $size = 'full', $type = 'number') ?>
		
		<hr />
		
		<p class="description">Button Text</p>
		<?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
		
		<p class="description">Button URL</p>
		<?php echo aq_field_input('button_url', $block_id, $button_url, $size = 'full') ?>
		
		<hr />
		
		<p class="description">Details <code>New line (return) for each detail</code>
		<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
		
		<hr />
		
		<div class="ebor-checkbox cf">
			<?php echo aq_field_checkbox('feature', $block_id, $feature) ?>
			<p class="description">Feature this Pricing Table?</p>
		</div>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		$lines = preg_split( '/\r\n|\r|\n/', $text );
		
		if( 'dark' == $type ) :
	?>
		
		<div class="pricing-tables">
			<div class="pricing-table <?php echo ($feature) ? 'emphasis': ''; ?>">
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
				<div class="pricing-table <?php echo ($feature) ? 'emphasis': ''; ?>">
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
					<a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary <?php echo ($feature) ? 'btn-white': ''; ?>"><?php echo htmlspecialchars_decode($button_text); ?></a>
				</div>
			</div>
		</div>
		
	<?php
		endif;
	}//end block
	
}//end class