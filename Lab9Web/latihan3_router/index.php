<?php
require_once __DIR__ . '/helpers/functions.php';

// Whitelist rute: hanya halaman di sini yang boleh diakses.
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'about'       => __DIR__ . '/modules/pages/about.php',
    'kontak'      => __DIR__ . '/modules/pages/kontak.php',
    'produk/list' => __DIR__ . '/modules/produk/list.php',
    'produk/add'  => __DIR__ . '/modules/produk/add.php',
];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $page = '404';
    $contentFile = __DIR__ . '/views/404.php';
} else {
    $contentFile = $routes[$page];
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
