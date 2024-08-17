<?php
/*
Plugin Name: Templify Builder
Description: Templify Builder plugin description.
Version: 1.0
Author: Templify
*/

// Enqueue scripts and styles
function templify_builder_enqueue_scripts() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    
    // Enqueue plugin scripts
    wp_enqueue_style('templify-builder-style', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_script('templify-builder-script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), '1.0', true);
 
    // Localize script with API URL and nonce
 wp_localize_script('templify-builder-script', 'wpApiSettings', array(
    'root'  => esc_url(rest_url()),
    'nonce' => wp_create_nonce('wp_rest')
));

}
add_action('admin_enqueue_scripts', 'templify_builder_enqueue_scripts');

// Activation hook
function templify_builder_activate() {

    // Activation code here


}
register_activation_hook(__FILE__, 'templify_builder_activate');

// Deactivation hook
function templify_builder_deactivate() {
    // Deactivation code here
}
register_deactivation_hook(__FILE__, 'templify_builder_deactivate');


// Add admin menu and submenu
add_action('admin_menu', 'templify_builder_add_menu');

function templify_builder_add_menu() {
    add_menu_page(
        'Templify Builder',            // Page title
        'Templify Builder',            // Menu title
        'manage_options',              // Capability
        'templify-builder',            // Menu slug
        '',                             // Callback function
        'dashicons-layout',            // Icon URL or Dashicons class
        30                             // Position
    );
    

    add_submenu_page(
        'templify-builder',             // Parent slug
        'Templify Builder',             // Page title
        'Templify Builder',             // Menu title
        'manage_options',               // Capability
        'templify-builder',             // Menu slug
        'templify_builder_main_page'    // Callback function
    );

    add_submenu_page(
        'templify-builder',            // Parent slug
        'Templify Builder Settings',   // Page title
        'Settings',                    // Menu title
        'manage_options',              // Capability
        'templify-builder-settings',   // Menu slug
        'templify_builder_settings_page' // Callback function
    );
}


// Callback function for main page
function templify_builder_main_page() {

require_once plugin_dir_path( __FILE__ ) . '/admin/admin_main.php';
}

// Callback function for settings page
function templify_builder_settings_page() {
    // Settings page content here
    echo '<h1>Settings Page</h1>';
}



// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/link', array(
        'methods' => 'POST',
        'callback' => 'templify_link_api',
        'permission_callback' => '__return_true', // You might want to add proper permission checks
    ));
});

// Handle the API request
function templify_link_api(WP_REST_Request $request) {
    $url = $request->get_param('url');
    $key = $request->get_param('key');

    // Validate the parameters
    if (empty($url) || empty($key)) {
        return new WP_REST_Response(array('message' => 'URL and Key are required.'), 400);
    }

    // Process the data (e.g., make an external API request, save to the database, etc.)
    // For demonstration, we'll just simulate a successful response
    $response = array(
        'status' => 200,
        'message' => 'Link with templify core successfully!',
    );

    return new WP_REST_Response($response, 200);
}



// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/fetch-external-data', array(
        'methods' => 'POST',
        'callback' => 'templify_fetch_external_data',
        'permission_callback' => '__return_true', // Adjust permission checks as needed
    ));
});


function templify_fetch_external_data(WP_REST_Request $request) {
    // Parameters for the external API
    $external_api_url = 'http://templify-import.local/wp-json/custom/v1/filter'; // Replace with the actual external API URL
    // $api_key = 'your_api_key'; // Replace with your external API key if needed

    // Make the request to the external API
    $response = wp_remote_get($external_api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return new WP_REST_Response(array(
            'message' => 'Failed to fetch data from external API.',
            'error' => $response->get_error_message(),
        ), 500);
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    // Optionally, decode JSON response
    $data = json_decode($body, true);

    // Return the response
    return new WP_REST_Response($data, 200);
}


// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/fetch-configure-data', array(
        'methods' => 'POST',
        'callback' => 'templify_fetch_configure_data',
        'permission_callback' => '__return_true', // Adjust permission checks as needed
    ));
});


