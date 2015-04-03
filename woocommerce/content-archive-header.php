<header class="title ebor-pad-me">
		
	<div class="background-image-holder parallax-background">
		<img src="<?php echo get_option('shop_background'); ?>" alt="<?php echo the_title(); ?>" class="background-image" />
	</div>
	
	<div class="container align-bottom">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="text-white"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				<span class="sub alt-font text-white pull-left"><?php echo woocommerce_result_count(); ?></span>
				<span class="pull-right"><?php woocommerce_catalog_ordering(); ?></span>
			</div>
		</div>
	</div>
		
</header>