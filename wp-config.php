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
define('DB_NAME', 'eschoolnews');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'z+-mVL[3@$tC`&;=-8(}U7(}tQ#9<Rx,Z+^_|&W|oMh{Eb/h/D%L<b-|w:xQa-Y/');
define('SECURE_AUTH_KEY',  'VV`MP|rs0k6hVU+n~kV8.~R(|_tsSCjc_rP=9-[%jt,,8y+-F0VG~~~:3MF&n@s9');
define('LOGGED_IN_KEY',    'g@i{JnRt7j-vi#i:sEbSd[PWIanB*4w!pUj-1j/tFWsW+|p7K4:;SxN PoKG}$nY');
define('NONCE_KEY',        '07(gZ-R.f(`+lRs:>]mY%)Gc#~@?kqbj~;C?L*{Lf&-kw;$==B;/1a.?6y`@7hMq');
define('AUTH_SALT',        'v`vsKEa0WypU lhgH==p+@Wt~+Gk-f~E}F.og@Iyu3-JqB!LCR)#vc(?Wh*:`CD8');
define('SECURE_AUTH_SALT', '1lVb +mz]!>#w8*8H:jE7PGt|-JHRomR`0ZE7s-|+xooUm$`p<k0Mx/p1Fc7Mu@6');
define('LOGGED_IN_SALT',   'v(fg<g}*12}1v)JUHg])nBr5k(U}+@F2,+ab_c5iFh2TnUnIJ:t2gXJr3>OhXX=K');
define('NONCE_SALT',       '4%ViZ5{.$)*Q4>Z+DEM>D:>-xl.1<ordU+Njh+&BX`[!9-gM2OVVfHa&Fzo);I-`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_esn';

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
