<?php
/*
Plugin Name: Share the Warmth
Plugin URI: https://www.fredvictor.org/
Description:
Author: DFG Team
Version: 1.0
Author URI: https://www.fredvictor.org/
*/

function fred_victor_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'fred_victor_add_woocommerce_support' );

function woocommerce_archive_template( $template ) {
    if ( is_woocommerce() && is_archive() ) {
        $new_template = plugin_dir_path( __FILE__ ) . '/archive-product.php';
        if ( !empty( $new_template ) ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'woocommerce_archive_template', 99 );