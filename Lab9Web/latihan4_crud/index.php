<?php
session_start();
ob_start(); // supaya redirect() tetap bisa jalan walau header.php sudah dimuat

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

// Whitelist rute
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'login'       => __DIR__ . '/modules/auth/login.php',
    'logout'      => __DIR__ . '/modules/auth/logout.php',
    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
];

// Rute yang hanya boleh diakses setelah login
$protected = ['user/add', 'user/edit', 'user/delete'];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $page = '404';
    $contentFile = __DIR__ . '/views/404.php';
} else {
    if (in_array($page, $protected, true) && !isLoggedIn()) {
        setFlash('gagal', 'Silakan login terlebih dahulu.');
        redirect('login');
    }
    $contentFile = $routes[$page];
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
ob_end_flush();
