<?php
$users = $pdo->query('SELECT id, nama, email FROM users ORDER BY id DESC')->fetchAll();
?>
<section>
    <h2>Data Pengguna</h2>
    <?php if (isLoggedIn()): ?>
        <p><a href="<?= e(url('user/add')) ?>">+ Tambah Pengguna</a></p>
    <?php else: ?>
        <p><small>Login untuk menambah, mengubah, atau menghapus data.</small></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr><th>No</th><th>Nama</th><th>Email</th><?php if (isLoggedIn()): ?><th>Aksi</th><?php endif; ?></tr>
        </thead>
        <tbody>
        <?php if (!$users): ?>
            <tr><td colspan="4">Belum ada data.</td></tr>
        <?php endif; ?>
        <?php foreach ($users as $i => $u): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= e($u['nama']) ?></td>
                <td><?= e($u['email']) ?></td>
                <?php if (isLoggedIn()): ?>
                <td>
                    <a href="<?= e(url('user/edit', ['id' => (int) $u['id']])) ?>">Ubah</a> |
                    <form class="inline" method="post" action="<?= e(url('user/delete')) ?>"
                          onsubmit="return confirm('Hapus data ini?');">
                        <?= csrfField() ?>
                        <input type="hidden" name="id" value="<?= (int) $u['id'] ?>">
                        <button class="link-btn" type="submit">Hapus</button>
                    </form>
                </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
