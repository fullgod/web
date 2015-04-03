<?php

class AQ_Map_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Map',
			'size' => 'span12',
			'block_description' => 'Add a google map to the page.',
			'block_icon' => '<i class="fa fa-fw fa-map-marker"></i>',
			'block_category' => 'misc'
		);
		//create the block
		parent::__construct('aq_map_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'image' => '',
			'pppage' => 350
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">Upload a Marker Image <code>Optional</code></p>
		<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>

		<p class="description">Address for map, use plain text, e.g: <code>Lord Mayors Walk, York, England</code></p>
		<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		
		<p class="description">Map Height <code>Pixels</code></p>
		<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$unique = wp_rand(0,10000);
	?>
		
		<div id="map" class="<?php echo $unique; ?>" style="height: <?php echo $pppage;?>px;"></div>
		
	<?php
		$title = addslashes($title);
		
		echo "<script type='text/javascript'>
				jQuery(document).ready(function($){
				'use strict';
				
					jQuery('#map.$unique').goMap({ address: '$title',
					  zoom: 14,
					  mapTypeControl: true,
				      draggable: false,
				      scrollwheel: false,
				      streetViewControl: true,
				      maptype: 'ROADMAP',
			    	  markers: [
			    		{ 'address' : '$title' }
			    	  ],
					  icon: '$image', 
					  addMarker: false,
					});
				
				});
			</script>";	
			
	}//end block
	
}//end class