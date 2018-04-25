<?php
$options = array();
$options[] = array(
	'id'          => '_bunch_layout_settings',
	'types'       => array('post', 'page', 'product', 'bunch_services', 'bunch_gallery', ),
	'title'       => __('Layout Settings', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					
					array(
						'type' => 'radioimage',
						'name' => 'layout',
						'label' => __('Page Layout', BUNCH_NAME),
						'description' => __('Choose the layout for blog pages', BUNCH_NAME),
						'items' => array(
							array(
								'value' => 'left',
								'label' => __('Left Sidebar', BUNCH_NAME),
								'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cl.png',
							),
							array(
								'value' => 'right',
								'label' => __('Right Sidebar', BUNCH_NAME),
								'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cr.png',
							),
							array(
								'value' => 'full',
								'label' => __('Full Width', BUNCH_NAME),
								'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/1col.png',
							),
							
						),
					),
					
					array(
						'type' => 'select',
						'name' => 'sidebar',
						'label' => __('Sidebar', BUNCH_NAME),
						'default' => '',
						'items' => bunch_get_sidebars(true)	
					),
				),
);
$options[] = array(
	'id'          => '_bunch_header_settings',
	'types'       => array('page', 'post'),
	'title'       => __('Header Settings', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type' => 'textbox',
						'name' => 'header_title',
						'label' => __('Header Title', BUNCH_NAME),
						'description' => __('Enter the Header title', BUNCH_NAME),
					),
					array(
						'type' => 'textbox',
						'name' => 'header_text',
						'label' => __('Header Text', BUNCH_NAME),
						'description' => __('Enter the Header Text', BUNCH_NAME),
					),
					array(
						'type' => 'upload',
						'name' => 'header_img',
						'label' => __('Header image', BUNCH_NAME),
						'default' => '',
					),
					array(
						'type' => 'toggle',
						'name' => 'breadcrumb',
						'label' => __('Enable Breadcrumb', BUNCH_NAME),
						'description' => __('Enable / disable breadcrumb area in header for vc template', BUNCH_NAME),
					),
					
				),
);
/*$options[] =  array(
	'id'          => _WSH()->set_meta_key('post'),
	'types'       => array('post'),
	'title'       => __('Post Settings', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(		
					array(
					'type' => 'select',
					'name' => 'arrow_view',
					'label' => __('Arrow Layout for "Top Blog Posts" shortcode', BUNCH_NAME),
					'default' => 'img_left',
					'items' => array(
									array(
										'value' => 'img_left',
										'label' => __('Image Left', BUNCH_NAME),
									),
									array(
										'value' => 'img_right',
										'label' => __('Image Right', BUNCH_NAME),
									),
									array(
										'value' => 'img_top',
										'label' => __('Image Top', BUNCH_NAME),
									),
								),
					),
					array(
						'type' => 'textarea',
						'name' => 'description',
						'label' => __('Post Description', BUNCH_NAME),
						'default' => '',
						'description' => __('Enter the post description for detail page.', BUNCH_NAME)
					),
					array(
						'type' => 'textarea',
						'name' => 'video',
						'label' => __('Video Embed Code', BUNCH_NAME),
						'default' => '',
						'description' => __('If post format is video then this embed code will be used in content', BUNCH_NAME)
					),
					array(
						'type' => 'textarea',
						'name' => 'audio',
						'label' => __('Audio Embed Code', BUNCH_NAME),
						'default' => '',
						'description' => __('If post format is AUDIO then this embed code will be used in content', BUNCH_NAME)
					),
					array(
						'type' => 'textarea',
						'name' => 'quote',
						'label' => __('Quote', BUNCH_NAME),
						'default' => '',
						'description' => __('If post format is quote then the content in this textarea will be displayed', BUNCH_NAME)
					),
							
					
			),
);*/
/* Page options */
/** Team Options*/
$options[] =  array(
	'id'          => _WSH()->set_meta_key('bunch_slide'),
	'types'       => array('bunch_slide'),
	'title'       => __('Slides Options', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => array(
	
				array(
					'type'      => 'group',
					'repeating' => true,
					'length'    => 1,
					'name'      => 'bunch_slide_text',
					'title'     => __('Slide Content', BUNCH_NAME),
					'fields'    => array(
						
						array(
							'type' => 'textarea',
							'name' => 'slide_text',
							'label' => __('Slide Text', BUNCH_NAME),
							'default' => '',
							
						),
						
						
					),
				),
	),
);
/** Services Options*/
$options[] =  array(
	'id'          => _WSH()->set_meta_key('bunch_services'),
	'types'       => array( 'bunch_services' ),
	'title'       => __('Services Settings', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
				
				array(
					'type' => 'fontawesome',
					'name' => 'fontawesome',
					'label' => __('Service Icon', BUNCH_NAME),
					'default' => '',
				),
				
				array(
					'type' => 'textbox',
					'name' => 'ext_url',
					'label' => __('Read more link', BUNCH_NAME),
					'default' => '',
				),
				
			),
);

/** Gallery Options*/
$options[] =  array(
	'id'          => _WSH()->set_meta_key('bunch_gallery'),
	'types'       => array('bunch_gallery'),
	'title'       => __('Image Gallery Settings', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => array(
				array(
					'type'      => 'group',
					'repeating' => true,
					'length'    => 1,
					'name'      => 'bunch_images',
					'title'     => __('Slider Image', BUNCH_NAME),
					'fields'    => array(
					   array(
							'type' => 'upload',
							'name' => 'images',
							'label' => __('Slider images', BUNCH_NAME),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'textarea',
					'name' => 'text1',
					'label' => __('Contents', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'text2',
					'label' => __('Gallery Description', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'customer_title',
					'label' => __('Customer Title', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'link',
					'label' => __('Live Demo Link', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'category',
					'label' => __('Category', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'skill',
					'label' => __('Our Skill', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'post_date',
					'label' => __('Post Date', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textarea',
					'name' => 'quot_text',
					'label' => __('Quot Text', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'author_title',
					'label' => __('Author Title', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'designation',
					'label' => __('Author Designation', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textarea',
					'name' => 'des',
					'label' => __('Description', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'main_title',
					'label' => __('Title', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type'      => 'group',
					'repeating' => true,
					'length'    => 1,
					'name'      => 'bunch_gallery',
					'title'     => __('Gallery Post', BUNCH_NAME),
					'fields'    => array(
					   array(
							'type' => 'upload',
							'name' => 'gallery_image',
							'label' => __('images', BUNCH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_title',
							'label' => __('Title', BUNCH_NAME),
							'default' => '',
						),
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'ext_url',
					'label' => __('External link', BUNCH_NAME),
					'default' => '',
				),
	),
);
/** Team Options*/
$options[] =  array(
	'id'          => _WSH()->set_meta_key('bunch_team'),
	'types'       => array('bunch_team'),
	'title'       => __('Team Options', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => array(
	
						
				array(
					'type' => 'textbox',
					'name' => 'designation',
					'label' => __('Designation', BUNCH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'team_link',
					'label' => __('Team Link', BUNCH_NAME),
					'default' => '#',
				),
				array(
					'type'      => 'group',
					'repeating' => true,
					'length'    => 1,
					'name'      => 'bunch_team_social',
					'title'     => __('Social Profile', BUNCH_NAME),
					'fields'    => array(
						
						array(
							'type' => 'fontawesome',
							'name' => 'social_icon',
							'label' => __('Social Icon', BUNCH_NAME),
							'default' => '',
						),
						
						array(
							'type' => 'textbox',
							'name' => 'social_link',
							'label' => __('Link', BUNCH_NAME),
							'default' => '',
							
						),
						
						
					),
				),
	),
);
/** Testimonial Options*/
$options[] =  array(
	'id'          => _WSH()->set_meta_key('bunch_testimonials'),
	'types'       => array('bunch_testimonials'),
	'title'       => __('Testimonials Options', BUNCH_NAME),
	'priority'    => 'high',
	'template'    => array(
				array(
					'type' => 'textbox',
					'name' => 'designation',
					'label' => __('Designation', BUNCH_NAME),
					'default' => 'Consultant',
				),
				array(
					'type' => 'textbox',
					'name' => 'ext_url',
					'label' => __('External Link', BUNCH_NAME),
					'default' => '#',
				),
	),
);

 
 
 return $options; 