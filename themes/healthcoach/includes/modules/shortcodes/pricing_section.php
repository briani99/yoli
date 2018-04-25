<?php
ob_start() ;?>

<!--Price Plans-->
<section class="price-plans">
    <div class="auto-container">
        
        <div class="sec-title centered">
            <h2><?php echo balanceTags($title);?></h2>
            <div class="separator"></div>
        </div>
        
        <div class="row clearfix">
            <?php $skills_array = (array)json_decode(urldecode($pricing_table));
				if( $skills_array && is_array($skills_array) ): 
				foreach( (array)$skills_array as $value ):
			?>
            <!--Price Column-->
            <div class="pricing-column col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="plan-title"><h3><?php echo balanceTags(healthcoach_set( $value, 'title' )); ?></h3></div>
                    <div class="pricing-info clearfix">
                        <div class="duration"><?php echo balanceTags(healthcoach_set( $value, 'duration' )); ?></div>
                        <div class="price styled-font"><?php echo balanceTags(healthcoach_set( $value, 'currency' )); ?></div>
                    </div>
                    <div class="lower-content">
                        <ul class="specs-list">
                            <?php $fearures = explode("\n",healthcoach_set($value, 'feature_str'));?>
							<?php foreach($fearures as $feature):?>
                                <li><?php echo balanceTags($feature ); ?></li>
                            <?php endforeach;?>
                        </ul>
                        <div class="link-box"><a href="<?php echo esc_url(healthcoach_set($value, 'btn_link'));?>" class="theme-btn btn-style-three"><?php echo balanceTags(healthcoach_set($value, 'btn_text'));?></a></div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif;?>
        </div>
        
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   