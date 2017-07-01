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

if($paged>1){


?>
<?php if ( have_posts() ) : ?>

      
<div class="col-sm-12 archive-regular"> 
		
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
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
             
<?php	
}else{

$year     = get_query_var('year');
$monthnum = get_query_var('monthnum');
$day      = get_query_var('day');

$detailed = array();

$args = array(
	'numberposts' => 10,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true,
	'date_query' => array(
        array(
            'year'  => $year,
            'month' => $monthnum
        ),
    ),	
);


$args['meta_query'] = array(
        array(
         'key' => '_thumbnail_id',
         'compare' => 'EXISTS'
        ),
    );
	
$highlights = $args;

$recent_posts = get_posts( $args );
$detailed['recent_posts'] = currentized($recent_posts, $detailed);

$args['orderby'] = 'comment_count';
$comment_count = get_posts( $args );
$detailed['comment_count'] = currentized($comment_count, $detailed);

$args['orderby'] = 'modified';
$modified = get_posts( $args );
$detailed['modified'] = currentized($modified, $detailed);

$args['meta_key'] = 'vpost_views_count';
$args['orderby'] = 'meta_value_num';
$views_count = get_posts( $args );
$detailed['views_count'] = currentized($views_count, $detailed);

$dateObj   = DateTime::createFromFormat('!m', $monthnum);
$monthName = $dateObj->format('F'); 

$highlights['numberposts'] = 14;
$highlights_data = get_posts( $highlights );
$detailed['highlights_data'] = currentized($highlights_data, $detailed);
//pree($detailed)

?>

      <div class="well highlights_data">
      <div class="row">
      
      
      <div class="col-sm-12 archive-digest">   
      <?php if(is_category()){ ?>   
      <?php custom_breadcrumbs(); ?>
      <?php } ?>
<ul class="content-wrap">      
<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
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
      <div class="row">
      
      
      <div class="col-sm-12 archive-digest">
      
<?php if($year>0){ ?> <h2><?php _e('Highlights from', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?></h2> <?php } ?>
<?php
	if(!empty($highlights_data)){
?>
            
            
            
            
<?php	$detailed_post = $detailed['highlights_data']; ?>  
<?php if(!empty($detailed_post)){ ?>
<div class="detailed_post">
<h2><a href="<?php echo get_permalink($detailed_post->ID); ?>"><?php echo $detailed_post->post_title; ?></a></h2>
<?php if ( has_post_thumbnail($detailed_post->ID) ) : ?>
	<a href="<?php echo get_permalink($detailed_post->ID); ?>" title="<?php echo $detailed_post->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $detailed_post->ID, 'large' ); ?>"/>
	</a>  
<?php echo $detailed_post->post_content; ?>
<?php endif; ?>
</div>
<?php } ?>

	<div class="row">
      
      
      <div class="col-sm-12 highlights">   
	<ul>
<?php		
		foreach($highlights_data as $posts){
?>

<?php if ( has_post_thumbnail($posts->ID) ) : ?>
<li>
	<a href="<?php echo get_permalink($posts->ID); ?>" title="<?php echo $posts->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $posts->ID, 'medium' ); ?>"/>
    <strong><?php echo $posts->post_title; ?></strong>
	</a>
</li>    
<?php endif; ?>
<?php		
			
		}
?>
	</ul>
    </div>
    </div>
<?php				
	}else{
?>
	<?php _e('No posts found in', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?>.
<?php		
	}
?>     
	</div>
     
     </div>
        
      </div>
      <div class="row list-view">
        <div class="col-sm-3">
          <div class="well">
          <h4><?php _e('Last', 'valorous'); ?> <?php echo count($recent_posts); ?> <?php _e('posts', 'valorous'); ?></h4>

<?php
	if(!empty($recent_posts)){
?>
            
            
	<ul>
<?php		
		foreach($recent_posts as $posts){
?>
		<li><a href="<?php echo get_permalink($posts->ID); ?>"><?php echo $posts->post_title; ?></a></li>
<?php		
			
		}
?>
	</ul>
      
<?php				
	}else{
?>
	<?php _e('No posts found in', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?>.
<?php		
	}
?>            
           
          </div>
        </div>
        
   
        
        <div class="col-sm-3">
          <div class="well">
          <h4>Last <?php echo count($comment_count); ?> commented posts</h4>
 
<?php
	if(!empty($comment_count)){
?>
            
            
	<ul>
<?php		
		foreach($comment_count as $posts){
?>
		<li><a href="<?php echo get_permalink($posts->ID); ?>"><?php echo $posts->post_title; ?></a></li>
<?php		
			
		}
?>
	</ul>
      
<?php				
	}else{
?>
	<?php _e('No posts found in', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?>.
<?php		
	}
?>   
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
          <h4>Last <?php echo count($modified); ?> updated posts</h4>

<?php
	if(!empty($modified)){
?>
            
            
	<ul>
<?php		
		foreach($modified as $posts){
?>
		<li><a href="<?php echo get_permalink($posts->ID); ?>"><?php echo $posts->post_title; ?></a></li>
<?php		
			
		}
?>
	</ul>
      
<?php				
	}else{
?>
	<?php _e('No posts found in', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?>.
<?php		
	}
?>   
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
          <h4><?php _e('Most viewed posts', 'valorous'); ?></h4>

<?php
	if(!empty($views_count)){
?>
            
            
	<ul>
<?php		
		foreach($views_count as $posts){
?>
		<li><a href="<?php echo get_permalink($posts->ID); ?>"><?php echo $posts->post_title; ?></a></li>
<?php		
			
		}
?>
	</ul>
      
<?php				
	}else{
?>
	<?php _e('No posts found in', 'valorous'); ?> <?php echo $monthName; ?> <?php echo $year; ?>.
    
<?php		
	}
?>   
          </div>
        </div>
      </div>
      <div class="row display-cube">
        <div class="col-sm-4">
          <div class="well recent_posts">
<?php $detailed_post = $detailed['recent_posts']; ?>  
<?php if(!empty($detailed_post)){ ?>
<div class="detailed_post">
<h2><a href="<?php echo get_permalink($detailed_post->ID); ?>"><?php echo $detailed_post->post_title; ?></a></h2>
<?php if ( has_post_thumbnail($detailed_post->ID) ) : ?>
	<a href="<?php echo get_permalink($detailed_post->ID); ?>" title="<?php echo $detailed_post->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $detailed_post->ID, 'large' ); ?>"/>
	</a>  
<?php echo $detailed_post->post_excerpt; ?>
<?php endif; ?>
</div>
<?php }else{ ?>

<?php _e('No post found in last added insights.', 'valorous'); ?>
<?php } ?>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well comment_count">
<?php $detailed_post = $detailed['comment_count']; ?>  
<?php if(!empty($detailed_post)){ ?>
<div class="detailed_post">
<h2><a href="<?php echo get_permalink($detailed_post->ID); ?>"><?php echo $detailed_post->post_title; ?></a></h2>
<?php if ( has_post_thumbnail($detailed_post->ID) ) : ?>
	<a href="<?php echo get_permalink($detailed_post->ID); ?>" title="<?php echo $detailed_post->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $detailed_post->ID, 'large' ); ?>"/>
	</a>  
<?php echo $detailed_post->post_excerpt; ?>
<?php endif; ?>
</div>
<?php }else{ ?>

<?php _e('No post found in most commented insights.', 'valorous'); ?>
<?php } ?>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well modified">
<?php $detailed_post = $detailed['modified']; ?>  
<?php if(!empty($detailed_post)){ ?>
<div class="detailed_post">
<h2><a href="<?php echo get_permalink($detailed_post->ID); ?>"><?php echo $detailed_post->post_title; ?></a></h2>
<?php if ( has_post_thumbnail($detailed_post->ID) ) : ?>
	<a href="<?php echo get_permalink($detailed_post->ID); ?>" title="<?php echo $detailed_post->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $detailed_post->ID, 'large' ); ?>"/>
	</a>  
<?php echo $detailed_post->post_excerpt; ?>
<?php endif; ?>
</div>
<?php }else{ ?>
<?php _e('No post found in last updated insights.', 'valorous'); ?>
<?php } ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well views_count">
<?php $detailed_post = $detailed['views_count']; ?>  
<?php if(!empty($detailed_post)){ ?>
<div class="detailed_post">
<h2><a href="<?php echo get_permalink($detailed_post->ID); ?>"><?php echo $detailed_post->post_title; ?></a></h2>
<?php if ( has_post_thumbnail($detailed_post->ID) ) : ?>
	<a href="<?php echo get_permalink($detailed_post->ID); ?>" title="<?php echo $detailed_post->post_title; ?>">
	<img src="<?php echo get_the_post_thumbnail_url( $detailed_post->ID, 'large' ); ?>"/>
	</a>  
<?php echo $detailed_post->post_content; ?>
<?php endif; ?>
</div>
<?php }else{ ?>

<?php _e('No post found in most viewed insights.', 'valorous'); ?>
<?php } ?>
          </div>
        </div>
        
      </div>
		<div class="row">
			<div class="col-sm-12">    
            
<?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'valorous' ),
				'next_text'          => __( 'Next page', 'valorous' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'valorous' ) . ' </span>',
			) );
?>    
			</div>
		</div>      

<?php

}
?>
    </div>

    
    
  </div>
</div>
<?php get_footer();
