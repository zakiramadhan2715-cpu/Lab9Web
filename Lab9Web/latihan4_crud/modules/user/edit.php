<?php
$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    setFlash('gagal', 'ID pengguna tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = :id');
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();
if (!$user) {
    setFlash('gagal', 'Pengguna tidak ditemukan.');
    redirect('user/list');
}

$nama  = $user['nama'];
$email = $user['email'];
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
        $upd = $pdo->prepare('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $upd->execute(['nama' => $nama, 'email' => $email, 'id' => $id]);
        setFlash('sukses', 'Data pengguna berhasil diubah.');
        redirect('user/list');
    }
}
?>
<section>
    <h2>Ubah Pengguna</h2>
    <?php if ($error !== ''): ?>
        <div class="alert gagal"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= e(url('user/edit', ['id' => $id])) ?>">
        <?= csrfField() ?>
        <p><label>Nama<br><input type="text" name="nama" value="<?= e($nama) ?>" required></label></p>
        <p><label>Email<br><input type="email" name="email" value="<?= e($email) ?>" required></label></p>
        <button type="submit">Perbarui</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>
