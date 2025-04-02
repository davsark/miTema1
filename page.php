<?php
/**
* Plantilla para todas las páginas
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

get_header(); ?>

<main class="site-main contact-page">
    <div class="main-container">
        <div class="content-wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="main-title"><?php the_title(); ?></h1>
                    
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
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

.page-content {
    color: #666;
    font-size: 1.1em;
    line-height: 1.6;
    margin-bottom: 40px;
}

.page-content p {
    margin-bottom: 20px;
}

.page-content img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin: 20px 0;
}

.page-content h1, 
.page-content h2, 
.page-content h3, 
.page-content h4, 
.page-content h5, 
.page-content h6 {
    color: #333;
    margin: 30px 0 20px;
}

.page-content a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.page-content a:hover {
    color: #666;
}
</style>

<?php get_footer(); ?>