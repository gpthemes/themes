<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(!is_home()){ ?><div class="container-main">
<header id="masthead" class="site-header" role="banner">
		<hgroup>
        	<?php the_custom_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>


        
        
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              
              <?php the_custom_logo(); ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav gp-nav-menu' ) ); ?>
            <?php if ( get_option( 'users_can_register' ) ) { ?>
              <ul class="nav navbar-nav navbar-right">
              	<?php if(is_user_logged_in()): ?>
                <li><a href="<?php echo wp_logout_url(); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				<?php else: ?>
                <li><a href="<?php echo home_url(); ?>/wp-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php endif; ?>
              </ul>
            <?php } ?>
            </div>
          </div>
        </nav>

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		<?php endif; ?>
	</header>

<?php } ?>