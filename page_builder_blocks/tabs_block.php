<?php

class AQ_Tabs_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Tabs',
			'size' => 'span12',
			'block_description' => 'Add content tabs to the page',
			'block_category' => 'misc',
			'block_icon' => '<i class="fa fa-fw fa-tasks"></i>',
			'resizable' => false
		);
		parent::__construct('AQ_Tabs_Block', $block_options);
		add_action('wp_ajax_aq_block_tab_add_new', array($this, 'add_tab'));
	}//end construct
	
	function form($instance) {
	
		$defaults = array(
			'tabs' => array(
				1 => array(
					'title' => 'My New Tab',
					'content' => 'My tab contents',
					'subtitle' => 'The Subtitle',
					'icon' => ''
				)
			),
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<div class="cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
					$tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
					$count = 1;
					foreach($tabs as $tab) {	
						$this->tab($tab, $count);
						$count++;
					}
				?>
			</ul>
			<p></p>
			<a href="#" rel="tab" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		
	<?php
	}//end form
	
	function tab($tab = array(), $count = 0) {	
		$icon_options = ebor_get_icons();
	?>
	
		<li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $tab['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				
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
										$class = ( $key == $tab['icon'] ) ? 'active' : '';
										echo '<div class="ebor-modal-icon '. $class .'" data-ebor-icon="'. $key .'"><i class="icon '. $key .'"></i></div>';
									}
								?>
							</div>
							
						</div>
					</div>
					<p class="description">Icon <code>Leave Blank for No Icon</code></p>
					<a href="#" class="ebor-icon-modal-launcher button button-primary one_third text-center">Choose Icon</a>
					<div class="two_thirds last">
						<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][icon]" value="<?php echo $tab['icon'] ?>" />
					</div>
				</div>
				
				<hr />
				
				<p class="tab-desc description">Tab Subtitle</p>
				<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-subtitle" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][subtitle]" value="<?php echo $tab['subtitle'] ?>" />
				
				<hr />
				
				<p class="tab-desc description">Tab Title</p>
				<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
				
				<hr />
				
				<div class="ebor-editor-launch-wrap">
					<a href="#<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="button button-primary ebor-editor-launch">Edit Block Content</a>
					<div class="hidden">
						<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
					</div>
				</div>
				
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				
			</div>
			
		</li>
		
	<?php
	}//end
	
	function block($instance) {
		extract($instance);
		
		if( is_array($tabs) ) :
	?>
		
		<section class="feature-selector">
			<div class="container">
				<div class="row">
					<ul class="selector-tabs clearfix">
						
						<?php foreach( $tabs as $index => $tab ) : ?>
							<li class="clearfix text-primary col-md-3 col-sm-6 <?php if( 1 == $index ) echo 'active'; ?>">
								<i class="icon <?php echo $tab['icon']; ?>"></i>
								<span><?php echo $tab['subtitle']; ?></span>
							</li><!--end of tab-->
						<?php endforeach; ?>
						
					</ul>
				</div>
			</div>
			
			<div class="container">
				<ul class="selector-content">
					
					<?php foreach( $tabs as $index => $tab ) : ?>
						<li class="clearfix <?php if( 1 == $index ) echo 'active'; ?>">
							<?php 
								if( $tab['title'] )
									echo '<div class="row"><div class="col-sm-12 text-center"><h1>'. htmlspecialchars_decode($tab['title']) .'</h1></div></div>';
									
								echo wpautop(do_shortcode(htmlspecialchars_decode($tab['content']))); 
							?>
						</li><!--end of individual feature content-->
					<?php endforeach; ?>

				</ul>
			</div>
		</section>
			
	<?php
		endif;
	}//end block
	
	/* AJAX add tab */
	function add_tab() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$tab = array(
			'title' => 'My New Tab',
			'content' => 'My tab contents',
			'subtitle' => 'The Subtitle',
			'icon' => ''
		);
		
		if($count) {
			$this->tab($tab, $count);
		} else {
			die(-1);
		}
		
		die();
	}//add_tab
	
	function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}//update
}//end class