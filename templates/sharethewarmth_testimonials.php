<?php
defined( 'ABSPATH' ) || exit;

function sharethewarmth_tesimonitals_init() {
    register_post_type('testimonials', array(
        'labels'                => array(
            'name'                  => _x( 'Testimonials', 'testimonials' ),
            'singular_name'         => _x( 'Testimonial', 'testimonials' ),
            'add_new_item'          => _x( 'Add new Testimonial', 'testimonials' ),
            'edit_item'             => _x( 'Edit Testimonial', 'testimonials' ),
            'new_item'              => _x( 'New Testimonial', 'testimonials' ),
            'view_item'             => _x( 'View Testimonials', 'testimonials' ),
            'search_items'          => _x( 'Search Testimonials', 'testimonials' ),
            'not_found'             => _x( 'No Testimonial found', 'testimonials' ),
            'not_found_in_trash'    => _x( 'No Testimonials found in Trash', 'testimonials' ),
            'parent_item_colon'     => _x( 'Parent Testimonials:', 'testimonials' ),
        ),
        'hierarchical'          => false,
        'description'           => 'Testimonials post type',
        'supports'              => array( 'title' ),
        'public'                => true,
        'show_in_rest'          => false,
        'rewrite'               => array( 'slug' => 'testimonial' ),
        'menu_position'         => 30,
        'menu_icon'             => 'dashicons-thumbs-up',
        'exclude_from_search'   => false,
    ) );
}
add_action( 'init', 'sharethewarmth_tesimonitals_init' );

function sharethewarmth_testimonials_function( $atts ) {
    ob_start();
    $a = shortcode_atts( array(
        'layout' => 'grid',
        'id' => '',
    ), $atts );

    if ( have_rows('testimonials', $a['id']) && get_post_status($a['id']) == 'publish') {
        if (!wp_script_is( 'fv_testimonials', 'enqueued' )) {
            wp_enqueue_style( 'fv_jquery-ui-style' );
            wp_enqueue_style( 'fv_font-awesome-style' );
            wp_enqueue_script( 'fv_jquery-ui-js' );
            wp_enqueue_script( 'fv_testimonials' );
        }
    ?>

        <div id="fv_testimonial_container_<?php echo $a['id']; ?>" class="row fv_testimonial_container">
            <?php while ( have_rows('testimonials', $a['id']) ) { the_row();
                $testimonial = get_sub_field('testimonial');
                $name = get_sub_field('name');
                $additional_info = get_sub_field('additional_info');
                $include_media = get_sub_field('include_media');
                $media = '';
            ?>
                <div class="fv_testimonial col-md-6 mb-5">
                    <?php if (get_sub_field('include_media') == 'video') { ?>
                        <?php if (get_sub_field('video')) {
                                $iframe = get_sub_field('video');

                                preg_match('/src="(.+?)"/', $iframe, $matches);
                                $url = $matches[1];

                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                $thumbnail = $match[1];

                                $media = $url;
                            } ?>
                    <?php } else if (get_sub_field('include_media') == 'image') {
                            $media = get_sub_field('image')['url'];
                    } ?>

                    <div class="text-left">
                        <img class="mb-3 mb-lg-4 quote-up" src="<?php echo plugin_dir_url( __DIR__ ); ?>/assets/images/quote-up.svg" alt="" width="50" height="56">
                        <p class="font-italic mb-3 mb-lg-4">
                            <?php if ($include_media == 'none' && strlen($testimonial) < 600) { ?>
                                <?php echo $testimonial; ?>
                            <?php } else { ?>
                                <?php echo (strlen($testimonial) > 600 ? substr($testimonial, 0, 600) : substr($testimonial, 0, (strlen($testimonial) / 2))); ?>
                                &hellip;
                                <button type="button" class="stw-read-more" data-toggle="modal" data-target="#testimonials_modal_<?php echo $a['id']; ?>" data-testimonial="<?php echo $testimonial; ?>" data-name="<?php echo $name; ?>" data-additionalinfo="<?php echo $additional_info; ?>" data-mediatype="<?php echo $include_media; ?>" data-media="<?php echo $media; ?>"><?php echo __( 'Read More', 'sharethewarmth' ); ?>&nbsp;&nbsp;<span class="fas fa-chevron-right"></span></button>
                            <?php } ?>
                        </p>
                        <?php if ($name) { ?>
                            <p class="m-0 font-weight-bold"><?php echo $name; ?></p>
                        <?php } ?>
                        <?php if ($additional_info) { ?>
                            <p class="m-0 font-weight-light"><?php echo $additional_info; ?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

        <div class="modal fade testimonials_modal" id="testimonials_modal_<?php echo $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header pt-5 px-3 px-md-5 text-center">
                <h5 class="modal-title sr-only">Testimonials</h5>
                <!-- <img src="<?php echo plugin_dir_url( __DIR__ ); ?>/assets/images/sharethewarmth-logo.png" alt=""> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="modal-close-line"></span>
                  <span aria-hidden="true" class="modal-close-line"></span>
                </button>
              </div>
              <div class="modal-body pb-5">
                <div class="testimonial"></div>
              </div>
            </div>
          </div>
        </div>

    <?php return ob_get_clean();
}
add_shortcode( 'fv_testimonials', 'sharethewarmth_testimonials_function' );

// Add the custom columns to the book post type:
add_filter( 'manage_testimonials_posts_columns', 'set_custom_edit_testimonials_columns' );
function set_custom_edit_testimonials_columns($columns) {
    $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Title' ),
      'shortcode' => __( 'Shortcode' ),
    );
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_testimonials_posts_custom_column' , 'custom_testimonials_column', 10, 2 );
function custom_testimonials_column( $column, $post_id ) {
    if ( 'shortcode' === $column ) {
        echo '[fv_testimonials id="'.$post_id.'"]';
    }
}