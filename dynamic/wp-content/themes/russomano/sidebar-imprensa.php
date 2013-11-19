<?php 			global $post; ?>
				<div class="sidebar">
					<aside class="widget widget-text">
						<div class="textwidget">
<?php 						while( has_sub_field( 'gallery' ) ) : ?>
							<p><a href="<?php echo reset( wp_get_attachment_image_src( get_sub_field( 'image' ), 'full' ) ); ?>" class="fancybox"><?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'post-thumbnail' ); ?></a></p>
<?php 						endwhile; ?>
						</div>
					</aside>
				</div>
