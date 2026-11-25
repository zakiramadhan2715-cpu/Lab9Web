<?php
$nama = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
}
?>
<section>
    <h2>Tambah Produk</h2>
    <form method="post" action="index.php?page=produk/add">
        <label>Nama produk</label>
        <input type="text" name="nama" required>
        <button type="submit">Simpan</button>
    </form>
    <?php if ($nama !== ''): ?>
        <p>Produk "<?= e($nama) ?>" diterima (demo, belum disimpan ke database).</p>
    <?php endif; ?>
</section>
