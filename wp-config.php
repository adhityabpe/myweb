<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'x:5uY4Z}+1P}RlUU2i-b9<Cc&eK?6q2c}Z+@E<;XFpg}<vqqx,JppOX9j,9+$K;3' );
define( 'SECURE_AUTH_KEY',  'MfOucufxi22QzXH OoS$rbZE8#HtBvx1Ma5hO$+(LU[|8+kwDK~FO6,/GI|%YA_p' );
define( 'LOGGED_IN_KEY',    '[<X-NP`<Md)i5$60_h&^Gok>FN4q+k{#.Aykg58<}QbgCkh[k$L/1/BGJ(2jO5UF' );
define( 'NONCE_KEY',        '|PTBI!/@}.&F|5EMEgXZKB}4vEdUHLvKG<Ni`rBM0HIZ-n9G$_44QSYx(v2nGZ1a' );
define( 'AUTH_SALT',        'ZLL*RK[JaDFsGtsq/RwK*-dKJIv5G)Ca/B2 fOB$051-&qmpzr=[LWv%nm7%#:cs' );
define( 'SECURE_AUTH_SALT', '-65k*VNS#6]]dM&C0,Rs s1kwn[1lu.9M6gG~?)$zUk(C:l{++#ea]<kL)iDX1X#' );
define( 'LOGGED_IN_SALT',   'D0rP|r/E`z8Za2,D _/7[AHC[}<HEaNfo(0/#_uzB)[W|[#u*Ykh;Tg4U!(,Q#s%' );
define( 'NONCE_SALT',       'qeIS`oV}E8LoVxf:_l&6~oI!*n^:*6hwdeE:wD-98Gd}$x2[yYm#3_9,s)9Z8&)U' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
