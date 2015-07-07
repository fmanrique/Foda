<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'foda');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'ZJ0O3:gN+$61/Lz*RiEY-D B}?1&<T+=nr*tkQ*Yr}k$9l`-FBgdtcTdC, K:OsZ');
define('SECURE_AUTH_KEY',  'i?f,bPc.Q~=T#WbqvnV~&/P-`FiQQ^L!,%@(c`dU||Ww}RQ]4Vl|fD9O7Uz&oD7+');
define('LOGGED_IN_KEY',    's+04Mx /6#n4^`l;26A+FM r|`%|1FtiA1|p+Gk#8$T.+qL<$y./MEL>~x5vlo7b');
define('NONCE_KEY',        '1!l5LRx^dY< 75J.[zhX{5DY|JeFa{n]lJzRJ8h$&1,#8`-)g#,7=ua>`V3|zS@(');
define('AUTH_SALT',        ' tw)KWDAIT#Fek4@:(<gk_|:6|Hs(?2i1+M|Mm^]c}E,|&Kuv8FWgO50h4uw,XsI');
define('SECURE_AUTH_SALT', 'K2^8/D9NGZlGQu?j/(a}-M=~15$1;Z:+D0s(E<K.Qn)--F ,]|n[2ph~^pAV6^G5');
define('LOGGED_IN_SALT',   '.,(DI%qe<gOUxbBc]|6sDQ mc[Y;5.m4KWwR-VqvtFzCL|&+HI{;M)>aMMWF:UV3');
define('NONCE_SALT',       '+dBl+^u+/B0Q|3MEIH;i{ZfLr*xCn_|/aLj/(m3BK-o<0f?GsX~?$9m_=Kg*;$zp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

