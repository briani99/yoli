<?php
///----Blog widgets---

/// Recent Posts 
class Bunch_Footer_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Footer_Recent_Post', /* Name */esc_html__('Health Coach Footer Recent Post','healthcoach'), array( 'description' => esc_html__('Show the Footer Recent Posts', 'healthcoach' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
        <!-- Recent Posts -->
        <div class="posts-widget">
            <?php echo balanceTags($before_title.$title.$after_title); ?>
			
			<?php $query_string = 'posts_per_page='.$instance['number'];
            if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
            
            $this->posts($query_string);
            ?>
            
        </div>
        
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recents News', 'healthcoach');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'healthcoach'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'healthcoach'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'healthcoach'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'healthcoach'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string) ; 
		if( $query->have_posts() ):?>
        	
            <div class="widget-content">
                <div class="posts">
                    <?php while( $query->have_posts() ): $query->the_post(); ?>
                    <div class="post">
                        <figure class="post-thumb"><?php the_post_thumbnail('healthcoach_75x75');?><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="overlay-link"><span class="fa fa-link"></span></a></figure>
                        <div class="desc-text"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php echo balanceTags(healthcoach_trim(get_the_title(), 7));?></a></div>
                        <div class="time"><?php echo get_the_date('F d, Y');?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer widgets---
//About Us
class Bunch_About_us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Abous_us', /* Name */esc_html__('Health Coach Abous Us','healthcoach'), array( 'description' => esc_html__('Show the information about company', 'healthcoach' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo balanceTags($before_widget);?>
      		
            <div class="about-widget">
                <div class="footer-logo"><figure><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['link']);?>" alt="<?php esc_attr_e('footer logo', 'healthcoach');?>"></a></figure></div>
                <div class="widget-content">
                    <div class="text"><?php echo balanceTags($instance['content']); ?></div>
                    <a href="<?php echo esc_url($instance['btn_link']); ?>" class="theme-btn btn-style-four"><?php echo balanceTags($instance['btn_text']); ?></a>
                </div>
            </div>
            
		<?php
		
		echo balanceTags($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['link'] = strip_tags($new_instance['link']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['btn_text'] = $new_instance['btn_text'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$link = ($instance) ? esc_attr($instance['link']) : 'https://';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_link = ( $instance ) ? esc_attr($instance['btn_link']) : '';
		$btn_text = ( $instance ) ? esc_attr($instance['btn_text']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Image Url:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Image Url', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'healthcoach'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo balanceTags($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php esc_html_e('Button Text:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Button Text', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" type="text" value="<?php echo esc_attr($btn_text); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('External Link:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('External Link', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>      
                
		<?php 
	}
	
}

///----footer widgets---
//Contact Us
class Bunch_Contact_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Contact_Us', /* Name */esc_html__('Health Coach Contact Us','healthcoach'), array( 'description' => esc_html__('Show the information about company', 'healthcoach' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget);?>
      		
            <div class="contact-widget">
                <h2><?php echo balanceTags($instance['title']); ?></h2>
                <div class="widget-content">
                    <ul class="contact-info">
                        <li><span class="icon flaticon-telephone-1"></span><strong><?php esc_html_e('Phone:', 'healthcoach');?></strong> <?php echo nl2br(wp_kses_post($instance['phone'])); ?></li>
                        <li><span class="icon flaticon-interface-4"></span><strong><?php esc_html_e('Email:', 'healthcoach');?></strong> <?php echo sanitize_email($instance['email']); ?></li>
                        <li><span class="icon flaticon-location"></span><strong><?php esc_html_e('Address:', 'healthcoach');?></strong> <?php echo nl2br(wp_kses_post($instance['address'])); ?></li>
                    </ul>
            
                </div>
            </div>
            
            <div class="newsletter-widget">
                <h2><?php echo balanceTags($instance['sub_title']); ?></h2>
                <div class="widget-content">
                    <div class="text"><?php echo balanceTags($instance['text']); ?></div>
                    <!--Newsletter One-->
                    <div class="newsletter-one">
                        <form method="get" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                            <div class="form-group">
                            	<input type="hidden" id="uri2" name="uri" value="<?php echo esc_attr($id); ?>">
                                <input type="email" name="email" value="" required placeholder="<?php esc_html_e('Your Email', 'healthcoach');?>">
                                <button type="submit" class="theme-btn"><span class="fa fa-paper-plane"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
		<?php
		
		echo balanceTags($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['address'] = $new_instance['address'];
		$instance['sub_title'] = $new_instance['sub_title'];
		$instance['text'] = $new_instance['text'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$phone = ($instance) ? esc_attr($instance['phone']) : '';
		$email = ( $instance ) ? esc_attr($instance['email']) : '';
		$address = ( $instance ) ? esc_attr($instance['address']) : '';
		$sub_title = ( $instance ) ? esc_attr($instance['sub_title']) : '';
		$text = ( $instance ) ? esc_attr($instance['text']) : '';
		$id = ( $instance ) ? esc_attr($instance['id']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Phone', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Email', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'healthcoach'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo nl2br(wp_kses_post($address)); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('sub_title')); ?>"><?php esc_html_e('Sub Title:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Sub Title', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" type="text" value="<?php echo esc_attr($sub_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Description:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Description', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" value="<?php echo esc_attr($text); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Form id:', 'healthcoach'); ?></label>
            <input placeholder="<?php esc_html_e('Form Id', 'healthcoach');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>      
                
		<?php 
	}
	
}

/// Blog Recent News 
class Bunch_Blog_Recent_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Blog_Recent_News', /* Name */esc_html__('Health Coach Blog Recent News','healthcoach'), array( 'description' => esc_html__('Show the Blog Recent News', 'healthcoach' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
        <!-- Recent News -->
        <div class="recent-posts">
            <?php echo balanceTags($before_title.$title.$after_title); ?>
			
			<?php $query_string = 'posts_per_page='.$instance['number'];
            if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
            
            $this->posts($query_string);
            ?>
            
        </div>
        
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Blog Recents News', 'healthcoach');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'healthcoach'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'healthcoach'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'healthcoach'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'healthcoach'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string) ;
		if( $query->have_posts() ):?>
        	
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <!-- Recent Posts -->
            <div class="post">
                <figure class="post-thumb"><?php the_post_thumbnail('healthcoach_75x75');?><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="overlay-link"><span class="fa fa-link"></span></a></figure>
                <div class="desc-text"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php echo balanceTags(healthcoach_trim(get_the_title(), 7));?></a></div>
                <div class="time"><?php echo get_the_date('F d, Y');?></div>
            </div>
            <?php endwhile; ?>    
            
            
        <?php endif;
		wp_reset_postdata();
    }
}
