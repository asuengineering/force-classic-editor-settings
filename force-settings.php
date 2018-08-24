<?php
/**
 * Plugin Name:     ASU Engineering - Force Classic Editor Coexistence
 * Plugin URI:      https://github.com/asuengineering/force-classic-editor-settings
 * Description:     Plugin to force the settings of the Classic Editor plugin to always display the Gutenberg editor. Coexist.
 * Author:          Steve Ryan, ASU Engineering
 * Author URI:      https://engineering.asu.edu
 * Text Domain:     asu-engineering-force-classic-editor-coexistence
 * Version:         0.1
 *
 * @package         ASU_Engineering_Force_Classic_Editor_Coexistence
 */

// Hardcode the no-replace option into Classic Editor, bypassing the settings within.
// Inspired by https://github.com/senlin/classic-editor-addon

add_action( 'plugins_loaded', 'asufse_force_editor_settings', 1, 0 );
function asufse_force_editor_settings() {
	if ( function_exists( 'classic_editor_init_actions' ) ) {
		// Enforces the default option of "no-replace."
		add_filter( 'pre_option_classic-editor-replace', 'asufse_force_coexistence' );
	}
}

function asufse_force_coexistence( $value ) {
	return 'no-replace';
}
