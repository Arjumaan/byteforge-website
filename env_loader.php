<?php
function loadEnv($path)
{
    if (!file_exists($path)) return;

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // skip comments
        if (strpos(trim($line), '#') === 0) continue;

        // split KEY=VALUE
        list($name, $value) = array_map('trim', explode('=', $line, 2));

        // remove surrounding quotes
        $value = trim($value, "\"'");

        // store in superglobals
        $_ENV[$name] = $value;
        putenv("$name=$value");
    }
}
loadEnv(__DIR__ . '/.env');
?>