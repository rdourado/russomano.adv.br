<?php 

$contatoID = 10;

function t_url() {
	echo get_stylesheet_directory_uri();
}

function name() {
	echo get_bloginfo( 'name' );
}

function numbers( $str ) {
	echo preg_replace( "/[^0-9]+/", "", $str );
}

function logo() {
	global $post;

	$home = home_url( '/' );
	$name = get_bloginfo( 'name' );
	$url  = get_stylesheet_directory_uri();
	$tag  = "<img src='{$url}/img/russomano-advocacia.png' alt='{$name}' class='logo-img'>";

	if ( is_front_page() )
		echo "<h1 class='logo'>{$tag}</h1>\n";
	else
		echo "<div class='logo'><a href='{$home}'>{$tag}</a></div>\n";
}

function menu() {
	$args = array(
		'theme_location' 	=> 'primary',
		'menu_class' 		=> 'menu',
		'container' 		=> 'nav',
		'container_class' 	=> 'nav',
	);
	wp_nav_menu( $args );
	echo "\n";
}

function page_title() {
	global $post;
	$pid 	= $post->ID;
	$parent = $post->post_parent;
	echo $parent ? get_the_title( $parent ) : get_the_title( $pid );
}

// Setup

add_action( 'after_setup_theme', 'my_setup' );

function my_setup() {
	// Menu
	register_nav_menu( 'primary', 'Menu' );
	// Image sizes
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	set_post_thumbnail_size( 292, 192, true );
}

// Filters

remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'body_class', 'my_class_names' );

function my_class_names( $classes ) {
	global $post;
	if ( is_page() )
		$classes[] = 'page-' . $post->post_name;
	return $classes;
}

// Shortcode

add_shortcode( 'subpages', 'my_subpages_handler' );

function my_subpages_handler( $atts, $content = null ) {
	global $post;
	extract( shortcode_atts( array( 'limit' => 3 ), $atts ) );

	$args = array(
		'post_type' 	 => 'page',
		'post_parent' 	 => $post->ID,
		'posts_per_page' => $limit,
		'orderby' 		 => 'menu_order',
		'order' 		 => 'ASC',
	);
	$loop = new WP_Query( $args );
	$html = '';

	if ( $loop->have_posts() ) :
		$html .= '<ul class="child-list">';
		while( $loop->have_posts() ) : $loop->the_post();
			$html .= '<li class="child-item child-page">';
			$html .= '<a href="' . get_permalink() . '">';
			$html .= '<h3 class="child-title">' . get_the_title() . '</h3>';
			$html .= get_the_post_thumbnail();
			$html .= '</a></li>';
		endwhile;
		$html .= '</ul>';
	endif;

	return $html;
}
