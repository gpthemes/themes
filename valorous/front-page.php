<?php get_header(); ?>
<div class="animsition-overlay">
  <div id="section-1">
    <header class="main_h">
      <div class="menufix"> <?php the_custom_logo(); ?>
        <div class="mobile-toggle"> <span></span> <span></span> <span></span> </div>
        <?php wp_nav_menu( array( 'theme_location' => 'home', 'menu_class' => '', 'container'=>'nav' ) ); ?>

      </div>
      <!-- / row --> 
      
    </header>
<?php

	$mods = get_option('gp_theme_options');
	$title = get_bloginfo('name');
	$first_letter = substr($title, 0, 1);
	$remaining_letters = substr($title, 1, strlen($title));
	
	
	
	$mods = array_filter($mods, 'strlen');
		
	$home_content_top = get_page($mods['home_content_top']);
	$home_content_lower = get_page($mods['home_content_bottom']);	

	
?>  
	<style type="text/css">
		<?php if($mods['menu_bar_color']!=''){ ?>
			.sticky,
			nav > ul > li > ul{
				background-color: <?php echo $mods['menu_bar_color']; ?>;
			}
			.pic-caption{
				background: <?php echo $mods['menu_bar_color']; ?>;
			}
		<?php } ?>
	</style>
      
    <div class="hero">
      <h1 class="title-1">&nbsp;<em><span><?php echo $first_letter; ?></span><?php echo $remaining_letters; ?></em><div><?php echo get_bloginfo('description'); ?></div></h1>
      <?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => '', 'container' => 'div', 'container_class' => 'social-btn-container') ); ?>
      
      <!-- /.social-btn-container -->
      
      <div class="fixbottarro"> <a class="scroll" href="#section-2"><?php _e('Scroll for more', 'valorous'); ?></a> </div>
    </div>
    <!-- /.hero --> 
  </div>
  <!-- END #section-1 -->
    <?php if(!empty($home_content_top)){ ?>
  <div id="section-2">
    <div class="grid">
      <div class="col_12">
        <h2 class="title-2"><?php echo $home_content_top->post_title; ?><br>
          <span class="wow fadeInUp" data-wow-duration="2s"><?php echo $home_content_top->post_excerpt; ?></span></h2>
      </div>
      <!-- END col_12 --> 
    </div>
    <!-- END .GRID -->
    
  
    <div class="grid flex">
      <div class="row">
        <div class="colw_6 wow zoomIn">
          <div class="wrapimg hack960">
            <div class="pic"> <img src="<?php echo get_the_post_thumbnail_url( $home_content_top->ID, 'large' ); ?>" class="pic-image full-width" />
              <div class="pic-caption top-to-bottom">
              </div>
            </div>
          </div>
          <!-- END wrapimg --> 
        </div>
        <!-- END col_6 -->
        
        <div class="colw_6 ">
          <div class="box66">
            <div class="wrap icon">  <i class="fa fa-certificate fa-spin"></i> </div>
            <h3 class="center wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo $home_content_top->post_title; ?></h3><?php echo $home_content_top->post_content; ?>, <a title="<?php echo $home_content_top->post_title; ?>" href="<?php echo get_permalink($home_content_top->ID); ?>">read more</a>.</p>
          </div>
          <!-- END box66 --> 
        </div>
        <!-- END col_6 --> 
        
      </div>
      <!-- END row --> 
      
    </div>
    <!-- End GRID FLEX --> 
  
    
  </div>
    <?php } ?>
  <!-- END #section-2 -->
  
  <?php 
  ?>
  
  <div class="backimg" id="section-3">
    <div class="bghover wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s">
      <div class="grid flex16">
        <div class="row paddtop5">
          <h3 class="paraw wow fadeInUpBig" data-wow-duration="2s" data-wow-delay=".5s">&nbsp;</h3>          
        </div>
        
        <div class="row">
    
            
        <?php if ( is_active_sidebar( 'sidebar-4' ) && !is_sidebar_empty('sidebar-4')) : ?>
        
            <ul class="sidebar video">
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
            </ul>
        <?php else: ?>
        <div class="vsidebars_helper">Sidebar "<h6><?php echo vget_sediebar_info('sidebar-4'); ?></h6>" is designed for video widgets. <a target="_blank" href="<?php echo admin_url(); ?>/widgets.php">Click here</a> to add widgets.</div>  
        <?php endif; ?>
        
         
          
        </div>
        <!-- END row --> 
        
      </div>
      <!-- End GRID FLEX16 --> 
    </div>
    <!-- END bghover --> 
  </div>
  <!-- END #section-3 -->
  
  <div id="section-4">
    <div class="grid flex">
      <h4 class="title-4">&nbsp;</h4>
      <article> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web-dizajn-5.jpg" data-parallax='{"y": 230}'/>
        <div class="absomid-cbp white7 corner">
        <?php 
		
		$vget_widgets = vget_widgets('sidebar-5');
		
		if(!empty($vget_widgets)){
		
		?>        
          <div id="cbp-qtrotator" class="cbp-qtrotator">
		<?php
			foreach($vget_widgets as $widgets){
				//pree($widgets);
		?>				
            <div class="cbp-qtcontent">
              <blockquote>
                <p><?php echo $widgets['text']; ?></p>
                <footer><?php echo $widgets['title']; ?></footer>
              </blockquote>
            </div>
		<?php            
		
			}
		?>			
          </div>
		<?php            
		
		}else{ ?>
        <div class="vsidebars_helper">Sidebar "<h6><?php echo vget_sediebar_info('sidebar-5'); ?></h6>" is designed for text widgets. <a target="_blank" href="<?php echo admin_url(); ?>/widgets.php">Click here</a> to add widgets.</div>  
        <?php } ?>         
        </div>
        <!-- END absomid --> 
      </article>
      <div class="row">
        <div class="owl50">
          <h5 class="title-5 wow fadeInUp" data-wow-duration="1s"><?php _e('Partners', 'valorous'); ?></h5>
          

        <?php 
		
		$vget_widgets = vget_widgets('sidebar-6');
		
		if(!empty($vget_widgets)){
		//pree($vget_widgets);
		?>        
          <div id="owl-partners" class="owl-carousel">
		<?php
			foreach($vget_widgets as $type=>$widget){
				$type_check = substr($type, 0, 11);
				 
				//pree($type_check);
				switch($type_check){
					case 'media_image':
?>
					<a><img title="<?php echo $widget['title']; ?>" src="<?php echo $widget['url']; ?>" class="blackwhiteimg" /></a>
<?php					
					break;
					case 'media_video':
?>
					<a target="_blank" href="<?php echo $widget['url']; ?>"><img title="<?php echo $widget['title']; ?>" src="https://i1.ytimg.com/vi/<?php echo v_youtube_id($widget['url']); ?>/0.jpg" class="blackwhiteimg" /></a>
<?php					
					break;					
				}
				         
		
			}
		?>			
          </div>
		<?php            
		
		}else{ ?>
        <div class="vsidebars_helper">Sidebar "<h6><?php echo vget_sediebar_info('sidebar-6'); ?></h6>" is designed for image and video widgets. <a target="_blank" href="<?php echo admin_url(); ?>/widgets.php">Click here</a> to add widgets.</div>  
        <?php } ?> 	          
         </div>
          <!-- END #owl-partners .owl-carousel --> 
        </div>
        <!-- END 0wl50 --> 
        
      </div>
      <!-- END row --> 
    </div>
    <!-- END .GRID FLEX --> 
    
  </div>
  <!-- END #section-3 -->
  
  <?php if(!empty($home_content_lower)){ ?>
  <div id="section-5">
    <div class="grid flex16">
      <div class="row">
        <div class="colw_6">
          <div class="box66">
            
            <h4 class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo $home_content_lower->post_title; ?></h4>
            <p><?php echo $home_content_lower->post_excerpt; ?></p>
            <a class="animsition-link vale" href="<?php echo get_permalink($home_content_lower->ID); ?>"><?php _e('Read More', 'valorous'); ?></a> </div>
          <!-- END box66 --> 
        </div>
        <!-- END col_6 -->
        
        <div class="colw_6 hack960 paddbott100 wow zoomIn">
          <div class="wrapimg">
            <div class="pic"> <img src="<?php echo get_the_post_thumbnail_url( $home_content_lower->ID, 'large' ); ?>" class="pic-image full-width" />
              <div class="pic-caption top-to-bottom"> <a class="animsition-link" href="<?php echo get_permalink($home_content_lower->ID); ?>">
                <button id="button" class="BT-OH-BR-R6-NF-FH-FP-TU-PT">
                <canvas id="canvas"></canvas>
                <hover></hover>
                <span><?php _e('Click here', 'valorous'); ?></span> </button>
                </a> </div>
            </div>
          </div>
          <!-- END wrapimg --> 
        </div>
        <!-- END col_6 --> 
        
      </div>
      <!-- END row --> 
      
    </div>
    <!-- END .GRID FLEX16 --> 
    
  </div>
  <?php } ?>
  <!-- END #section-4 -->


<script>
    jQuery(document).ready(function($) {
     
      $("#owl-partners").owlCarousel({
     
          autoPlay: 4000, 
          stopOnHover : true,
          pagination : false,
          items : 5,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [959,3]     
      });  
	  
	  $( '#cbp-qtrotator' ).cbpQTRotator();	   
    });
</script> 
<?php get_footer(); ?>