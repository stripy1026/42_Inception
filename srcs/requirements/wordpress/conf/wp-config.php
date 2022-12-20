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
define( 'DB_NAME', getenv('MARIADB_DB') );

/** MySQL database username */
define( 'DB_USER', getenv('MARIADB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('MARIADB_PWD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('MARIADB_HOST') );

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

/**#@-*/
/* insert keys here */
define('AUTH_KEY',         '9!%:Oe1J{x@]R^Zq?d0Eq6m&X3FK53pb;4whl*s>p1C&-o7p3D)N#Lwg+gtO3 e]');
define('SECURE_AUTH_KEY',  'gqD+l3OhB6iP0pD6w=9msQRU@e.[g+x0ja>NnC=vP{deFxH^>QK6p]tSJP?,eFr@');
define('LOGGED_IN_KEY',    '-kGuRhb=Y%;jg+E=sP/<]2H&+nZq8DVau+)3FS-~y1kPg;`H/yr{T|+4aUj|N AC');
define('NONCE_KEY',        ':^s[.u@+[ )8VzcDZk$W^O%uM/XP-}urjB}QY@s-P,o&zaa(}JSMq@oH&F|$L*Sc');
define('AUTH_SALT',        'Creky2Aan)}-R+tQQwlkBC.xz)HL~VyRHo5|_G JF7(^%&`I%ZOv,S fe*SfBkCK');
define('SECURE_AUTH_SALT', '!!%1|[G;-vU-L3e^Kt]0P-L%Q$EXw_|zJ3P,iWop9Y)i5X6-0cVa6?`n,cGP~@03');
define('LOGGED_IN_SALT',   ',kC`&&{Vuz]i }-N~*AA5U5;B>-X|]ObvG|bv!Es&F43~FKI(?$_1HI mcL(c/xs');
define('NONCE_SALT',       'k|#DjG4qp+w|N.!t8[>j69Pl+IG+6UoNIa/M0Lrw2&CO[^ePiLT,V#mC[s-;+Vd<');

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