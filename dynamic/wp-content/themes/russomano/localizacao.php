<?php 
/*
Template name: Localização
*/
?>
<?php get_header() ?>
	<article class="body hentry">
<?php 	while( have_posts() ) : the_post(); ?>
		<h1 class="title entry-title"><span><?php the_title() ?></span></h1>
		<div class="wrap entry-content">
			<div class="wrap-in">
				<?php the_content() ?>
				<ul class="child-list">
<?php 				while( has_sub_field( 'localidades' ) ) : ?>
					<li class="child-item child-page">
						<h3 class="child-title"><?php the_sub_field( 'title' ) ?></h3>
						<div class="child-frame"><?php the_sub_field( 'map' ) ?></div>
						<p class="child-text"><?php the_sub_field( 'address' ) ?></p>
					</li>
<?php 				endwhile; ?>
				</ul>
			</div>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer() ?>