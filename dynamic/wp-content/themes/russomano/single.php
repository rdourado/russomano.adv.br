<?php get_header() ?>
	<div class="body">
		<h1 class="title"><span>Artigos e Notícias</span></h1>
		<div class="wrap">
			<div class="wrap-in">
				<div class="content">
<?php 				while( have_posts() ) : the_post(); ?>
					<article class="content hentry">
						<h2 class="post-title entry-title"><?php the_title() ?></h2>
						<time class="post-date published" datetime="<?php the_time( 'c' ) ?>"><?php the_time( get_option( 'date_format' ) ) ?></time>
						<p class="post-categories"><?php the_category( ', ' ) ?></p>
						<?php the_tags( '<p class="post-tags">', ', ', '</p>' ) ?>

						<div class="post-content entry-content">
							<?php the_content() ?>
						</div>
						<div class="post-author vcard">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?>

							<dl class="author-meta">
								<dt class="author-name fn"><?php the_author() ?></dt>
								<dd class="author-resume note"><?php the_author_meta( 'description' ) ?></dd>
							</dl>
						</div>
					</article>
<?php 				endwhile; ?>
<?php 				comments_template(); ?>
				</div>
<?php 			get_sidebar() ?>
			</div>
		</div>
	</div>
<?php get_footer() ?>