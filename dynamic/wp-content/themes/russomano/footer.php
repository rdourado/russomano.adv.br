<?php global $contatoID; ?>
	<hr>
	<footer class="foot">
		<div id="hcard-russomano" class="vcard">
			<br><span class="fn org"><?php name() ?></span> - Copyright <?php echo date( 'Y' ); ?> 
			© Todos os direitos reservados<br>
			<!-- <a href="tel:+55<?php numbers( get_field( 'tel', $contatoID ) ) ?>" class="tel"><?php the_field( 'tel', $contatoID ) ?></a> - <a class="email" href="mailto:<?php the_field( 'email', $contatoID ) ?>"><?php the_field( 'email', $contatoID ) ?></a>
			<div class="adr">
				<span class="street-address"><?php the_field( 'street-address', $contatoID ) ?></span> - <span class="locality"><?php the_field( 'locality', $contatoID ) ?></span> <span class="region"><?php the_field( 'region', $contatoID ) ?></span> - CEP: <span class="postal-code"><?php the_field( 'postal-code', $contatoID ) ?></span>
			</div> -->
		</div>
		<a href="http://cristianoweb.net/servicos/" class="by"><img src="<?php t_url() ?>/img/cristianoweb.png" alt="@cristianoweb" class="by-logo" width="122" height="17"></a>
	</footer>
	<!-- WP/ --><?php wp_footer() ?><!-- /WP -->
</body>
</html>