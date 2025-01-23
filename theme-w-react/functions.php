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
    $handle = 'react-script';
    $script_name = 'index';
    $data = array('postId' => get_the_ID());

    wp_enqueue_script(
        $handle,
        get_template_directory_uri() . '/bundled/js/' . $script_name . '.js',
        array(),
        null,
        true
    );

    wp_localize_script(
        $handle,
        'WPData',
        $data
    );

    add_filter('script_loader_tag', function ($tag, $current_handle, $src) use ($handle) {
        if ($current_handle === $handle) {
            return '<script type="module" src="' . esc_url($src) . '"></script>';
        }
        return $tag;
    }, 10, 3);
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
