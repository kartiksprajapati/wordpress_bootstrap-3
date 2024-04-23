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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_wsc_speakup2');

/** Database username */
define('DB_USER', 'laravel');

/** Database password */
define('DB_PASSWORD', 'laravel');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', '4|)9I#;?l`LaT7Uw<.v:*dXjEF[,XN1L&3.$W%Td^}i61jKj5o>8]Esx^Kk0$e0U');
define('SECURE_AUTH_KEY', '4arP95FH]Q:QQ5joTtW.zz@b!;PhyHh(xr;rC+Em4{_5>0:p?yf067i4E3,rJ{[4');
define('LOGGED_IN_KEY', 'jU2Q}Wi})ilIe,:DBK5uf|4b961@9!j~R+rv8br]Wv2|!`.8.|k(~YUbm:Nqp`Xp');
define('NONCE_KEY', '+l]Ai*-WKp@l2T1Kz4f3Ql:/E9Et6|xAL[yUP((#A!xx&UZ{vAXSYVEqqJlCV(g/');
define('AUTH_SALT', 'XV2}29qGa@Z@ysg$A=g/*.z?SQ={!dfMWX{9/>B1vvOxVH@_I>V7$jC=^wRKU!|^');
define('SECURE_AUTH_SALT', '-q]l4ixFap17F_?Xg{pjPshHN=s[SN1&WNMKoGRCx}[JvG(shl]RD)AX*I ~pvH1');
define('LOGGED_IN_SALT', 'WFT:; eW-s5p|*RGnsP:NemzxLw+O1vz_v[iPc/G;8qG^3(9lG2!*jG`M8EUI-vz');
define('NONCE_SALT', ']N0y,xYF#b-t*(EzL9_p=Hf-%Uu]|O>j&m 2yF*|Z:d*UTiq!]pZK&v(wxi@!<(!');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
