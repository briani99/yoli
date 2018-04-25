<?php $options = _WSH()->option();
	healthcoach_bunch_global_variable();
	$icon_href = (healthcoach_set( $options, 'site_favicon' )) ? healthcoach_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.ico';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- Favcon -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
			<link rel="shortcut icon" type="image/png" href="<?php echo esc_url($icon_href);?>">
		<?php endif;?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
    <div class="page-wrapper">
 	<?php if(healthcoach_set($options, 'preloader')):?>
    <!-- Preloader -->
    <div class="preloader"></div>
 	<?php endif;?>
    
    <!-- Main Header-->
    <header class="main-header">
    	<!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container">
            	<div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left pull-left">
                    	<ul>
                        	<?php if(healthcoach_set($options, 'question')):?><li><span class="styled-font"><?php echo balanceTags(healthcoach_set($options, 'question'));?> </span></li><?php endif;?>
                            <?php if(healthcoach_set($options, 'phone')):?><li><span class="fa fa-phone"></span> <?php esc_html_e('Phone', 'healthcoach');?> <?php echo nl2br(wp_kses_post(healthcoach_set($options, 'phone')));?></li><?php endif;?>
                            <?php if(healthcoach_set($options, 'email')):?><li><span class="fa fa-envelope-o"></span> <?php echo sanitize_email(healthcoach_set($options, 'email'));?></li><?php endif;?>
                            <?php if(healthcoach_set($options, 'address')):?><li><span class="fa fa-globe"></span> <?php echo nl2br(wp_kses_post(healthcoach_set($options, 'address')));?></li><?php endif;?>
                        </ul>    
                    </div>
                    
                    <!--Top Right-->
                    <?php if(healthcoach_set($options, 'show_app_link')):?>
                    <div class="top-right pull-right">
                    	<a href="<?php echo esc_url(healthcoach_set($options, 'appoinment_link'));?>"  class="theme-btn"><?php esc_html_e('Make an Appointment', 'healthcoach');?></a>
                    </div>
                    <?php endif;?>
                </div>
                
            </div>
        </div><!-- Header Top End -->
        
        
        <!-- Main Box -->
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo">
                        	<?php if(healthcoach_set($options, 'logo_image')):?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(healthcoach_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Health Coach Logo', 'healthcoach');?>"></a>
                            <?php else:?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_attr_e('Health Coach Logo', 'healthcoach');?>"></a>
                            <?php endif;?>
                        </div>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
										'container_class'=>'navbar-collapse collapse navbar-right',
										'menu_class'=>'nav navbar-nav',
										'fallback_cb'=>false, 
										'items_wrap' => '%3$s', 
										'container'=>false,
										'walker'=> new Bunch_Bootstrap_walker()  
									) ); ?>
                                    
                                 </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                        
                    </div><!--Nav Outer End-->
                    
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                    <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                    </div><!-- / Hidden Nav Toggler -->
                    
                    <!--Cart Btn-->
                    <?php if( function_exists( 'WC' ) ):
							global $woocommerce; ?>
                    <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="cart-btn-outer cart-btn"><span class="fa fa-shopping-cart"></span><span class="count"><?php echo balanceTags($woocommerce->cart->get_cart_contents_count()); ?></span></a>
                    <?php endif;?>
            	</div>    
            </div>
        </div>
    
    </header>
    <!--End Main Header -->
    
    
    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar right-align">
        
        <div class="hidden-bar-closer">
            <button class="btn"><i class="fa fa-close"></i></button>
        </div>
        
        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
        
            <!-- .logo -->
            <div class="logo text-center">
                <?php if(healthcoach_set($options, 'small_logo_image')):?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(healthcoach_set($options, 'small_logo_image'));?>" alt="<?php esc_attr_e('Health Coach Logo', 'healthcoach');?>"></a>
                <?php else:?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.png');?>" alt="<?php esc_attr_e('Health Coach Logo', 'healthcoach');?>"></a>
                <?php endif;?>			
            </div><!-- /.logo -->
            
            <!-- .Side-menu -->
            <div class="side-menu">
            <!-- .navigation -->
                <ul class="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
						'container_class'=>'navbar-collapse collapse navbar-right',
						'menu_class'=>'nav navbar-nav',
						'fallback_cb'=>false, 
						'items_wrap' => '%3$s', 
						'container'=>false,
						'walker'=> new Bunch_Bootstrap_walker()  
					) ); ?>
                </ul>
            </div><!-- /.Side-menu -->
        	<?php if(healthcoach_set($options, 'show_social_icons')):?>
            <?php if($socials = healthcoach_set(healthcoach_set($options, 'social_media'), 'social_media')):?>
            <div class="social-icons">
                <ul>
                    <?php foreach($socials as $key => $value):
						if(healthcoach_set($value, 'tocopy')) continue;
					?>
					<li><a href="<?php echo esc_url(healthcoach_set($value, 'social_link'));?>"><i class="fa <?php echo esc_attr(healthcoach_set($value, 'social_icon'));?>"></i></a></li>
					<?php endforeach;?>
                </ul>
            </div>
        	<?php endif;?>
            <?php endif;?>
        </div><!-- / Hidden Bar Wrapper -->
    </section>
    <!-- / Hidden Bar -->
