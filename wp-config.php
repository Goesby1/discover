<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define( 'DB_NAME', 'discover' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'FSNHPKUKA1sicAUR' );
/** MySQL hostname */
define( 'DB_HOST', 'devkinsta_db' );
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
define( 'AUTH_KEY',          '4k{FK,T<3dHoZ.arb&Gb]La-XrQ6~1J#MeE<&p3B 5xHk&V[YGfG3o+]]O*=9|LH' );
define( 'SECURE_AUTH_KEY',   'mV*~>{B)nj9@klA5GzLSd`DGqThhoOZWZUY@I~DRPj*z]@L|zf&LM GNQ[<)*MAo' );
define( 'LOGGED_IN_KEY',     '`trEk~&#DiUYF_.@leKj,BD8t .GB?(}8KtIW7yAaf)5GX:{w3_y2)=>Vv.WVd{k' );
define( 'NONCE_KEY',         ']3>lyMM|%n>>49(xLBM)8`E_xct~f<*4lBrZ#7}h$L~K:c{QC<S#n&QkoraDR(aK' );
define( 'AUTH_SALT',         'S2cySd_<+!}D-6L[b~91ucDC{5n{0>[f<lVF/v_.;PC|Mf8yLq##-5J28Wp+iT6f' );
define( 'SECURE_AUTH_SALT',  'Bjl$`5Z@1})*S.}YcHk]~ 5W1r=wC[J+/Av~_)cTr(Ox<qy4K&]I,C:#2y=;o7t_' );
define( 'LOGGED_IN_SALT',    'w].Z:R<->%[hsWwX+>A8<vV,9T:0v>qCL$k{Qu7D RTRl>B+jPu9HD$71k~Ms5t%' );
define( 'NONCE_SALT',        '/|pc_Z^zNF9W`;Q.zWrdZ,*+TZ?{j]j5uqe@lp?t6)C(:hWLY BoU8eh>U0%H(Ba' );
define( 'WP_CACHE_KEY_SALT', 'tL(M`}t?3aoos9J6@MscX8^2<K?p6N~f)@cd*<,[_Jp&Yb:qWl}68seD1Z&1z&Bb' );
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