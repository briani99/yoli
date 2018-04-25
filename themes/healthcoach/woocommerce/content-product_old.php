<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}
// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first1';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last1';
}
$meta = _WSH()->get_meta('_bunch_layout_settings', get_option( 'woocommerce_shop_page_id' ));

$layout = healthcoach_set( $meta, 'layout', 'full' );

$layout = healthcoach_set( $_GET, 'layout' ) ? $_GET['layout'] : $layout;

if( !$layout || $layout == 'full' || healthcoach_set($_GET, 'layout_style')=='full' ) $classes[] = 'col-lg-3 col-md-3 col-sm-3 col-xs-12 product-column'; else $classes[] = 'col-lg-4 col-md-4 col-sm-4 col-xs-12 product-column'; 

?>
<div <?php post_class( $classes ); ?>>
	<div class="inner-box">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */?>
	 <?php woocommerce_template_loop_product_thumbnail();?>
	<?php do_action( 'woocommerce_before_shop_loop_item_title' );
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );?>
		
		<div class="prod-info">
            <h4 class="prod-cat"><?php the_terms( $post->ID, 'product_cat', '', ' , ' ); //without anchor?></h4>
            <div class="prod-title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></div>
            <h3 class="prod-price price_span"><?php woocommerce_template_loop_price();?></h3>
            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-four"><?php esc_html_e('VIEW DETAILS', 'healthcoach');?></a>
        </div>
		
	<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
    </div>
</div>
