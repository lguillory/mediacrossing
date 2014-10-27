<?php
/**
 * Mediacrossing functions and definitions
 *
 * @package Mediacrossing
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'mediacrossing_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mediacrossing_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mediacrossing, use a find and replace
	 * to change 'mediacrossing' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mediacrossing', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mediacrossing' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mediacrossing_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mediacrossing_setup
add_action( 'after_setup_theme', 'mediacrossing_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mediacrossing_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mediacrossing' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mediacrossing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mediacrossing_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.less');
	wp_enqueue_script( 'jquery-1.11.1.min', get_template_directory_uri() . '/js/jquery-1.11.1.min.js');
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js');

}
add_action( 'wp_enqueue_scripts', 'mediacrossing_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

/* ---------------------------- AJOUTS MC -------------------------- */

/** 
 * Suppression du meta generator
 */
remove_action('wp_head', 'wp_generator');


/* 
 * Personnalisation du logo de la page wp-login 
 */

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo-mediacrossing.png) !important;
        background-size: auto 37px !important;
        background-color: transparent;
        height: 37px !important;
        width: auto !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Mediacrossing';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


/**
 * Personnalisation du moteur de recherche WP
 */

function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="search" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label for="s">Moteur de recherche</label>
	<input type="text" value="" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Ok" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );


/**
 * Profils d'images
 */
 
//add_image_size( 'image-une', 714, 9999999, false );

/**
 * TextLimit
 */

function textLimit($string, $length, $replacer = '...'){
  $string = strip_tags($string); 
  
  if(strlen($string) > $length){
    $new_str = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
    $tabNew_str = explode(' ', $new_str);
    $tailleTab = sizeof($tabNew_str);

    $resumeFinal = '';
    
    for ($i = 0; $i < $tailleTab-2; $i++) {
    	$resumeTmp = $resumeFinal.' '.$tabNew_str[$i];
    	$resumeFinal.=' '.$tabNew_str[$i];
    }

    $resumeFinal .= '...';
    
  } else {
    $resumeFinal = $string;
  }
 
  return $resumeFinal;
}