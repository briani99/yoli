<?php $options = get_option('healthcoach'.'_theme_options');?>
	
	<!--Main Footer-->
    <footer class="main-footer">
    	<?php if(!(healthcoach_set($options, 'hide_upper_footer'))):?>
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                <div class="auto-container">
                    <!--Widgets Section-->
                    <div class="widgets-section">
                        <div class="row clearfix">
                            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                         </div>
                     </div>
                </div>
            <?php } ?> 
        <?php endif;?>
        
        <?php if(!(healthcoach_set($options, 'hide_bottom_footer'))):?>
        <!--Footer Bottom-->
         <div class="footer-bottom">
         	<div class="auto-container">
            	<div class="clearfix">
                	<div class="pull-left"><div class="copyright"><?php echo wp_kses_post(healthcoach_set($options, 'copyright'));?></div></div>
                    <div class="pull-right">
                    	<?php if(!(healthcoach_set($options, 'hide_social_icons'))):?>
            			<?php if($socials = healthcoach_set(healthcoach_set($options, 'social_media'), 'social_media')):?>
                        <ul class="footer-social">
                        	<?php foreach($socials as $key => $value):
								if(healthcoach_set($value, 'tocopy')) continue;
							?>
							<li><a href="<?php echo esc_url(healthcoach_set($value, 'social_link'));?>"><span class="fa <?php echo esc_attr(healthcoach_set($value, 'social_icon'));?>"></span></a></li>
							<?php endforeach;?>
                        </ul>
                    	<?php endif;?>
            			<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-angle-up"></span></div>

<?php wp_footer(); ?>
</body>
</html>