<?php

use Timber\Timber;
use Timber\Theme;
use Timber\Post;

/**
 * 1. Enqueue Tailwind CSS
 */
add_action('wp_enqueue_scripts', function () {
    $handle  = 'keitri-twig-main';
    $path    = '/public/css/main.css';
    $version = filemtime(get_template_directory() . $path);
    wp_enqueue_style($handle, get_template_directory_uri() . $path, [], $version);
});

/**
 * 2. Initialize Timber and theme setup
 */
add_action('after_setup_theme', function () {
    Timber::init();
    Timber::$dirname = ['templates'];
    add_theme_support('custom-logo');
});

/**
 * 3. Global Timber Context
 */
add_filter('timber/context', function ($context) {
    $context['theme']       = new Theme();
    $context['menu']        = Timber::get_menu();
    $context['posts']       = Timber::get_posts();
    $context['check_time']  = current_time('mysql');
    $context['is_available'] = function_exists('get_field') ? get_field('availability') === 'yes' : true;

    // Services with orbit positioning
    $services = [
        [ 'title' => 'Front-End Development',          'icon' => 'service1.png', 'preview' => 'preview7.png', 'color' => 'cyan',   'description' => 'Build responsive UIs using HTML, CSS, JS, React, and Flutter Web.' ],
        [ 'title' => 'Back-End Development',           'icon' => 'service2.png', 'preview' => 'preview6.png', 'color' => 'amber',  'description' => 'Develop APIs and server-side systems with Node.js, Django & more.' ],
        [ 'title' => 'Full-Stack Solutions',           'icon' => 'service3.png', 'preview' => 'preview2.png', 'color' => 'rose',   'description' => 'Seamlessly integrate front-end and back-end technologies.' ],
        [ 'title' => 'UI/UX Design',                   'icon' => 'service4.png', 'preview' => 'preview4.png', 'color' => 'blue',   'description' => 'Design intuitive, visually pleasing user interfaces and prototypes.' ],
        [ 'title' => 'Performance & Accessibility',    'icon' => 'service5.png', 'preview' => 'preview5.png', 'color' => 'yellow', 'description' => 'Conduct audits to ensure speed, performance, and inclusive accessibility.' ],
        [ 'title' => 'E-commerce Solutions',           'icon' => 'service6.png', 'preview' => 'preview3.png', 'color' => 'green',  'description' => 'Launch secure, scalable online stores with seamless checkout experiences.' ],
        [ 'title' => 'Mobile App Design',              'icon' => 'service7.png', 'preview' => 'preview1.jpg', 'color' => 'pink',   'description' => 'Design beautiful, user-friendly apps for iOS and Android platforms.' ],
        [ 'title' => 'Content Strategy',               'icon' => 'service8.png', 'preview' => 'preview8.png', 'color' => 'violet', 'description' => 'Plan, write, and manage impactful content that aligns with your brand.' ],
    ];

    // Calculate radial positions
    $count = count($services);
    $radius = 150;
    $angleStep = 2 * pi() / $count;

    foreach ($services as $i => &$item) {
        $angle = $i * $angleStep;
        $item['x'] = round(cos($angle) * $radius);
        $item['y'] = round(sin($angle) * $radius);
    }

    $context['services'] = $services;

    return $context;
});

/**
 * 4. Force rendering of index.twig (dev mode)
 */
add_filter('template_include', function () {
    $context = Timber::context();
    Timber::render('index.twig', $context);
    return false;
});
