					<section id="comments" class="comments-area">
<?php 					if ( have_comments() ) : ?>
						<h2 class="comments-title"><?php comments_number( 'Comente esse artigo', 'Uma pessoa comentou esse artigo', '% pessoas comentaram esse artigo' ) ?></h2>
						<ol class="comment-list">
							<?php
							wp_list_comments( array(
								'callback' 	  => 'my_theme_comment',
								'reply_text'  => 'Responder esse usuário',
								'style'       => 'ol',
								'format' 	  => 'html5',
								'short_ping'  => true,
							) );
							?>
						</ol>
<?php 					endif; ?>
<?php 					my_comment_form(); ?>
					</section>
