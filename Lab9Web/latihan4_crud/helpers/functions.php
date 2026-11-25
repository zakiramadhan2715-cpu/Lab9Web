<?php
function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// Alamat dasar aplikasi, misal /Lab9Web/latihan4_crud/
function baseUrl(): string
{
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    return $dir . '/';
}

// Membuat URL sesuai mode (URL bersih atau index.php?page=)
function url(string $page, array $params = []): string
{
    $q = http_build_query($params);
    if (CLEAN_URL) {
        return $page . ($q !== '' ? '?' . $q : '');
    }
    return 'index.php?page=' . $page . ($q !== '' ? '&' . $q : '');
}

function navClass(string $route, string $current): string
{
    return str_starts_with($current, $route) ? 'active' : '';
}

function redirect(string $page): void
{
    header('Location: ' . baseUrl() . url($page));
    exit;
}

// Pesan sukses/gagal (flash message)
function setFlash(string $tipe, string $pesan): void
{
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilkanFlash(): void
{
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        echo '<div class="alert ' . e($f['tipe']) . '">' . e($f['pesan']) . '</div>';
    }
}

// Perlindungan CSRF
function csrfToken(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfField(): string
{
    return '<input type="hidden" name="csrf" value="' . e(csrfToken()) . '">';
}

function csrfValid(): bool
{
    $kirim = $_POST['csrf'] ?? '';
    return is_string($kirim) && hash_equals($_SESSION['csrf'] ?? '', $kirim);
}

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Autentikasi
function isLoggedIn(): bool
{
    return !empty($_SESSION['login']);
}
