<?php
/*
Template name: Home
*/
global $homeID, $atuacaoID;
?>
<?php get_header() ?>
	<section class="welcome">
<?php 	$query = new WP_Query( array( 'posts_per_page' => 1 ) );
		while ( $query->have_posts() ) : $query->the_post();
			$thumb = @reset( wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) ) ); ?>
		<div class="wrap" style="<?php if ( $thumb ) echo "background-image:url('" . $thumb . "')"; ?>">
			<h2 class="welcome-title"><?php the_title() ?></h2>
			<p class="welcome-text"><?php the_excerpt() ?></p>
		</div>
<?php 	endwhile;
		wp_reset_postdata(); ?>
	</section>
	<div class="wrap">
		<div class="wrap-in">
			<ul class="child-list">
<?php 			$loop = new WP_Query( array(
					'post_type' 	 => 'page',
					'post_parent' 	 => $atuacaoID,
					'post__not_in' 	 => array( $post->ID ),
					'posts_per_page' => 3,
					'orderby' 		 => 'rand',
					// 'order' 		 => 'ASC',
				) );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li class="child-item">
					<a href="<?php the_permalink() ?>">
						<h3 class="child-title"><?php the_title() ?></h3>
						<?php the_post_thumbnail() ?>

<?php 					if ( get_field( 'subtitle' ) ) : ?>
						<h4 class="child-name"><?php the_field( 'subtitle' ) ?></h4>
<?php 					endif; ?>
						<p class="child-text"><?php the_field( 'excerpt' ) ?></p>
						<span class="child-hook">Leia esse texto completo</span>
					</a>
				</li>
<?php 			endwhile;
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
<?php get_footer() ?>