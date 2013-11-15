<!doctype html>
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
			<li class="social-item social-item-fb"><a href="#" target="_blank"><img src="<?php t_url() ?>/img/icon-fb.png" alt="Facebook" class="social-icon" width="16" height="16"></a></li>
			<li class="social-item social-item-tw"><a href="#" target="_blank"><img src="<?php t_url() ?>/img/icon-tw.png" alt="Twitter" class="social-icon" width="16" height="16"></a></li>
			<li class="social-item social-item-yt"><a href="#" target="_blank"><img src="<?php t_url() ?>/img/icon-yt.png" alt="Youtube" class="social-icon" width="16" height="16"></a></li>
			<li class="social-item social-item-rss"><a href="#" target="_blank"><img src="<?php t_url() ?>/img/icon-rss.png" alt="RSS" class="social-icon" width="16" height="16"></a></li>
		</ul>
	</header>
	<hr>
