<?php defined('ABSPATH') or die('No script kiddies please!'); 

get_header(); ?>

<main class="site-main contact-page">
    <div class="main-container">
        <div class="content-wrapper">
            <h1 class="main-title">Bienvenido a Infocoches</h1>
            <div class="contact-content">
                <p>Tu portal de información sobre el mundo del automóvil</p>
            </div>
        </div>
    </div>
</main>

<style>
.contact-page {
    min-height: calc(100vh - 200px);
    padding: 40px 0;
}

.contact-page .main-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-page .content-wrapper {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 40px;
}

.contact-page .main-title {
    color: #333;
    font-size: 2.5em;
    margin-bottom: 30px;
    text-align: center;
}

.contact-content {
    color: #666;
    font-size: 1.1em;
    line-height: 1.6;
    margin-bottom: 40px;
    text-align: center;
}
</style>

<?php get_footer(); ?>