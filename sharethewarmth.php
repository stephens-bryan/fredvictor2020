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
    wp_register_style( 'fv_jquery-ui-style',  '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_register_style( 'fv_font-awesome-style',  '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
    wp_enqueue_style( 'fred_victor_style',  $plugin_url . "/assets/css/style.css");

    wp_register_script( 'fv_jquery-ui-js',  "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" , '', '', true );
    wp_register_script( 'fv_testimonials',  $plugin_url . "/assets/js/testimonials.js" , '', '', true);
}
add_action( 'wp_enqueue_scripts', 'fred_victor_user_scripts' );
