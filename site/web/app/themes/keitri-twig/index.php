<?php
// Load WordPress environment (usually already loaded by WP)
if (!defined('ABSPATH')) {
    exit; // safety check
}

// Render the index.twig template
Timber\Timber::render('index.twig');
