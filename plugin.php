<?php
/**
 * Plugin Name: Coil Web Monetization
 * Plugin URI: https://wordpress.org/plugins/coil-web-monetization/
 * Description: Coil offers an effortless way to share WordPress content online, and get paid for it.
 * Author: Coil
 * Author URI: https://coil.com
 * Version: 1.6.0
 * License: Apache-2.0
 * License URI: http://www.apache.org/licenses/LICENSE-2.0.txt
 * Text Domain: coil-web-monetization
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.1', '<' ) ) {
	/**
	 * Show warning message to sites on old versions of PHP.
	 */
	function coil_show_php_warning() {
		echo '<div class="error"><p>' . esc_html__( 'Coil Web Monetization requires PHP 7.1 or newer. Please contact your web host for information on updating PHP.', 'coil-web-monetization' ) . '</p></div>';
		unset( $_GET['activate'] );
	}

	/**
	 * Deactivate the plugin.
	 */
	function coil_deactive_self() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	add_action( 'admin_notices', 'coil_show_php_warning' );
	add_action( 'admin_init', 'coil_deactive_self' );

	return;
}

require_once __DIR__ . '/includes/admin/functions.php';
require_once __DIR__ . '/includes/settings/functions.php';
require_once __DIR__ . '/includes/gating/functions.php';
require_once __DIR__ . '/includes/user/functions.php';
require_once __DIR__ . '/includes/functions.php';

add_action( 'plugins_loaded', 'Coil\init_plugin' );
