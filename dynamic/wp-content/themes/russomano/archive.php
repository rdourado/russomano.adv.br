<?php get_header() ?>
	<section class="body">
		<h1 class="title"><span><?php echo is_search() ? 'Resultado da Busca' : 'Artigos e Notícias'; ?></span></h1>
		<div class="wrap">
			<div class="wrap-in">
				<div class="content">
					<blockquote class="quote">
						<p>A justiça é a liberdade em ação.</p>
						<footer>(Joseph Joubert)</footer>
					</blockquote>
<?php 				if ( have_posts() ) : ?>
					<ol class="archive-list">
<?php 					while( have_posts() ) : the_post(); ?>
						<li class="archive-item">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail( 'clippings' ) ?>

								<h2 class="archive-title"><?php the_title() ?></h2>
								<p class="archive-excerpt"><?php the_excerpt() ?></p>
								<small class="archive-action">Leia esse artigo completo</small>
							</a>
						</li>
<?php 					endwhile; ?>
					</ol>
<?php 				endif; ?>
<?php 				if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
				</div>
<?php 			get_sidebar() ?>
			</div>
		</div>
	</section>
<?php get_footer() ?>