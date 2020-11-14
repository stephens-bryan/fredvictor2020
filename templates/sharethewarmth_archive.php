<?php

add_filter( 'body_class','my_body_classes2' );
function my_body_classes2( $classes ) {

if ( is_product() ) {

    global $post;
    $terms = get_the_terms( $post->ID, 'product_cat' );
    var_dump( $terms );

    foreach ($terms as $term) {
        $product_cat_id = $term->term_id;
        $classes[] = 'product-in-cat-' . $product_cat_id;    
    }
}

if( is_shop() ){
    $classes[] = "woocommerce-shop-page";
}
return $classes;
}