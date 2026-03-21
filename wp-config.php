<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Load environment variables from .env file
$env_file = __DIR__ . '/.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        if (strpos($line, '=') === false) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if (!array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Helper function to get environment variables
function env($key, $default = '') {
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }
    // Remove quotes if present
    return trim($value, "'\"");
}

// Trust Replit reverse proxy - detect HTTPS from proxy headers
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}
if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}

// Dynamic site URL based on request host for Replit compatibility
$site_host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost:5000');
$site_scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$site_url = $site_scheme . '://' . $site_host;

define('WP_HOME', env('WP_HOME', $site_url));
define('WP_SITEURL', env('WP_SITEURL', $site_url));

// ** SQLite / MySQL settings ** //
// Using SQLite via the sqlite-database-integration plugin drop-in
define('DB_ENGINE', 'sqlite');
define('DB_DIR', ABSPATH . 'wp-content/database/');
define('DB_FILE', '.ht.sqlite');

// MySQL settings (unused when SQLite is active, but defined to avoid errors)
define('DB_NAME', env('DB_NAME', 'wordpress'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASSWORD', env('DB_PASSWORD', ''));
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_CHARSET', env('DB_CHARSET', 'utf8'));
define('DB_COLLATE', env('DB_COLLATE', ''));

/**#@+
 * Authentication keys and salts.
 * @since 2.6.0
 */
define('AUTH_KEY',         env('AUTH_KEY',         'replit-auth-key-unique-xk2p9mq7'));
define('SECURE_AUTH_KEY',  env('SECURE_AUTH_KEY',  'replit-secure-auth-key-n4r8vw3j'));
define('LOGGED_IN_KEY',    env('LOGGED_IN_KEY',    'replit-logged-in-key-h7t2ys6m'));
define('NONCE_KEY',        env('NONCE_KEY',        'replit-nonce-key-c5q9px4l'));
define('AUTH_SALT',        env('AUTH_SALT',        'replit-auth-salt-w8e3uz1k'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT', 'replit-secure-auth-salt-b6f4rv2n'));
define('LOGGED_IN_SALT',   env('LOGGED_IN_SALT',   'replit-logged-in-salt-d9m5ty7q'));
define('NONCE_SALT',       env('NONCE_SALT',       'replit-nonce-salt-g3k8ws0p'));
/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * WordPress debugging mode.
 */
define('WP_DEBUG', env('WP_DEBUG', 'false') === 'true');
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

// Disable automatic updates in development
define('AUTOMATIC_UPDATER_DISABLED', true);

// Allow filesystem operations without FTP
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
