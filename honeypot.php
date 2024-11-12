<?php
/**
 * Plugin Name: Honeypot for Contact Form 7 (for Contact Form 7 with accessibility fixes)
 * Plugin URI: https://wpexperts.io/
 * Description: Add honeypot anti-spam functionality to the popular Contact Form 7 plugin.
 * Author: WPExperts, modifications by Julie Moynat
 * Author URI: https://github.com/juliemoynat/cf7-honeypot/releases
 * Version: 2.1.6-a11y.1
 * Text Domain: contact-form-7-honeypot
 * Domain Path: /languages/
 * Requires Plugins: contact-form-7-a11y
 *
 * @package Honeypot4CF7
 */

defined( 'ABSPATH' ) || exit;

define( 'HONEYPOT4CF7_VERSION', '2.1.6' );
define( 'HONEYPOT4CF7_PLUGIN', __FILE__ );
define( 'HONEYPOT4CF7_PLUGIN_BASENAME', plugin_basename( HONEYPOT4CF7_PLUGIN ) );
define( 'HONEYPOT4CF7_PLUGIN_NAME', trim( dirname( HONEYPOT4CF7_PLUGIN_BASENAME ), '/' ) );
define( 'HONEYPOT4CF7_PLUGIN_DIR', untrailingslashit( dirname( HONEYPOT4CF7_PLUGIN ) ) );
define( 'HONEYPOT4CF7_PLUGIN_DIR_URL', untrailingslashit( plugin_dir_url( HONEYPOT4CF7_PLUGIN ) ) );
/**
 * #cf7-a11y-start
 * Change the path to Contact Form 7 file in order to make the plugin works with Contact Form 7 with accessibility fixes
 */
define( 'HONEYPOT4CF7_DEP_PLUGIN', 'contact-form-7-a11y/wp-contact-form-7.php' );
/** #cf7-a11y-end */

if ( defined( 'WPCF7_VERSION' ) ) {
	define( 'HONEYPOT4CF7_WPCF7_VERSION', WPCF7_VERSION );
} else {
	$path_to_cf7 = WP_PLUGIN_DIR . '/' . HONEYPOT4CF7_DEP_PLUGIN;
	if ( file_exists( $path_to_cf7 ) ) {
		$cf7_plugin_data = get_file_data($path_to_cf7, array('Version' => 'Version'), 'plugin');
	}

	if ( ! empty( $cf7_plugin_data['Version'] ) ) {
		define( 'HONEYPOT4CF7_WPCF7_VERSION', $cf7_plugin_data['Version'] );
	} else {
		define( 'HONEYPOT4CF7_WPCF7_VERSION', '0.0.0' );
	}
}

require_once HONEYPOT4CF7_PLUGIN_DIR . '/includes/admin.php';
require_once HONEYPOT4CF7_PLUGIN_DIR . '/includes/honeypot4cf7.php';
