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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vrdg');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HeU5B SF~&l-+Ti+Q?#JO7<2;z|uCSt$|9rBXzz,v(o?V04H=L5r^yf2I_4yL`^T');
define('SECURE_AUTH_KEY',  'ZrFJ!2$-lMO+Y/tb}~tq)[^)DXbf|<a@Y%K[8?vaLDNx.REJl>f9rnuYk?WO/`Q#');
define('LOGGED_IN_KEY',    '?H>ZTGQ[J:i`vR8]N1+,zeQnC1]^[9 E7ors7t[vfBy$>{fT]k>54%ug58?O$T*,');
define('NONCE_KEY',        'N&Vi)vh_-)Kq-D=&*WJ-G@qyou#W;/f+V0z24>nT>L}z[wmX -+|S,(TSs^=En|C');
define('AUTH_SALT',        'zA*5}Oq:`4E-t21}2pS2v>Wu!;;Ry&)h!/8)&K}O]P~~T8(,j0.lc(pLR|yP+B$s');
define('SECURE_AUTH_SALT', 'op,<-36|E4?s1>#U3)h1p@>ZXETOPQpe2!|oL{Q+[Yq[0kB8qCtZ:ct>jt@d/=*y');
define('LOGGED_IN_SALT',   'Z|uh>G}GnB%Jf&iN<:{[e[~;U3oARnJ5+!k%(y|pbqyZ46.98:EBe+MNiO30+nTX');
define('NONCE_SALT',       '-ZR!#-|;sQ7QCSc]8RI2cwYH@R-HL,8|t-HCKICq-ErTu,RP]b xAJE*]$_YNWap');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'SCRIPT_DEBUG', true );
define( 'JETPACK_DEV_DEBUG', true );
if ( isset( $_SERVER['HTTP_HOST'] ) && preg_match('/^(vrdg.)\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(.xip.io)\z/', $_SERVER['HTTP_HOST'] ) ) {
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );
}


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
