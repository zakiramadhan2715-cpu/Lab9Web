<?php
/**
 * Library function untuk Latihan 2.
 * Dimuat dengan require_once agar tidak dideklarasikan berulang.
 */

// Escaping output HTML
function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// 150000 -> "Rp 150.000"
function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Menghitung nominal diskon (bukan harga akhir)
function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

// Validasi format email, mengembalikan true/false
function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Memotong teks panjang dan menambahkan "..."
function ringkasTeks(string $teks, int $maks = 50): string
{
    if (mb_strlen($teks) <= $maks) {
        return $teks;
    }
    return rtrim(mb_substr($teks, 0, $maks)) . '...';
}

// Latihan function bagian E
function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai >= 85) return 'A';
    if ($nilai >= 70) return 'B';
    if ($nilai >= 55) return 'C';
    if ($nilai >= 40) return 'D';
    return 'E';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}
