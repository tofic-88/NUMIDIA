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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'BEtHx1g7Mo+HCq7f4lvuArIpn/EFvGVoeny/atc/wbG/atAEyjq3jSiL48zq4sbXMxGZWHxb5th356JGepKNaw==');
define('SECURE_AUTH_KEY',  'Z6xqjhD/IhNOuVwSxIsRJImCXFOKQiKIz0birGEcnqbIzxhl5LCOufZLq8jNICHhIbBECXTFwgyDvXWtme6DCg==');
define('LOGGED_IN_KEY',    '2yXTZSsotUxhZTxO9eLeFEIKM2FqKYmFzj7MzK/5luU/DqsDEd/H2KBNyoWko1gPWCdiH+e58nQefDHW02MVQA==');
define('NONCE_KEY',        '59HLzy7+wQD/WhAp+qAHhILqDTJTsbBW1HfBtLkSMIlG79fUk47jht/UZL8G2vLqbz9ZRCPjdr75Z8khon3L8g==');
define('AUTH_SALT',        'MvSWTDuzta32SGzo0HoJaXvXVgtKgV2BO9tFaKMRd4OofObQhqzsHKN1HfHboFVMMI7whwxDHs6tKhGKWI2I0Q==');
define('SECURE_AUTH_SALT', 'osDN949DeMr3gsjDPuJXGC3k3WqQbp4WjDwP/B0sYF/OxttUJsSguE7Tir6kib9j69ENAdf2aqUA3rOMmXZrMg==');
define('LOGGED_IN_SALT',   'G5h/kXiSd6URW7XAAp9+Cq7urdtuYCIt+QPc2vOyHne9sIzS39JGA+JMvigHQ+ApxZCVhAjngKfwG0Aw8ESWwQ==');
define('NONCE_SALT',       '03QaRbdZ9PqnMGrJmsItK4h7g+WZs+7yZocD4Fkvk4UqnaBMNazdnSDEfo5Bjwxrks6i/tFuZqZ6mVvgdRSSgw==');

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
