<?php 
/**
 *	Template Name : Default
 *
 */

//pree($theme_mods_extreme);

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<!-- Title -->
	<title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
	<!-- Meta -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="
		<?php 
		if( is_single() ){ 
			single_post_title('', true); 
		}else { 
			bloginfo('name'); echo "-"; bloginfo('description'); 
		} 
		?>
    ">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
wp_head();
?>
</head>
<body <?php body_class(); ?>>
	<div id="pre_header" class="visible-lg"></div>
		<div id="header" class="container">
			<div class="row">
				<!-- Logo -->
                <div class="logo">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        //echo $custom_logo_id;
                        //exit;
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img src="'. esc_url( $logo[0] ) .'">';
                        } else {
                            echo '<img src="'. get_template_directory_uri().'/assets/img/logo.png" alt="'.get_bloginfo('name').'"/>';
                        }
                         
                        ?>
    <!--					<img src="assets/img/logo.png" alt="Logo" />-->
                    </a>
                </div>
                <!-- End Logo -->
                <!-- Top Menu -->
                <div class="col-md-12 margin-top-30">
                    <div id="hornav" class="pull-right visible-lg">
                        <?php 
                        if(has_nav_menu( 'primary' )){
                            wp_nav_menu( array( 
                                'theme_location'  => 'primary',
                                'menu'            => 'Primary Navigation',
                                'container'       => false,
                                'container_class' => '',
                                'menu_class'      => 'menu',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>'
                            ) );	
                        }
                        ?>
                    </div>
                </div>
				<div class="clear"></div>
				<!-- End Top Menu -->
			</div>
		</div>
		<!-- === END HEADER === -->
		<!-- === BEGIN CONTENT === -->
        
		<div id="content" class="container">
		        
            <!-- Start Before Content -->
        	<?php if ( is_active_sidebar( 'before-content' ) ) : ?>
            <div class="row margin-top-30">
				
					<?php dynamic_sidebar( 'before-content' ); ?>

			</div>
            <?php else : ?>
            <div class="row margin-top-30">
            	<div class="col-md-12 text-center"  style="border:2px dashed #333;height:80px; padding: 30px;">
            		<h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add Before Content widget</a></h3>
                </div>
                    <!-- Time to add some widgets! -->
            </div>
            <?php endif; ?>
            <!-- End Before Content -->
            
            <!-- Start Extreme Slider -->
			
			<div class="row margin-top-10">
				<!-- Carousel Slideshow -->
            <?php if ( is_active_sidebar( 'gp-extreme-slider' ) ) : ?>
			
            	<?php dynamic_sidebar( 'gp-extreme-slider' ); ?>
                
			<?php else : ?>
            <div id="carousel-example" class="carousel slide" data-ride="carousel" style="border:2px dashed #333;height:80px; padding: 30px;">
                <h3 class="text-center"><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add slider widget</a></h3>
            </div>
			<?php endif; ?>
				<!-- End Carousel Slideshow -->
			</div>

            <!-- Start Extreme Slider -->
            
			<div class="row margin-vert-30">
				<!-- Main Text -->
				<div id="primary" class="content-area col-md-9">
                	<main id="main" class="site-main" role="main">
					<?php 
					
						while( have_posts() ): the_post(); 
						                        
                    ?>
                        <h2><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></h2>
                        <p><?php 
						
						the_excerpt(); ?></p>
                    <?php 
						
						// End the loop.
				        endwhile;
					?>
                    </main>
				</div>
				<!-- End Main Text -->
				
                <!-- Side Column -->
				<div id="sidebar-primary" class="col-md-3 sidebar">
                	 
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    <?php else : ?>
                    <aside class="widget"  style="border: 2px dashed rgb(51, 51, 51); height: 160px; padding: 30px;">
                
                    <h3 class="text-center"><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add sidebar widgets</a></h3>
            		</aside>                        
                	<!-- Time to add some widgets! -->
                    <?php endif; ?>
					
				</div>
				<!-- End Side Column -->
			</div>
            
            <?php if ( is_active_sidebar( 'bottom-1' ) && gp_dynamic_sidebar('bottom-1') != '' ) : ?>
			<div class="row margin-top-30">
				
					<?php dynamic_sidebar( 'bottom-1' ); ?>				
				
			</div>
			<?php else : ?>
            <div class="row margin-top-30">
                <div class="portfolio-item col-md-4 animate fadeIn animated">
                    <div class="image-hover" style="border:2px dashed #333;height:80px; padding: 30px;">
                        <h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add widgets</a></h3>
                        <!-- Time to add some widgets! -->
                    </div>
                </div>
                
                <div class="portfolio-item col-md-4 animate fadeIn animated">
                    <div class="image-hover" style="border:2px dashed #333;height:80px; padding: 30px;">
                        <h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add widgets</a></h3>
                        <!-- Time to add some widgets! -->
                    </div>
                </div>
                
                <div class="portfolio-item col-md-4 animate fadeIn animated">
                    <div class="image-hover" style="border:2px dashed #333;height:80px; padding: 30px;">
                        <h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add widgets</a></h3>
                        <!-- Time to add some widgets! -->
                    </div>
                </div>
            </div>
                <?php endif; ?>
                <!-- //Portfolio Item// -->
            
            <!-- Start Footer Top! -->
            <?php if ( is_active_sidebar( 'footer-top' ) && gp_dynamic_sidebar('footer-top') != '' ) : ?>
			<div class="row margin-top-30">
				
				<?php dynamic_sidebar( 'footer-top' ); ?>
                
			</div>
            <?php else : ?>
            <div class="row margin-top-30" >
            	<div class="col-md-12 text-center" style="border:2px dashed #333;height:100px;padding:30px;margin-bottom:30px;">
	            	<h3 class="text-center margin-top-10">
                	<a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add footer top widgets</a>
                	</h3>
                </div>
            </div>
                <!-- Time to add some widgets! -->
            <?php endif; ?>

            <!-- End Footer Top! -->
		</div>
        </div>
	
	<!-- === END CONTENT === -->
	<!-- === BEGIN FOOTER === -->
	<div id="base" class="footer-wrap margin-top-30">
		<div class="container padding-vert-30">
			<div class="row">
            
				<!-- Footer Widgets -->
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-md-12 margin-bottom-20">
                	
                        <?php dynamic_sidebar( 'footer-1' ); ?>
					<div class="clearfix"></div>
				</div>
   				<?php else : ?>
                <div class="col-md-3 margin-bottom-20">
	                <div class="image-hover" style="border:2px dashed #fff;height:120px; padding: 30px;">
                	<h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add footer widgets</a></h3>
                    </div>
				</div>
                <div class="col-md-3 margin-bottom-20">
	                <div class="image-hover" style="border:2px dashed #fff;height:120px; padding: 30px;">
                	<h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add footer widgets</a></h3>
                    </div>
				</div>
                <div class="col-md-3 margin-bottom-20">
	                <div class="image-hover" style="border:2px dashed #fff;height:120px; padding: 30px;">
                	<h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add footer widgets</a></h3>
                    </div>
				</div>
                
                <div class="col-md-3 margin-bottom-20">
	                <div class="image-hover" style="border:2px dashed #fff;height:120px; padding: 30px;">
                	<h3><a href="<?php echo get_bloginfo('wpurl').'/wp-admin/widgets.php'; ?> ">Click here to add footer widgets</a></h3>
                    </div>
				</div>
                    <!-- Time to add some widgets! -->
                <?php endif; ?>

                <!-- Footer Widgets -->
			</div>
		</div>
		<!-- Footer Menu -->
		<div id="footer">
			<div class="container">
				<div class="row">
                	<?php $theme_mods_extreme= get_option('theme_mods_extreme', true ); ?>
					<div id="copyright" class="col-md-6">
						
						<?php
						if (!empty($theme_mods_extreme) && isset($theme_mods_extreme['copy_right_text']) && $theme_mods_extreme['copy_right_text']!= ''){ ?>
                        <p>
						<?php echo $theme_mods_extreme['copy_right_text']; ?>
                        </p>
                        <?php
						}else{
						?>
                        	<p>Copyright &copy; 2010-2017 <a href="http://gpthemes.com/" target="_blank" style="font-weight:bold;">GP Themes</a>. All rights reserved. Logo by <a href="http://logo.designo360.com/" target="_blank">designo360.</a></p>
                        <?php	
						}
						?>
                        </p>
					</div>
					<div id="footermenu" class="col-md-6">
                    	<?php 
						if(has_nav_menu( 'social-links' )){
							wp_nav_menu( array( 
								'theme_location'  => 'social-links',
								'menu'            => 'Social Links',
								'container'       => false,
								'container_class' => '',
								'menu_class'      => 'menu',
								'echo'            => true,
								'fallback_cb'     => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled list-inline pull-right">%3$s</ul>'
							) );	
						}else{ ?>
						<ul class="list-unstyled list-inline pull-right">
							<li>
								<a href="https://web.facebook.com/guavapattern/" target="_blank" >Facebook</a>
							</li>
							<li>
								<a href="http://twitter.com/phpflex/" target="_blank" >Twitter</a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UC7KWwwlHucU73TuP65O2IBw" target="_blank" >Youtube</a>
							</li>
							<li>
								<a href="http://www.gpthemes.com/contact/" target="_blank" >Contact</a>
							</li>
						</ul>
						<?php 
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Menu -->
</div>
</div>
</body>
</html>