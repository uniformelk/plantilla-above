<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u890646885_zHB9J' );

/** MySQL database username */
define( 'DB_USER', 'u890646885_IjNpV' );

/** MySQL database password */
define( 'DB_PASSWORD', 'pqY9hYGy6U' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '^T/RrX(N0HSf($ZVzU^/hV92[M2>$#nijr_%mGfR048rI^D+u&a--T,{lkvhL._-' );
define( 'SECURE_AUTH_KEY',   'ToW*LT;c[<41P]7`S>|w`tRBN2|REY[v1kR^Qf6}=%tgq:iyFt-*1,tJW `-iDty' );
define( 'LOGGED_IN_KEY',     'KK++|qe$]k_TwJ,+Hb&PztJT*H<0#T;_n=cgk;hLj6c9#je;K:Uc&RcpD<vro9Qn' );
define( 'NONCE_KEY',         'qwp7%U0.r1+6|FSuX>U`-eJXe.UT8}, ivf:)0EO&iKS4m$: 8&tY>x^)Q<`wtO(' );
define( 'AUTH_SALT',         'Rx=AU 9G$Hodw(dPQG.nF_LC7V5VSY4WiT)Mcf^Iz;0K*WodGqr:zG+3I~gtPpO1' );
define( 'SECURE_AUTH_SALT',  ' oE73~$=;>qt;dm.o8~_e|WhZ2!>[Oju=ykmtq~qQs;D.q97wP=i;<P@9l?]przq' );
define( 'LOGGED_IN_SALT',    ']!)nf`mTdkRH}1IC[={l,@~WR~PuBI|cD!,?lYUq{#O^l%if;!uTurvz9(K;ZN(G' );
define( 'NONCE_SALT',        '[yG_)K=Q6^9D:rkIwGVT`U(oD:(bKR0>)jp[x:!KX#hq,);t%A/>+R4G@6X)j]s(' );
define( 'WP_CACHE_KEY_SALT', '%`iq<@+(]/-;OPK4Mk}]6yhf8q y]t{FJyDRylM< !qEO W7k}cGD-O|4Y~@Cd_F' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
