<?php 				global $atuacaoID;
					$loop = new WP_Query( array(
						'post_type' 	=> 'page',
						'post_parent' 	=> $atuacaoID,
						'post__not_in' 	=> array( $post->ID ),
						'orderby' 		=> 'rand',
						// 'order' 		=> 'ASC',
					) );
					if ( $loop->have_posts() ) : ?>
					<aside class="widget widget-services">
						<h3 class="widget-title">Outros serviços</h3>
						<ul class="child-list">
<?php 						while( $loop->have_posts() ) : $loop->the_post(); ?>
							<li class="child-item child-page">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail() ?>

									<h3 class="child-title"><?php the_title() ?></h3>
								</a>
							</li>
<?php 						endwhile; ?>
						</ul>
					</aside>
<?php 				endif;
					wp_reset_postdata(); ?>
