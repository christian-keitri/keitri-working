<?php
use Timber\Timber;
use Timber\Theme;
use Timber\Post;

/* 1. Tailwind assets ------------------------------------------------ */
add_action( 'wp_enqueue_scripts', function () {
    $handle  = 'keitri-twig-main';
    $path    = '/public/css/main.css';
    $version = filemtime( get_template_directory() . $path );
    wp_enqueue_style( $handle, get_template_directory_uri() . $path, [], $version );
} );

/* 2. Boot Timber ---------------------------------------------------- */
add_action( 'after_setup_theme', function () {
    Timber::init();
    Timber::$dirname = [ 'templates' ];
} );

/* 3. Global context ------------------------------------------------- */
add_filter( 'timber/context', function ( $context ) {
    $context['theme']       = new Theme();
    $context['menu']        = Timber::get_menu();
    $context['posts']       = Timber::get_posts();
    $context['check_time']  = current_time( 'mysql' );

    // availability flag (ACF or fallback)
    $context['is_available'] = function_exists('get_field')
        ? get_field( 'availability' ) === 'yes'
        : true;  // default when ACF not active yet

    return $context;
} );

/* 4. Force single template during dev ------------------------------ */
add_filter( 'template_include', function () {
    $context = Timber::context();          // already includes is_available
    Timber::render( 'index.twig', $context );
    return false;                          // stop WP from loading PHP template
} );
