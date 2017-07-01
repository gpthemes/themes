<?php

get_header(); ?>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-9 text-left"> 
    <?php custom_breadcrumbs(); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'valorous' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'valorous' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'valorous' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
    </div>
    <div class="col-sm-3 sidenav">
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<ul class="sidebar">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</ul>
<?php endif; ?>
    </div>
  </div>
</div>



<?php get_footer(); ?>