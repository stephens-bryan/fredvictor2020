<?php
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
    // Change In Stock Text
    global $product;
	// $koostis = $product->get_attribute( 'goal-number' );

    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __($_product->total_sales . '/' . (int)$product->get_meta('sharethewarmth_selling_goal') . (string)' sold!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}

add_filter( 'woocommerce_product_tabs', 'stw_woo_single_rmv_description', 20, 1 );

function stw_woo_single_rmv_description( $tabs ) {

	// Remove the description tab
    if ( isset( $tabs['description'] ) ) unset( $tabs['description'] );
    return $tabs;
}

// Remove product zoom
// add_action( 'after_setup_theme', 'stw_woo_rmv_product_zoom', 100 );
add_action( 'wp', 'stw_woo_rmv_product_zoom', 100 );
function stw_woo_rmv_product_zoom() {
    remove_theme_support( 'wc-product-gallery-zoom' );
    remove_theme_support( 'wc-product-gallery-lightbox' );
    remove_theme_support( 'wc-product-gallery-slider' );
}

// Rearrange order of product details
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
}

// Add back to shop link before single product content
add_action( 'woocommerce_before_single_product_summary', 'woo_add_continue_shopping_button_to_cart' );
function woo_add_continue_shopping_button_to_cart() {
    $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
    echo '<div class="woo-backlink">';
    echo ' <a href="'.$shop_page_url.'" class=""><span aria-hidden="true" class="fas fa-chevron-left"></span>&nbsp;&nbsp;Back to Shop</a>';
    echo '</div>';
}

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
function woocommerce_product_custom_fields() {
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    //Custom Product Number Field
    woocommerce_wp_text_input(
        array(
            'id' => 'sharethewarmth_selling_goal',
            'placeholder' => 'Selling Goal',
            'label' => __('Selling Goal', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );
}

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
function woocommerce_product_custom_fields_save($post_id) {
// Custom Product Number Field
    $woocommerce_custom_product_number_field = $_POST['sharethewarmth_selling_goal'];
    if (!empty($woocommerce_custom_product_number_field)) {
        update_post_meta($post_id, 'sharethewarmth_selling_goal', esc_attr($woocommerce_custom_product_number_field));
    }
}