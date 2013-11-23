<?php 
/*
Template name: Equipe
*/
?>
<?php get_header() ?>
	<article class="body hentry">
<?php 	while( have_posts() ) : the_post(); ?>
		<h1 class="title entry-title"><span><?php the_title() ?></span></h1>
		<div class="wrap entry-content">
			<div class="wrap-in">
				<?php the_content() ?>

<?php 			if ( get_field( 'diretoria' ) ) : ?>
				<h3>Diretoria</h3>
				<ul class="team-list team-wide">
<?php 				while( has_sub_field( 'diretoria' ) ) : ?>
					<li class="team-item">
						<?php my_field_image( get_sub_field( 'image' ), 'post-thumbnail' ); ?>

						<h3 class="team-name"><?php the_sub_field( 'name' ) ?></h3>
						<p class="team-job"><?php the_sub_field( 'job' ) ?></p>
					</li>
<?php 				endwhile; ?>
				</ul>
<?php 			endif; ?>

<?php 			if ( get_field( 'advogados' ) ) : ?>
				<h3>Advogados</h3>
				<ul class="team-list">
<?php 				while( has_sub_field( 'advogados' ) ) : ?>
					<li class="team-item">
						<?php my_field_image( get_sub_field( 'image' ), 'thumbnail' ); ?>

						<h3 class="team-name"><?php the_sub_field( 'name' ) ?></h3>
						<p class="team-job"><?php the_sub_field( 'job' ) ?></p>
					</li>
<?php 				endwhile; ?>
				</ul>
<?php 			endif; ?>

<?php 			if ( get_field( 'consultores' ) ) : ?>
				<h3>Consultores jurídicos</h3>
				<ul class="team-list">
<?php 				while( has_sub_field( 'consultores' ) ) : ?>
					<li class="team-item">
						<?php my_field_image( get_sub_field( 'image' ), 'thumbnail' ); ?>

						<h3 class="team-name"><?php the_sub_field( 'name' ) ?></h3>
					</li>
<?php 				endwhile; ?>
				</ul>
<?php 			endif; ?>

			</div>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer() ?>