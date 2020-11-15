<?php

add_filter( 'body_class','stw_woo_shop_classes' );
function stw_woo_shop_classes( $classes ) {

if( is_product() ){
    $classes[] = "woocommerce-single-product";
}

if( is_shop() || is_product_category()){
    $classes[] = "woocommerce-shop-page";
}
return $classes;
}

function stw_woo_cat_links(){
    $orderby = 'name';
    $order = 'asc';
    $hide_empty = false ;
    $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
    );
    $product_categories = get_terms( 'product_cat', $cat_args );
    if( !empty($product_categories) ){
        echo '
    <ul class="gift-categories">';
        echo '<li><span class="gift-categories-title">Gift Categories</span></li>';
        foreach ($product_categories as $key => $category) {
            echo '
    <li>';
            echo '<a href="'.get_term_link($category).'" >';
            echo $category->name;
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>
    ';
    }
}

add_action( 'woocommerce_after_shop_loop', 'stw_woo_cat_links', 10 );