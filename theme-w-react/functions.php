<?php
function enqueue_theme_styles() {
    wp_enqueue_style(
        'my-theme-style',
        get_template_directory_uri() . '/bundled/css/index.css',
        array(),
        '1.0.0',
        'all',
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');



function enqueue_react_script() {
    // Get the current page ID
    $post_id = get_the_ID();

    // Default data structure
    $data = [
        'postId' => $post_id,
        'pageData' => null, // This will contain both WordPress and Pods fields
    ];

    // Check if Pods is available
    if (class_exists('Pods')) {
        // Get the pod object for the 'page' pod
        $page_pod = pods('page', $post_id);

        // Ensure the pod exists
        if ($page_pod && $page_pod->exists()) {
            // Fetch all core WordPress fields
            $page_data = $page_pod->row();

            // Fetch custom fields from Pods
            $custom_fields = $page_pod->fields();
            foreach ($custom_fields as $field_name => $field_options) {
                $page_data[$field_name] = $page_pod->field($field_name);
            }

            // Assign structured data to pass to React
            $data['pageData'] = $page_data;
        }
    }

    // Enqueue React script
    wp_enqueue_script(
        'react-script',
        get_template_directory_uri() . '/bundled/js/index.js',
        array(),
        null,
        true
    );

    // Localize the data to be available in React
    var_dump($data);
    wp_localize_script('react-script', 'WPData', $data);
}
add_action('wp_enqueue_scripts', 'enqueue_react_script');







function register_custom_post_type_restaurants() {
    register_post_type('restaurants', [
        'labels' => [
            'name' => __('Restaurants'),
            'singular_name' => __('Restaurant'),
        ],
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'restaurants',
            'with_front' => false,
        ],
        'supports' => ['title', 'editor', 'thumbnail'],
        'template' => [
            ['core/paragraph', ['placeholder' => 'Enter restaurant details here...']],
        ],
        'template_lock' => false,
    ]);
}
add_action('init', 'register_custom_post_type_restaurants');
?>
