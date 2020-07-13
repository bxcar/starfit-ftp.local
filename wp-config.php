<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'WP_HOME', 'http://brovary.starfit.com.ua/');
define( 'WP_SITEURL', 'http://brovary.starfit.com.ua/');
define('DB_NAME', 'wp_brovary');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '1234567890');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'v^rW3NrFWCC6xrGbA0L0bOAl9g*s%lId76oRe!&lgxdkXE9iYl^9SU(u#CsuOzXx');
define('SECURE_AUTH_KEY',  'DDrh(#KY5AfQto@!TOxi!*0CL1GXr)vBg6ze(RQ)5pP&z%iCXtKUPuyp$&zjNLgE');
define('LOGGED_IN_KEY',    '0Y4xRuj##r$tOALyCZ%nt2Fwo@p)%W5jQqVtIkRi%KoNVyjug8F5IlV^qcCl7O5n');
define('NONCE_KEY',        'Y0niIRl$tM@BhKQ$U5zoQspTpUYVtDwvpQ&kH7ixyE!IWF8Z(ig9NL5m&Kv9Ap^J');
define('AUTH_SALT',        'WpBEytqZ$@j8LhL111*uf@ZgyIKgxf*2m4wv)oYQJg9p5g8L$XE3C8QsDXcz9*87');
define('SECURE_AUTH_SALT', 'a!Cz8E6iLxC@uJBqbnhKNgQlT60&Og)t@V%*n8FbzIOKyFb2D3UFr88wqPtu&juS');
define('LOGGED_IN_SALT',   '984H$%uSiOd(ulJ0LblemJ2@hM1qkf76MDO23%A1w@yQdpxgTuR73a#v7kMnkjy2');
define('NONCE_SALT',       'us%gW9XCL2fho^r0@EBGSQy2&nq57oiCFGRv2zD5@xM)dFKvu5u2ZnbuFbNgs1zC');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'ru_RU');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

define ('WP_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );



?>
