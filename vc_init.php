<?php 

/**
 * Grab all VC Functions
 */
require_once('admin/vc_functions.php');

/**
 * Grab all VC Base layouts
 */
require_once('admin/vc_layouts.php');

/**
 * Page builder blocks below here
 * Whoop-dee-doo
 */

//Grab Page Header Shortcode
if(!( function_exists('ebor_page_header_shortcode') ))
	require_once('vc_blocks/vc_page_header_block.php');
	
//Grab Slider Shortcode
if(!( function_exists('ebor_slider_shortcode') ))
	require_once('vc_blocks/vc_slider_block.php');
	
//Grab Video Embed Shortcode
if(!( function_exists('ebor_video_embed_shortcode') ))
	require_once('vc_blocks/vc_video_embed_block.php');
	
//Grab Clients Shortcode
if(!( function_exists('ebor_clients_shortcode') ))
	require_once('vc_blocks/vc_clients_block.php');
	
//Grab Section Title Shortcode
if(!( function_exists('ebor_section_title_shortcode') ))
	require_once('vc_blocks/vc_section_title_block.php');
	
//Grab Text Shortcode
if(!( function_exists('ebor_text_shortcode') ))
	require_once('vc_blocks/vc_text_block.php');
	
//Grab Portfolio Shortcode
if(!( function_exists('ebor_portfolio_shortcode') ))
	require_once('vc_blocks/vc_portfolio_block.php');
	
//Grab Team Shortcode
if(!( function_exists('ebor_team_shortcode') ))
	require_once('vc_blocks/vc_team_feed_block.php');
	
//Grab Portfolio Shortcode
if(!( function_exists('ebor_blog_shortcode') ))
	require_once('vc_blocks/vc_blog_block.php');
	
//Grab testimonial carousel Shortcode
if(!( function_exists('ebor_testimonial_carousel_shortcode') ))
	require_once('vc_blocks/vc_testimonial_carousel_block.php');
	
//Grab Twitter Shortcode
if(!( function_exists('ebor_twitter_shortcode') ))
	require_once('vc_blocks/vc_twitter_block.php');
	
//Grab Instagram Shortcode
if(!( function_exists('ebor_instagram_shortcode') ))
	require_once('vc_blocks/vc_instagram_block.php');
	
//Grab Social Shortcode
if(!( function_exists('ebor_social_shortcode') ))
	require_once('vc_blocks/vc_social_block.php');
	
//Grab Feature Box Shortcode
if(!( function_exists('ebor_feature_box_shortcode') ))
	require_once('vc_blocks/vc_feature_box_block.php');
	
//Grab Feature Box Shortcode
if(!( function_exists('ebor_pricing_table_shortcode') ))
	require_once('vc_blocks/vc_pricing_table_block.php');
	
//Grab call to action Shortcode
if(!( function_exists('ebor_call_to_action_shortcode') ))
	require_once('vc_blocks/vc_call_to_action_block.php');
	
//Grab call to action Shortcode
if(!( function_exists('ebor_skills_bar_shortcode') ))
	require_once('vc_blocks/vc_skills_bar_block.php');
	
//Grab counter Shortcode
if(!( function_exists('ebor_counter_shortcode') ))
	require_once('vc_blocks/vc_counter_block.php');
	
//Grab counter Shortcode
if(!( function_exists('ebor_icon_pin_shortcode') ))
	require_once('vc_blocks/vc_icon_pin_block.php');
	
if(!( function_exists('ebor_lightbox_gallery_shortcode') ))
	require_once('vc_blocks/vc_lightbox_gallery_block.php');