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