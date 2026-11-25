<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Router Aman</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Router Aman</h1>
        <p>Satu pintu masuk: index.php?page=...</p>
    </header>
    <nav>
        <a class="<?= navClass('dashboard', $page) ?>" href="index.php?page=dashboard">Dashboard</a>
        <a class="<?= navClass('about', $page) ?>" href="index.php?page=about">Tentang</a>
        <a class="<?= navClass('kontak', $page) ?>" href="index.php?page=kontak">Kontak</a>
        <a class="<?= navClass('produk/list', $page) ?>" href="index.php?page=produk/list">Produk</a>
        <a class="<?= navClass('produk/add', $page) ?>" href="index.php?page=produk/add">Tambah Produk</a>
    </nav>
    <main>
