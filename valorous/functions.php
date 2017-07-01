<?php

	global $gp_all_widgets;
	
	
	include_once('inc/customizer.php');
	include_once('inc/widgets.php');
	
	function vtheme_scripts() {
		
		if(is_home()){
			wp_enqueue_style( 'default-styles', get_stylesheet_uri() );
			wp_enqueue_style( 'animsition-styles', get_stylesheet_directory_uri().'/css/animsition.min.css' );
			wp_enqueue_style( 'grid-styles', get_stylesheet_directory_uri().'/css/grid.min.css' );
			wp_enqueue_style( 'basic-styles', get_stylesheet_directory_uri().'/css/style.css' );
			wp_enqueue_style( 'menu-styles', get_stylesheet_directory_uri().'/css/menu.css' );
			wp_enqueue_style( 'overlay-styles', get_stylesheet_directory_uri().'/css/overlay.css' );
			wp_enqueue_style( 'owl-styles', get_stylesheet_directory_uri().'/css/owl.carousel.css' );
			wp_enqueue_style( 'animate-styles', get_stylesheet_directory_uri().'/css/animate.min.css' );    
			wp_enqueue_style( 'font-awesome-styles', get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
		}else{
			
			wp_enqueue_style( 'bs-styles', get_stylesheet_directory_uri().'/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'bs-theme-styles', get_stylesheet_directory_uri().'/bootstrap/css/bootstrap-theme.min.css' );
			
			wp_enqueue_style( 'layouts-styles', get_stylesheet_directory_uri().'/css/layouts.css' );
		}
		
		if(is_home()){
			wp_enqueue_script( 'modernizr-scripts', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'matchHeight-scripts', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'wow-scripts', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'animsition-scripts', get_template_directory_uri() . '/js/animsition.min.js', array('jquery-effects-core'), '1.0.0', true );	
			wp_enqueue_script( 'parallax-scroll-scripts', get_template_directory_uri() . '/js/jquery.parallax-scroll.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'owl-carousel-scripts', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'cbpQTRotator-scripts', get_template_directory_uri() . '/js/jquery.cbpQTRotator.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'functions-scripts', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'particle-scripts', get_template_directory_uri() . '/js/particle.js', array('jquery'), '1.0.0', true );
			
		}else{
			wp_enqueue_script( 'bs-scripts', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
		}
		
		wp_enqueue_script( 'v-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'vtheme_scripts' );
	
	add_action( 'widgets_init', '_widgets_init' );
	function _widgets_init() {
	
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'valorous' ),
			'id' => 'sidebar-1',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Secondary Sidebar', 'valorous' ),
			'id' => 'sidebar-2',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );	
		
		register_sidebar( array(
			'name' => __( 'Archive Sidebar', 'valorous' ),
			'id' => 'sidebar-3',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );	
	
		register_sidebar( array(
			'name' => __( 'Home Section One', 'valorous' ),
			'id' => 'sidebar-4',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );	
		
		register_sidebar( array(
			'name' => __( 'Testimonials Section', 'valorous' ),
			'id' => 'sidebar-5',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );	
	
		register_sidebar( array(
			'name' => __( 'Partners Section', 'valorous' ),
			'id' => 'sidebar-6',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );	
		
		register_sidebar( array(
			'name' => __( 'Footer Section', 'valorous' ),
			'id' => 'sidebar-7',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'valorous' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );				
					
	}
	
	
	
	add_action( 'after_setup_theme', 'register_primary_menu' );
	 
	function register_primary_menu() {
		register_nav_menu( 'home', __( 'Home Menu', 'valorous' ) );
		register_nav_menu( 'primary', __( 'Primary Menu', 'valorous' ) );
		register_nav_menu( 'social', __( 'Social Links', 'valorous' ) );
		add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );  
		
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width' => true,
		) );	
	}
	
	function vsetPostViews($postID) {
		$countKey = 'vpost_views_count';
		$count = get_post_meta($postID, $countKey, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $countKey);
			add_post_meta($postID, $countKey, '0');
		}else{
			$count++;
			update_post_meta($postID, $countKey, $count);
		}
	}
	
	function custom_breadcrumbs() {
		   
		// Settings
		$separator          = '&gt;';
		$breadcrums_id      = 'breadcrumbs';
		$breadcrums_class   = 'breadcrumbs';
		
		$home_title         = __('Home', 'valorous');
		  
		// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
		$custom_taxonomy    = 'product_cat';
		   
		// Get the query & post information
		global $post,$wp_query;
		   
		// Do not display on the homepage
		if ( !is_front_page() ) {
		   
			// Build the breadcrums
			echo '<ul class="' . $breadcrums_class . '">';
			   
			// Home page
			echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
			echo '<li class="separator separator-home"> ' . $separator . ' </li>';
			   
			if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
				  
				echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
				  
			} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
				  
				// If post is a custom post type
				$post_type = get_post_type();
				  
				// If it is a custom post type display name and link
				if($post_type != 'post') {
					  
					$post_type_object = get_post_type_object($post_type);
					$post_type_archive = get_post_type_archive_link($post_type);
				  
					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				  
				}
				  
				$custom_tax_name = get_queried_object()->name;
				echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
				  
			} else if ( is_single() ) {
				  
				// If post is a custom post type
				$post_type = get_post_type();
				  
				// If it is a custom post type display name and link
				if($post_type != 'post') {
					  
					$post_type_object = get_post_type_object($post_type);
					$post_type_archive = get_post_type_archive_link($post_type);
				  
					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				  
				}
				  
				// Get post category info
				$category = get_the_category();
				 
				if(!empty($category)) {
				  
					// Get last category post is in
					$last_category = end(array_values($category));
					  
					// Get parent any categories and create array
					$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
					$cat_parents = explode(',',$get_cat_parents);
					  
					// Loop through parent categories and store in variable $cat_display
					$cat_display = '';
					foreach($cat_parents as $parents) {
						$cat_display .= '<li class="item-cat">'.$parents.'</li>';
						$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
					}
				 
	
				}
				  
				// If it's a custom post type within a custom taxonomy
				$taxonomy_exists = taxonomy_exists($custom_taxonomy);
				if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
					   
					$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
					$cat_id         = $taxonomy_terms[0]->term_id;
					$cat_nicename   = $taxonomy_terms[0]->slug;
					$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
					$cat_name       = $taxonomy_terms[0]->name;
				   
				}
				  
				// Check if the post is in a category
				if(!empty($last_category)) {
					echo $cat_display;
					echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
					  
				// Else if post is in a custom taxonomy
				} else if(!empty($cat_id)) {
					  
					echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
					echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
				  
				} else {
					  
					echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
					  
				}
				  
			} else if ( is_category() ) {
				   
				// Category page
				echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
				   
			} else if ( is_page() ) {
				   
				// Standard page
				if( $post->post_parent ){
					   
					// If child page, get parents 
					$anc = get_post_ancestors( $post->ID );
					   
					// Get parents in the right order
					$anc = array_reverse($anc);
					   
					// Parent page loop
					if ( !isset( $parents ) ) $parents = null;
					foreach ( $anc as $ancestor ) {
						$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
						$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
					}
					   
					// Display parent pages
					echo $parents;
					   
					// Current page
					echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
					   
				} else {
					   
					// Just display current page if not parents
					echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
					   
				}
				   
			} else if ( is_tag() ) {
				   
				// Tag page
				   
				// Get tag information
				$term_id        = get_query_var('tag_id');
				$taxonomy       = 'post_tag';
				$args           = 'include=' . $term_id;
				$terms          = get_terms( $taxonomy, $args );
				$get_term_id    = $terms[0]->term_id;
				$get_term_slug  = $terms[0]->slug;
				$get_term_name  = $terms[0]->name;
				   
				// Display the tag name
				echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
			   
			} elseif ( is_day() ) {
				   
				// Day archive
				   
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				   
				// Month link
				echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
				echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
				   
				// Day display
				echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
				   
			} else if ( is_month() ) {
				   
				// Month Archive
				   
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				   
				// Month display
				echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
				   
			} else if ( is_year() ) {
				   
				// Display year archive
				echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
				   
			} else if ( is_author() ) {
				   
				// Auhor archive
				   
				// Get the author information
				global $author;
				$userdata = get_userdata( $author );
				   
				// Display author name
				echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
			   
			} else if ( get_query_var('paged') ) {
				   
				// Paginated archives
				echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page', 'valorous') . ' ' . get_query_var('paged') . '</strong></li>';
				   
			} else if ( is_search() ) {
			   
				// Search results page
				echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
			   
			} elseif ( is_404() ) {
				   
				// 404 page
				echo '<li>' . 'Error 404' . '</li>';
			}
		   
			echo '</ul>';
			   
		}
		   
	}
	
	function currentized($obj, $arr){
		$ret = array();
		
		$added = array();
		$available = array();
		if(!empty($obj)){	
			foreach($obj as $data){
				if(!empty($data)){
					$available[] = $data->ID;
				}			
			}				
		}
		if(!empty($arr)){	
			foreach($arr as $data){
				if(!empty($data)){
					$added[] = $data->ID;
				}			
			}	
		}
		
		$possible = (array_diff($available, $added));
		if(!empty($possible)){
			$random = array_rand($possible);
			$ret = $possible[$random];
			$ret = get_post($ret);
		}
		
		return $ret;
	}
	
	function vcontact_submit(){	
	
		$_SESSION['vcontact_sent'] = false;	
		
		if ( 
			!empty($_POST)
			&&
			isset( $_POST['vcontact_f'] ) 
			&&
			wp_verify_nonce( $_POST['vcontact_f'], 'vcontact_a' ) 
		) {
		
			$to = get_bloginfo('admin_email');
			$subject = get_bloginfo('name').' > Contact Form > '.esc_attr($_POST['name']);
			$body = 'Name: '.esc_attr($_POST['name']);
			$body .= '<br />Email: '.esc_attr($_POST['email']);
			$body .= '<br />Message: '.esc_attr($_POST['message']);
			
			$headers = array('Content-Type: text/html; charset=UTF-8');
			
			@wp_mail( $to, $subject, $body, $headers );
			
			$_SESSION['vcontact_sent'] = true;
			
			wp_redirect(wp_get_referer());
			
		}	
		
	}
	
	add_action('wp_ajax_vcontact_submit', 'vcontact_submit');
	
	add_action('init', 'init_sessions');
	
	if(!function_exists('init_sessions')){
		function init_sessions(){
			global $gp_all_widgets;
			$gp_all_widgets = wp_get_sidebars_widgets();
			
			if (!session_id()){
				ob_start();
				@session_start();
			}
		}
	}
	function vget_sediebar_info($id, $param='name'){
		$ret = '';
		global $wp_registered_sidebars;
		if ( isset( $wp_registered_sidebars[$id] ) ) { 
			$ret = $wp_registered_sidebars[$id][$param];
		}		
		return $ret;
	}
	function is_sidebar_empty($id){
		global $gp_all_widgets;
		
		return (isset($gp_all_widgets[$id]) && empty($gp_all_widgets[$id]));
	}
	
	function vget_widgets( $index, $id='' )
	{
		$ret = array();
		global $wp_registered_widgets, $wp_registered_sidebars;
		$sidebars_widgets = wp_get_sidebars_widgets();
		$widget_ids = $sidebars_widgets[$index];
		//pree($widget_ids);
		if(!empty($widget_ids)){
			foreach( $widget_ids as $id ) {
				$wdgtvar = 'widget_'._get_widget_id_base( $id );
				$idvar = _get_widget_id_base( $id );
				//pree($idvar);pree($id);//exit;
				$instance = get_option( $wdgtvar );
				//exit;
				$idbs = str_replace( $idvar.'-', '', $id );
				//pree($idbs);pree($instance);exit;
				$ret[$id] = $instance[$idbs];
			}
		}
		return $ret;
	}
	function v_youtube_id($url){	
		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		return $my_array_of_vars['v'];  
	}