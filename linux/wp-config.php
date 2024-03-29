<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'aravindaw_com');

/** MySQL database username */
define('DB_USER', 'aravindaw_com');

/** MySQL database password */
define('DB_PASSWORD', 'stEssW9L');

/** MySQL hostname */
define('DB_HOST', 'aravindaw.com.mysql');

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
define('AUTH_KEY',         'c!vn%p8Q10)QRQXcn72B73yoAZc?v+NP');
define('SECURE_AUTH_KEY',  'GLIJP8CD)VnhOMy*L}tjhqev<0/U$xw.');
define('LOGGED_IN_KEY',    'u1R(1^AzmFmTa2(4/{[;flK;]C$rL3%}');
define('NONCE_KEY',        'p+8x:@3G?AsFE^rL/,(VX/*-R]p.*mhR');
define('AUTH_SALT',        ',!Eb-nbrBiln/q[w;zI$x>t)>Yy8WZZE');
define('SECURE_AUTH_SALT', '~xFApw4lU+y!1[4ae>U48EdXc;Q!w(cb');
define('LOGGED_IN_SALT',   'X~Rde-J)#_3kEuB!C<bBh>9X(B]C@h{$');
define('NONCE_SALT',       'keWg<yUEK.1QQ*8pT>JTiXj>&Es~#ZFe');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'linux0_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/** 
 * Prevent file editing from wp-admin
 * Just set to false if you want to edit templates and plugins from wp-admin  
 */
define('DISALLOW_FILE_EDIT', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');