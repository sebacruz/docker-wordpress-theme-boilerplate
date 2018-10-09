<?php

/** @var string Directory containing all of the site's files */
$root_dir = dirname(__DIR__);

/** @var string Document Root */
$webroot_dir = $root_dir . '/web';

/**
 * Use Dotenv to set required getenvironment variables and load .getenv file in root
 */
$dotgetenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotgetenv->load();
    $dotgetenv->required([
        'DB_NAME',
        'DB_USER',
        'DB_PASSWORD',
        'WP_HOME',
        'WP_SITEURL'
    ]);
}

/**
 * Set up our global getenvironment constant and load its config first
 * Default: production
 */
define('WP_ENV', getenv('WP_ENV') ?: 'production');

/**
 * URLs
 */
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

// /**
//  * Custom Content Directory
//  */
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

/**
 * Authentication Unique Keys and Salts
 */
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', getenv('DISABLE_WP_CRON') ?: false);
// Disable the plugin and theme file editor in the admin
define('DISALLOW_FILE_EDIT', true);
// Disable plugin and theme updates and installation from the admin
define('DISALLOW_FILE_MODS', true);

/**
 * Debugging Settings
 */
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
ini_set('display_errors', 0);

$getenv_config = __DIR__ . '/getenvironments/' . WP_ENV . '.php';

if (file_exists($getenv_config)) {
    require_once $getenv_config;
}

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/wp/');
}
