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
define( 'DB_NAME', 'lozaizidoro' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ':u#Xhe&/MCU4KuIcjBZOa+a7ylEj(s<H0WD=?>U>}2k^r/171TS_jmke<g+Vg)61' );
define( 'SECURE_AUTH_KEY',  'hEL;i45!y&2=Cp8B]>fh&e)afTWYMD3gV7>[&<M!KS&,H=>=tdwJ5=jMe!@DF=uQ' );
define( 'LOGGED_IN_KEY',    '0EwXRsAj.{`ir-|-URsVF2MB7{nW5`2nA|RXci{nwRy5gh/`ZJ_O t<KkR*w/|&C' );
define( 'NONCE_KEY',        'm-`PqlN=4V~$`>su,%A_RO`,Tc31(`-8ETf2:-@W)[Jo*sVNq<c){;~q/k!>Wiat' );
define( 'AUTH_SALT',        '_MlpG)z2(S^>(<5*w_cPi|bg,^x4 M&@808x6`Ck27]Yn8_}?#@1f$4=,>~d/,ST' );
define( 'SECURE_AUTH_SALT', 'srv$`%4-+&8^z:8g89|{n~bR4DGGzYnAiwE!J!Qj?uVDy;l<6fA_F6Ts0mRjrY_!' );
define( 'LOGGED_IN_SALT',   'c(&&xZkAJYcN>V-e%t`xx+8..(=HsYc=!;/YIWU2U&B:;>v/<C:aRfbqoA1u~;_g' );
define( 'NONCE_SALT',       'rp2/XI)]z`Hx{g hbw#K lWZ;364 $?gQ,n]zuXU_+L?/)AXw}41wcMyx=8:jKIF' );

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
