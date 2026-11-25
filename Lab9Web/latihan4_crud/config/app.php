<?php
// true  : URL bersih  -> /user/list      (butuh mod_rewrite + .htaccess aktif)
// false : URL biasa   -> index.php?page=user/list
define('CLEAN_URL', true);

// Akun admin sederhana untuk demo (password: admin123).
// Hash dibuat dengan: php -r 'echo password_hash("admin123", PASSWORD_DEFAULT);'
define('ADMIN_USER', 'admin');
define('ADMIN_PASS_HASH', '$2y$10$y7yU8n3gi9Z8/8OHhPzg1.g4Ou7NEgQzhOFZMLBl0dytuJ39ZbpaO');
