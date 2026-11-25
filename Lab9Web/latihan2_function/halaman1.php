<?php
require_once __DIR__ . '/helpers/functions.php';

$harga  = 200000;
$jumlah = 3;
$diskon = hitungDiskon($harga * $jumlah, 15);
$total  = hitungTotal($harga, $jumlah) - $diskon;
$deskripsi = 'Laptop untuk kebutuhan kuliah dengan prosesor cepat, RAM besar, dan baterai awet seharian.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman 1 - Belanja</title>
    <style>body{font-family:Arial,sans-serif;max-width:700px;margin:30px auto;padding:0 16px}</style>
</head>
<body>
    <h1>Simulasi Belanja</h1>
    <p>Harga satuan: <?= formatRupiah($harga) ?></p>
    <p>Jumlah: <?= $jumlah ?></p>
    <p>Diskon 15%: <?= formatRupiah($diskon) ?></p>
    <p><strong>Total bayar: <?= formatRupiah($total) ?></strong></p>
    <p>Deskripsi singkat: <?= e(ringkasTeks($deskripsi, 40)) ?></p>

    <h2>Konversi Suhu &amp; Nilai</h2>
    <p>36 &deg;C = <?= konversiCelciusKeFahrenheit(36) ?> &deg;F</p>
    <p>Nilai 78 = predikat <?= tentukanStatusNilai(78) ?></p>

    <p><a href="halaman2.php">Ke Halaman 2</a></p>
</body>
</html>
