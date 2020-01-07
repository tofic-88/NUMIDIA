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
if (file_exists(dirname(__FILE__) . '/local.php')) {
	// Local database setting
	define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
} else {
	// Live database settings
	define( 'DB_NAME', 'u243682449_nw' );
	define( 'DB_USER', 'u243682449_nwadm' );
	define( 'DB_PASSWORD', 'adonai2020' );
	define( 'DB_HOST', 'localhost' );
}







/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '~E=eK}M}3i44,]X8$nhm0N^rEE}0ssHFMKs6|%zd<|3c&&h(/a|aho&:n6=@S(#y');
define('SECURE_AUTH_KEY',  '!?Z^<g*2<:)h{2?e1)34^R*{quK72~{8B@gYQo7g(+{*0T=ZebFr=~s+.Iov+*-i');
define('LOGGED_IN_KEY',    'tlr_JOmxF_M&e%M;@Nt,xu-8%qt@ ( +(`=|Cfy~hp8+nl=)gI,B+QT==`?&yq1J');
define('NONCE_KEY',        '$ y}op<2u(){ 6/hXZtd7j&3B,8<fj`IB&V]>K[F*r}z<?*Q(&x*x@;Z] #OZ^-P');
define('AUTH_SALT',        'Kc`-1 tw Cidl:VZ:=ae-]8cF/Tn*(+{~,8[i#nSQ`PfXzny(&UJlK~{fNP#,Bq!');
define('SECURE_AUTH_SALT', 'v&|ZxCdD!PrDP{-N.+|gI}i&%DFMV+1MPv,69wR`D?:C|vFI)gf0/nqwu6jA4k-+');
define('LOGGED_IN_SALT',   'jt }NV(+AsZgb%^b)Bf_I_depKXOD)2k2,7C5jP_/>(X_{J=3^Fw4w`ALW@Aw2>n');
define('NONCE_SALT',       'ZJzMVRdam{])r}1.lvj5cwV+-cEtxj7G m}~+3^pG`GG@W+p-f o5Dah6H(>b0a%');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
