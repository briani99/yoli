<?php
ob_start() ;?>

<!--Experience Section-->
<section class="experience-section" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($bg_img));?>);">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Title Column-->
            <div class="title-column col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h2><?php echo balanceTags($title);?></h2>
                    <div class="text"><?php echo balanceTags($text);?></div>
                    <a href="<?php echo esc_url($btn_link);?>" class="req-btn styled-font"><?php echo balanceTags($btn_text);?></a>
                </div>
            </div>
            
            <!--Fact Counter-->
            <div class="factcounter-column col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <!--Fact Counter-->
                <div class="fact-counter">
                    <div class="row clearfix">
                        <?php $skills_array = (array)json_decode(urldecode($funfacts));
							if( $skills_array && is_array($skills_array) ): 
							foreach( (array)$skills_array as $value ):
						?>
                        <!--Column-->
                        <article class="column counter-column col-md-4 col-sm-4 col-xs-12 wow fadeIn" data-wow-duration="0ms">
                            <div class="inner-box">
                                <div class="icon"><span class="<?php echo esc_attr(healthcoach_set( $value, 'icon' ));?>"></span></div>
                                <div class="separator"></div>
                                <div class="count-outer"><span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr(healthcoach_set( $value, 'counter_stop' )); ?>"><?php echo balanceTags(healthcoach_set( $value, 'counter_start' )); ?></span><?php if(healthcoach_set( $value, 'style_two') == true) echo '+' ;?></div>
                                <h4 class="counter-title"><?php echo balanceTags(healthcoach_set( $value, 'title' )); ?></h4>
                            </div>
                        </article>
                        <?php endforeach; endif;?>
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
   