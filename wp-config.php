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
define('DB_NAME', 'demo_designtool');

/** MySQL database username */
define('DB_USER', 'demo_designtool');

/** MySQL database password */
define('DB_PASSWORD', 'qazXSW@1');

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
define('AUTH_KEY',         'SB{.]<CCHlUHA{G+u^Bcj0WxG~-|cO4h|x=Xq?@KNrNpd!pfLpA/bZ8Y6-fmh=Uz');
define('SECURE_AUTH_KEY',  'yi_l9aP2y_`Ez[pJL21nWyDxchJg?>I};OR7RIGu(SJASFGW5ai %Llwk${o-L^J');
define('LOGGED_IN_KEY',    'Ejj*ca@7C4q-NUUM+(wjcr`Ho+}gV;&(KixnJ~IM@h<Gz6rU.E_MJyqf~ AgoBie');
define('NONCE_KEY',        'RD 2Ii`Sp)`Y*:&L(fF}xuTmFTQ&Z&l)8pxo8XY])0jU/U Ry2=X-Q]6ew.=xhVJ');
define('AUTH_SALT',        ';5Z]7kps_X^H-lYU]h&g%+K7VL^1s.69)nCq}ZK=tN6(~dc%<JL3RL Mi&K^*%Gw');
define('SECURE_AUTH_SALT', 'akt+&Il&k79GepH!pmKNEw?<WjCNQbUn!;Bu;y`(Y&,t+<=EPuXO$/{![$j52W P');
define('LOGGED_IN_SALT',   'F@)8z@47#<Qpt4XuL:PpIv%dQWbMP8~:L7d/POs`jPR5vg,oHM)F:w8%~C[tN8Z+');
define('NONCE_SALT',       'c/{B^5OYu?3`8I. ~~W2;:)LkEPX [#Ms=:>&CTw@x$@I@AntoY2`,)t]Jycx[Tq');

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
