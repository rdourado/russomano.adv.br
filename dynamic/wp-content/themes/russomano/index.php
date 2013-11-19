<?php
/*
Template name: Home
*/
global $homeID;
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
<?php 			while( has_sub_field( 'highlights', $homeID ) ) : ?>
				<li class="child-item">
					<a href="<?php the_sub_field( 'link' ) ?>">
						<h3 class="child-title"><?php the_sub_field( 'title' ) ?></h3>
						<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'post-thumbnail' ); ?>

<?php 					if ( get_sub_field( 'subtitle' ) ) : ?>
						<h4 class="child-name"><?php the_sub_field( 'subtitle' ) ?></h4>
<?php 					endif; ?>
						<p class="child-text"><?php the_sub_field( 'excerpt' ) ?></p>
						<span class="child-hook"><?php the_sub_field( 'call' ) ?></span>
					</a>
				</li>
<?php 			endwhile; ?>
			</ul>
		</div>
	</div>
<?php get_footer() ?>