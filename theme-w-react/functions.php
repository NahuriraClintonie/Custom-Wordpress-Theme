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



/**
 * Enqueue React script and localize WordPress data for use in React.
 */
function enqueue_react_script() {
    // Get the current post ID
    $post_id = get_the_ID();

    // Retrieve custom fields for the current page
    $page_custom_fields = get_custom_fields_for_page($post_id);

    // Retrieve related restaurants using Pods
    $restaurants_pod = pods('page', $post_id);
    $restaurants = $restaurants_pod->field('restaurants'); // Get related restaurant IDs

    // Initialize an array to store formatted restaurant data
    $restaurant_data = [];

    // Process each restaurant ID and fetch its details
    if (!empty($restaurants)) {
        foreach ($restaurants as $restaurant) {
            // Ensure we correctly extract the restaurant ID
            $restaurant_id = is_array($restaurant) ? reset($restaurant) : $restaurant;

            // Validate that the restaurant ID is numeric before fetching data
            if (is_numeric($restaurant_id)) {
                $restaurant_data[] = get_custom_fields_for_restaurant($restaurant_id);
            }
        }
    }

    // Structure data to be passed to the React frontend
    $data = [
        'postId' => (string) $post_id, // Ensure post ID is a string
        'pageData' => [
            'page_name' => $page_custom_fields['page_name'],
            'page_description' => $page_custom_fields['page_description'],
        ],
        'restaurants' => $restaurant_data // Array of structured restaurant data
    ];

    // Enqueue the React script
    wp_enqueue_script(
        'react-script',
        get_template_directory_uri() . '/bundled/js/index.js',
        array(),
        '1.0.0',
        true
    );

    // Pass WordPress data to the React script
    wp_localize_script('react-script', 'WPData', $data);
}
add_action('wp_enqueue_scripts', 'enqueue_react_script');

/**
 * Retrieve custom fields for a given page using Pods.
 *
 * @param int $post_id The ID of the page.
 * @return array Associative array containing page custom fields.
 */
function get_custom_fields_for_page(int $post_id) {
    $pod = pods('page', $post_id);

    return [
        'page_name' => $pod->field('page_name') ?: '', // Fetch page name, fallback to empty string
        'page_description' => $pod->field('page_description') ?: '', // Fetch page description, fallback to empty
    ];
}

/**
 * Retrieve custom fields for a specific restaurant using Pods.
 *
 * @param int $restaurant_id The ID of the restaurant.
 * @return array|null Associative array containing restaurant data or null if invalid.
 */
function get_custom_fields_for_restaurant(int $restaurant_id): ?array
{
    // Validate the restaurant ID before proceeding
    if (!is_numeric($restaurant_id)) {
        return null; // Prevent further processing if ID is invalid
    }

    // Retrieve the restaurant pod instance
    $pod = pods('restaurants', $restaurant_id);

    // Fetch and return relevant fields, providing default fallbacks
    return [
        'restaurant_image' => $pod->field('restaurant_image') ?: 'No Image', // Image field
        'restaurant_rating' => $pod->field('restaurant_rating') ?: 'No rating', // Rating field
        'countries' => $pod->field('countries') ?: [], // Associated countries
        'amount' => $pod->field('amount') ?: '0.00', // Pricing information
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
