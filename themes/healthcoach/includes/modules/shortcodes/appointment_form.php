<?php
ob_start() ;?>

<!--Two Column Fluid Section-->
<section class="two-col-fluid">
    <div class="outer-box clearfix">
        
        <!--Image Column-->
        <div class="image-column" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($bg_img));?>');">
            <figure class="image-box"><?php echo balanceTags(wp_get_attachment_image( $bg_img, 'full', "", array( "class" => "img-responsive" ) ));  ?></figure>
        </div>
        
        <!--Conent Column-->
        <div class="content-column">
            <div class="clearfix">
                <div class="inner-box">
                    
                    <div class="sec-title"><h2><?php echo balanceTags($title);?></h2><div class="separator"></div></div>
                    
                    <div class="default-form">
                       <?php echo do_shortcode(bunch_base_decode($contact_form));?> 
                    </div> 
                    
                    <div class="text-content">
                        <p><?php echo balanceTags($contents);?></p>
                        <p><strong><?php esc_html_e('Office Hours :', 'healthcoach');?></strong> <?php echo balanceTags($office_hours);?></p>
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
   
   