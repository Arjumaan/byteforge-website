<?php
// config.php - Loaded from .env
require_once __DIR__ . '/env_loader.php';

return (object) [
    'admin_user' => 'admin',
    'admin_password' => $_ENV['ADMIN_PASSWORD'] ?? 'Admin123',
    'site_email' => 'byteforge.groups@gmail.com',
    'assets_dir' => __DIR__ . '/assets',
    'data_dir' => __DIR__ . '/data',
    'db_host' => $_ENV['DB_HOST'] ?? 'localhost',
    'db_name' => $_ENV['DB_NAME'] ?? 'byteforge',
    'db_user' => $_ENV['DB_USER'] ?? 'root',
    'db_pass' => $_ENV['DB_PASS'] ?? '',
];
