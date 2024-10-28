<?php
echo 'Testing functions.php';
function customTheme_enqueue_styles() {
    wp_enqueue_style('ibm-plex-sans', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/styles/tailwindcss.css', array(), time(), 'all'); // Using time() for cache-busting
}
add_action('wp_enqueue_scripts', 'customTheme_enqueue_styles');
