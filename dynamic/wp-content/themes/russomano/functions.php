<?php 

$homeID = get_option( 'page_on_front' );
$contatoID = 10;
$atuacaoID = 7;

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

function my_get_sidebar() {
	global $post;
	$page = $post->post_parent ? get_post( $post->post_parent ) : $post;
	get_sidebar( $page->post_name );
}

function my_field_image( $value, $size ) {
	if ( ! empty( $value ) ) {
		echo wp_get_attachment_image( $value, $size );
	} else {
		$attr = '';
		switch( $size ) {
			case 'thumbnail' : $attr = 'width="292" height="192"'; break;
			default : $attr = 'width="212" height="192"'; break;
		}
		echo '<img src="' . get_stylesheet_directory_uri() . '/img/dot.gif" alt="" ' . $attr . ' />';
	}
}

function my_comment_form() {
	global $post, $commenter, $aria_req;
	
	$ph_author 	= 'Seu nome completo:';
	$ph_email 	= 'E-mail (não será divulgado):';
	$ph_url 	= 'Site:';
	$ph_comment = 'Seu comentário:';
	
	$fields = array(
		'author' => "<p class='field comment-form-author'><label for='author'>{$ph_author}</label><br>" . 
			"<input id='author' name='author' type='text' value='" . esc_attr( $commenter['comment_author'] ) .
			"' class='text' placeholder='{$ph_author}' required {$aria_req}></p>",
		'email' => "<p class='field comment-form-email'><label for='email'>{$ph_email}</label><br>" . 
			"<input id='email' name='email' type='email' value='" . esc_attr( $commenter['comment_author_email'] ) .
			"' class='text' placeholder='{$ph_email}' required {$aria_req}></p>",
		'url' => "<p class='field comment-form-url'><label for='url'>{$ph_url}</label><br>" . 
			"<input id='url' name='url' type='text' value='" . esc_attr( $commenter['comment_author_url'] ) .
			"' class='text' placeholder='{$ph_url}'></p>",
	);
	$comment_field = "<p class='field comment-form-comment'><label for='comment'>{$ph_comment}</label><br>" . 
		"<textarea id='comment' name='comment' cols='30' rows='10' class='area' placeholder='{$ph_comment}' required aria-required='true'></textarea></p>";

	comment_form( array(
		'fields' => $fields,
		'comment_field' => $comment_field,
		'comment_notes_before' => false,
		'comment_notes_after' => false,
	) );
}

function my_theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );
	$comment_class = empty( $args['has_children'] ) ? '' : 'parent';
?>
	<li <?php comment_class( $comment_class ) ?> id="comment-<?php comment_ID() ?>">
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="comment-author vcard">
				<cite class="fn"><?php comment_author_link() ?></cite> 
				comentou em <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( get_option( 'date_format' ) ) ?></a>.
			</div>
<?php 		if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
<?php 		endif; ?>

			<?php comment_text() ?>

			<div class="reply"><?php 
			comment_reply_link( array_merge( $args, array(
				'add_below' => 'div-comment',
				'max_depth' => $args['max_depth'],
				'depth' 	=> $depth,
			) ) ); ?></div>
		</div>
<?php
}

// Setup

add_action( 'after_setup_theme', 'my_setup' );

function my_setup() {
	// Menu
	register_nav_menu( 'primary', 'Menu' );
	// Image sizes
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 292, 192, true );
	add_image_size( 'clippings', 112, 112, true );
}

// Actions

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.9.0.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'interface', get_stylesheet_directory_uri() . '/js/interface.min.js', array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/interface.min.js' ), true );
}


// Filters

remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'body_class', 'my_class_names' );
add_filter( 'pre_get_posts', 'search_filter' );
add_filter( 'wpcf7_form_elements', 'my_wpcf7_form_elements' );

function my_class_names( $classes ) {
	global $post;
	if ( is_page() )
		$classes[] = 'page-' . $post->post_name;
	return $classes;
}

function search_filter( $query ) {
	if ( $query->is_search ) 
		$query->set( 'post_type', 'post' );
	return $query;
}

function my_wpcf7_form_elements($html) {
	$text = 'Assunto:';
	$html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
	return $html;
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

// Custom Post Types

add_action( 'init', 'register_cpt_clipping' );

function register_cpt_clipping() {

    $labels = array( 
        'name' => 'Clippings',
        'singular_name' => 'Clipping',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Clipping',
        'edit_item' => 'Edit Clipping',
        'new_item' => 'New Clipping',
        'view_item' => 'View Clipping',
        'search_items' => 'Search Clippings',
        'not_found' => 'No clippings found',
        'not_found_in_trash' => 'No clippings found in Trash',
        'parent_item_colon' => 'Parent Clipping:',
        'menu_name' => 'Clippings',
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'custom-fields' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'clipping', $args );
}