<?php
session_start();
$config = require __DIR__ . '/../config.php';
$regFile = $config->data_dir . '/registrations.json';

$error = '';
if (isset($_POST['password'])) {
    if ($_POST['password'] === $config->admin_password) {
        $_SESSION['admin'] = true;
    } else $error = 'Invalid password';
}
if (isset($_GET['logout'])) {
    unset($_SESSION['admin']);
    header('Location: registrations.php');
    exit;
}
if (empty($_SESSION['admin'])) {
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Admin Login</title>
        <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <main class="container admin-login">
            <h1>Admin — ByteForge</h1>
            <?php if ($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
            <form method="post"><input name="password" type="password" placeholder="Admin password" required>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
            <p><a href="../index.php">Back to site</a></p>
        </main>
    </body>

    </html><?php exit;
        }

        // load registrations
        $all = [];
        if (file_exists($regFile)) $all = json_decode(file_get_contents($regFile), true) ?: [];

        // search filter
        $q = trim($_GET['q'] ?? '');
        if ($q !== '') {
            $qL = strtolower($q);
            $all = array_filter($all, function ($r) use ($qL) {
                return strpos(strtolower($r['name'] ?? ''), $qL) !== false
                    || strpos(strtolower($r['email'] ?? ''), $qL) !== false
                    || strpos(strtolower($r['event_id'] ?? ''), $qL) !== false;
            });
        }

        // pagination
        $total = count($all);
        $perPage = 12;
        $page = max(1, (int)($_GET['page'] ?? 1));
        $pages = max(1, ceil($total / $perPage));
        $start = ($page - 1) * $perPage;
        $rows = array_slice(array_reverse($all), $start, $perPage);

        // csv export
        if (isset($_GET['export']) && $_GET['export'] === 'csv') {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="registrations-' . date('Ymd') . '.csv"');
            $out = fopen('php://output', 'w');
            $keys = ['id', 'event_id', 'name', 'email', 'department', 'year', 'role', 'phone', 'why', 'created_at'];
            fputcsv($out, $keys);
            foreach (array_reverse($all) as $r) {
                $row = [];
                foreach ($keys as $k) $row[] = $r[$k] ?? '';
                fputcsv($out, $row);
            }
            exit;
        }
            ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin — Registrations</title>
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header class="header">
        <div class="logo-container">
            <h1 class="site-title">BYTE FORGE</h1>
        </div>
        <div class="header-inner">
            <div class="nav-container">
                <nav class="nav">
                    <a href="../index.php">Site</a>
                    <a href="registrations.php?logout=1">Logout</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="container admin-panel">
        <h1>Event Registrations</h1>

        <form method="get" class="admin-search">
            <input name="q" placeholder="Search by name, email, event id" value="<?= htmlspecialchars($q) ?>">
            <button class="btn btn-primary" type="submit">Search</button>
            <a class="btn btn-outline" href="registrations.php">Clear</a>
            <a class="btn" href="registrations.php?export=csv">Export CSV</a>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Dept</th>
                    <th>Year</th>
                    <th>Role</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['id']) ?></td>
                        <td><?= htmlspecialchars($r['event_id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['name'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['email'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['department'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['year'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['role'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['created_at'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination"><?php for ($p = 1; $p <= $pages; $p++): ?>
                <a class="page <?= ($p == $page ? 'active' : '') ?>" href="?<?=
                                                                            http_build_query(array_merge($_GET, ['page' => $p]))
                                                                            ?>"><?= $p ?></a>
            <?php endfor; ?>
        </div>
    </main>
</body>

</html>