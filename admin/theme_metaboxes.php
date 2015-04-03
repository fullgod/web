<?php 

/**
 * Build theme metaboxes
 * Uses the cmb metaboxes class found in the ebor framework plugin
 * More details here: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('ebor_custom_metaboxes') )){
	function ebor_custom_metaboxes( $meta_boxes ) {
		$prefix = '_ebor_';
		$social_options = ebor_get_social_icons();
		$header_options = ebor_get_header_options();
		$footer_options = ebor_get_footer_options();
		$post_layout_options = ebor_get_post_layouts();
		
		$header_overrides['none'] = 'Do Not Override Header Option On This Page';
		foreach( $header_options as $key => $value ){
			$header_overrides[$key] = 'Override Header: ' . $value; 	
		}
		
		$footer_overrides['none'] = 'Do Not Override Footer Option On This Page';
		foreach( $footer_options as $key => $value ){
			$footer_overrides[$key] = 'Override Footer: ' . $value; 	
		}
		
		$post_layout_overrides['none'] = 'Do Not Override Post Layout Option On This Post';
		foreach( $post_layout_options as $key => $value ){
			$post_layout_overrides[$key] = 'Override Post Layout: ' . $value; 	
		}
		
		/**
		 * Post & Portfolio Header Images
		 */
		$meta_boxes[] = array(
			'id' => 'post_header_image_metabox',
			'title' => __('Post Header Image', 'pivot'),
			'object_types' => array('post', 'portfolio', 'team'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name'         => __( 'Header Images', 'pivot' ),
					'desc'         => __( 'Upload or add multiple images for the header of this post. No images for just a standard header', 'pivot' ),
					'id'           => $prefix . 'header_images',
					'type'         => 'file_list'
				),
			)
		);
		
		/**
		 * Post Layouts
		 */
		$meta_boxes[] = array(
			'id' => 'post_layouts_metabox',
			'title' => __('Post Layout Overrides', 'pivot'),
			'object_types' => array('post'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name'         => __( 'Override Post Layout?', 'pivot' ),
					'desc'         => __( 'Post Layout is set in "appearance" -> "customise". To override this for this post only, use this control.', 'pivot' ),
					'id'           => $prefix . 'post_layout_override',
					'type'         => 'select',
					'options'      => $post_layout_overrides,
					'std'          => 'none'
				),
			)
		);
		
		/**
		 * Post & Portfolio Header Images
		 */
		$meta_boxes[] = array(
			'id' => 'post_header_metabox',
			'title' => __('Page Overrides', 'pivot'),
			'object_types' => array('page', 'team', 'post', 'portfolio'), // post type
			'context' => 'normal',
			'priority' => 'low',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name'         => __( 'Override Header?', 'pivot' ),
					'desc'         => __( 'Header Layout is set in "appearance" -> "customise". To override this for this page only, use this control.', 'pivot' ),
					'id'           => $prefix . 'header_override',
					'type'         => 'select',
					'options'      => $header_overrides,
					'std'          => 'none'
				),
				array(
					'name'         => __( 'Override Footer?', 'pivot' ),
					'desc'         => __( 'Footer Layout is set in "appearance" -> "customise". To override this for this page only, use this control.', 'pivot' ),
					'id'           => $prefix . 'footer_override',
					'type'         => 'select',
					'options'      => $footer_overrides,
					'std'          => 'none'
				),
			)
		);

		/**
		 * Social Icons for Team Members
		 */
		$meta_boxes[] = array(
			'id' => 'social_metabox',
			'title' => __('Social Icons: Click To Add More', 'pivot'),
			'object_types' => array('team'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => __('Job Title', 'pivot'),
					'desc' => '(Optional) Enter a Job Title for this Team Member',
					'id'   => $prefix . 'the_job_title',
					'type' => 'text',
				),
				array(
				    'id'          => $prefix . 'team_social_icons',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => __( 'Add Another Icon', 'pivot' ),
				        'remove_button' => __( 'Remove Icon', 'pivot' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'Social Icon',
							'desc' => 'What icon would you like for this team members first social profile?',
							'id' => $prefix . 'social_icon',
							'type' => 'select',
							'options' => $social_options
						),
						array(
							'name' => __('URL for Social Icon', 'pivot'),
							'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'pivot'),
							'id'   => $prefix . 'social_icon_url',
							'type' => 'text_url',
						),
				    ),
				),
			)
		);
		
		/**
		 * Social Icons for Users
		 */
		$meta_boxes[] = array(
			'id' => 'social_metabox',
			'title' => __('Social Icons: Click To Add More', 'pivot'),
			'object_types' => array('user'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
				    'id'          => $prefix . 'user_social_icons',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => __( 'Add Another Icon', 'pivot' ),
				        'remove_button' => __( 'Remove Icon', 'pivot' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'Social Icon',
							'desc' => 'What icon would you like for this team members first social profile?',
							'id' => $prefix . 'social_icon',
							'type' => 'select',
							'options' => $social_options
						),
						array(
							'name' => __('URL for Social Icon', 'pivot'),
							'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'pivot'),
							'id'   => $prefix . 'social_icon_url',
							'type' => 'text',
						),
				    ),
				),
			)
		);
		
		/**
		 * Quote Format Metaboxes
		 */
		$meta_boxes[] = array(
			'id' => 'post_format_metabox_quote',
			'title' => __('Quote Details', 'pivot'),
			'object_types' => array('post'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => __('Quote Author', 'pivot'),
					'desc' => __("Enter an author for the quote.", 'pivot'),
					'id'   => $prefix . 'quote_author',
					'type' => 'text',
				),
				array(
					'name' => __('Quote Date', 'pivot'),
					'desc' => __("Enter a date for the quote.", 'pivot'),
					'id'   => $prefix . 'quote_date',
					'type' => 'text',
				),
			)
		);
		
		/**
		 * Video Format Metaboxes
		 */
		$meta_boxes[] = array(
			'id' => 'post_format_metabox_video',
			'title' => __('Videos & oEmbeds', 'pivot'),
			'object_types' => array('post'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
				    'id'          => $prefix . 'videos',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => __( 'Add Another oEmbed', 'pivot' ),
				        'remove_button' => __( 'Remove oEmbed', 'pivot' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'oEmbed',
							'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
							'id'   => $prefix . 'the_oembed',
							'type' => 'oembed',
						),
				    ),
				),
			)
		);
		
		$meta_boxes[] = array(
			'id' => 'clients_metabox',
			'title' => __('Client URL', 'pivot'),
			'object_types' => array('client'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => __('URL for this client (optional)', 'pivot'),
					'desc' => __("Enter a URL for this client, if left blank, client logo will open into a lightbox.", 'pivot'),
					'id'   => $prefix . 'client_url',
					'type' => 'text',
				),
			),
		);
		
		return $meta_boxes;
	}
	add_filter( 'cmb2_meta_boxes', 'ebor_custom_metaboxes' );
}