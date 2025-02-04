<?php
/**
 * The header for the theme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>
<header id="header">
    <?php
    // Get the ID of the page set as the homepage
    $homepage_id = get_option('page_on_front');
    // Get the slug of the homepage
    $homepage_slug = get_post_field('post_name', $homepage_id);

    // Generate the URL
    $homepage_url = get_permalink($homepage_id);
    ?>

    <nav>
        <ul>
            <li><a href="<?php echo esc_url($homepage_url); ?>">Restaurant</a></li>
        </ul>
    </nav>
</header>
