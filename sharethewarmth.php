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
require_once 'templates/sharethewarmth_myaccount.php';
require_once 'templates/sharethewarmth_single.php';
require_once 'templates/sharethewarmth_order-received.php';
require_once 'templates/sharethewarmth_testimonials.php';


// enqueue the stylesheet
function fred_victor_user_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'fv_jquery-ui-style',  '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_style( 'fred_victor_style',  $plugin_url . "/assets/css/style.css");

    wp_enqueue_script( 'fv_jquery-ui-js',  $plugin_url . "//code.jquery.com/ui/1.12.1/jquery-ui.js" , '', '', true );
    wp_enqueue_script( 'fv_testimonials',  $plugin_url . "/assets/js/testimonials.js" , '', '', true);
}
add_action( 'wp_enqueue_scripts', 'fred_victor_user_scripts' );
