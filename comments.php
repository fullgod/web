<?php 
	/**
	 * comments.php
	 * The comments template used in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	$custom_comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' => '<div class="form-input"><input type="text" id="author" name="author" placeholder="' . __('Name *','pivot') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" /></div>',
		    'email'  => '<div class="form-input"><input name="email" type="text" id="email" placeholder="' . __('Email *','pivot') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div>',
		    'url'    => '<div class="form-input"><input name="url" type="text" id="url" placeholder="' . __('Website','pivot') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" /></div>') 
		),
		'comment_field' => '<div class="form-input"><textarea name="comment" placeholder="' . __('Your Comment Here','pivot') . '" id="comment" aria-required="true" rows="8"></textarea></div>',
		'cancel_reply_link' => __( 'Cancel' , 'pivot' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'label_submit' => __( 'Submit' , 'pivot' )
	);
?>

<div class="row">
	<div class="col-sm-12">
	
		<div class="comment-list">
			<h5><?php comments_number( __('0 Comments','pivot'), __('1 Comment','pivot'), __('% Comments','pivot') ); ?></h5>
			<?php 
				if( have_comments() ){
				  echo '<ol id="singlecomments" class="commentlist">';
				  wp_list_comments('type=comment&callback=ebor_custom_comment');
				  echo '</ol>';
				}
				paginate_comments_links(); 
			?>
		</div><!--end of comments list-->
		
		<div class="comment-form-wrapper">
			<?php 
				echo '<h5>' . get_option('comments_title','Join the conversation') . '</h5>';
				echo wpautop(get_option('comments_subtitle', 'Your email address will not be published. Required fields are marked *'));
			?>
			<div class="comment-respond"><?php comment_form($custom_comment_form); ?></div>
		</div><!--end of comment form wrapper-->
		
	</div><!--end of 8 columns-->
</div><!--end of row-->