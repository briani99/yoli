<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$meta = _WSH()->get_meta('_bunch_layout_settings', get_option( 'woocommerce_shop_page_id' ));
$meta1 = _WSH()->get_meta('_bunch_header_settings', get_option( 'woocommerce_shop_page_id' ));
$layout = healthcoach_set( $meta, 'layout', 'right' );
$layout = healthcoach_set( $_GET, 'layout' ) ? $_GET['layout'] : $layout; 
if(healthcoach_set($_GET, 'layout_style')) $layout = healthcoach_set($_GET, 'layout_style'); else
$layout = healthcoach_set( $meta, 'layout', 'right' );
$sidebar = healthcoach_set( $meta, 'sidebar', 'blog-sidebar' );

$layout = ($layout) ? $layout : 'right';
$sidebar = ($sidebar) ? $sidebar : 'blog-sidebar';

$classes = ( !$layout || $layout == 'full' || healthcoach_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;

$bg = healthcoach_set($meta1, 'archive_page_header_img');
$title = healthcoach_set($meta1, 'archive_page_header_title');
$text = healthcoach_set($meta1, 'archive_page_header_text');

get_header( 'shop' ); ?>

<section class="page-title" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
    <div class="auto-container">
        <h1><?php if($title) echo balanceTags($title); else wp_title('');?></h1>
        <h3 class="styled-font"><?php if($text) echo balanceTags($text);?></h3>
    </div>
</section>

<!--Page Info-->
<section class="page-info">
    <div class="auto-container clearfix">
        <div class="breadcrumb-outer">
            <?php echo balanceTags(healthcoach_get_the_breadcrumb()); ?>
        </div>
    </div>
</section>

<!--Sidebar Page-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
			<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-6 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>

			<!-- sidebar area -->
			
			<div class="<?php echo esc_attr($classes);?> content-side">
                <section class="products-section no-padd-top">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <div class="shop-upper-box">
                        <div class="clearfix">
                            <div class="pull-left items-label"><?php woocommerce_result_count();?></div>
                            <div class="pull-right sort-by">
                                <?php
									/**
									 * woocommerce_before_shop_loop hook
									 *
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									do_action( 'woocommerce_before_shop_loop' );
								?>
                            </div>
                        </div>
                    </div>
                	<?php endif;?>
                
                	<div class="row clearfix">
						<?php
                            /**
                             * woocommerce_before_main_content hook
                             *
                             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                             * @hooked woocommerce_breadcrumb - 20
                             */
                            do_action( 'woocommerce_before_main_content' );
                        ?>
                        
                        <?php
                            /**
                             * woocommerce_archive_description hook
                             *
                             * @hooked woocommerce_taxonomy_archive_description - 10
                             * @hooked woocommerce_product_archive_description - 10
                             */
                            do_action( 'woocommerce_archive_description' );
                        ?>
        
						<?php if ( have_posts() ) : ?>
                
                            <?php woocommerce_product_loop_start(); ?>
                
                                <?php woocommerce_product_subcategories(); ?>
                
                                <?php while ( have_posts() ) : the_post(); ?>
                
                                    <?php wc_get_template_part( 'content', 'product' ); ?>
                
                                <?php endwhile; // end of the loop. ?>
                
                            <?php woocommerce_product_loop_end(); ?>
                
                            <?php
                                /**
                                 * woocommerce_after_shop_loop hook
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            ?>
                
                        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
                
                            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
                
                        <?php endif; ?>
                
                    <?php
                        /**
                         * woocommerce_after_main_content hook
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );
                    ?>
        	</div>            
        </section>
	</div>

	<!-- sidebar area -->
	<?php if( $layout == 'right' ): ?>
    <?php if ( is_active_sidebar( $sidebar ) ) { ?>
    <div class="sidebar-side col-lg-3 col-md-4 col-sm-6 col-xs-12">        
		<aside class="sidebar">
            <?php dynamic_sidebar( $sidebar ); ?>
            <?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
        </aside>
    </div>
    <?php } ?>
    <?php endif; ?>
    <!--Sidebar-->
    
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
