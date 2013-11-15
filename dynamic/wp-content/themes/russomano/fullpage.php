<?php 
/*
Template name: Full Page
*/
?>
<?php get_header() ?>
	<article class="body hentry">
<?php 	while( have_posts() ) : the_post(); ?>
		<h1 class="title entry-title"><span><?php the_title() ?></span></h1>
		<div class="wrap entry-content">
			<div class="wrap-in">
				<?php the_content() ?>
			</div>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer() ?>