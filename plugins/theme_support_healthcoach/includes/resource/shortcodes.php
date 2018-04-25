<?php
$bunch_sc = array();

$bunch_sc['bunch_why_choose_us']	=	array(
					"name" => __("Why Choose Us", BUNCH_NAME),
					"base" => "bunch_why_choose_us",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Why Choose Us.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text', BUNCH_NAME ),
								   "param_name" => "text",
								   "description" => __('Enter The Section Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'services_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_services_3_col']	=	array(
					"name" => __("Services 3 Column", BUNCH_NAME),
					"base" => "bunch_services_3_col",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Services 3 Column.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'services_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_funfacts'] = array(
			"name" => __("Funfacts", BUNCH_NAME),
			"base" => "bunch_funfacts",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Funfacts', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "attach_image",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __("Background Image", BUNCH_NAME),
						   "param_name" => "bg_img",
						   "description" => __("Enter the Background Image to show.", BUNCH_NAME)
						),
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Title', BUNCH_NAME ),
						   "param_name" => "title",
						   "description" => __('Enter The Title to Show.', BUNCH_NAME )
						),
						array(
						   "type" => "textarea",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Text', BUNCH_NAME ),
						   "param_name" => "text",
						   "description" => __('Enter The Text to Show.', BUNCH_NAME )
						),
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Button Text', BUNCH_NAME ),
						   "param_name" => "btn_text",
						   "description" => __('Enter The Button Text to Show.', BUNCH_NAME )
						),
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Button Link', BUNCH_NAME ),
						   "param_name" => "btn_link",
						   "description" => __('Enter The Button Link to Show.', BUNCH_NAME )
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'funfacts',
							'group' => esc_html__('Funfacts', BUNCH_NAME),
			                'params' => array(
										array(
										   "type" => "dropdown",
										   'value' => '',
										   "heading" => __("Icon", BUNCH_NAME),
										   "param_name" => "icon",
										   "value" => (array)vp_get_fontawesome_icons(),
										   "description" => __("Choose Icon for Process", BUNCH_NAME)
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Counter Start', BUNCH_NAME ),
											'param_name' => 'counter_start',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Counter Stop', BUNCH_NAME ),
											'param_name' => 'counter_stop',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Title', BUNCH_NAME ),
											'param_name' => 'title',
										),
										array(
											"type" => "checkbox",
											"holder" => "div",
											"class" => "",
											"heading" => __('Style Two', BUNCH_NAME ),
											"param_name" => "style_two",
											'value' => array(__('Style Two for Show Plus Icon', BUNCH_NAME )=>true),
											"description" => __('Choose whether you want to show Plus Icon.', 'SH_NAME' )
										), 
									)
								),
							),
						);
$bunch_sc['bunch_video_accordian'] = array(
			"name" => __("Video Accordian", BUNCH_NAME),
			"base" => "bunch_video_accordian",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Video Accordian', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "attach_image",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __("Video Image", BUNCH_NAME),
						   "param_name" => "video_img",
						   "description" => __("Enter the Video Image to show.", BUNCH_NAME)
						),
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Video Link', BUNCH_NAME ),
						   "param_name" => "video_link",
						   "description" => __('Enter The Video Link to Show.', BUNCH_NAME )
						),
						array(
						   "type" => "textarea",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Text', BUNCH_NAME ),
						   "param_name" => "text",
						   "description" => __('Enter The Text to Show.', BUNCH_NAME )
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'accordian',
							'group' => esc_html__('Accordian', BUNCH_NAME),
			                'params' => array(
										array(
										   "type" => "attach_image",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Image", BUNCH_NAME),
										   "param_name" => "image",
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Title', BUNCH_NAME ),
											'param_name' => 'title',
										),
										array(
											'type' => 'textarea',
											'value' => '',
											'heading' => esc_html__('Text', BUNCH_NAME ),
											'param_name' => 'text',
										), 
									)
								),
							),
						);
