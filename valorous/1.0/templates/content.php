<div class="content-outer">
<h2><?php the_title(); ?></h2>
<div class="content-main">
<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	if(is_single() || is_page()){
		the_content();
		vsetPostViews(get_the_ID());
	}else{
		the_excerpt();
	}
?>
</div>
</div>