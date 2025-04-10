<?php

function my_theme_setup() {
    // Ready for i18n
    load_theme_textdomain( "my_theme", TEMPLATEPATH . "/languages");

    // Use thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    function register_my_menus() {
        register_nav_menus(array(
            'menu-principal' => __('Menú Principal', 'nombre-del-tema'),
        ));
    }
    add_action('init', 'register_my_menus');

    // Register Navigation Menus
    register_nav_menus(array(
        'menu-principal' => 'Menú Principal',
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu',
    ));

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Configuración de entradas del blog
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
    
    // Tamaño de extracto personalizado
    add_filter('excerpt_length', function($length) {
        return 20;
    });

    // Registrar soporte para el blog
    add_theme_support('blog');
}
add_action( 'after_setup_theme', 'my_theme_setup' );

// Función para registrar el tipo de post personalizado si es necesario
function register_custom_post_types() {
    register_post_type('blog', array(
        'labels' => array(
            'name' => 'Blog',
            'singular_name' => 'Blog'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-post',
        'rewrite' => array('slug' => 'blog')
    ));
}
add_action('init', 'register_custom_post_types');

// Función para asegurar que las entradas del blog se muestren correctamente
function ensure_blog_posts_show() {
    if (is_home() || is_archive()) {
        global $wp_query;
        $wp_query->is_home = true;
        $wp_query->is_archive = false;
    }
}
add_action('template_redirect', 'ensure_blog_posts_show');

// Función para registrar y cargar los estilos CSS
function my_theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Función para registrar áreas de widgets
function mitema1_widgets_init() {
    register_sidebar(array(
        'name'          => 'Widget Global',
        'id'            => 'widget-global',
        'description'   => 'Este widget aparecerá en todas las páginas del sitio',
        'before_widget' => '<div class="widget-global">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mitema1_widgets_init');

// Incluir widget personalizado
require_once(get_template_directory() . '/widget-personalizado.php');

//Funcion para contenido personalizado crear proyectos
function crear_cpt_proyectos(): void {
    $labels = array(
        'name' => 'Proyectos',
        'singular_name' => 'Proyecto',
        'menu_name' => 'Proyectos',
        'name_admin_bar' => 'Proyecto',
        'add_new' => 'Añadir nuevo',
        'add_new_item' => 'Añadir nuevo proyecto',
        'edit_item' => 'Editar proyecto',
        'new_item' => 'Nuevo proyecto',
        'view_item' => 'Ver proyecto',
        'all_items' => 'Todos los proyectos',
        'search_items' => 'Buscar proyectos',
        'not_found'=> 'No se encontraron proyectos',
        'not_found_in_trash' => 'No hay proyectos en la papelera',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug'=> 'proyectos'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true,
    );

    register_post_type('proyectos', $args);
}
add_action('init', 'crear_cpt_proyectos');
