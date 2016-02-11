<?php //Connect CPT
$args = array(
    'has_archive'       => true,
    'hierarchical'      => true,
    'show_in_nav_menus' => true,
    'menu_icon'         => 'dashicons-admin-comments', //http://melchoyce.github.io/dashicons/
    'supports'          => array( 'title'),
    'show_in_rest' => true
    );
$test = register_cuztom_post_type('Testimonial', $args);
$test->add_meta_box(
    'single',
    'Testimonials', 
    array(
        array(
            'name'          => 'quotation',
            'label'         => 'Testimonial',
            'description'   => '',
            'type'          => 'wysiwyg',
        ),
        array(
            'name'          => 'source',
            'label'         => 'Source',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'title',
            'label'         => 'Source Title',
            'description'   => '',
            'type'          => 'text',
            
        )
    )
);
?>