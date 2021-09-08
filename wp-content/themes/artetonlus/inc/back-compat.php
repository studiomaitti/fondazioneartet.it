<?php
/**
 * Artet onlus back compat functionality
 *
 * Prevents Artet onlus from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

/**
 * Prevent switching to Artet onlus on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Artet onlus 1.0
 */
function artetonlus_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'artetonlus_upgrade_notice' );
}

add_action( 'after_switch_theme', 'artetonlus_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Artet onlus on WordPress versions prior to 4.4.
 *
 * @since Artet onlus 1.0
 *
 * @global string $wp_version WordPress version.
 */
function artetonlus_upgrade_notice() {
	/* translators: %s: The current WordPress version. */
	$message = sprintf( __( 'Artet onlus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'artetonlus' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Artet onlus 1.0
 *
 * @global string $wp_version WordPress version.
 */
function artetonlus_customize() {
	wp_die(
	/* translators: %s: The current WordPress version. */
		sprintf( __( 'Artet onlus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'artetonlus' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}

add_action( 'load-customize.php', 'artetonlus_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Artet onlus 1.0
 *
 * @global string $wp_version WordPress version.
 */
function artetonlus_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current WordPress version. */
		wp_die( sprintf( __( 'Artet onlus requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'artetonlus' ), $GLOBALS['wp_version'] ) );
	}
}

add_action( 'template_redirect', 'artetonlus_preview' );
