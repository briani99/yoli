<?php
ob_start() ;?>

<!--Request Quote Section-->
<section class="appt-section">
    <section class="title-box" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($bg_img));?>);">
        <div class="auto-container">
            <h2><?php echo balanceTags($title);?></h2>
            <div class="separator"></div>
        </div>
    </section>
    
    <div class="auto-container">
        <div class="form-container">
            <div class="row clearfix">
                <!--Content Column-->
                <div class="content-column col-md-5 col-sm-12 col-xs-12">
                    <div class="text-content">
                        <p><?php echo balanceTags($contents);?></p>
                        <p><strong><?php esc_html_e('Office Hours :', 'healthcoach');?></strong> <?php echo balanceTags($office_hours);?></p>
                    </div>
                </div>
                
                <!--Form Column-->
                <div class="form-column col-md-7 col-sm-12 col-xs-12">
                    <div class="default-form">
                       <?php echo do_shortcode(bunch_base_decode($contact_form));?>
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
   