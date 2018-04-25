<?php
ob_start() ;?>

<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Form Column -->
            <div class="column form-column pull-right col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="sec-title"><h2><?php echo balanceTags($title);?></h2><div class="separator"></div></div>
                <!--form-box-->
                <div class="form-box default-form">
                    <div class="contact-form default-form">
                        <?php echo do_shortcode(bunch_base_decode($contact_form));?>
                    </div>
                </div>
            </div>
            
            <!--Column-->
            <div class="column info-column pull-left col-lg-6 col-md-8 col-sm-12 col-xs-12">
                <div class="sec-title"><h2><?php echo balanceTags($title1);?></h2><div class="separator"></div></div>
                <!--Info Tabs-->
                <div class="tabs-box info-tabs">
                    <!--Tab Buttons-->
                    <ul class="tab-buttons clearfix">
                        <?php $skills_array = (array)json_decode(urldecode($contact_info));
							if( $skills_array && is_array($skills_array) ): 
							foreach( (array)$skills_array as $key => $value ):
						?>
                        <li class="tab-btn <?php if( $key == 1 ) echo 'active-btn' ;?>" data-tab="#info-tab-1<?php echo esc_attr($key);?>"><?php echo balanceTags(healthcoach_set( $value, 'title2' )); ?></li>
                    	<?php $key++; endforeach; endif;?>
                    </ul>
                    
                    <!--Tabs Content-->
                    <div class="tabs-content">
                        <?php $skills_array = (array)json_decode(urldecode($contact_info));
							if( $skills_array && is_array($skills_array) ): 
							foreach( (array)$skills_array as $key => $value ):
						?>
                        <!--Tab / Active Tab-->
                        <div class="tab <?php if( $key == 1 ) echo 'active-tab' ;?>" id="info-tab-1<?php echo esc_attr($key);?>">
                            <div class="desc-text"><?php echo balanceTags(healthcoach_set( $value, 'text' )); ?></div>
                            <h3 class="location-title"><?php echo balanceTags(healthcoach_set( $value, 'title2' )); ?></h3>
                            <div class="info-style-one">
                                <ul>
                                    <li><div class="icon-box"><span class="fa fa-globe"></span></div><h4><?php esc_html_e('Address :', 'healthcoach');?></h4><div class="text"><?php echo balanceTags(healthcoach_set( $value, 'content' )); ?></div></li>
                                    <li><div class="icon-box"><span class="flaticon-envelope"></span></div><h4><?php esc_html_e('Ask Some Thing Us :', 'healthcoach');?></h4><div class="text"><?php echo sanitize_email(healthcoach_set( $value, 'email' )); ?></div></li>
                                    <li><div class="icon-box"><span class="flaticon-technology-1"></span></div><h4><?php esc_html_e('Call Us:', 'healthcoach');?></h4><div class="text"> <?php echo nl2br(wp_kses_post(healthcoach_set( $value, 'phone' ))); ?></div></li>
                                </ul>
                            </div>
                        </div>
                        <?php $key++; endforeach; endif;?>
                    </div>
                </div><!--End Info Tabs-->
                
            </div>
            
        </div>    
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   