$bunch_sc['bunch_our_testimonial']	=	array(
					"name" => __("Our Testimonial", BUNCH_NAME),
					"base" => "bunch_our_testimonial",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Our Testimonial.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Button Link', BUNCH_NAME ),
								   "param_name" => "btn_link",
								   "description" => __('Enter The Button Link to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Button Text', BUNCH_NAME ),
								   "param_name" => "btn_text",
								   "description" => __('Enter The Button Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'testimonials_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);	
$bunch_sc['bunch_service_facts'] = array(
			"name" => __("Service Facts", BUNCH_NAME),
			"base" => "bunch_service_facts",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Service Facts', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "attach_image",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __("Background Image", BUNCH_NAME),
						   "param_name" => "bg_img",
						   "description" => __("Enter the Background Image to show.", BUNCH_NAME)
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'services_facts',
							'group' => esc_html__('Services Facts', BUNCH_NAME),
			                'params' => array(
										array(
										   "type" => "attach_image",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Image", BUNCH_NAME),
										   "param_name" => "image",
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Title', BUNCH_NAME ),
											'param_name' => 'title',
										),
										array(
											'type' => 'textarea',
											'value' => '',
											'heading' => esc_html__('Text', BUNCH_NAME ),
											'param_name' => 'text',
										), 
									)
								),
							),
						);
$bunch_sc['bunch_news_and_articles']	=	array(
					"name" => __("News And Articles", BUNCH_NAME),
					"base" => "bunch_news_and_articles",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show News And Articles.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Button Link', BUNCH_NAME ),
								   "param_name" => "btn_link",
								   "description" => __('Enter The Button Link to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Button Text', BUNCH_NAME ),
								   "param_name" => "btn_text",
								   "description" => __('Enter The Button Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);	
$bunch_sc['bunch_appointment_form']	=	array(
					"name" => __("Appointment Form", BUNCH_NAME),
					"base" => "bunch_appointment_form",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Appointment Form.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "attach_image",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Background Image", BUNCH_NAME),
								   "param_name" => "bg_img",
								   "description" => __("Enter the Background Image to show.", BUNCH_NAME)
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea_raw_html",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Contact Form7 Shortcode', BUNCH_NAME ),
								   "param_name" => "contact_form",
								   "description" => __('Enter Contact Form7 Shortcode', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Contents', BUNCH_NAME ),
								   "param_name" => "content",
								   "description" => __('Enter The Contents to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Office Hours', BUNCH_NAME ),
								   "param_name" => "office_hours",
								   "description" => __('Enter The Office Hours to Show.', BUNCH_NAME )
								),
							)
						);
$bunch_sc['bunch_about_us']	=	array(
					"name" => __("About Us", BUNCH_NAME),
					"base" => "bunch_about_us",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show About US.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "attach_image",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Video Image", BUNCH_NAME),
								   "param_name" => "video_img",
								   "description" => __("Enter the Video Image to show.", BUNCH_NAME)
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Video Link', BUNCH_NAME ),
								   "param_name" => "video_link",
								   "description" => __('Enter The Video Link to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Quot Text', BUNCH_NAME ),
								   "param_name" => "quot_text",
								   "description" => __('Enter The Quot Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "content",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text', BUNCH_NAME ),
								   "param_name" => "text",
								   "description" => __('Enter The Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "attach_image",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Signature Image", BUNCH_NAME),
								   "param_name" => "sign",
								   "description" => __("Enter the Signature Image to show.", BUNCH_NAME)
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Author Title', BUNCH_NAME ),
								   "param_name" => "author_title",
								   "description" => __('Enter The Author Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Designation', BUNCH_NAME ),
								   "param_name" => "designation",
								   "description" => __('Enter The Designation to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Company Title', BUNCH_NAME ),
								   "param_name" => "company_title",
								   "description" => __('Enter The Company Title to Show.', BUNCH_NAME )
								),
							)
						);
$bunch_sc['bunch_our_certificates'] = array(
			"name" => __("Our Certificates", BUNCH_NAME),
			"base" => "bunch_our_certificates",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Our Certificates', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Title', BUNCH_NAME ),
						   "param_name" => "title",
						   "description" => __('Enter The Title to Show.', BUNCH_NAME )
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'certificate_img',
							'group' => esc_html__('Our Certificates', BUNCH_NAME),
			                'params' => array(
										array(
										   "type" => "attach_image",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Image", BUNCH_NAME),
										   "param_name" => "image",
										),
									)
								),
							),
						);
