<?php $product = new WC_Product(get_the_ID()); ?>

<header class="title">
		
		<div class="background-image-holder parallax-background">
			<?php the_post_thumbnail('full', array('class' => 'background-image')); ?>
		</div>
		
		<div class="container align-bottom">
			<div class="row">
				<div class="col-xs-12">
					<?php 
						the_title('<h1 class="text-white">', '</h1>');
						echo '<span class="sub alt-font text-white">'. ebor_the_terms('product_cat', ', ', 'name') .'</span>';
					?>
				</div>
			</div>
		</div>
		
</header>