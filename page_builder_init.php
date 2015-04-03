<?php 

/**
 * Page Builder Functions
 * Queue Up Framework
 * @since version 1.0
 * @author TommusRhodus
 */
if(class_exists('AQ_Page_Builder')) {
	
	/**
	 * Register custom blocks
	 * Override by copying block file of your choice to your child theme, and then require & register from your child theme functions.php
	 * Ensure that you use aq_regiser_block() in your child theme to register the block with the page builder.
	 */
	if(!( class_exists('AQ_Page_Header_Block') )){
		require_once ( "page_builder_blocks/page_header_block.php" );
		aq_register_block('AQ_Page_Header_Block');
	}
	if(!( class_exists('AQ_Section_Block') )){
		require_once ( "page_builder_blocks/page_section_block.php" );
		aq_register_block('AQ_Section_Block');
	}
	if(!( class_exists('AQ_Spacer_Block') )){
		require_once ( "page_builder_blocks/spacer_block.php" );
		aq_register_block('AQ_Spacer_Block');
	}
	if(!( class_exists('AQ_Column_Block') )){
		require_once ( "page_builder_blocks/column_block.php" );
		aq_register_block('AQ_Column_Block');
	}
	if(!( class_exists('AQ_Section_Title_Block') )){
		require_once ( "page_builder_blocks/section_title_block.php" );
		aq_register_block('AQ_Section_Title_Block'); 
	}
	if(!( class_exists('AQ_Ebor_Text_Block') )){
		require_once ( "page_builder_blocks/text_block.php" );
		aq_register_block('AQ_Ebor_Text_Block');
	}
	if(!( class_exists('AQ_HTML_Block') )){
		require_once ( "page_builder_blocks/html_block.php" );
		aq_register_block('AQ_HTML_Block');
	}
	if(!( class_exists('AQ_Clients_Block') )){
		require_once ( "page_builder_blocks/clients_block.php" );
		aq_register_block('AQ_Clients_Block');
	}
	if(!( class_exists('AQ_Slider_Block') )){
		require_once ( "page_builder_blocks/slider_block.php" );
		aq_register_block('AQ_Slider_Block');
	}
	if(!( class_exists('AQ_Team_Feed_Block') )){
		require_once ( "page_builder_blocks/team_feed_block.php" );
		aq_register_block('AQ_Team_Feed_Block');
	}
	if(!( class_exists('AQ_Pricing_Table_Block') )){
		require_once ( "page_builder_blocks/pricing_table_block.php" );
		aq_register_block('AQ_Pricing_Table_Block');
	}
	if(!( class_exists('AQ_Image_Block') )){
		require_once ( "page_builder_blocks/image_block.php" );
		aq_register_block('AQ_Image_Block');
	}
	if(!( class_exists('AQ_Contact_Form_Block') )){
		require_once ( "page_builder_blocks/contact_form_block.php" );
		aq_register_block('AQ_Contact_Form_Block');
	}
	if(!( class_exists('AQ_Menu_Block') )){
		require_once ( "page_builder_blocks/menu_block.php" );
		aq_register_block('AQ_Menu_Block');
	}
	if(!( class_exists('AQ_Testimonial_Carousel_Block') )){
		require_once ( "page_builder_blocks/testimonial_carousel_block.php" );
		aq_register_block('AQ_Testimonial_Carousel_Block');
	}
	if(!( class_exists('AQ_Lightbox_Gallery_Block') )){
		require_once ( "page_builder_blocks/lightbox_gallery_block.php" );
		aq_register_block('AQ_Lightbox_Gallery_Block');
	}
	if(!( class_exists('AQ_Call_To_Action_Block') )){
		require_once ( "page_builder_blocks/call_to_action_block.php" );
		aq_register_block('AQ_Call_To_Action_Block'); 
	}
	if(!( class_exists('AQ_Accordion_Block') )){
		require_once ( "page_builder_blocks/accordion_block.php" );
		aq_register_block('AQ_Accordion_Block'); 
	}
	if(!( class_exists('AQ_Tabs_Block') )){
		require_once ( "page_builder_blocks/tabs_block.php" );
		aq_register_block('AQ_Tabs_Block'); 
	}
	if(!( class_exists('AQ_Twitter_Block') )){
		require_once ( "page_builder_blocks/twitter_block.php" );
		aq_register_block('AQ_Twitter_Block'); 
	}
	if(!( class_exists('AQ_Feature_Box_Block') )){
		require_once ( "page_builder_blocks/feature_box_block.php" );
		aq_register_block('AQ_Feature_Box_Block'); 
	}
	if(!( class_exists('AQ_Blog_Block') )){
		require_once ( "page_builder_blocks/blog_block.php" );
		aq_register_block('AQ_Blog_Block');
	}
	if(!( class_exists('AQ_Portfolio_Block') )){
		require_once ( "page_builder_blocks/portfolio_block.php" );
		aq_register_block('AQ_Portfolio_Block'); 
	}
	if(!( class_exists('AQ_Map_Block') )){
		require_once ( "page_builder_blocks/map_block.php" );
		aq_register_block('AQ_Map_Block');
	}
	if(!( class_exists('AQ_Video_Embed_Block') )){
		require_once ( "page_builder_blocks/video_embed_block.php" );
		aq_register_block('AQ_Video_Embed_Block');
	}
	if(!( class_exists('AQ_Instagram_Block') )){
		require_once ( "page_builder_blocks/instagram_block.php" );
		aq_register_block('AQ_Instagram_Block');
	}
	if(!( class_exists('AQ_Social_Block') )){
		require_once ( "page_builder_blocks/social_block.php" );
		aq_register_block('AQ_Social_Block');
	}
	if(!( class_exists('AQ_Icon_Pin_Block') )){
		require_once ( "page_builder_blocks/icon_pin_block.php" );
		aq_register_block('AQ_Icon_Pin_Block');
	}
	if(!( class_exists('AQ_Counter_Block') )){
		require_once ( "page_builder_blocks/counter_block.php" );
		aq_register_block('AQ_Counter_Block');
	}
	if(!( class_exists('AQ_Skills_Bar_Block') )){
		require_once ( "page_builder_blocks/skills_bar_block.php" );
		aq_register_block('AQ_Skills_Bar_Block');
	}
	if(!( class_exists('AQ_Skills_Bar_Block') )){
		require_once ( "page_builder_blocks/skills_bar_block.php" );
		aq_register_block('AQ_Skills_Bar_Block');
	}
	if(!( class_exists('AQ_Masterslider_Block') ) && function_exists('get_masterslider_names') ){
		require_once ( "page_builder_blocks/masterslider_block.php" );
		aq_register_block('AQ_Masterslider_Block');
	}
	if(!( class_exists('AQ_Revslider_Block') ) && function_exists('set_revslider_as_theme') ){
		require_once ( "page_builder_blocks/revslider_block.php" );
		aq_register_block('AQ_Revslider_Block');
	}
	
	/**
	 * Wrapper function overrides
	 * @doNotModify Unless you know exactly what you're doing, modification of these will break the theme layout. You have been warned.
	 */
	function aq_css_classes($block){
		$block = str_replace('span', '', $block);
		$output = 'col-sm-' . $block;
		return $output;
	}
	function aq_css_clearfix(){
		return false;
	}
	function aq_template_wrapper_start($template_id){
		return '<div class="row">';
	}
	function aq_template_wrapper_end(){
		return '</div>';
	}
	
}