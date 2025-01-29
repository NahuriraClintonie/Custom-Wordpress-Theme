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
    $post_id = get_the_ID();

    // Fetch the page custom fields using Pods
    $page_custom_fields = get_custom_fields_for_page($post_id);

    // Fetch related restaurants using Pods
    $restaurants_pod = pods('page', $post_id);
    $restaurants = $restaurants_pod->field('restaurants'); // Get related restaurants

    $restaurant_data = [];
    if (!empty($restaurants)) {
        foreach ($restaurants as $restaurant_id) {
            $restaurant_data[] = get_custom_fields_for_restaurant($restaurant_id);
        }
    }

    // Prepare data for JavaScript
    $data = [
        'postId' => (string) $post_id,
        'pageData' => [
            'page_name' => $page_custom_fields['page_name'],
            'page_description' => $page_custom_fields['page_description'],
        ],
        'restaurants' => $restaurant_data
    ];

    // Enqueue React script first
    wp_enqueue_script(
        'react-script',
        get_template_directory_uri() . '/bundled/js/index.js',
        array(),
        '1.0.0',
        true
    );

    // Localize script AFTER enqueuing React
    wp_localize_script('react-script', 'WPData', $data);

    // Debug output
    error_log(print_r($data, true));
}
add_action('wp_enqueue_scripts', 'enqueue_react_script');


// Fetch custom fields for Page using Pods
function get_custom_fields_for_page($post_id) {
    $pod = pods('page', $post_id);

    return [
        'page_name' => $pod->field('page_name') ?: '',
        'page_description' => $pod->field('page_description') ?: '',
    ];
}

// Fetch custom fields for Restaurant using Pods
function get_custom_fields_for_restaurant($post_id) {
    $pod = pods('restaurants', $post_id);

    return [
        'post_title' => get_the_title($post_id) ?: 'No title',
        'restaurant_image' => get_the_guid($pod->field('restaurant_image')) ?: 'No Image',
        'restaurant_rating' => $pod->field('restaurant_rating') ?: 'no rating',
        'countries' => $pod->field('countries') ?: [],
        'amount' => $pod->field('amount') ?: 'no money',
    ];
}






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
