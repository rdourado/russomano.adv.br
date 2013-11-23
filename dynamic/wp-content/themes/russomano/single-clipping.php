<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title() ?></title>
</head>
<body>
	<!-- <div class="entry-content"> -->
<?php 	
	while( have_posts() ) {
		the_post();
		the_content();
	}
?>
	<!-- </div> -->
</body>
</html>