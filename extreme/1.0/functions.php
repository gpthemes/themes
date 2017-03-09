<?php
if(!function_exists('pre')){
	function pre($data){
		if(isset($_GET['debug'])){
			pree($data);
		}
	}	 
} 
		
if(!function_exists('pree')){
	function pree($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';	
	
	}	 
} 

if ( ! function_exists( 'gp_extreme_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features
*
*  It is important to set up these functions before the init hook so that none of these
*  features are lost.
*
*  @since MyFirstTheme 1.0
*/
	function gp_extreme_setup() {
	/**
     * Add default posts and comments RSS feed links to <head>.
     */
	 	add_theme_support( 'automatic-feed-links' );
	
	/**
     * Enable support for post thumbnails and featured images.
     */
		add_theme_support( 'post-thumbnails' );
	
	/**
     * Add support for two custom navigation menus.
     */
		register_nav_menus( array(
			'primary' 		=> 	'Primary Menu',
			'secondary' 	=> 	'Secondary Menu',
			'social-links'	=>	'Social Links'
			
		) );
	/**
     * Register sidebars.
     */
		function gp_extreme_sidebars() {
			register_sidebar( array(
				'name'          => __( 'Primary Sidebar', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'sidebar-1',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title margin-bottom-10">',
				'after_title'   => '</h3>',
			) );
		 
			register_sidebar( array(
				'name'          => __( 'Secondary Sidebar', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'sidebar-2',
				'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li></ul>',
				'before_title'  => '<h3 class="widget-title margin-bottom-10">',
				'after_title'   => '</h3>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Extreme Slider', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'gp-extreme-slider',
				'before_widget' => '<div id="%1$s" class="widget %2$s slider">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title text-center">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Before Content', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'before-content',
				'before_widget' => '<div id="%1$s" class="widget %2$s text-center col-md-12">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title text-center">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Bottom', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'bottom-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s portfolio-item col-md-4 animate fadeIn">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Footer Top', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'footer-top',
				'before_widget' => '<div id="%1$s" class="widget %2$s text-center margin-bottom-30">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title text-center margin-top-10">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Footer', 'theme_name' ),
				'description'   => __( 'A short description of the sidebar.' ),
				'id'            => 'footer-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'gp_extreme_sidebars' );
			
	
	}
endif;	
add_action( 'after_setup_theme', 'gp_extreme_setup' );

	/**
	* Add support for custom logo.
	*/
	function gp_extreme_custom_logo(){
		$defaults = array(
			'height' => '100',
			'width' => '300',
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description')
		); 
		add_theme_support('custom-logo', $defaults);
	}
	

add_action( 'after_setup_theme', 'gp_extreme_custom_logo' );

/**
*	Function to check Sidebars have content?
*/
function gp_dynamic_sidebar ($sidebar_id){
	ob_start();
	dynamic_sidebar($sidebar_id);
	$sidebar = ob_get_contents();
	ob_end_clean();
	return $sidebar;
}



/*Customizer Code HERE*/
add_action('customize_register', 'gp_extreme_footer_customizer');
	
function gp_extreme_footer_customizer($wp_customize){
	 //adding section in wordpress customizer   
	$wp_customize->add_section('footer_settings_section', array(
  		'title'          => 'Footer'
 	));
	//adding setting for footer text area
	$wp_customize->add_setting('copy_right_text', array(
 		'default'        => 'Default Text For Footer Section',
 	));
	$wp_customize->add_control('copy_right_text', array(
 	'label'   => 'Copy Right Text',
  	'section' => 'footer_settings_section',
 	'type'    => 'textarea',
	));
}

function gp_extreme_enqueue_scripts() {
	// Styles
    wp_enqueue_style( 'gp-extreme-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), date('Ymhi'));
	
	wp_enqueue_style( 'gp-extreme-animate', get_stylesheet_directory_uri() . '/assets/css/animate.css', array(), date('Ymhi'));
	
	wp_enqueue_style( 'gp-extreme-nexus', get_stylesheet_directory_uri() . '/assets/css/nexus.css', array(), date('Ymhi'));
	
	wp_enqueue_style( 'gp-extreme-font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', array(), date('Ymhi'));
	
	wp_enqueue_style( 'gp-extreme-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), date('Ymhi'));
	
	wp_enqueue_style( 'gp-extreme-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), date('Ymhi'));
	
	// Scripts
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/jquery.isotope.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/jquery.slicknav.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/jquery.visible.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/modernizr.custom.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/slimbox2.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'gp-extreme-', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ) );
	
}
add_action( 'wp_enqueue_scripts', 'gp_extreme_enqueue_scripts' );

