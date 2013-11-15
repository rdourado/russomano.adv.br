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
					<li class="child-item child-page">
						<a href="#">
							<h3 class="child-title">Brasília — DF</h3>
							<img src="http://dummyimage.com/292x192" alt="" class="child-image" width="292" height="192">
							<p class="child-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
						</a>
					</li>
					<li class="child-item child-page">
						<a href="#">
							<h3 class="child-title">Juiz de Fora — MG</h3>
							<img src="http://dummyimage.com/292x192" alt="" class="child-image" width="292" height="192">
							<p class="child-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
						</a>
					</li>
					<li class="child-item child-cat-equipe">
						<a href="#">
							<h3 class="child-title">Belo Horizonte — MG</h3>
							<img src="http://dummyimage.com/292x192" alt="" class="child-image" width="292" height="192">
							<p class="child-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer() ?>