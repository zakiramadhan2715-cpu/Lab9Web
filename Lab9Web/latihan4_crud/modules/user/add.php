<?php
$nama = '';
$email = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (!csrfValid()) {
        $error = 'Token keamanan tidak valid. Muat ulang halaman.';
    } elseif ($nama === '' || mb_strlen($nama) > 100) {
        $error = 'Nama wajib diisi (maksimal 100 karakter).';
    } elseif (!validasiEmail($email)) {
        $error = 'Format email tidak valid.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        $stmt->execute(['nama' => $nama, 'email' => $email]);
        setFlash('sukses', 'Pengguna berhasil ditambahkan.');
        redirect('user/list');
    }
}
?>
<section>
    <h2>Tambah Pengguna</h2>
    <?php if ($error !== ''): ?>
        <div class="alert gagal"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= e(url('user/add')) ?>">
        <?= csrfField() ?>
        <p><label>Nama<br><input type="text" name="nama" value="<?= e($nama) ?>" required></label></p>
        <p><label>Email<br><input type="email" name="email" value="<?= e($email) ?>" required></label></p>
        <button type="submit">Simpan</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>
