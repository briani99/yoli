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
                <?php while( have_posts() ): the_post(); 
					$post_meta = _WSH()->get_meta();
				?>
                <!--Gallery Details-->
                <section class="gallery-details post-details">
                   
                   <div class="gallery-post">
                        <?php if($gallery_img = healthcoach_set($post_meta, 'bunch_images')):?>
                        <div class="gallery-images">
                        	<ul class="single-item-carousel">
                                <?php foreach($gallery_img as $key => $value):?>
                                <li><figure><a class="lightbox-image option-btn" data-fancybox-group="example-gallery" href="<?php echo esc_url(healthcoach_set($value, 'images'));?>" title="<?php esc_html_e('Project Title Here', 'healthcoach');?>"><?php echo balanceTags(wp_get_attachment_image( bunch_get_attachment_id_by_url( healthcoach_set($value, 'images') ), 'full', "", array( "class" => "img-responsive" ) ));  ?></a></figure></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <?php endif;?>
                        <div class="lower-content">
                            <div class="post-info">
                                <h3><?php the_title();?></h3>
                                <div class="post-tags">
									<?php $term_list = wp_get_post_terms(get_the_id(), 'gallery_category', array("fields" => "names")); ?>
                                    <?php echo implode( ', ', (array)$term_list );?>
                                </div>
                            </div>
                            <div class="text-content">
                                <p><?php echo balanceTags(healthcoach_set($post_meta, 'text1'));?></p>
                                <br>
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <!--Info Column-->
                                        <div class="info-column col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                            <div class="gallery-info">
                                                <div class="info-header"><h4><?php esc_html_e('Gallery Info', 'healthcoach');?></h4></div>
                                                <div class="info-lower">
                                                    <div class="desc-text"><?php echo balanceTags(healthcoach_set($post_meta, 'text2'));?></div>
                                                    <ul class="specs-list">
                                                        <li class="clearfix"><span class="pull-left"><?php esc_html_e('Customer :', 'healthcoach');?></span><span class="pull-right"><?php echo balanceTags(healthcoach_set($post_meta, 'customer_title'));?></span></li>
                                                        <li class="clearfix"><span class="pull-left"><?php esc_html_e('Live Demo :', 'healthcoach');?></span><span class="pull-right"><?php echo balanceTags(healthcoach_set($post_meta, 'link'));?></span></li>
                                                        <li class="clearfix"><span class="pull-left"><?php esc_html_e('Category :', 'healthcoach');?></span><span class="pull-right"><?php echo balanceTags(healthcoach_set($post_meta, 'category'));?></span></li>
                                                        <li class="clearfix"><span class="pull-left"><?php esc_html_e('Skill :', 'healthcoach');?></span><span class="pull-right"><?php echo balanceTags(healthcoach_set($post_meta, 'skill'));?></span></li>
                                                        <li class="clearfix"><span class="pull-left"><?php esc_html_e('Date Post :', 'healthcoach');?></span><span class="pull-right"><?php echo balanceTags(healthcoach_set($post_meta, 'post_date'));?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Text Column-->
                                        <div class="text-column col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <div class="blocqoute-box">
                                                <blockquote>
                                                    <p><?php echo balanceTags(healthcoach_set($post_meta, 'quot_text'));?></p>
                                                    <div class="author-title"><?php esc_html_e('-', 'healthcoach');?> <?php echo balanceTags(healthcoach_set($post_meta, 'author_title'));?> <span class="designation styled-font"><?php echo wp_kses_post(healthcoach_set($post_meta, 'designation'));?></span> </div>
                                                </blockquote>
                                                <p><?php echo balanceTags(healthcoach_set($post_meta, 'des'));?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--Controls-->
                        <div class="gallery-controls">
                            <div class="clearfix">
                                <?php
									$prev_post = get_previous_post();
									if($prev_post) {
									   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
									   echo "\t" . '<a rel="prev" href="' . esc_url(get_permalink($prev_post->ID)) . '" title="' . $prev_title. '" class="control-btn prev-btn theme-btn"> <strong> <span class="fa fa-caret-left"></span> previous </strong></a>' . "\n";
									}
                                
								
								$next_post = get_next_post();
								if($next_post) {
								   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
								   echo "\t" . '<a rel="next" href="' . esc_url(get_permalink($next_post->ID)) . '" title="' . $next_title. '" class="control-btn next-btn theme-btn "> <strong> Next <span class="fa fa-caret-right"></span>  </strong></a>' . "\n";
								}
								?>
                                
                            </div>
                        </div>
                            
                        <!--Related Gallery-->
                        <div class="related-gallery">
                            <div class="sec-title"><h2><?php echo balanceTags(healthcoach_set($post_meta, 'main_title'));?></h2><div class="separator"></div></div>
                            
                            <div class="related-gallery-carousel">
                                <?php if($gallery_post = healthcoach_set($post_meta, 'bunch_gallery')):?>
                                
                                <?php foreach($gallery_post as $key => $value):?>
                                <!--Default Portfolio Item-->
                                <div class="default-portfolio-item">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><?php echo balanceTags(wp_get_attachment_image( bunch_get_attachment_id_by_url( healthcoach_set($value, 'gallery_image') ), 'full', "", array( "class" => "img-responsive" ) ));  ?></figure>
                                            <!--Overlay Box-->
                                            <div class="overlay-box">
                                                <div class="overlay-inner">
                                                    <div class="content">
                                                        <a class="lightbox-image option-btn" data-fancybox-group="example-gallery" href="<?php echo esc_url(healthcoach_set($value, 'images'));?>" title="<?php esc_html_e('Project Title Here', 'healthcoach');?>"><span class="fa fa-search-plus"></span></a>
                                                        <a class="option-btn" href="<?php echo esc_url(get_permalink(get_the_id()));?>"><span class="fa fa-link"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Caption Box-->
                                        <div class="caption-box">
                                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php echo balanceTags(healthcoach_set($value, 'post_title'));?></a></h3>
                                            <div class="category">
                                            	<?php $term_list = wp_get_post_terms(get_the_id(), 'gallery_category', array("fields" => "names")); ?>
                                    			<?php echo implode( ', ', (array)$term_list );?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach;?>
                				<?php endif;?>
                            </div>
                        </div>
                        
                    </div>
                    
                </section>
                <?php endwhile;?>
          	</div>
            
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