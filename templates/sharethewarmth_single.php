<?php

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
    // Change In Stock Text
    // var_dump($_product);
    global $product;

	$koostis = $product->get_attribute( 'goal-number' );

	var_dump($koostis);

    if ( $_product->is_in_stock() ) {
    	// $_product['stock_quantity']
        $availability['availability'] = __('Available!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}