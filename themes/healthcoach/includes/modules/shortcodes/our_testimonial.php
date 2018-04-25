<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['testimonials_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   ob_start() ;?>
<?php if($query->have_posts()):  ?>   

<!--Testimonials Section-->
<section class="testimonials-section">
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
        
        <div class="carousel-outer">
            <div class="testimonials-carousel">
                <?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$testimonial_meta = _WSH()->get_meta();
				?>
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="inner-box">
                        <div class="slide-header">
                            <figure class="author-thumb"><?php the_post_thumbnail('healthcoach_90x90');?></figure>
                            <h4><?php the_title();?></h4>
                            <div class="designation"><?php echo wp_kses_post(healthcoach_set($testimonial_meta, 'designation'));?></div>
                        </div>
                        <div class="slide-content"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
        
    </div>
</section>

<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>