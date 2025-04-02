<?php wp_footer(); ?>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-buttons">
            <a href="http://localhost/test_wordpress/" class="footer-button">Infocoches</a>
            <a href="http://localhost/test_wordpress/index.php/sobre-nosotros/" class="footer-button">Sobre Nosotros</a>
            <a href="http://localhost/test_wordpress/index.php/formulario-de-contacto/" class="footer-button">Contacto</a>
            <a href="http://localhost/test_wordpress/index.php/blog/" class="footer-button">Blog</a>
        </div>
    </div>
</footer>
<style>
.site-footer {
    background-color: #333;
    padding: 20px 0;
    margin-top: 50px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.footer-button {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border: 2px solid white;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.footer-button:hover {
    background-color: white;
    color: #333;
}
</style>
</body>
</html>

