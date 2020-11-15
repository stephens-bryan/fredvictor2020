<?php

defined( 'ABSPATH' ) || exit;

add_filter( 'woocommerce_endpoint_order-received_title', 'misha_thank_you_title' );
function misha_thank_you_title( $old_title ){
 	return 'Thank you for making a difference!';
}

add_filter( 'woocommerce_thankyou_order_received_text', 'webroom_change_thankyou_sub_title', 20, 2 );
function webroom_change_thankyou_sub_title( $thank_you_title, $order ){
	return $order->get_billing_first_name() . ', thank you very much for your order!';
}

add_action( 'woocommerce_before_thankyou', 'bbloomer_add_content_thankyou' );
function bbloomer_add_content_thankyou() {
   echo '<p>Some HTML content!</p>';
}