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
define('DB_NAME', 'wp_sun');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WVQON%8+hja%]$R,xCOx2F_L>GrEy*93&|Q|=%<Pq@3maS HHF><c:A~>dF_azoo');
define('SECURE_AUTH_KEY',  '|:fAt9e~Kl*jy&IP<cF^?B;cU`:.4f<kNqn0B{eTnnST)R/RpZ[}a^?p)f^A_iJ`');
define('LOGGED_IN_KEY',    '4imfA7_hcn-<uioLl;7S?wO57:8g)zFLPZF~6wZI5T[0yTigL_{X9tRM$BUJw9NU');
define('NONCE_KEY',        ':MkhCPYVltj8sTlK](4`xDp2B}$!:?I5D);kll@G$@y%D]!Hd3=$Ou|I:jLl>(*Z');
define('AUTH_SALT',        'Xigux.tH=<yj4FNfa;H@.lqa^f|/T!Uj+N=%fnQGT=U)ketc_[M:_s9#@-c.nH/n');
define('SECURE_AUTH_SALT', '~%t15=xmML-&QpB;(]/J*1T@MjATYTb|g~^}mrY{W,N4;q$Mz }^q7PQlXW1mV)y');
define('LOGGED_IN_SALT',   '}P&)r#+$Z$*AWHC%)(*AF%W+b0IgC||8zwj`$*5N0[H}|~)l[<Nb[=s(:zMi|cm~');
define('NONCE_SALT',       '=i#r/O|{o2++7},u>a+6hm(Obn(I[%^>dP6dmWiIDy@m@(3c9|tX>gB[8pF#2[P6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sun_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
