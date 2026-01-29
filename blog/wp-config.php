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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'z*wDU#a].UL*eu1R#KRyA6{e%<@xn=ORIdupEj@T||ic%+sn`?+~q><p:ZrU>D/E' );
define( 'SECURE_AUTH_KEY',  '0Jh(KvLxybi6)KN$+^*uZfBWJg>XHl&45<ztLG%)(<z1TJ}@C&ZcCl@|*|bNifn4' );
define( 'LOGGED_IN_KEY',    'kD9JZ4 2/f,u6u^(e~_;D+Mtx(?rRll<LuaRYa0+qg}#}^fRf;d}&S8Qh,Hlgjy_' );
define( 'NONCE_KEY',        '940+jy4>eU,MkV~ogtlg]vEsC>JJ3iX%PSttgNjdU&1iNTAW&}g8&f:M%7h5ctW7' );
define( 'AUTH_SALT',        'Lu4)A]@QKkS_c,{nt2oHCLd*a(s,RqYdS>feS]@<%_m*e01en ;4)j1h8N]7oH5X' );
define( 'SECURE_AUTH_SALT', ';p51:;)NzsGL3Etra`*k{6lh.6QWn~ZW/i0(rpDXd%}-)!Gh^Z@26s$5Y?KC0Q.?' );
define( 'LOGGED_IN_SALT',   '@$CCV)}%?-=~+y4.oiA]}G]X,U9;cCb2eezD%1mx:~s$ PEo/pV>yihdN@w}UfP7' );
define( 'NONCE_SALT',       'eK|M(NC5A;Ze^+Jz_/_wRBJts{(MF0cISKq[b[|j90YUW0JJ-ES^i@jI,2y.3{ta' );

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
$table_prefix = 'wp_';

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
