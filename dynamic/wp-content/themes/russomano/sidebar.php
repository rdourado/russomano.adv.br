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
						<form action="/" method="post" class="newsform">
							<fieldset>
								<legend>Newsletter</legend>
								<input type="email" name="" id="" class="text" required aria-required="true" placeholder="Digite o seu e-mail e dê “enter”" aria-label="Buscar por">
								<button type="submit">Ok</button>
								<a href="#" class="privacy">Acesse a Política de Privacidade</a>
							</fieldset>
						</form>
					</aside>
<?php 				get_template_part( 'widget', 'services' ) ?>
				</div>
