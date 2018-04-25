<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<section class="related-products-section related-products">
		
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2><?php esc_html_e( 'Related Products', 'healthcoach' ); ?></h2>
                        <div class="separator"></div>
                     </div>
                     
                     <div class="link-outer pull-right">
                        <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="more-link theme-btn btn-style-three"><?php esc_html_e('Shop More Products', 'healthcoach');?></a>
                     </div>
                 </div>
            </div>
            
            <?php woocommerce_product_loop_start(); ?>
                <div class="row clearfix">
                <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                    <?php wc_get_template_part( 'content', 'product' ); ?>
    
                <?php endwhile; // end of the loop. ?>
                </div>
            <?php woocommerce_product_loop_end(); ?>
		
	</section>

<?php endif;

wp_reset_postdata();
