<?php
// config.php - change admin_password before public use
return (object) [
    'admin_user' => 'admin',
    'admin_password' => 'Admin123', // CHANGE THIS IMMEDIATELY FOR SECURITY! This password is used for admin panel access in admin/registrations.php.
    'site_email' => 'byteforge.groups@gmail.com',
    'assets_dir' => __DIR__ . '/assets',
    'data_dir' => __DIR__ . '/data',
    'db_host' => 'localhost',
    'db_name' => 'byteforge',
    'db_user' => 'root',
    'db_pass' => '',
];
