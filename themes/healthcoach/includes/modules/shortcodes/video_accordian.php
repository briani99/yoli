<?php
ob_start() ;?>

<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Text Column-->
            <div class="column video-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-box">
                    <!--featured-image-box-->
                    <div class="video-image-box">
                        <figure class="image"><?php echo balanceTags(wp_get_attachment_image( $video_img, 'full', "", array( "class" => "img-responsive" ) ));  ?><a href="<?php echo esc_url($video_link)?>" class="overlay-link lightbox-image"><span class="icon flaticon-multimedia"></span></a></figure>
                        <div class="caption-box"><?php echo balanceTags($text);?></div>
                    </div>
                </div>
            </div>
            
            <!--Accordions Column-->
            <div class="column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-box">
                
                    <!--Accordion Box-->
                    <ul class="accordion-box">
                        <?php $skills_array = (array)json_decode(urldecode($accordian));
							if( $skills_array && is_array($skills_array) ): 
							foreach( (array)$skills_array as $key => $value ):
						?>
                        <!--Block-->
                        <li class="accordion block <?php if($key == 1) echo "active-block";?>">
                            <div class="acc-btn <?php if($key == 1) echo "active";?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo balanceTags(healthcoach_set( $value, 'title' )); ?></div>
                            <div class="acc-content <?php if($key == 1) echo "current";?>">
                                <div class="content clearfix">
                                    <figure class="image"><?php echo balanceTags(wp_get_attachment_image( healthcoach_set( healthcoach_set( $value, 'image' ), 'image' ), 'full', "", array( "class" => "img-responsive" ) ));  ?></figure>
                                    <p><?php echo balanceTags(healthcoach_set( $value, 'text' )); ?></p>
                                </div>
                            </div>
                        </li>
                        <?php $key++; endforeach; endif;?>
                    </ul><!--End Accordion Box-->
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   