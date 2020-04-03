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
define('DB_NAME', 'audioegg');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'soarlogic');

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
define('AUTH_KEY', '727af09cb44ecc82ec45f1e5117634c0c039c65afff286d243dbb800fc1d3dc6');
define('SECURE_AUTH_KEY', '5d3a4e6a0d8e4cc44782d1367a95c0e0c9259f6e5224cbc79eb0bb58b57398c7');
define('LOGGED_IN_KEY', '4da606e752e089c29b6ac7d3dd9cd447b6f4ba95d0f94f1404587e181aa39364');
define('NONCE_KEY', 'ee100b3484ff4939323d07d5c37eb45171c47895459f5ffdc77c219517e24ce8');
define('AUTH_SALT', '1f8078e52ff7e3c10384e0a8ff5c5bf72ed3fb85131f69c620a23eb7cc5cbd6a');
define('SECURE_AUTH_SALT', '8f2085c2872aae39f7cbe6157466ed66df331676f9a4eb4dfaca6e4b3eae2720');
define('LOGGED_IN_SALT', '60297b30f0bda4fac866577c331aa1c10a3f388250783bf1818c5c5f315994f5');
define('NONCE_SALT', 'a7d2501ebe33c2cd0caa40adb149aee8ef1ee11789e2400c8dcab87d29407c29');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '_R8D_';

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

define( 'WP_CRON_LOCK_TIMEOUT', 120   ); 
define( 'AUTOSAVE_INTERVAL',    300   );
define( 'WP_POST_REVISIONS',    5     );
define( 'EMPTY_TRASH_DAYS',     7     );
define( 'WP_AUTO_UPDATE_CORE',  true  );


