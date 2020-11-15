<?php
defined( 'ABSPATH' ) || exit;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_5fb02d50ba710',
    'title' => 'Testimonials',
    'fields' => array(
        array(
            'key' => 'field_5fb02d89eb5fb',
            'label' => 'Testimonials',
            'name' => 'testimonials',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => 'field_5fb0389fa50ea',
            'min' => 0,
            'max' => 0,
            'layout' => 'row',
            'button_label' => 'Add Testimonial',
            'sub_fields' => array(
                array(
                    'key' => 'field_5fb0389fa50ea',
                    'label' => 'Testimonial',
                    'name' => 'testimonial',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5fb02d89eb5fb',
                                'operator' => '!=empty',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '65',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_5fb05277d166f',
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5fb05ddde1903',
                    'label' => 'Additional Info',
                    'name' => 'additional_info',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5fb05a5d59244',
                    'label' => 'Include Media',
                    'name' => 'include_media',
                    'type' => 'button_group',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'none' => 'None',
                        'image' => 'Image',
                        'video' => 'Video',
                    ),
                    'allow_null' => 0,
                    'default_value' => 'none',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                ),
                array(
                    'key' => 'field_5fb05d1f59245',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5fb05a5d59244',
                                'operator' => '==',
                                'value' => 'image',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => 2,
                    'mime_types' => 'jpg, jpeg, JPEG, JPG, png, PNG',
                ),
                array(
                    'key' => 'field_5fb05d4659246',
                    'label' => 'Video',
                    'name' => 'video',
                    'type' => 'oembed',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5fb05a5d59244',
                                'operator' => '==',
                                'value' => 'video',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'width' => '',
                    'height' => '',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonials',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'permalink',
        1 => 'the_content',
        2 => 'excerpt',
        3 => 'discussion',
        4 => 'comments',
        5 => 'revisions',
        6 => 'slug',
        7 => 'author',
        8 => 'format',
        9 => 'page_attributes',
        10 => 'featured_image',
        11 => 'categories',
        12 => 'tags',
        13 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
));

endif;

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
                                <button type="button" class="stw-read-more" data-toggle="modal" data-target="#testimonials_modal_<?php echo $a['id']; ?>" data-testimonial="<?php echo $testimonial; ?>" data-name="<?php echo $name; ?>" data-additionalinfo="<?php echo $additional_info; ?>" data-mediatype="<?php echo $include_media; ?>" data-media="<?php echo $media; ?>"><?php echo __( 'Read More', 'sharethewarmth' ); ?>&nbsp;&nbsp;<span aria-hidden="true" class="fas fa-chevron-right"></span></button>
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