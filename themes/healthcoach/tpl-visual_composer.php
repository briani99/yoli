<?php /* Template Name: VC Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = healthcoach_set($meta, 'header_img');
	$title = healthcoach_set($meta, 'header_title');
	$text = healthcoach_set($meta, 'header_text');
?>
<?php if(healthcoach_set($meta, 'breadcrumb')):?>
	
    <!--Page Title-->
    <section class="page-title" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
        <div class="auto-container">
            <h1><?php if($title) echo wp_kses_post($title); else wp_title('');?></h1>
            <h3 class="styled-font"><?php if($text) echo nl2br(wp_kses_post($text));?></h3>
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

<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>