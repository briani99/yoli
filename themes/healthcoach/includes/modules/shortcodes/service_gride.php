<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   ob_start() ;?>
<?php if($query->have_posts()):  ?>   

<!--Featured Servies Section-->
<section class="featured-services">
    <div class="auto-container">
        
        <div class="row clearfix">
        	<?php while($query->have_posts()): $query->the_post();
                global $post ; 
                $services_meta = _WSH()->get_meta();
            ?>
            <!--Featured Service -->
            <div class="featured-service col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('healthcoach_370x250');?></a></figure>
                        <div class="caption-box">
                            <div class="icon"><span class="<?php echo str_replace("icon ", "", healthcoach_set($services_meta, 'fontawesome'));?>"></span></div>
                            <h4 class="title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h4>
                        </div>
                        <!--Overlay-->
                        <div class="overlay-box">
                            <div class="icon-box"><span class="<?php echo str_replace("icon ", "", healthcoach_set($services_meta, 'fontawesome'));?>"></span></div>
                            <div class="overlay-inner">
                                <div class="overlay-content">
                                    <h4 class="title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title()?></a></h4>
                                    <div class="text"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
                                </div>
                            </div>
                        </div>
                        
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