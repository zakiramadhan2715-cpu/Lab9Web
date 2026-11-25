<?php
$total = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
?>
<section>
    <h2>Dashboard</h2>
    <p>Total pengguna terdaftar: <strong><?= $total ?></strong></p>
    <a href="<?= e(url('user/list')) ?>">Lihat daftar pengguna</a>
</section>
