<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<main class="site-main contact-page">
    <div class="main-container">
        <div class="content-wrapper">
            <h1 class="main-title">Contacto</h1>
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="contact-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>

            <div class="contact-form-wrapper">
                <?php echo do_shortcode('[contact-form-7 id="309e67e" title="Formulario de contacto"]'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

