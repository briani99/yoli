<?php  
   global $post ;
   $count = 0;
   $paged = get_query_var('paged');
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged'=>$paged);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   

<!--News Section-->
<section class="news-section grid-view">
    <div class="auto-container">
        
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
                        <div class="posted-info"><?php echo get_the_date('F d, Y')?></div>
                        <div class="post-author-info"><?php esc_html_e('by', 'healthcoach');?> <?php the_author();?> </div>
                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                        <div class="text"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
                    </div>
                </div>
            </div>
            
            <?php endwhile;?>
            
        </div>
        
        <!-- Styled Pagination -->
        <div class="styled-pagination text-center">
            <?php healthcoach_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-caret-right"></i>', 'prev_text' => '<i class="fa fa-caret-left"></i>')); ?>
        </div>
        
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>