<?php

class AQ_Accordion_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Accordion',
			'size' => 'span6',
			'block_description' => 'Add a content accordion to the page',
			'block_category' => 'misc',
			'block_icon' => '<i class="fa fa-fw fa-tasks"></i>'
		);
		parent::__construct('AQ_Accordion_Block', $block_options);
		add_action('wp_ajax_aq_block_accordion_add_new', array($this, 'add_accordion'));
	}//end construct
	
	function form($instance) {
	
		$defaults = array(
			'tabs' => array(
				1 => array(
					'title' => 'My New Tab',
					'content' => 'My tab contents',
				)
			),
			'type' => 'standard'
		);
		
		$accordion_types = array(
			'standard' => 'Standard Accordion',
			'hover' => 'Hover Accordion'	
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Accordion Type</p>
		<?php echo aq_field_select('type', $block_id, $accordion_types, $type) ?>
		
		<hr />
		
		<div class="description cf">
			<p class="description">Accordion Panels</p>
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
			<a href="#" rel="accordion" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		
	<?php
	}//end form
	
	function tab($tab = array(), $count = 0) {	
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
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
						Tab Title<br/>
						<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
					</label>
				</p>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
						Tab Content<br/>
						<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
					</label>
				</p>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
		
	<?php
	}//end
	
	function block($instance) {
		extract($instance);
		
		if( is_array($tabs) ) :
		
			if( 'standard' == $type ) :
		?>
			
			<ul class="accordion">
				<?php foreach( $tabs as $key => $tab ) : ?>
					<li <?php echo ( 1 == $key) ? 'class="active"' : ''; ?>>
						<div class="title"><span><?php echo htmlspecialchars_decode($tab['title']); ?></span></div>
						<div class="text">
							<?php echo wpautop(do_shortcode(htmlspecialchars_decode($tab['content']))); ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			
		<?php else : ?>
			
			<div class="expanding-list">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					
						<ul class="expanding-ul">
							
							<?php foreach( $tabs as $key => $tab ) : ?>
								<li>
									<div class="title">
										<i class="icon icon-pencil"></i>
										<span><?php echo htmlspecialchars_decode($tab['title']); ?></span>
									</div>
									
									<div class="text-content">
										<?php echo wpautop(do_shortcode(htmlspecialchars_decode($tab['content']))); ?>
									</div>
								</li>
							<?php endforeach; ?>
							
						</ul>
						
					</div>
				</div>
			</div>
			
		<?php
			endif;
		
		endif;	
	}//end block
	
	/* AJAX add tab */
	function add_accordion() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$tab = array(
			'title' => 'New Tab',
			'content' => ''
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