<?php
/**
 * Template Name: Blog Page
 */

get_header(); ?>



<main class="site-main contact-page">
    <div class="main-container">
        <div class="content-wrapper">
            <h1 class="main-title">Blog</h1>
            
            <?php
            // Configurar la consulta para mostrar entradas
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish', // Solo posts publicados
                'posts_per_page' => 5,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC',
                'ignore_sticky_posts' => true
            );
            
            $blog_query = new WP_Query($args);
            
            if ($blog_query->have_posts()) : 
                while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <article class="blog-post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="post-author">Por <?php the_author(); ?></span>
                            <?php if (has_category()) : ?>
                                <span class="post-categories"><?php the_category(', '); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="post-content">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                    </article>
                <?php endwhile; ?>
                
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Siguiente &raquo;',
                        'type' => 'list'
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                <p class="no-posts">No hay entradas en el blog. Por favor, crea algunas entradas en el panel de administración.</p>
            <?php endif; 
            
            wp_reset_postdata(); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>

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

/* Estilos para los posts del blog */
.blog-post {
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.blog-post:last-child {
    border-bottom: none;
}

.post-thumbnail {
    margin-bottom: 20px;
}

.post-thumbnail img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.post-title {
    color: #333;
    font-size: 1.8em;
    margin-bottom: 15px;
}

.post-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-title a:hover {
    color: #666;
}

.post-meta {
    color: #666;
    font-size: 0.9em;
    margin-bottom: 15px;
}

.post-meta span {
    margin-right: 15px;
}

.post-categories a {
    color: #666;
    text-decoration: none;
}

.post-categories a:hover {
    color: #333;
}

.post-content {
    color: #666;
    font-size: 1.1em;
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more {
    display: inline-block;
    background-color: #333;
    color: white;
    padding: 8px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.read-more:hover {
    background-color: #444;
}

/* Estilos para la paginación */
.pagination {
    margin-top: 40px;
    text-align: center;
}

.pagination .page-numbers {
    display: inline-block;
    padding: 8px 15px;
    margin: 0 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination .page-numbers.current {
    background-color: #333;
    color: white;
    border-color: #333;
}

.pagination .page-numbers:hover:not(.current) {
    background-color: #f5f5f5;
}

.no-posts {
    text-align: center;
    color: #666;
    font-size: 1.2em;
    padding: 40px 0;
}
</style>

<?php get_footer(); ?> 