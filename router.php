<?php
/**
 * PHP built-in server router for WordPress.
 * Handles URL rewriting like mod_rewrite does for WordPress.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve existing files directly (images, CSS, JS, etc.)
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Route everything else through WordPress index.php
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';
require_once __DIR__ . '/index.php';
