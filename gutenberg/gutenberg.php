<?php

// HOW TO USE GUTENBERG + ACF
// https://www.advancedcustomfields.com/resources/acf_register_block_type/

// Custom render callback
function sharethewarmth_acf_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);
    if( file_exists( get_theme_file_path('/gutenberg/templates/'.$slug.'.php') ) ) {
        include( get_theme_file_path('/gutenberg/templates/'.$slug.'.php') );
    }
}

// Custom category
function sharethewarmth_acf_custom_category( $categories, $post ) {
    return array_merge( $categories, array( array(
        'slug' => 'sharethewarmth',
        'title' => __( 'Share the Warmth', 'sharethewarmth' ),
    )));
}
add_filter( 'block_categories', 'sharethewarmth_acf_custom_category', 10, 2);

function sharethewarmth_admin_block_styles() {
    wp_enqueue_style( 'admin_style_css', JBD_THEME_URI.'/gutenberg/css/style.css', '', filemtime( JBD_THEME_URL . '/assets/style.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'sharethewarmth_admin_block_styles');

function sharethewarmth_acf_init_block_types() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register a testimonial block.
        acf_register_block( array(
            'name'            => 'testimonials',
            'title'           => 'Testimonials',
            'description'     => 'A testimonials block.',
            'render_callback' => 'jbd_acf_block_render_callback',
            'category'        => 'sharethewarmth',
            'icon'               => array(
                'background'          => '#17bebb',
                'foreground'          => '#fff',
                'src'                 => 'admin-comments',
            ),
            'mode'              => 'edit',
            'supports'          => array(
                'align'               => false,
                'customClassName'     => false,
                'html'                => false,
                // 'mode'               => false,
                'multiple'           => false,
            ),
            'post_types'      => array( 'page' ),
            'keywords'        => array( 'testimonials' ),
            'enqueue_assets'  => function() {
                // wp_enqueue_script( 'testimonials_js', get_stylesheet_directory_uri().'/gutenberg/js/testimonials.js', array( 'wp-blocks' ), '', true );
            }
        ) );
    }
}
add_action('acf/init', 'sharethewarmth_acf_init_block_types');