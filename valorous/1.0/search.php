<?php

get_header(); ?>


<div class="container-fluid">
  <div class="row content">
  
  
     
      <div class="col-sm-2">
     <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
        <ul class="sidebar left-side">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
        </ul>
    <?php endif; ?>
 
    </div>
    
    <div class="col-sm-10">
    
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



?>
<?php if ( have_posts() ) : ?>

      
<div class="col-sm-12 archive-regular"> 
		
			<header class="page-header">
				<?php
					echo '<h1 class="page-title">Search results for "'.$_GET['s'].'"</h1>';
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
        
<ul class="content-wrap">      


			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
?>
<li>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php				 
				get_template_part( 'templates/content' );
?>
</a>
</li>
<?php				

			// End the loop.
			endwhile;
?>
      <div class="row">
      
      
      <div class="col-sm-12 ">
<?php      
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'valorous' ),
				'next_text'          => __( 'Next page', 'valorous' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'valorous' ) . ' </span>',
			) );
?>
</div>
</div>
<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'templates/content', 'none' );

		endif;
		?>      
</ul>   
             


    </div>

    
    
  </div>
</div>
<?php get_footer();
