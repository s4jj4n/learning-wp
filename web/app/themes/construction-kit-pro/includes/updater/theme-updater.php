<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://wpcharms.com/', // Site where EDD is hosted
		'item_name'      => 'Construction Kit Pro', // Name of theme
		'theme_slug'     => 'construction-kit-pro', // Theme slug
		'version'        => '1.0.3', // The current version of this theme
		'author'         => 'WP Charms', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://wpcharms.com/my-account/', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'construction-kit' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'construction-kit' ),
		'license-key'               => __( 'License Key', 'construction-kit' ),
		'license-action'            => __( 'License Action', 'construction-kit' ),
		'deactivate-license'        => __( 'Deactivate License', 'construction-kit' ),
		'activate-license'          => __( 'Activate License', 'construction-kit' ),
		'status-unknown'            => __( 'License status is unknown.', 'construction-kit' ),
		'renew'                     => __( 'Renew?', 'construction-kit' ),
		'unlimited'                 => __( 'unlimited', 'construction-kit' ),
		'license-key-is-active'     => __( 'License key is active.', 'construction-kit' ),
		'expires%s'                 => __( 'Expires %s.', 'construction-kit' ),
		'expires-never'             => __( 'Lifetime License.', 'construction-kit' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'construction-kit' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'construction-kit' ),
		'license-key-expired'       => __( 'License key has expired.', 'construction-kit' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'construction-kit' ),
		'license-is-inactive'       => __( 'License is inactive.', 'construction-kit' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'construction-kit' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'construction-kit' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'construction-kit' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'construction-kit' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'construction-kit' ),
	)

);
