<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   ob_start() ;?>
<?php if($query->have_posts()):  ?>   

<!--Why Choose Us  Section-->
<section class="why-choose-us">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2><?php echo balanceTags($title);?></h2>
            <div class="separator"></div>
        </div>
        
        <div class="row clearfix">
            <?php while($query->have_posts()): $query->the_post();
                global $post ; 
                $services_meta = _WSH()->get_meta();
            ?>
            <!--Default Icon Column-->
            <div class="icon-column-default col-lg-4 col-md-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="<?php echo str_replace("icon ", "", healthcoach_set($services_meta, 'fontawesome'));?>"></span></div>
                    <h3><?php the_title();?></h3>
                    <div class="text"><?php echo balanceTags(healthcoach_trim(get_the_content(), $text_limit));?></div>
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