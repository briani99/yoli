<?php  
   global $post ;
   $count = 0;
   $paged = get_query_var('paged');
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged'=>$paged);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   

<!--Content Side-->      
<div class="content-side">
    
    <!--Blog List-->
    <section class="blog-list-view">
       <?php while($query->have_posts()): $query->the_post();
			global $post ; 
			$post_meta = _WSH()->get_meta();
		?>
        <!--News Style One / List Style-->
        <div class="news-style-one list-style">
            <div class="inner-box">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-lg-4 col-md-5 col-sm-4 col-xs-12">
                        <figure class="image-box"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('healthcoach_270x247');?></a></figure>
                    </div>
                    <!--Content Column-->
                    <div class="content-column col-lg-8 col-md-7 col-sm-8 col-xs-12">
                        <div class="lower-content">
                            <div class="posted-info"><?php echo get_the_date('F d, Y')?></div>
                            <ul class="post-meta clearfix">
                                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><span class="icon fa fa-user"></span>  <?php the_author();?> </a></li>
                                <li><span class="icon fa fa-tags"></span> <?php the_tags('',',',''); ?></li>
                                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comment');?>"><span class="icon fa fa-comments"></span> <?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></li>
                            </ul>
                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                            <div class="text"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    </section>

    <!-- Styled Pagination -->
    <div class="styled-pagination text-center">
        <?php healthcoach_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-caret-right"></i>', 'prev_text' => '<i class="fa fa-caret-left"></i>')); ?>
    </div>

</div><!--End Content Side-->

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>