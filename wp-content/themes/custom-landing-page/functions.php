<?php
function customTheme_enqueue_styles() {
    wp_enqueue_style('ibm-plex-sans', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/styles/tailwindcss.css', array(), time(), 'all'); // Using time() for cache-busting
}
add_action('wp_enqueue_scripts', 'customTheme_enqueue_styles');


function custom_rewrite_rule() {
    add_rewrite_rule('^([0-9]+)/?$', 'index.php?pagename=your-page-slug&number=$matches[1]', 'top');
    add_rewrite_rule('^par/?$', 'index.php?pagename=your-page-slug&number=par', 'top'); 
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3');
}
add_action('init', 'custom_rewrite_rule');

function custom_query_vars($vars) {
    $vars[] = 'number'; 
    return $vars;
}
add_filter('query_vars', 'custom_query_vars');


