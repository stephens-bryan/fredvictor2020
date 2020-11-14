<?php
/*
Plugin Name: Share the Warmth
Plugin URI: https://www.fredvictor.org/
Description:
Author: DFG Team
Version: 1.0
Author URI: https://www.fredvictor.org/
*/



require_once 'templates/sharethewarmth_archive.php';
require_once 'templates/sharethewarmth_cart.php';
require_once 'templates/sharethewarmth_checkout.php';
require_once 'templates/sharethewarmth_single.php';
require_once 'templates/sharethewarmth_order-received.php';


// enqueue the stylesheet
function fred_victor_user_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'fred_victor_style',  $plugin_url . "/assets/css/style.css");
}
add_action( 'wp_enqueue_scripts', 'fred_victor_user_scripts' );