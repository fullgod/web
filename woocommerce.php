<?php 
	get_header();
	
	if( is_single() && 'yes' == get_option('single_product_header','yes') ){
		get_template_part('woocommerce/content','product-header'); 
	} elseif(!( is_single() )) {
		get_template_part('woocommerce/content','archive-header'); 
	}
?>

	<section class="article-single dark-wrapper">
		<div class="container">
		
			<div class="row">
			
				<div class="col-sm-9">
					<?php
						woocommerce_content();
						wp_link_pages();
					?>
				</div>
				
				<?php get_sidebar('shop'); ?>
				
			</div><!--end of row-->
			
		</div><!--end of container-->	
	</section>

<?php get_footer();			