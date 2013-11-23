<?php 
/*
Template name: Mídia
*/
?>
<?php get_header() ?>
	<section class="body">
		<h1 class="title"><span>Mídia</span></h1>
		<div class="wrap">
			<div class="wrap-in">
				<h2 class="post-title">Matérias e Prêmios da Russomano Advocacia</h2>
<?php 			$loop = new WP_Query( "{$query_string}&pagename=&page_id=&post_type=clipping" );
				if ( $loop->have_posts() ) : ?>
				<ol class="archive-list">
<?php 				while( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="archive-item">
						<a href="<?php the_permalink() ?>" class="fancybox-ajax">
							<?php echo wp_get_attachment_image( get_field( 'image' ), 'clippings' ); ?>

							<h3 class="archive-title"><?php the_title() ?></h3>
							<p class="archive-excerpt"><?php the_field( 'excerpt' ) ?></p>
							<small class="archive-action"><?php the_field( 'call' ) ?></small>
						</a>
					</li>
<?php 				endwhile; ?>
				</ol>
<?php 			endif;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php get_footer() ?>