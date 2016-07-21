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
define('DB_NAME', 'db632100152');

/** MySQL database username */
define('DB_USER', 'dbo632100152');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         '[D!14D&6nSsD[9WiIPz:vnf/=,~X0+7p:)6L2yvh~$4~ac|E)tv6Z7&>Qq>Pe;wC');
define('SECURE_AUTH_KEY',  '22!&Slt)hq)}1Am=WTe,JXoqv%>+cyvKm QAt gJ2:Q@odmRZUR=31INWZ>H<oxV');
define('LOGGED_IN_KEY',    'nXwfRF{XTXDh:YZ;^%[MA&^+m%1v[m,H$F+,=v)X6h`bV*,2%/6 F5$P7f7%;X,j');
define('NONCE_KEY',        '!a?$`Bv8/#bi&FIscY*y*PL9wg$uE(RW,E#~:J!6p>U!|-Y!I1046#CebY)s)HS-');
define('AUTH_SALT',        'l,;w^&$5K@D?&]DWYmaR>oeB!=NVLf1!m]qm#COOA 8!6w-$6K}ToTOQ_5GXOTG{');
define('SECURE_AUTH_SALT', 'M6ZjoGh?m<cf4F[D;|-#$D~u+44sP2jl~?WxD{UWdrnE?lzd0@dY`D?8>I{ @7f7');
define('LOGGED_IN_SALT',   '+wnroMCqZKae)c<#hxV~xq&K#}Vs6~rX+](c $&xB^(Mdy1 Y*qIL7#zvx2+0b{F');
define('NONCE_SALT',       ']J5P-P)r4/Oa}ej`AW/R#>.pvlN|JjxV**u:ji2LHVN<+g^QkOFry(o1DStatEls');

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
