<?php

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
    // Change In Stock Text
    // var_dump($_product);
    global $product;

	$koostis = $product->get_attribute( 'goal-number' );

	// var_dump($koostis);

    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('Available!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}

add_filter( 'woocommerce_product_tabs', 'yikes_remove_description_tab', 20, 1 );

function yikes_remove_description_tab( $tabs ) {

	// Remove the description tab
    if ( isset( $tabs['description'] ) ) unset( $tabs['description'] );      	    
    return $tabs;
}


add_action( 'woocommerce_before_single_product', 'stw_woo_single_product_page' );
function stw_woo_single_product_page() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 20 );
    add_action( 'woocommerce_single_product_summary', 'the_content', 20 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 35 );
    
    
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40 );
}

add_action( 'woocommerce_before_single_product_summary', 'woo_add_continue_shopping_button_to_cart' );

function woo_add_continue_shopping_button_to_cart() {
 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
 
 echo '<div class="woo-backlink">';
 echo ' <a href="'.$shop_page_url.'" class="">Back to Shop</a>';
 echo '</div>';
}