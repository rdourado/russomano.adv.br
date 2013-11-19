<?php 
/*
Template name: Contato
*/
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) wpcf7_enqueue_scripts();
?>
<?php get_header() ?>
	<article class="body hentry">
		<h1 class="title entry-title"><span><?php page_title() ?></span></h1>
		<div class="wrap entry-content">
			<div class="wrap-in">
<?php 			while( have_posts() ) : the_post(); ?>
				<div class="content">
					<?php the_content() ?>
				</div>
<?php 			endwhile; ?>
<?php 			get_sidebar( 'contato' ) ?>
			</div>
		</div>
	</article>
<?php get_footer() ?>