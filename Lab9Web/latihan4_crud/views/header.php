<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= e(baseUrl()) ?>">
    <title>CRUD Modular</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>CRUD Pengguna Modular</h1>
        <p>Template bersama + router whitelist + login</p>
    </header>
    <nav>
        <a class="<?= $page === 'dashboard' ? 'active' : '' ?>" href="<?= e(url('dashboard')) ?>">Dashboard</a>
        <a class="<?= navClass('user/', $page) ?>" href="<?= e(url('user/list')) ?>">Pengguna</a>
        <?php if (isLoggedIn()): ?>
            <form class="inline" method="post" action="<?= e(url('logout')) ?>">
                <?= csrfField() ?>
                <button class="link-btn" type="submit">Logout (<?= e($_SESSION['username'] ?? '') ?>)</button>
            </form>
        <?php else: ?>
            <a class="<?= $page === 'login' ? 'active' : '' ?>" href="<?= e(url('login')) ?>">Login</a>
        <?php endif; ?>
    </nav>
    <main>
        <?php tampilkanFlash(); ?>
