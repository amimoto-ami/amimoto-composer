<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
require_once( dirname(__FILE__).'/local-config.php' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
require_once( dirname(__FILE__).'/local-salt.php' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '<%= @table_prefix %>';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( ! defined('WP_DEBUG') ) {
    define('WP_DEBUG', false);
}
//define('WP_DEBUG', true);
//define('SAVEQUERIES', true);
//define('WP_DEBUG_DISPLAY', false);

/**
 * Multisite Settings
 */
<% if @wp_multisite %>
define ('WP_ALLOW_MULTISITE', true);
<% else %>
// define ('WP_ALLOW_MULTISITE', true);
<% end %>
//
// define('MULTISITE', true);
// define('SUBDOMAIN_INSTALL', false);
// define('DOMAIN_CURRENT_SITE', '<%= @servername %>');
// define('PATH_CURRENT_SITE', '/');
// define('SITE_ID_CURRENT_SITE', 1);
// define('BLOG_ID_CURRENT_SITE', 1);

/**
 * For VaultPress
 */
define( 'VAULTPRESS_DISABLE_FIREWALL', true );
if ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
   $forwarded_ips = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
   $_SERVER['REMOTE_ADDR'] = $forwarded_ips[0];
   unset( $forwarded_ips );
}

/**
 * For Nginx Cache Controller
 */
define('IS_AMIMOTO', true);
define('NCC_CACHE_DIR', '/var/cache/nginx/proxy_cache');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
