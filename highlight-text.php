<?php
/*---------------------------------------------------------
Plugin Name: Highlight Text
Description: Destaque os textos durante a leitura
Version: 1.0
Author: Anderson Costa
Author URI: https://instagram.com/andersoncostasr
Plugin URI: https://google.com.br
------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

register_activation_hook(__FILE__, 'register_wp_highlight_text' );
function register_wp_highlight_text(){

}

add_action('admin_menu','menu_admin_wp_highlight_text');
function menu_admin_wp_highlight_text() {
    add_menu_page(
        'Highlight Text',
        'Highlight Text',
        'manage_options',
        'info',
        'info',
        // plugins_url( 'relfake/assets/images/icone-relfake.png' ),
        'dashicons-tag',
        30
    );
}

define('wp_highlight_text_PLUGIN_URL', plugins_url('', __FILE__));
define('wp_highlight_text_PLUGIN_DIR', plugin_dir_path(__FILE__));



/* Mandatory Files */
if (is_admin()){
    require_once( wp_highlight_text_PLUGIN_DIR . 'inc/info.php');
} else {
    require_once( wp_highlight_text_PLUGIN_DIR . 'inc/shortcode.php');
}

/* Rigester Styles */
function style_highlight() {
    wp_register_style( 'highlight_css',  plugin_dir_url( __FILE__ ) . 'assets/css/highlight.css' );
    wp_enqueue_style( 'highlight_css' );
}
add_action( 'wp_enqueue_scripts', 'style_highlight', 99999 );


function scrypt_highlight() {
    wp_register_script( 'highlight_js',  plugin_dir_url( __FILE__ ) . 'assets/js/highlight.js' );
    wp_enqueue_script( 'highlight_js' );
}
add_action( 'wp_enqueue_scripts', 'scrypt_highlight', 99999 );

if ( ! session_id()) session_start();
?>