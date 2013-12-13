<?php
/*
Template name: Home
*/
global $homeID, $atuacaoID;
?>
<?php get_header() ?>
	<section class="welcome">
		<div class="wrap">
			<h2 class="welcome-title"><?php the_field( 'welcome_title', $homeID ) ?></h2>
			<p class="welcome-text"><?php the_field( 'welcome_text', $homeID ) ?></p>
		</div>
	</section>
	<div class="wrap">
		<div class="wrap-in">
			<ul class="child-list">

<?php 			$loop = new WP_Query( "posts_per_page=1" );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li class="child-item child-cat-">
					<a href="<?php the_permalink() ?>">
						<h3 class="child-title"><?php the_title() ?></h3>
						<?php the_post_thumbnail() ?>
						
						<p class="child-text"><?php the_excerpt() ?></p>
						<span class="child-hook">Leia esse texto completo</span>
					</a>
				</li>
<?php 			endwhile;
				wp_reset_postdata(); ?>

<?php 			$loop = new WP_Query( "posts_per_page=1&post_type=page&post_parent={$atuacaoID}&orderby=rand" );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li class="child-item child-cat-">
					<a href="<?php the_permalink() ?>">
						<h3 class="child-title"><?php the_title() ?></h3>
						<?php the_post_thumbnail() ?>
						
						<p class="child-text"><?php the_field( 'excerpt' ) ?></p>
						<span class="child-hook">Leia esse texto completo</span>
					</a>
				</li>
<?php 			endwhile;
				wp_reset_postdata(); ?>

				<li class="child-item child-cat-equipe">
					<a href="<?php echo get_permalink( 10 ); ?>">
						<h3 class="child-title">Equipe com alto padrão de qualidade</h3>
						<img src="http://dummyimage.com/292x192" alt="" class="child-image" width="292" height="192">
						<h4 class="child-name">Dr. Mitch McDeere</h4>
						<p class="child-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						<span class="child-hook">Conheça toda a equipe Russomano Advocacia</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
<?php get_footer() ?>