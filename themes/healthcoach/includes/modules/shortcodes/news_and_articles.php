<?php  
   global $post ;
   $count = 0;
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   ob_start() ;?> 
<?php if($query->have_posts()):  ?>   

<!--News Section-->
<section class="news-section">
    <div class="auto-container">
        
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <h2><?php echo balanceTags($title);?></h2>
                    <div class="separator"></div>
                 </div>
                 
                 <div class="link-outer pull-right">
                    <a href="<?php echo esc_url($btn_link);?>" class="more-link theme-btn btn-style-three"><?php echo balanceTags($btn_text);?></a>
                 </div>
             </div>
        </div>
        
        <div class="row clearfix">
            <?php while($query->have_posts()): $query->the_post();
                global $post ; 
                $post_meta = _WSH()->get_meta();
            ?>
            <!--News Style One-->
            <div class="news-style-one col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <figure class="image-box"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('370x230');?></a></figure>
                    <div class="lower-content">
                        <div class="posted-info"><?php echo get_the_date('M d, Y')?></div>
                        <div class="post-author-info"><?php esc_html_e('by', 'healthcoach');?> <?php the_author();?> </div>
                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                        <div class="text"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>