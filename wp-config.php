<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'markdealer-copy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Al^Y)(!bwZpE)v8*clm$5PA<53JzXtxR q&Is0Z7K =+>,1i;l9x1EC-N^CdI1L(' );
define( 'SECURE_AUTH_KEY',  '7kBhki;|kP<C|7+ R[h+5Z9Y1>5MfZ{Jll@~^o#u%=-D-y``p=%2 rw9(dUL&aA:' );
define( 'LOGGED_IN_KEY',    '0DvsBG2^w8!`iqc|m2J@1+1^H58eS|o> ;5v1|T^H[jK40+lLgFfGcmFI#)MM[K$' );
define( 'NONCE_KEY',        'H9A1KWHZ,DO)~4 t[8ve86;(o?y$yy:hEg-B&Nbh|8)z=*TM5RgGMHjS-J;:R+Q]' );
define( 'AUTH_SALT',        '=.@otu%U6dqyp1KmanJON3~sPX-A2nn*l=K!<~>(8p4j<xF((9~*|gD%Jy/vx,3T' );
define( 'SECURE_AUTH_SALT', '%{fNdZqqy<H`F8XXw 2B1~Fl0>T931Y-PGvHVKyo7tD._e].&YIz^n6e5zDdz`/J' );
define( 'LOGGED_IN_SALT',   'nb:d&RI8wqa)MB>eZcB&1#(K<k7RxiS>V4$-LUyST[ Jzm(pAFkD1unz$1`C]Vrj' );
define( 'NONCE_SALT',       '7fzzfd^-?WHpG2,8<;DyEf{%Yq&;?0dxdP*en-NGK.[5/ZZ{a|/IY^QB8@>[0dwk' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
