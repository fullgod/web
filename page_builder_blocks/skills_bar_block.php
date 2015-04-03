<?php

class AQ_Skills_Bar_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Skill Bars',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-bar-chart-o fa-fw"></i>',
			'block_description' => 'Use to add percentage skill bars.',
			'block_category' => 'misc'
		);
		parent::__construct('AQ_Skills_Bar_Block', $block_options);
		add_action('wp_ajax_aq_block_skill_add_new', array($this, 'add_skill'));
	}//end construct
	
	function form($instance) {
	
		$defaults = array(
			'tabs' => array(
				1 => array(
					'title' => 'Skill Bar',
					'content' => '90',
				)
			),
			'text' => '',
			'alignment' => 'skills-left'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$tab_types = array(
			'tab' => 'Tabs',
			'side-tab' => 'Side Tabs',
			'toggle' => 'Toggles'
		);
		
		$align_types = array(
			'skills-left' => 'Right',
			'skills-right' => 'Left',
		);
	?>
		
		<p class="description">Title <code>Optional</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<p class="description">Alignment</p>
		<?php echo aq_field_select('alignment', $block_id, $align_types, $alignment) ?>
		
		<div class="description cf">
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
			<a href="#" rel="skill" class="aq-sortable-add-new button">Add New</a>
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
			
				<p class="tab-desc description">Skill Bar Title</p>
				<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
				
				<p class="tab-desc description">Skill ability<code>0 - 100 only</code></p>
				<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="1"><?php echo $tab['content'] ?></textarea>
				
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				
			</div>
			
		</li>
		
	<?php
	}
	
	function block($instance) {
		extract($instance);
	?>
		
		<div class="<?php echo $alignment; ?> skills skill-bars">
			<?php 
				if( $title )
					echo '<h3>'. htmlspecialchars_decode($title) .'</h3>';
					
				if( is_array($tabs) ){
					echo '<ul class="skills-ul">';
					foreach( $tabs as $tab ){
						echo '<li><span>'. htmlspecialchars_decode($tab['title']) .'</span><div class="skill-bar-holder"><div class="skill-capacity" style="width: '. (int)$tab['content'] .'%;"></div></div></li>';
					}
					echo '</ul>';	
				}
			?>
		</div><!--end of skills-->
		
	<?php	
	}
	
	/* AJAX add tab */
	function add_skill() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$tab = array(
			'title' => 'New Skill Bar',
			'content' => '90'
		);
		
		if($count) {
			$this->tab($tab, $count);
		} else {
			die(-1);
		}
		
		die();
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}
}