<?php
add_action('after_setup_theme', 'healthcoach_bunch_theme_setup');
function healthcoach_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('HEALTHCOACH_VERSION')) define('HEALTHCOACH_VERSION', '1.0');
	if( !defined( 'HEALTHCOACH_ROOT' ) ) define('HEALTHCOACH_ROOT', get_template_directory().'/');
	if( !defined( 'HEALTHCOACH_URL' ) ) define('HEALTHCOACH_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('healthcoach', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'healthcoach'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'healthcoach_90x90', 90, 90, true ); // '90x90 Our Testimonial'
	add_image_size( 'healthcoach_370x250', 370, 250, true ); // '370x250 Services Grid'
	add_image_size( 'healthcoach_270x197', 270, 197, true ); // '270x197 Gallery 4 Column'
	add_image_size( 'healthcoach_270x247', 270, 247, true ); // '270x247 Blog List View'
	add_image_size( 'healthcoach_1170x500', 1170, 500, true ); // '1170x500 Our Blog'
	add_image_size( 'healthcoach_75x75', 75, 75, true ); // '75x75 Blog Widgets'
	
}
function healthcoach_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_About_us' ) )register_widget( 'Bunch_About_us' );
	if( class_exists( 'Bunch_Footer_Recent_Post' ) )register_widget( 'Bunch_Footer_Recent_Post' );
	if( class_exists( 'Bunch_Contact_Us' ) )register_widget( 'Bunch_Contact_Us' );
	if( class_exists( 'Bunch_Blog_Recent_News' ) )register_widget( 'Bunch_Blog_Recent_News' );
	
	
	
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'healthcoach' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'healthcoach' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'healthcoach' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'healthcoach' ),
	  'before_widget'=>'<div id="%1$s"  class="col-md-3 col-sm-6 col-xs-12 footer-column %2$s"><div class="footer-widget">',
	  'after_widget'=>'</div></div>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'healthcoach' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'healthcoach' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = healthcoach_set(healthcoach_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(healthcoach_set($sidebar , 'topcopy')) continue ;
		
		$name = healthcoach_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = healthcoach_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="side-bar widget sidebar_widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sec-title"><h3 class="skew-lines">',
			'after_title' => '</h3></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'healthcoach_bunch_widget_init' );
// Update items in cart via AJAX
function healthcoach_load_head_scripts() {
    $options = _WSH()->option();
	if ( !is_admin() ) {
	$protocol = is_ssl() ? 'https://' : 'http://';
	$map_path = '?key='.healthcoach_set($options, 'map_api_key');
	wp_enqueue_script( 'healthcoach_map_api', $protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
	wp_enqueue_script( 'jquery-googlemap', get_template_directory_uri().'/js/jquery.gmap.js', array(), false, false );
	}
    }
    add_action( 'wp_enqueue_scripts', 'healthcoach_load_head_scripts' );
//global variables
function healthcoach_bunch_global_variable() {
    global $wp_query;
}

function healthcoach_enqueue_scripts() {
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'gui', get_template_directory_uri() . '/css/gui.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'mCustomScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'bootstrap-touchspin', get_template_directory_uri() . '/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'healthcoach_main-style', get_stylesheet_uri() );
	if(class_exists('woocommerce')) wp_enqueue_style( 'healthcoach_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'healthcoach_custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'healthcoach_responsive', get_template_directory_uri() . '/css/responsive.css' );
	
	
	
	
    //scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'mCustomScrollbar', get_template_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js', array(), false, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'fancybox-media', get_template_directory_uri().'/js/jquery.fancybox-media.js', array(), false, true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/mixitup.js', array(), false, true );
	wp_enqueue_script( 'healthcoach_main_script', get_template_directory_uri().'/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'healthcoach_enqueue_scripts' );

/*-------------------------------------------------------------*/
function healthcoach_theme_slug_fonts_url() {
    $fonts_url = '';
 	
	/* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Lato font: on or off', 'healthcoach' );
	$poppins = _x( 'on', 'Poppins font: on or off', 'healthcoach' );
	$shadows = _x( 'on', 'Shadows Into Light font: on or off', 'healthcoach' );
	
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'healthcoach' );
 
    if ( 'off' !== $open_sans || 'off' !== $poppins || 'off' !== $shadows ) {
        $font_families = array();
		
		if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,300i,400,400i';
        }
		
		if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:300,400,500,600,700|Shadows+Into+Light';
        }
		
		if ( 'off' !== $shadows ) {
            $font_families[] = 'Shadows Into Light';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function healthcoach_theme_slug_scripts_styles() {
    wp_enqueue_style( 'healthcoach-theme-slug-fonts', healthcoach_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'healthcoach_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function healthcoach_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'healthcoach_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function healthcoach_woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'healthcoach_jk_related_products_args' );
  function healthcoach_jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}