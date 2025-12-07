<?php
$config = require __DIR__ . '/config.php';

function s($v)
{
    return htmlspecialchars(trim($v), ENT_QUOTES);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: events.php');
    exit;
}

$entry = [
    'event_id' => s($_POST['event_id'] ?? ''),
    'name' => s($_POST['name'] ?? ''),
    'email' => s($_POST['email'] ?? ''),
    'department' => s($_POST['department'] ?? ''),
    'year' => s($_POST['year'] ?? ''),
    'phone' => s($_POST['phone'] ?? ''),
    'role' => s($_POST['role'] ?? 'participant'),
    'why' => s($_POST['why'] ?? ''),
];

if (empty($entry['event_id']) || empty($entry['name']) || empty($entry['email'])) {
    header('Location: events.php?error=missing');
    exit;
}

try {
    $pdo = new PDO("mysql:host={$config->db_host};dbname={$config->db_name}", $config->db_user, $config->db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO registrations (event_id, name, email, department, year, phone, role, why) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $entry['event_id'],
        $entry['name'],
        $entry['email'],
        $entry['department'],
        $entry['year'],
        $entry['phone'],
        $entry['role'],
        $entry['why']
    ]);

    header('Location: events.php?registered=1');
    exit;
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    header('Location: events.php?error=db');
    exit;
}
