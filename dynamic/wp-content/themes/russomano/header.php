<?php 
global $homeID; 
?><!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title() ?></title>
	<link rel="stylesheet" href="<?php t_url() ?>/css/screen.css" media="screen">
	<!-- WP/ --><?php wp_head() ?><!-- /WP -->
</head>
<body <?php body_class() ?>>
	<header class="head">
		<?php logo() ?>
		<?php menu() ?>
		<ul class="social">
<?php 		if ( get_field( 'facebook', $homeID ) ) : ?>
			<li class="social-item social-item-fb"><a href="<?php the_field( 'facebook', $homeID ) ?>" target="_blank"><img src="<?php t_url() ?>/img/icon-fb.png" alt="Facebook" class="social-icon" width="16" height="16"></a></li>
<?php 		endif; ?>
<?php 		if ( get_field( 'twitter', $homeID ) ) : ?>
			<li class="social-item social-item-tw"><a href="<?php the_field( 'twitter', $homeID ) ?>" target="_blank"><img src="<?php t_url() ?>/img/icon-tw.png" alt="Twitter" class="social-icon" width="16" height="16"></a></li>
<?php 		endif; ?>
<?php 		if ( get_field( 'youtube', $homeID ) ) : ?>
			<li class="social-item social-item-yt"><a href="<?php the_field( 'youtube', $homeID ) ?>" target="_blank"><img src="<?php t_url() ?>/img/icon-yt.png" alt="Youtube" class="social-icon" width="16" height="16"></a></li>
<?php 		endif; ?>
			<li class="social-item social-item-rss"><a href="<?php bloginfo( 'rss2_url' ) ?>" target="_blank"><img src="<?php t_url() ?>/img/icon-rss.png" alt="RSS" class="social-icon" width="16" height="16"></a></li>
		</ul>
	</header>
	<hr>
