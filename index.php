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
        '',  // Callback function
        'dashicons-layout',            // Icon URL or Dashicons class
        30                             // Position
    );
    

    add_submenu_page(
        'templify-builder',            // Parent slug
        'Templify Builder',   // Page title
        'Templify Builder',                    // Menu title
        'manage_options',              // Capability
        'templify-builder',   // Menu slug
        'templify_builder_main_page' // Callback function
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
