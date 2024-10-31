<?php
/**
 * Plugin Name: PT AO90
 * Plugin URI:  https://wp-portugal.com/traducao/plugin-pt-ao90/
 * Description: Sets WordPress language to Portuguese (AO90), according to the orthographic reform of 1990, and adds fallbacks to the pre-AO90 orthography.
 * Version:     0.5
 * Author:      Comunidade Portuguesa de WordPress, PT Woo Plugins (by Webdados), Álvaro Góis dos Santos
 * Author URI:  https://wp-portugal.com/
 * License:     GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: pt-ao90
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 *
 * Copyright (c) 2017
 * Based on Pascal Birchler’s "Preferred Languages" plugin (https://github.com/swissspidy/preferred-languages)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 3 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

/**
 * Loads plugin textdomain.
 */
function ao90_load_textdomain() {
	load_plugin_textdomain( 'pt-ao90' );
}
add_action( 'init', 'ao90_load_textdomain' );

/**
 * Returns the list of preferred languages.
 */
function ao90_get_list() {
	$preferred_locales = array( 'pt_PT_ao90', 'pt_PT' );
	// $preferred_locales = array( 'pt_PT_ao90', 'pt_PT', 'pt_BR' ); - Maybe also get Portuguese from Brasil? NO! Use the 'pt_ao90_preferred_locales' filter if you want pt_BR
	return apply_filters( 'pt_ao90_preferred_locales', $preferred_locales );
}

/**
 * Filters load_textdomain() calls to respect the list of preferred languages - This is where magic happens
 *
 * @param string $mofile the path to the MO file being read.
 */
function ao90_load_textdomain_mofile( $mofile ) {
	$preferred_locales = ao90_get_list();
	$current_locale    = get_locale();
	if ( $current_locale !== reset( $preferred_locales ) ) {
		return $mofile;
	}
	if ( empty( $preferred_locales ) ) {
		return $mofile;
	}
	if ( is_readable( $mofile ) ) {
		return $mofile;
	}
	foreach ( $preferred_locales as $locale ) {
		$preferred_mofile = str_replace( $current_locale, $locale, $mofile );
		if ( is_readable( $preferred_mofile ) ) {
			return $preferred_mofile;
		}
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'ao90_load_textdomain_mofile', 10 );

/**
 * Sets the default language upon activation.
 */
function ao90_activate() {
	$preferred_locales = ao90_get_list();
	if ( ! empty( $preferred_locales ) ) {
		$default = reset( $preferred_locales );
		if ( ! in_array( $default, get_available_languages(), true ) ) {
			// Load WordPress Translation Install API and download language pack
			require_once ABSPATH . 'wp-admin/includes/translation-install.php';
			wp_download_language_pack( $default );
		}
		update_option( 'WPLANG', $default );
	}
}
register_activation_hook( __FILE__, 'ao90_activate' );

/**
 * Admin notice if the current locale is not pt_PT_ao90.
 */
function ao90_admin_notice() {
	$preferred_locales = ao90_get_list();
	$current_locale    = get_locale();
	if ( $current_locale !== reset( $preferred_locales ) ) {
		?>
		<div class="notice notice-error is-dismissible">
			<p>
				<?php
				echo wp_kses_post(
					sprintf(
						/* translators: %s:  Link to the website settings */
						__( 'The PT AO90 plugin is enabled but not effective. It requires that the <a href="%s">Site Language</a> option is set to "Português (AO90)".', 'pt-ao90' ),
						get_admin_url() . 'options-general.php'
					)
				);
				?>
			</p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'ao90_admin_notice' );

/* If you’re reading this you must know what you’re doing ;-) Greetings from sunny Portugal! */
