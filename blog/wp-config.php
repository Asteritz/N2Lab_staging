<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i9748004_tyoi1' );

/** Database username */
define( 'DB_USER', 'i9748004_tyoi1' );

/** Database password */
define( 'DB_PASSWORD', 'U.zaAFRAD6h9TJiNHGV03' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'npYhyFOTv6X2vL87sc8h0oeBKB0rheL32mHQIdiAxMTeCbf3FhQfoe1ORrBDTHPF');
define('SECURE_AUTH_KEY',  'NFoR3vDvW3zt8gXrSlMGPBsrvnJv3SrADC1njbIc5jdzEudBd0VmjOrUC4apyKfY');
define('LOGGED_IN_KEY',    'oyUxdgRliC48WYDlfjCaOBgXHFtL2WqqSjDljvTrMOm1YfdjROU6fY4hsXS2SW16');
define('NONCE_KEY',        '7ABDp8a8VF3UeVCrKB0MKVf6ifYnnL7mSxlktZx7DAlsd0jMffk6pphyg7abqBQg');
define('AUTH_SALT',        'rypSy8Is8yqTc9rNwXiZdkXPLlHLsTylIR2VMR9lQOBZYtI4GuYPjfinWTRdjWZD');
define('SECURE_AUTH_SALT', 'l2jWanyCSbq67LdlhQnnCpNhHaLN1vdCqqPlWHaBi4AauTVV3SjxxFt1uaG9LhOW');
define('LOGGED_IN_SALT',   '7Kfm1VTj1Z4O2KFnzoycgFfRtNWXEYXPVV76an6aeMiRhGOWkR40VIHypray9ii6');
define('NONCE_SALT',       'ntYCuyLCT6VrzvCx0go5AJuIz6oylhSahR9dzjrkB3KZJoHa4ogHJ0kVlb3mEOqI');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Multi-site
 *
 */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
$base = '/blog/';
define('DOMAIN_CURRENT_SITE', 'n2lab.io');
define('PATH_CURRENT_SITE', '/blog/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);



/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'xz81_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
