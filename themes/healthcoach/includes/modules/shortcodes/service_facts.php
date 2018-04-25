<?php
$count = 1;
ob_start() ;?>

<!--Work Steps Section-->
<section class="work-steps" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($bg_img));?>);">
    <div class="auto-container">
        <div class="row clearfix">
            <?php $skills_array = (array)json_decode(urldecode($services_facts));
				if( $skills_array && is_array($skills_array) ): 
				foreach( (array)$skills_array as $value ):
			?>
            <!--Step COlumn-->
            <div class="step-column col-md-3 col-sm-6 col-xs-12">
                <div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <figure class="image"><?php echo balanceTags(wp_get_attachment_image( healthcoach_set( $value, 'image' ), 'full', "", array( "class" => "img-responsive" ) ));  ?></figure>
                        <div class="count"><?php echo balanceTags($count); ?></div>
                    </div>
                    <div class="lower-content">
                        <h3><?php echo balanceTags(healthcoach_set( $value, 'title' )); ?></h3>
                        <div class="text"><?php echo balanceTags(healthcoach_set( $value, 'text' )); ?></div>
                    </div>
                </div>
            </div>
            <?php $count++; endforeach; endif;?>
        </div>
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   