$bunch_sc['bunch_people_choose_us']	=	array(
					"name" => __("People Choose Us", BUNCH_NAME),
					"base" => "bunch_people_choose_us",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show People Choose Us.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'services_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_our_team']	=	array(
					"name" => __("Our Team", BUNCH_NAME),
					"base" => "bunch_our_team",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Our Team.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'team_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "attach_image",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Section Image", BUNCH_NAME),
								   "param_name" => "image",
								   "description" => __("Enter the Section Image to show.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_service_gride']	=	array(
					"name" => __("Service Gride", BUNCH_NAME),
					"base" => "bunch_service_gride",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Service Gride.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'services_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_people_choose_us_2']	=	array(
					"name" => __("People Choose Us 2", BUNCH_NAME),
					"base" => "bunch_people_choose_us_2",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show People Choose Us 2.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text', BUNCH_NAME ),
								   "param_name" => "text",
								   "description" => __('Enter The Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'services_category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_pricing_section'] = array(
			"name" => __("Pricing Section", BUNCH_NAME),
			"base" => "bunch_pricing_section",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Pricing Section', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Title', BUNCH_NAME ),
						   "param_name" => "title",
						   "description" => __('Enter The Title to Show.', BUNCH_NAME )
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'pricing_table',
							'group' => esc_html__('Pricing Table', BUNCH_NAME),
			                'params' => array(
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Title', BUNCH_NAME ),
											'param_name' => 'title',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Price', BUNCH_NAME ),
											'param_name' => 'currency',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Duration', BUNCH_NAME ),
											'param_name' => 'duration',
										),
										array(
										   "type" => "textarea",
										   "holder" => "div",
										   "class" => "",
										   "heading" => __("Features Text", BUNCH_NAME),
										   "param_name" => "feature_str",
										   "description" => __("Enter the Section Features to show.", BUNCH_NAME)
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Button Link', BUNCH_NAME ),
											'param_name' => 'btn_link',
										), 
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Button Text', BUNCH_NAME ),
											'param_name' => 'btn_text',
										), 
									)
								),
							),
						);
$bunch_sc['bunch_consultation_form']	=	array(
					"name" => __("Consultation Form", BUNCH_NAME),
					"base" => "bunch_consultation_form",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Consultation Form.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "attach_image",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Background Image", BUNCH_NAME),
								   "param_name" => "bg_img",
								   "description" => __("Enter the Background Image to show.", BUNCH_NAME)
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Title', BUNCH_NAME ),
								   "param_name" => "title",
								   "description" => __('Enter The Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Contents', BUNCH_NAME ),
								   "param_name" => "content",
								   "description" => __('Enter The Contents to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Office Hours', BUNCH_NAME ),
								   "param_name" => "office_hours",
								   "description" => __('Enter The Office Hours to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textarea_raw_html",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Contact Form7 Shortcode', BUNCH_NAME ),
								   "param_name" => "contact_form",
								   "description" => __('Enter Contact Form7 Shortcode', BUNCH_NAME )
								),
							)
						);
$bunch_sc['bunch_gallery_4_column']	=	array(
					"name" => __("Gallery 4 Column", BUNCH_NAME),
					"base" => "bunch_gallery_4_column",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Gallery 4 Column.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Excluded Categories ID', BUNCH_NAME ),
								   "param_name" => "exclude_cats",
								   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
									"type" => "checkbox",
									"holder" => "div",
									"class" => "",
									"heading" => __('Style Two', BUNCH_NAME ),
									"param_name" => "style_two",
									'value' => array(__('Style Two for Show Full Width Gallery', BUNCH_NAME )=>true),
									"description" => __('Choose whether you want to show Full Width Gallery.', 'SH_NAME' )
								), 
							)
						);
