<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="header-buttons">
            <a href="http://localhost/test_wordpress/" class="header-button">Infocoches</a>
            <a href="http://localhost/test_wordpress/index.php/sobre-nosotros/" class="header-button">Sobre Nosotros</a>
            <a href="http://localhost/test_wordpress/index.php/contact/" class="header-button">Contacto</a>
            <a href="http://localhost/test_wordpress/index.php/page-blog/" class="header-button">Blog</a>
        </div>
    </div>
</header>

<style>
.site-header {
    background-color: #333;
    padding: 20px 0;
    margin-bottom: 50px;
}

.header-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.header-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.header-button {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border: 2px solid white;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.header-button:hover {
    background-color: white;
    color: #333;
}
</style>

