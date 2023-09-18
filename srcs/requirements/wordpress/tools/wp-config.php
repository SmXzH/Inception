<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '' );

/** Database username */
define( 'DB_USER', '' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '' );

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

define('AUTH_KEY',         'q)t77A3|mo,Av)3xanKDLQW1C{I]LC$Hobf4u@-OnH4tf[|jIsg)8~uk3-=&2b_z');
define('SECURE_AUTH_KEY',  'HO`[-EV>yAm7awz$&g-54~$aqFk!6n^Tb>,u#H-pxTMl%189!407iU3X@]Ew=*B+');
define('LOGGED_IN_KEY',    'r$}t<EqXjr,|So+*:F4@f73={R>E-&*pkK]F-RwLv|XlTE,2{U|oY6q+1p-Hp3nP');
define('NONCE_KEY',        'o<&Bwu&RZ[@1NSgf)6{*`ixvC$|aV^S|:#~_v+4To4S+(.G<}`86L.P-YB5%:(x3');
define('AUTH_SALT',        '|D+GKy?.}JCD^2+d`_KTMoP<./ICq|r!leyCK}NPu_rA>D9X+y|V;6D` UrU7Vws');
define('SECURE_AUTH_SALT', '>kGyVV l|Bp:D[h2|}d=[]e]F,G_bcU |[)z!.Y2X`PV3rOfmsF!NNoN_g&W818@');
define('LOGGED_IN_SALT',   'bE^[J^-8;&ALe+B5b=M+gA==1+le83|~#{eJHv:J].K)Mtv-)(S[1TKIuDWwqA6z');
define('NONCE_SALT',       ',&6tkl%Y}Du<<=&2,9D!Y#*&eGF#n77studsZ,aTo0-<iA 7!AT!Jwv`CR#&Z)-R');
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
