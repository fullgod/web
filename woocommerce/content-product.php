<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
	
$classes[] = 'project image-holder';
?>

<li id="product-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		
		<div class="background-image-holder">
			<?php 
				if ( $product->is_on_sale() )
					echo '<span class="onsale">' . __( 'Sale!', 'pivot' ) . '</span>';
					
				the_post_thumbnail('large', array('class' => 'background-image')); 
			?>
		</div>
		
		<div class="hover-state">
			<div class="align-vertical">
				<span class="text-white alt-font"><?php echo $product->get_price_html(); ?></span>
				<?php 
					the_title('<h1 class="text-white"><strong>', '</strong></h1>');
					
					do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</div>
		</div>

</li>