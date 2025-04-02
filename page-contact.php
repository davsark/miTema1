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
}

.contact-form-wrapper {
    max-width: 600px;
    margin: 0 auto;
}

/* Estilos para el formulario de contacto */
.contact-form-wrapper input[type="text"],
.contact-form-wrapper input[type="email"],
.contact-form-wrapper input[type="tel"],
.contact-form-wrapper textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.contact-form-wrapper textarea {
    min-height: 150px;
    resize: vertical;
}

.contact-form-wrapper input[type="submit"] {
    background-color: #333;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.contact-form-wrapper input[type="submit"]:hover {
    background-color: #444;
}

/* Estilos para los mensajes de error y éxito */
.contact-form-wrapper .wpcf7-response-output {
    margin: 20px 0;
    padding: 15px;
    border-radius: 5px;
}

.contact-form-wrapper .wpcf7-mail-sent-ok {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.contact-form-wrapper .wpcf7-validation-errors {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>

<?php get_footer(); ?>

