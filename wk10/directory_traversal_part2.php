<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = isset($_GET['q']) ? $_GET['q'] : '.';

// BONUS: Prevent file access
if (strpos($path, '.') !== false) {
    die("Access denied.");
}

// Normalize path
$path = basename($path);

// Ensure path exists and is a directory
if (!file_exists($path) || !is_dir($path)) {
    die("Invalid directory.");
}

print "<pre>";
print_r(scandir($path));
print "</pre>";
?>

