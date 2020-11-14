<?php
defined( 'ABSPATH' ) || exit;

function sharethewarmth_acf_init_block_types() {
    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page( array(
            'page_title'      => 'Testimonials',
            'menu_title'      => 'Testimonials',
            'menu_slug'       => 'testimonials',
            'capability'      => 'edit_posts',
            'icon_url'        => 'dashicons-thumbs-up',
            'position'        => 30,
            'redirect'        => true
        ) );
    }
}
add_action('acf/init', 'sharethewarmth_acf_init_block_types');

function custom_shortcode_scripts() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'fv_testimonials') ) {
        wp_enqueue_style( 'sharethewarmth_testimonials_css', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css' );
        wp_enqueue_script( 'sharethewarmth_testimonials_js', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'custom_shortcode_scripts');


// [bartag foo="foo-value"]
function sharethewarmth_testimonials_function( $atts ) {
    ob_start();
    if ( have_rows('testimonials', 'options') ) { ?>
        <div id="fv_testimonial_container" class="row">
            <?php while ( have_rows('testimonials', 'options') ) { the_row(); ?>
                <div class="fv_testimonial col-6">

                    <?php if (get_sub_field('include_media') == 'video') { ?>

                        <?php if (get_sub_field('video')) { ?>
                            <div class="embed-container">
                                <?php
                                    // Load value.
                                    $iframe = get_sub_field('video');

                                    // Use preg_match to find iframe src.
                                    preg_match('/src="(.+?)"/', $iframe, $matches);
                                    $src = $matches[1];
                                    $iframe = str_replace($src, $src, $iframe);

                                    $video_id = explode("/embed/", $src);
                                    $video_id = explode("?feature=", $video_id[1]);
                                    $video_id = $video_id[0];

                                    $thumbnail = "http://i3.ytimg.com/vi/".$video_id."/sddefault.jpg";
                                    // Add extra attributes to iframe HTML.
                                    $attributes = 'frameborder="0" ';
                                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                                    // Display customized HTML.
                                    // http://i3.ytimg.com/vi/k7l5diHzWuQ/maxresdefault.jpg
                                ?>
                                <img src="<?php echo $thumbnail; ?>" alt="">
                            </div>
                        <?php } ?>

                    <?php } else if (get_sub_field('include_media') == 'image') { ?>

                        <img src="<?php echo get_sub_field('image')['url']; ?>" alt="">

                    <?php } ?>

                    <a href="#ex1" rel="modal:open">Open Modal</a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div id="ex1" class="modal">
        <p>Thanks for clicking. That felt good.</p>
        <a href="#" rel="modal:close">Close</a>
    </div>

    <?php return ob_get_clean();
}
add_shortcode( 'fv_testimonials', 'sharethewarmth_testimonials_function' );