<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/menu-styles.css">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <nav class="header-buttons">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principal',
                'container' => false,
                'menu_class' => 'nav-menu',
            ));
            ?>
        </nav>
    </div>
</header>

<?php if (is_active_sidebar('widget-global')) : ?>
<div class="widget-global-container">
    <div class="container">
        <?php dynamic_sidebar('widget-global'); ?>
    </div>
</div>
<?php endif; ?>