<?php
// $base vem do header.php que já foi incluído antes
?>
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-col">
                <h4>Automatize+</h4>
                <p>Agência digital focada em criar soluções web modernas e de alta conversão para empreendedores e negócios em Angola.</p>
            </div>
            <div class="footer-col">
                <h4>Links Rápidos</h4>
                <a href="<?= $base ?>/">Início</a>
                <a href="<?= $base ?>/pages/services.php">Serviços</a>
                <a href="<?= $base ?>/pages/portfolio.php">Portfólio</a>
                <a href="<?= $base ?>/pages/about.php">Sobre Nós</a>
            </div>
            <div class="footer-col">
                <h4>Contato</h4>
                <p><i class="fab fa-whatsapp"></i> +244 935 043 421</p>
                <p><i class="fas fa-envelope"></i> automatizemais@outlook.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Angola</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Automatize+. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/244935043421?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20as%20soluções%20da%20Automatize+." target="_blank" class="wa-btn" rel="noopener noreferrer">
    <i class="fab fa-whatsapp"></i>
</a>

</body>
</html>
