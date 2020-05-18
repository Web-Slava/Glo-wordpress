<?php
/**
 * Webmag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Webmag
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'webmag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webmag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Webmag, use a find and replace
		 * to change 'webmag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webmag', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' ); //дает возможность прикреплять изображения к записям
		add_image_size( 'post-thumb-lg', 750, 450, true );
		add_image_size( 'post-thumb-m', 555, 333, true ); // задаем размер изображения
		add_image_size( 'post-thumb-sm', 360, 216, true ); // задаем размер изображения
		add_image_size( 'post-thumb-xs', 300, 180, true ); // задаем размер изображения
		add_image_size( 'widget-thumb', 90, 90, true ); // задаем размер изображения
		add_image_size( 'post-bg', 1366, 400, true ); // задаем размер изображения

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'nav-aside-menu' => esc_html__( 'Nav Aside', 'webmag' ),
				'footer-links' => esc_html__( 'Footer About', 'webmag' ),
				'footer-policy' => esc_html__( 'Footer Policy', 'webmag' ),
				'footer-catagories' => esc_html__( 'Footer Catagories', 'webmag' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'webmag_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 18,
				'width'       => 114,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'webmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webmag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'webmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'webmag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webmag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Menu', 'webmag' ),
			'id'            => 'sidebar-menu',
			'description'   => esc_html__( 'Add widgets here.', 'webmag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'webmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 // дабавляем стили и скрипты из index.html в index.php
function webmag_scripts() {
	wp_enqueue_style( 'webmag-style', get_stylesheet_uri(), array(), _S_VERSION ); // было

	wp_enqueue_style('nunito-sans', 'https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');

	wp_style_add_data( 'webmag-style', 'rtl', 'replace' ); // было
	// удаляем старый jquery и подключаем свой
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', '', _S_VERSION, true);
	wp_enqueue_script( 'jquery' );
	// подключаем остальные скрипты зависящие от jquery (в конце true значит что подключаем в footer)
	// 'имя файла', 'путь к нему', 'зависимость', 'версия', 'где подключать'
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', _S_VERSION, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', _S_VERSION, true);

	wp_enqueue_script( 'webmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'webmag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	//wp_enqueue_script('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css', '', '_S_VERSION', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webmag_scripts' );

// функция для добавления библиотеки animate.css в footer 
function add_library_animate(){
	wp_enqueue_script('animate', get_template_directory_uri() . '/css/animate/animate.css');
}
add_action( 'wp_footer', 'add_library_animate' );

add_filter('show_admin_bar', '__return_false'); // отключить админ-панель

add_filter( 'excerpt_length', function(){
	return 14;
} ); // обрезаем текст поста до 20 слов (the_excerpt())

add_filter('excerpt_more', function($more) {
	return '...';
}); // вместо [...] выводит ... у обрезанного текста

function myIframe ($atts){
	$atts = shortcode_atts(array(
		'href' => 'https://www.youtube.com/embed/RhMYBfF7-hE',
		'width' => '400px',
		'height' => '300px',
	), $atts);
	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"></iframe>';
}
add_shortcode( 'iframe', 'myIframe' ); // добавляем шорткод 

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('video', array(
		'labels'             => array(
			'name'               => 'Video', // Основное название типа записи
			'singular_name'      => 'Video', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new video',
			'edit_item'          => 'Edit video',
			'new_item'           => 'New video',
			'view_item'          => 'View video',
			'search_items'       => 'Search video',
			'not_found'          => 'Video not found',
			'not_found_in_trash' => 'Video not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Video'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'menu_icon'			 => 'dashicons-format-video',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 11,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

// хук, через который подключается функция
// регистрирующая новые таксономии (create_book_taxonomies)
add_action( 'init', 'create_video_taxonomies' );

// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
function create_video_taxonomies(){

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('genre', array('video'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Genres', 'taxonomy general name' ),
			'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Genres' ),
			'all_items'         => __( 'All Genres' ),
			'parent_item'       => __( 'Parent Genre' ),
			'parent_item_colon' => __( 'Parent Genre:' ),
			'edit_item'         => __( 'Edit Genre' ),
			'update_item'       => __( 'Update Genre' ),
			'add_new_item'      => __( 'Add new Genre' ),
			'new_item_name'     => __( 'New Genre Name' ),
			'menu_name'         => __( 'Genres' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array( 'slug' => 'the_genre' ), // свой слаг в URL
	));

	// Добавляем НЕ древовидную таксономию 'writer' (как метки)
	register_taxonomy('author', 'video',array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x( 'Author', 'taxonomy general name' ),
			'singular_name'               => _x( 'Author', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Search Authors' ),
			'popular_items'               => __( 'Popular Authors' ),
			'all_items'                   => __( 'All Authors' ),
			'parent_item'                 => null,
			'parent_item_colon'           => null,
			'edit_item'                   => __( 'Edit Author' ),
			'update_item'                 => __( 'Update Author' ),
			'add_new_item'                => __( 'Add New Author' ),
			'new_item_name'               => __( 'New Author Name' ),
			'separate_items_with_commas'  => __( 'Separate authors with commas' ),
			'add_or_remove_items'         => __( 'Add or remove authors' ),
			'choose_from_most_used'       => __( 'Choose from the most used authors' ),
			'menu_name'                   => __( 'Authors' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array( 'slug' => 'the_author' ), // свой слаг в URL
	));
}