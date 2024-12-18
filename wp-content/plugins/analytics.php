<?php
/**
 * Plugin Name: Analytics
 * Description: Tracks if the video is fully watched or if the page is fully viewed.
 * Version: 1.0
 * Author: semas
 */

function analytics_tracker_install() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'analytics';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        event_type varchar(255) NOT NULL,
        user_id varchar(255) NOT NULL,
        page_url varchar(255) NOT NULL,
        timestamp datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        device_info text DEFAULT NULL,
        user_ip varchar(100) DEFAULT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function handleAnalyticsEvent(WP_REST_Request $request) {
    $data = $request->get_json_params();
    
    if (!isset($data['eventType']) || !isset($data['userId']) || !isset($data['pageUrl'])) {
        return new WP_REST_Response('Invalid data', 400);
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'analytics';
    $wpdb->insert($table_name, [
        'event_type' => sanitize_text_field($data['eventType']),
        'user_id' => sanitize_text_field($data['userId']),
        'page_url' => esc_url($data['pageUrl']),
        'timestamp' => current_time('mysql'),
        'device_info' => isset($data['deviceInfo']) ? json_encode($data['deviceInfo']) : null,
        'user_ip' => sanitize_text_field($_SERVER['REMOTE_ADDR']),
    ]);

    return new WP_REST_Response('Event logged', 200);
}

add_action('rest_api_init', function () {
    error_log('REST API Initialized');
    global $wp_rest_server;
    error_log(print_r($wp_rest_server->get_routes(), true));

    register_rest_route('analytics/v1', '/track', array(
        'methods' => 'POST',
        'callback' => 'handleAnalyticsEvent',
        'permission_callback' => '__return_true', 
    ));
});

function add_cors_headers() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type");
}

add_action('rest_api_init', function() {
    add_filter('rest_pre_serve_request', 'add_cors_headers');
});
