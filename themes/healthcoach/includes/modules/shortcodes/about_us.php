<?php
ob_start() ;?>

<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Video Column-->
            <div class="column video-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!--featured-image-box-->
                    <div class="video-image-box">
                        <figure class="image"><?php echo balanceTags(wp_get_attachment_image( $video_img, 'full', "", array( "class" => "img-responsive" ) ));  ?><a href="<?php echo esc_url($video_link);?>" class="overlay-link lightbox-image"><span class="icon flaticon-multimedia"></span></a></figure>
                        <div class="caption-box"><?php echo balanceTags($quot_text);?></div>
                    </div>
                </div>
            </div>
            
            <!--Text Column -->
            <div class="column text-column col-md-6 col-sm-12 col-xs-12">
                <h2><?php echo balanceTags($contents);?> </h2>
                <div class="inner-box">
                     <div class="text"><?php echo balanceTags($text);?></div>
                     <div class="signature-image"><?php echo balanceTags(wp_get_attachment_image( $sign, 'full', "", array( "class" => "img-responsive" ) ));  ?></div>
                     <div class="about-owner">
                        <h4><?php echo balanceTags($author_title);?> <span class="designation"><?php echo wp_kses_post($designation);?></span></h4>
                        <div class="company-title styled-font"><?php echo balanceTags($company_title);?></div>
                     </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   