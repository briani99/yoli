<?php
ob_start() ;?>

<!--Certificates Section-->
<section class="certificates-section">
    <div class="auto-container">
        
        <div class="sec-title centered">
            <h2><?php echo balanceTags($title);?></h2>
            <div class="separator"></div>
        </div>
        
        <div class="carousel-outer">
            <div class="certificates-carousel">
                <?php $skills_array = (array)json_decode(urldecode($certificate_img));
                    if( $skills_array && is_array($skills_array) ): 
                    foreach( (array)$skills_array as $value ):
                ?>
                <!--Slide Item-->
                <div class="slide-item">
                    <figure class="image-box"><a href="<?php echo esc_url(wp_get_attachment_url(healthcoach_set( $value, 'image' ))); ?>" class="lightbox-image" title="<?php esc_html_e('Caption Here', 'healthcoach');?>"><?php echo balanceTags(wp_get_attachment_image( healthcoach_set( $value, 'image' ), 'full', "", array( "class" => "img-responsive" ) ));  ?></a></figure>
                </div>
                
                <?php endforeach; endif;?>
            </div>
        </div>
        
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   