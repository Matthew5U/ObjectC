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
define( 'DB_NAME', 'woocommerce' );

/** MySQL database username */
define( 'DB_USER', 'woocommerce' );

/** MySQL database password */
define( 'DB_PASSWORD', 'woocommerce' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '[?crpT^tlyFc*N1DD_8HqkH.K#IFSuqV5F.O}l;seWn_bg^|]o[F,]MJ`U3ji6.!' );
define( 'SECURE_AUTH_KEY',  '`~fvwh0j{X6 Op~MCI#9Xwu^F7z=(jC)!BDt1oxj@5fF:?0|_4)e4EOe#=;Og6-G' );
define( 'LOGGED_IN_KEY',    'Ys&r%F5]8if9-&:N|vvYI._rwQSNc&HS+]0MbV549E26< 7^*  G1`>~DpE}LC]U' );
define( 'NONCE_KEY',        '.x,S-!}S:EJ,{{QzmGtNZB9>0u9n6bT[?>/Gre:Jf&Wr(4H_/z8B !&BQz+4ej)j' );
define( 'AUTH_SALT',        'W_O?x#zWxlB3mF?h|{4+jvdCaShw;dB`zq6H)_<)zohy-P9hVr;D>*D[M_`5%wlU' );
define( 'SECURE_AUTH_SALT', 'R1 *^QuYnqB)bVN[!xJ;2EKIE=Wk,8(?o;UKSIVr+q%qt+V4aU9d}LBbm=QjHz?V' );
define( 'LOGGED_IN_SALT',   ' =:$2`DrDvBCl<v:*hrd&`.sq`Y/*BX2jYd*M^e#*a55JiPv;;B|JT<W#[^nvWcd' );
define( 'NONCE_SALT',       'W_(pWZ|3}5%`44qAMi#+QGbh#M}>Mhi,JzFmuPK,XDWn!CP,Nhokm0q1oQ4p/MRW' );

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
