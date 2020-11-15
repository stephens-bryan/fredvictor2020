<?php
/*
Plugin Name: Share the Warmth
Plugin URI: https://www.fredvictor.org/
Description:
Author: DFG Team
Version: 1.0
Author URI: https://www.fredvictor.org/
*/

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}

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
    wp_register_style( 'fv_bootstrap-style',  '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style( 'fv_font-awesome-style',  '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
    wp_enqueue_style( 'fred_victor_style',  $plugin_url . "/assets/css/style.css");
<<<<<<< HEAD
    wp_style_add_data( 'fred_victor_style', 'rtl', 'replace' );
=======
    wp_enqueue_style( 'fv_font-awesome-style');
>>>>>>> c0a0688bd5e7740f6c97be73a13fd5ab014a41b5

    wp_register_script( 'fv_bootstrap-js',  "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" , '', '', true );
    wp_enqueue_script( 'fv_bootstrap-js' );
    wp_register_script( 'fv_testimonials',  $plugin_url . "/assets/js/testimonials.js" , '', '', true);
    wp_enqueue_script( 'fv_order-received',  $plugin_url . "/assets/js/order-received.js" , '', '', true);
    wp_localize_script( 'fv_order-received', 'fv_or', array(
    	'image' => plugin_dir_url( __FILE__ ) . 'assets/images/thank-you-page.svg'
    ) );
}
add_action( 'wp_enqueue_scripts', 'fred_victor_user_scripts' );
