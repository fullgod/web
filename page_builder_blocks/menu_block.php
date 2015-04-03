<?php

class AQ_Menu_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Menu',
			'size' => 'span3',
			'block_icon' => '<i class="fa fa-bars fa-fw"></i>',
			'block_description' => 'Use to add a registered Menu, Use for Mega Menu Columns.',
			'block_category' => 'misc'
		);
		
		//create the block
		parent::__construct('aq_menu_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'mega_menu' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$menus = get_terms('nav_menu');
		$menu_options = array();
		
		foreach($menus as $menu){
			$menu_options[$menu->term_id] = $menu->name;
		}
		
		if( $menu_options ) :
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title <code>Optional</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('mega_menu') ?>">
				Choose a Menu to Display<br/>
				<?php echo aq_field_select('mega_menu', $block_id, $menu_options, $mega_menu) ?>
			</label>
		</p>
		
	<?php
		
		else : 
	?>
	
		<p class="description">Please Add Some Menus</p>
		
	<?php
		endif;
	}// end form
	
	function block($instance) {
		extract($instance);
		
		$items = wp_get_nav_menu_items( $mega_menu );
		
		if( $title )
			echo '<h6 class="alt-font">'. htmlspecialchars_decode($title) .'</h6>';
			
		if($items){
			echo '<ul class="subnav">';
			
			foreach( $items as $item ){
				echo '<li><a href="' . $item->url . '">'. $item->title .'</a></li>';
			}
			
			echo '</ul>';
		}

	}//end block
	
}//end class