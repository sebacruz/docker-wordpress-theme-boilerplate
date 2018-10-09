<?php

/**
 * Configuration overrides for WP_ENV === 'development'
 */
define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', true);

ini_set('display_errors', 1);

// Enable plugin and theme updates and installation from the admin
define('DISALLOW_FILE_MODS', false);
