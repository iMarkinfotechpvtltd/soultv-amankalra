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
define('DB_NAME', 'db627256787');

/** MySQL database username */
define('DB_USER', 'dbo627256787');

/** MySQL database password */
define('DB_PASSWORD', '@dmin123#@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'P%=cE_~mhJP7!j?1irbnpe%h$4eERIt8%cSSHjzU4&!,[O#Z:.{ J*ZxERYX;X[m');
define('SECURE_AUTH_KEY',  '_R@t|~t%v%}_T^@~5Mrk:#Q{fI`UFCcU$X29IW*3xjR&~H3`!Ua].d.!8@>0_hl-');
define('LOGGED_IN_KEY',    'Zov6XatM;p0^=0r^]l3!:GAhRgE>A).M4o/!>DKdp8os]q)|r_)-w#{@@anoG6_c');
define('NONCE_KEY',        'Le+|{&(8TKhm+mf7~-HfyRfIb*=/wDBpX2eM_?IxxCT=]Rb&f~N|i(iB^@GRAs`Q');
define('AUTH_SALT',        'CYJ=7f-YLjBLtTijxIfSVUA;v+SWqRBR0ne<lcuLM/6.y}uBQ<*-;FDrh_#LM{jL');
define('SECURE_AUTH_SALT', 'O*:FnmB-?d1MJSH^2q5bjR9xEp!Uxm[|_44Fkg|(:yv>Bt);SJO*_uXbliCuD;F<');
define('LOGGED_IN_SALT',   'bW~awP5O@SSi:{Ak[0w0N>Bll%$mD1r9332*`&S<LAKNa1^P4KAw ^r`9TCDN~)w');
define('NONCE_SALT',       'A#IK2S*kObH9IOHO>HTxCg2@zf I;jn+68%aC sdVxB*Nq>EB5nFH`3ifc-&&lQ2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
