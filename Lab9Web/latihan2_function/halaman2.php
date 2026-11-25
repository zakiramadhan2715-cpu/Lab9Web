<?php
require_once __DIR__ . '/helpers/functions.php';

$email = '';
$pesan = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pesan = validasiEmail($email)
        ? 'Email valid.'
        : 'Format email tidak valid.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman 2 - Validasi Email</title>
    <style>body{font-family:Arial,sans-serif;max-width:700px;margin:30px auto;padding:0 16px}</style>
</head>
<body>
    <h1>Validasi Email</h1>
    <form method="post">
        <input type="text" name="email" value="<?= e($email) ?>" placeholder="nama@contoh.com">
        <button type="submit">Cek</button>
    </form>
    <?php if ($pesan !== ''): ?>
        <p><?= e($pesan) ?></p>
    <?php endif; ?>

    <h2>Contoh format rupiah</h2>
    <ul>
        <li><?= formatRupiah(5000) ?></li>
        <li><?= formatRupiah(1250000) ?></li>
    </ul>

    <p><a href="halaman1.php">Ke Halaman 1</a></p>
</body>
</html>
