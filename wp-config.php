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
define('DB_NAME', 'vitebsk');

/** MySQL database username */
define('DB_USER', 'admindeU4CpS');

/** MySQL database password */
define('DB_PASSWORD', 'wwXXjvKzyySQ');

/** MySQL hostname */
define('DB_HOST', '127.3.192.2');

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
define('AUTH_KEY',         'g^tlcf`fRE?6-(c|[xf ;QuH|W|l=luJv6~d|s63gU201=UaY-;!1+-g/O9_+Qac');
define('SECURE_AUTH_KEY',  'c1gq5MrD--Y#,>[d^8JZaAQ.-!#L0fe}iHt?W*PQfsrMCEN=Ix|(l6cX38U6VHU>');
define('LOGGED_IN_KEY',    ':bPM:<H|_+F(@}3;x~z)f0)kl+.j#[l-Xk+PCaeu6,T`pbA=?o/-VWa6|{?V24IN');
define('NONCE_KEY',        'Eh:Z(w&Tjcyj$AUGi8esU-l=L*!42Bre&y<RKkq&c?k3w0S-L-|g&=JPAenK6rB[');
define('AUTH_SALT',        '4<Z`ZbW;?+h5X7.eB-n1(r}2$J6nY~]Mi[}e~~7chkj4[]akr}q< :usVnGvHJ+%');
define('SECURE_AUTH_SALT', '>}wA0<Y_<qf66R>-onY~5vAPNE8@Pk 8#;ZB:b-`i<A2`T(,y:?uVZF7l5e51(-t');
define('LOGGED_IN_SALT',   '>53hX/cB8md+9C+{<1 rl9+0Xgav|qS9F(8<ZJ*)[aK<OILp4;|Y?%@9RU{@O;;I');
define('NONCE_SALT',       '2t@om5+_-ly8]b1,NeexK_lo`a3lL6!@hDwO:j:e`S}:a|:,B:vg}?P9KDKJJ:f5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
