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
define( 'DB_NAME', 'custompdf' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'I?$;},g4-<Vm!>Isd_PbWOF12Y0;PJeO=[_h|5PwV3dvi-&0Q9-S;//Wl{D--muM' );
define( 'SECURE_AUTH_KEY',  '`lN3^B1gZD]?q,PN0F`%I4Rc|gj<ieJFN>9;BzpxL:I.jL./)@(fD(gHPCr)Jt>J' );
define( 'LOGGED_IN_KEY',    'S)Q96d{Y*IF^6ry7{0BC_<~fxS:agjS37wPp/gy=E3!c;1wBD=>g&_ wX B?)X0@' );
define( 'NONCE_KEY',        ':9/J[b9+00W|54t:Bmdvq}Oxw97 i[/g24$FSxWD#N$O:T&eF15gkuA/8(iDRP3c' );
define( 'AUTH_SALT',        '=ANSj54T9@HdI!v|@0(mNko4N|If1o_DIS&/W5R3(i?5Nhm:}$kS~5b%|/kR.Kp_' );
define( 'SECURE_AUTH_SALT', '|(ST<(==RTWfYpx vf+Ns.-bGY@Dy*CLdiLJzuXIC^o!dtIF:@u~@pP--Frp]DEN' );
define( 'LOGGED_IN_SALT',   'T#)~TmO4y585, XVZjj?Q{/.2P?Cf[HW4r6W%]hTVU;|srI_|hzo6b+^V)M[%{rh' );
define( 'NONCE_SALT',       '(}.YLF[yp7D;!]%?jwN,BnI;!32=i@i`tI>Na:beM ):qp7OOspZ6GrAKP}kxv/g' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
