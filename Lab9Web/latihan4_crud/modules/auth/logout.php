<?php
// Logout hanya lewat POST + CSRF
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrfValid()) {
    setFlash('gagal', 'Permintaan logout tidak valid.');
    redirect('dashboard');
}

unset($_SESSION['login'], $_SESSION['username']);
session_regenerate_id(true);
setFlash('sukses', 'Anda sudah logout.');
redirect('dashboard');
