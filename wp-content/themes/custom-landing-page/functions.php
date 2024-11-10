<?php
function customTheme_enqueue_styles() {
    wp_enqueue_style('ibm-plex-sans', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/styles/tailwindcss.css', array(), time(), 'all'); // Using time() for cache-busting
}
add_action('wp_enqueue_scripts', 'customTheme_enqueue_styles');

function enqueue_analytics_script() {
    if (is_front_page()) { // Adjust this condition as needed
        wp_enqueue_script('analytics-tracker', plugin_dir_url(__FILE__) . 'js/analytics.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_analytics_script');


function custom_rewrite_rule() {
    add_rewrite_rule('^your-page-slug/([0-9]+)/?$', 'index.php?pagename=your-page-slug&number=$matches[1]', 'top');
    add_rewrite_rule('^par/?$', 'index.php?pagename=your-page-slug&number=par', 'top');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3');
}
add_action('init', 'custom_rewrite_rule');

function custom_flush_rewrite_rules() {
    custom_rewrite_rule();  // Ensure the rewrite rules are registered
    flush_rewrite_rules();  // Flush and refresh the rewrite rules
}
register_activation_hook(__FILE__, 'custom_flush_rewrite_rules');  // For plugins
add_action('after_switch_theme', 'custom_flush_rewrite_rules');  // For themes


add_filter('query_vars', 'custom_query_vars');
function custom_query_vars($vars) {
    $vars[] = 'number'; 
    return $vars;
}

function handle_analytics_event(WP_REST_Request $request) {
    $data = $request->get_json_params();
    global $wpdb;
    $table_name = $wpdb->prefix . 'analytics';
    $wpdb->insert($table_name, [
        'event_type' => $data['eventType'],
        'user_id' => $data['userId'],
        'page_url' => $data['pageUrl'],
        'timestamp' => $data['timestamp'],
        'device_info' => json_encode($data['deviceInfo']),
        'user_ip' => $_SERVER['REMOTE_ADDR'],
    ]);

    return new WP_REST_Response('Event logged', 200);
}
