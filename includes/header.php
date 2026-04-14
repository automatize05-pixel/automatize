<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$base = $protocol . '://' . $host;
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatize+ | Agência Digital Premium</title>
    <meta name="description" content="Agência digital em Angola. Desenvolvimento de Sites, Landing Pages, E-commerce, Chatbots e Sistemas Sob Medida.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <script src="<?= $base ?>/assets/js/main.js" defer></script>
</head>
<body>

<header class="header">
    <div class="container">
        <div class="logo">
            <a href="<?= $base ?>/">Automatize<span>+</span></a>
        </div>
        <nav class="nav">
            <div class="mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-links">
                <li><a href="<?= $base ?>/">Início</a></li>
                <li><a href="<?= $base ?>/pages/services.php">Serviços</a></li>
                <li><a href="<?= $base ?>/pages/portfolio.php">Portfólio</a></li>
                <li><a href="<?= $base ?>/pages/about.php">Sobre Nós</a></li>
                <li><a href="<?= $base ?>/pages/faq.php">FAQ</a></li>
                <li><a href="<?= $base ?>/pages/contact.php" class="btn btn-primary" style="padding: 10px 25px; margin-left: 10px;">Contato</a></li>
            </ul>
        </nav>
    </div>
</header>
