<?php
function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// Menandai menu aktif berdasarkan rute yang sedang dibuka
function navClass(string $route, string $current): string
{
    return $route === $current ? 'active' : '';
}
