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
define('DB_NAME', 'demo');

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
define('AUTH_KEY',         '22R>~!YK@&E4ckm;KsaL+Rj.$-@f4g>V{JeFm%44%t>USdE:8,&r=MT&z.08&,{!');
define('SECURE_AUTH_KEY',  '&sbnL{*}^GeNm%M}Kpe9 tm#:0kqU]0XHep>Oll#GGYCPH0G&pJB7meR^]F+`1W3');
define('LOGGED_IN_KEY',    '^>ifwR[Ce]XPb>%*DJYCh6M Uh3/P>N{5tH1@!c<St)~ek{I&yT-mcgl$2b9$Rs6');
define('NONCE_KEY',        'n6KlgVc3sJ6D<-d><ij@nN899QYi>CKv~X!ajpc3n83CM/0RG5o|b:rYfDH{f85r');
define('AUTH_SALT',        '?H~YHN9aw=??%M?8@`b+p=d+$>|7U0.4:An<kOU[({$aH KJAEKR;vQ37&-CYrq.');
define('SECURE_AUTH_SALT', '2u`nCx&,25&a^B>UdnnFRFcAY-~`{H-j7`dqdCcd7%qIoxHbW{+Lztdx1X}qwP,T');
define('LOGGED_IN_SALT',   ',/~dqEu$#M`@sm~~@ViOoi)y[w~-_]ZqPsFp[v!@#BW~fvPEdW2D:ueyFI~5d,_P');
define('NONCE_SALT',       '_= lN204Ty@q@ J{_*e-tZVt3H=cqs$?,k^wnZ8=%A-Zel,wLK$G9]ig$R:  Y[i');

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
