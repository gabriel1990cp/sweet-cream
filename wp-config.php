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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sweetcreamcombr');

/** MySQL database username */
define('DB_USER', 'sweetcream');

/** MySQL database password */
define('DB_PASSWORD', '8h3r6B14');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Nj^(t<=cc)Su|Z|j9vc.lc[Rj6!v~fYmD1y~?5-Ljf1=#s^$$#>Bj|3 u7dOxtsh');
define('SECURE_AUTH_KEY',  '04]@v:7@WaGcs1xP!:Kw|{K{MS3twh{n<egfE1)w!7qgf~b/0??U+bG]GB1N)Id&');
define('LOGGED_IN_KEY',    '.IQJR/t #*yLjL{iOm1XU)N-*</nw^Ah<9;x{y)*y9.ZNX/FVP*CK=kcD&z_6a@:');
define('NONCE_KEY',        'iXdyWv,1^<dtvlW9]T~]|Rr*vy!91^[ful3Gph.#sA-1_Hn}Blu;!QRBvlytAbdq');
define('AUTH_SALT',        'jfM9fT52i>]Dz|xH&_hFV@>!AW*ZjoYpN&_Z#qV]j%G%/P 3!7_r1lf6d|7W&26(');
define('SECURE_AUTH_SALT', '[{VM@O@PF=]g;P.MVHH&.X~-Ud[@Ks%i9.<bd$[QBfZM#c2use^q(`3]KX6p2_7,');
define('LOGGED_IN_SALT',   '-TXeN)>vsbV1~:xn04M*Gx:34|@`J;63dYFKD{@q$Xdi~dNuQmR3pma{&fT[^:!;');
define('NONCE_SALT',       'R[>`Ay=;18$HdF8OuF~t<k9nu|w]rM+vuzK$c]+Rt4GHjlG+.T[,{]H(<qaDq`RU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
