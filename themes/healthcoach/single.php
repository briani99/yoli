<?php $options = _WSH()->option();
	get_header(); 
	$settings  = healthcoach_set(healthcoach_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(healthcoach_set($_GET, 'layout_style')) $layout = healthcoach_set($_GET, 'layout_style'); else
	$layout = healthcoach_set( $meta, 'layout', 'right' );
	if( !$layout || $layout == 'full' || healthcoach_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = healthcoach_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || healthcoach_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	_WSH()->post_views( true );
	$bg = healthcoach_set($meta1, 'header_img');
	$title = healthcoach_set($meta1, 'header_title');
	$text = healthcoach_set($meta1, 'header_text');
?>

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
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="content-side <?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                <section class="blog-details post-details">
                    <?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
					?>
                    
                    <div class="news-style-one">
                        <div class="inner-box">
                            <?php if ( has_post_thumbnail() ):?>
                            <figure class="image-box">
                            	<?php the_post_thumbnail('healthcoach_1170x500');?>
                            </figure>
                            <?php endif;?>
                            
                            <div class="lower-content">
                                <div class="posted-info"><?php echo get_the_date('F d, Y')?></div>
                                
                                <ul class="post-meta clearfix">
                                    <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><span class="icon fa fa-user"></span>  <?php the_author();?> </a></li>
                                    <li><span class="icon fa fa-tags"></span> <?php the_tags('',',',''); ?></li>
                                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comment');?>"><span class="icon fa fa-comments"></span> <?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></li>
                                </ul>
                                
                                <div class="text text-content">
                                    <?php the_content();?>
                                    <?php the_tags('Tags: ', ', ', '');?>
                                </div>
                            	<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'healthcoach'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                <div class="post-bottom clearfix">
                                        
                                    <ul class="share-options pull-left clearfix">
                                        <li><strong><?php esc_html_e('Did You Like This Post? Share it :', 'healthcoach');?></strong></li>
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink(get_the_id()));?>"><span class="fa fa-facebook-f"></span></a></li>
                                        <li><a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink(get_the_id()));?>&text=<?php echo balanceTags(get_the_title());?>"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink(get_the_id()));?>"><span class="fa fa-google-plus"></span></a></li>
                                        <li><a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_permalink(get_the_id()));?>&title=<?php echo balanceTags(get_the_title());?>"><span class="fa fa-linkedin"></span></a></li>
                                    </ul>
                                    
                                    <ul class="post-controls pull-right clearfix">
                                        <li><?php next_post_link( '%link', '<span class="fa fa-angle-left"></span> Next', TRUE ); ?></li>
                                        <li><?php previous_post_link( '%link', 'Prev <span class="fa fa-angle-right"></span> ', TRUE ); ?></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- comment area -->
                    <?php comments_template(); ?><!-- end comments -->    
                    	
                    <?php endwhile;?>
                </section>
            </div>
            <!--Content Side-->
            
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-6 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>