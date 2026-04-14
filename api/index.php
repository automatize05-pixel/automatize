<?php
/**
 * Automatize+ - Router Principal
 * Tudo passa por aqui. O Vercel empacota todos os arquivos nesta única Lambda.
 */

$root = dirname(__DIR__);
$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri  = rtrim($uri, '/') ?: '/';

// Mapeamento de rotas para arquivos
$routes = [
    '/'                      => $root . '/index.php',
    '/index'                 => $root . '/index.php',
    '/index.php'             => $root . '/index.php',
    '/services'              => $root . '/pages/services.php',
    '/pages/services.php'    => $root . '/pages/services.php',
    '/portfolio'             => $root . '/pages/portfolio.php',
    '/pages/portfolio.php'   => $root . '/pages/portfolio.php',
    '/about'                 => $root . '/pages/about.php',
    '/pages/about.php'       => $root . '/pages/about.php',
    '/faq'                   => $root . '/pages/faq.php',
    '/pages/faq.php'         => $root . '/pages/faq.php',
    '/contact'               => $root . '/pages/contact.php',
    '/pages/contact.php'     => $root . '/pages/contact.php',
    '/service-detail'        => $root . '/pages/service-detail.php',
    '/pages/service-detail.php' => $root . '/pages/service-detail.php',
];

if (isset($routes[$uri])) {
    require $routes[$uri];
} else {
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
}
