				<div class="sidebar">
					<aside class="widget widget-search">
						<h3 class="widget-title">Faça uma busca</h3>
						<form action="<?php echo home_url( '/' ); ?>" method="get" class="searchform">
							<fieldset>
								<legend>Busca</legend>
								<input type="text" name="s" id="s" class="text" required aria-required="true" placeholder="Digite o que procura e dê “enter”" aria-label="Buscar por">
								<button type="submit">Ok</button>
							</fieldset>
						</form>
					</aside>
					<aside class="widget widget-newsletter">
						<h3 class="widget-title">Assine a newsletter</h3>
						<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" class="newsform" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=RussomanoAdvocacia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
							<fieldset>
								<legend>Newsletter</legend>
								<input type="email" name="email" id="email" class="text newsletter-email" required aria-required="true" placeholder="Digite o seu e-mail e dê “enter”" aria-label="Buscar por">
								<input type="hidden" name="uri" value="RussomanoAdvocacia">
								<input type="hidden" name="loc" value="pt_BR">
								<button type="submit" class="newsletter-submit">Ok</button>
								<a href="<?php echo get_permalink( 147 ); ?>" class="privacy">Acesse a Política de Privacidade</a>
							</fieldset>
						</form>
					</aside>
<?php 				get_template_part( 'widget', 'services' ) ?>
				</div>
