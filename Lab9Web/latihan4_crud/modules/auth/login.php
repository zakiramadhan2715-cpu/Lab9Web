<?php
if (isLoggedIn()) {
    redirect('user/list');
}

$username = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = (string) ($_POST['password'] ?? '');

    if (!csrfValid()) {
        $error = 'Token keamanan tidak valid. Muat ulang halaman.';
    } elseif (hash_equals(ADMIN_USER, $username) && password_verify($password, ADMIN_PASS_HASH)) {
        session_regenerate_id(true); // cegah session fixation
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        setFlash('sukses', 'Login berhasil.');
        redirect('user/list');
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<section>
    <h2>Login</h2>
    <?php if ($error !== ''): ?>
        <div class="alert gagal"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= e(url('login')) ?>">
        <?= csrfField() ?>
        <p><label>Username<br><input type="text" name="username" value="<?= e($username) ?>" required></label></p>
        <p><label>Password<br><input type="password" name="password" required></label></p>
        <button type="submit">Masuk</button>
    </form>
    <p><small>Demo: username <code>admin</code>, password <code>admin123</code></small></p>
</section>
