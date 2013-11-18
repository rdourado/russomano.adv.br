<?php get_header() ?>
	<div class="body">
		<h1 class="title"><span>Mídia</span></h1>
		<div class="wrap">
			<div class="wrap-in">
<?php 			while( have_posts() ) : the_post(); ?>
				<article class="content hentry">
					<h2 class="post-title entry-title"><?php the_title() ?></h2>
					<time class="post-date published" datetime="<?php the_time( 'c' ) ?>"><?php the_time( get_option( 'date_format' ) ) ?></time>
					<div class="post-content entry-content">
						<p><img src="<?php the_field( 'clipping' ) ?>" alt=""></p>
					</div>
				</article>
<?php 			endwhile; ?>
<?php 			get_sidebar() ?>
			</div>
		</div>
	</div>
<?php get_footer() ?>