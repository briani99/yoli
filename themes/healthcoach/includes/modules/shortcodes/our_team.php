<?php  
   $count = 1;
   $count_index = 0;
   $query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['team_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   $data_filtration = array();
   $data_content = array();
   $social = '';
   ?>
   
<?php if($query->have_posts()):  ?>
<?php while($query->have_posts()): $query->the_post();
	  global $post ;
	  $social = '';
	  $client_meta = _WSH()->get_meta();
	  
	 $social_media = healthcoach_set($client_meta, 'bunch_team_social');
	foreach($social_media as $key => $value){
		$social .= '<a href="'.esc_url(healthcoach_set($value, 'social_link')).'"><span class="fa '.healthcoach_set($value, 'social_icon').'"></span></a>';
	}
	  $active = ($count == 1) ? 'active' : '';
	  $data_filtration[get_the_id()] = '<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>'.get_the_title($post->ID).'</h3>
													<div class="designation styled-font">'.wp_kses_post(healthcoach_set($client_meta, 'designation')).'</div>
												</div>
												
												<div class="desc-text">'.get_the_content($post->ID).'</div>
												
												<div class="social-links">
													'.$social.'
												</div>
												
											</div>
										</div>';
	 									
	  $data_content[get_the_id()] = '<div class="thumb-item"><figure class="thumb-box img-circle">'.get_the_post_thumbnail( $post->ID, 'thumbnail', array('class' => 'img-circle')).'<span class="overlay"></span></figure></div>';
									
?>
<?php $count++; $count_index++; endwhile; endif;
wp_reset_postdata();
ob_start() ;
?>  

<!--Team Section-->
<section class="team-section">
    <div class="auto-container">
        
        <div class="row clearfix">
            <!--Content-column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <h2>Meet Our Team</h2>
                    <div class="separator"></div>
                </div>
                
                <div class="carousel-outer">
                    <!--Team Data Carousel-->
                    <div class="team-data-carousel">
                        <!--Slide Item-->
                        <?php foreach($data_filtration as $key => $value):?>
							<?php echo balanceTags($value);?>
                        <?php endforeach;?>
                        
                    </div>
                    
                    <!--Team Thumbs Carousel-->
                    <div class="team-thumbs-carousel">
                    	<?php foreach($data_content as $key => $content):?>
							<?php echo balanceTags($content);?>
                    	<?php endforeach;?>
                   </div>
                </div>
                
            </div>
            
            <!--Image-column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <figure class="image-box wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><?php echo balanceTags(wp_get_attachment_image( $image, 'full', "", array( "class" => "img-responsive" ) ));  ?></figure>
            </div>
            
        </div>
    </div>
</section>

<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>