function templify_fetch_configure_data(WP_REST_Request $request) {
    // Parameters for the external API
    $external_api_url = 'http://templify-import.local/wp-json/custom/v1/config_filter'; // Replace with the actual external API URL
    // $api_key = 'your_api_key'; // Replace with your external API key if needed

    // Make the request to the external API
    $response = wp_remote_get($external_api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return new WP_REST_Response(array(
            'message' => 'Failed to fetch data from external API.',
            'error' => $response->get_error_message(),
        ), 500);
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    // Optionally, decode JSON response
    $data = json_decode($body, true);

    // Return the response
    return new WP_REST_Response($data, 200);
}


// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/fetch-library-data', array(
        'methods' => 'POST',
        'callback' => 'templify_fetch_library_data',
        'permission_callback' => '__return_true', // Adjust permission checks as needed
    ));
});

function templify_fetch_library_data(WP_REST_Request $request) {

    $key = $request->get_param('license_key');

    // Validate the parameters
    if (empty($key)) {
        return new WP_REST_Response(array('message' => 'License key are required.'), 400);
    }

    // Parameters for the external API
    $external_api_url = 'http://templify-website.local/wp-json/custom/v1/fetch_library_by_license'; // Replace with the actual external API URL
    // $api_key = 'your_api_key'; // Replace with your external API key if needed

    // Make the request to the external API
    $response = wp_remote_get($external_api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return new WP_REST_Response(array(
            'message' => 'Failed to fetch data from external API.',
            'error' => $response->get_error_message(),
        ), 500);
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    // Optionally, decode JSON response
    $data = json_decode($body, true);

    // Return the response
    return new WP_REST_Response($data, 200);
}


// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/fetch-changelog', array(
        'methods' => 'GET',
        'callback' => 'templify_fetch_changelog',
        'permission_callback' => '__return_true', // Adjust permission checks as needed
    ));
});


function templify_fetch_changelog(WP_REST_Request $request) {
    // Static changelog data
    $changelog_data = array(

        'version' => array(
            '2.0.29' => '21-11-2023',
            '2.0.28' => '25-10-2023',
            '2.0.27' => '18-10-2023'
        ),
        'fix_update' => array(
            '2.0.29' => array(
                'Update: WordPress 6.4+ Compatibility.',
                'Update: WooCommerce 8.3+ Compatibility.'
            ),
            '2.0.28' => array(
                'Fix: Hide disabled variation attributes.'
            ),
            '2.0.27' => array(
                'Fix: Block variation product add to cart.',
                'Fix: Select2 hover css issue fixed.',
                'Update: WooCommerce 8.2 Compatibility.'
            )
        )
    );

    // Format the response
    $response = array(
        'status' => 200,
        'data' => $changelog_data
    );

    // Return the JSON response
    return new WP_REST_Response($response, 200);
}



// Register the REST API route
add_action('rest_api_init', function () {
    register_rest_route('templify/v1', '/fetch-plugin-list', array(
        'methods' => 'GET',
        'callback' => 'templify_fetch_plugin_list',
        'permission_callback' => '__return_true', // Adjust permission checks as needed
    ));
});


function templify_fetch_plugin_list(WP_REST_Request $request) {

    $key = $request->get_param('license_key');

    $external_api_url = 'http://templify-import.local/wp-json/custom/v1/filter'; // Replace with the actual external API URL
    // $api_key = 'your_api_key'; // Replace with your external API key if needed

    // Make the request to the external API
    $response = wp_remote_get($external_api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return new WP_REST_Response(array(
            'message' => 'Failed to fetch data from external API.',
            'error' => $response->get_error_message(),
        ), 500);
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    $data = json_decode($body, true);

    // Check if plugins exist in the data and return it
    if (isset($data['builder_demo_config']['plugins']) && is_array($data['builder_demo_config']['plugins'])) {
        $plugins = $data['builder_demo_config']['plugins'];

        $response = array(
            'status' => 200,
            'plugins' => $plugins
        );

        return new WP_REST_Response($response, 200);
    } else {
        return new WP_REST_Response(array(
            'message' => 'Plugins not found in the response.',
        ), 404);
    }
}

