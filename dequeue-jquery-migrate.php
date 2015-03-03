<?php
/**
 * Dequeue jQuery Migrate
 *
 * @package   DequeueJqueryMigrate
 * @author    Brady Vercher
 * @link      http://www.cedaro.com/
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Dequeue jQuery Migrate
 * Plugin URI:        https://github.com/cedaro/dequeue-jquery-migrate
 * Description:       Remove the jquery-migrate.js script dependency.
 * Version:           1.0.0
 * Author:            Cedaro
 * Author URI:        http://www.cedaro.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * GitHub Plugin URI: cedaro/dequeue-jquery-migrate
 */

/**
 * Remove the migrate script from the list of jQuery dependencies.
 *
 * @since 1.0.0
 *
 * @param WP_Scripts $scripts WP_Scripts scripts object. Passed by reference.
 */
function cedaro_dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}
add_action( 'wp_default_scripts', 'cedaro_dequeue_jquery_migrate' );