$bunch_sc['bunch_galley_text']	=	array(
					"name" => __("Gallery Width Text", BUNCH_NAME),
					"base" => "bunch_galley_text",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Gallery Width Text.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Excluded Categories ID', BUNCH_NAME ),
								   "param_name" => "exclude_cats",
								   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_blog_list_view']	=	array(
					"name" => __("Blog List View", BUNCH_NAME),
					"base" => "bunch_blog_list_view",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Blog List View.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_blog_grid_view']	=	array(
					"name" => __("Blog Grid View", BUNCH_NAME),
					"base" => "bunch_blog_grid_view",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Blog Grid View.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Text Limit', BUNCH_NAME ),
								   "param_name" => "text_limit",
								   "description" => __('Enter The Limit Of Text to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Number', BUNCH_NAME ),
								   "param_name" => "num",
								   "description" => __('Enter Number of Slides to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __( 'Category', BUNCH_NAME ),
								   "param_name" => "cat",
								   "value" => array_flip( (array)bunch_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => FALSE ), true ) ),
								   "description" => __( 'Choose Category.', BUNCH_NAME )
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order By", BUNCH_NAME),
								   "param_name" => "sort",
								   'value' => array_flip( array('select'=>__('Select Options', BUNCH_NAME),'date'=>__('Date', BUNCH_NAME),'title'=>__('Title', BUNCH_NAME) ,'name'=>__('Name', BUNCH_NAME) ,'author'=>__('Author', BUNCH_NAME),'comment_count' =>__('Comment Count', BUNCH_NAME),'random' =>__('Random', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
								array(
								   "type" => "dropdown",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __("Order", BUNCH_NAME),
								   "param_name" => "order",
								   'value' => array_flip(array('select'=>__('Select Options', BUNCH_NAME),'ASC'=>__('Ascending', BUNCH_NAME),'DESC'=>__('Descending', BUNCH_NAME) ) ),			
								   "description" => __("Enter the sorting order.", BUNCH_NAME)
								),
							)
						);
$bunch_sc['bunch_get_in_touch'] = array(
			"name" => __("Get In Touch", BUNCH_NAME),
			"base" => "bunch_get_in_touch",
			"class" => "",
			"category" => __('Health Coach', BUNCH_NAME),
			"icon" => 'icon-wpb-layer-shape-text' ,
			'description' => __('Show Get In Touch', BUNCH_NAME),
			"params" => array(
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Title', BUNCH_NAME ),
						   "param_name" => "title",
						   "description" => __('Enter The Title to Show.', BUNCH_NAME )
						),
						array(
						   "type" => "textarea_raw_html",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Contact Form7 Shortcode', BUNCH_NAME ),
						   "param_name" => "contact_form",
						   "description" => __('Enter Contact Form7 Shortcode', BUNCH_NAME )
						),
						array(
						   "type" => "textfield",
						   "holder" => "div",
						   "class" => "",
						   "heading" => __('Title', BUNCH_NAME ),
						   "param_name" => "title1",
						   "description" => __('Enter The Title to Show.', BUNCH_NAME ),
						   'group' => esc_html__('Contact Information', BUNCH_NAME),
						),
						// params group
			            array(
			                'type' => 'param_group',
			                'value' => '',
			                'param_name' => 'contact_info',
							'group' => esc_html__('Contact Information', BUNCH_NAME),
			                'params' => array(
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Title', BUNCH_NAME ),
											'param_name' => 'title2',
										),
										array(
											'type' => 'textarea',
											'value' => '',
											'heading' => esc_html__('Text', BUNCH_NAME ),
											'param_name' => 'text',
										),
										array(
											'type' => 'textarea',
											'value' => '',
											'heading' => esc_html__('Address', BUNCH_NAME ),
											'param_name' => 'content',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Email', BUNCH_NAME ),
											'param_name' => 'email',
										),
										array(
											'type' => 'textfield',
											'value' => '',
											'heading' => esc_html__('Phone No', BUNCH_NAME ),
											'param_name' => 'phone',
										),
									)
								),
							),
						);
$bunch_sc['bunch_google_map']	=	array(
					"name" => __("Google Map", BUNCH_NAME),
					"base" => "bunch_google_map",
					"class" => "",
					"category" => __('Health Coach', BUNCH_NAME),
					"icon" => 'fa-briefcase' ,
					'description' => __('Show Google Map.', BUNCH_NAME),
					"params" => array(
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Latitude', BUNCH_NAME ),
								   "param_name" => "lat",
								   "description" => __('Enter The Latitude to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Longitude', BUNCH_NAME ),
								   "param_name" => "long",
								   "description" => __('Enter The Longitude to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Mark Title', BUNCH_NAME ),
								   "param_name" => "mark_title",
								   "description" => __('Enter The Mark Title to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Mark Address', BUNCH_NAME ),
								   "param_name" => "mark_address",
								   "description" => __('Enter The Mark Address to Show.', BUNCH_NAME )
								),
								array(
								   "type" => "textfield",
								   "holder" => "div",
								   "class" => "",
								   "heading" => __('Email', BUNCH_NAME ),
								   "param_name" => "email",
								   "description" => __('Enter The Email to Show.', BUNCH_NAME )
								),
							)
						);























																																																												
/*----------------------------------------------------------------------------*/
$bunch_sc = apply_filters( '_bunch_shortcodes_array', $bunch_sc );
	
return $bunch_sc;