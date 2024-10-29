<?php
namespace ABlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Admin\Settings;

class Migration {

	public static function init() {
		$self = new self();
		$self->run_migration();
	}

	public function run_migration() {
		$academy_version = get_option( 'academy_version' );
		// Save Version Number, flash role management and save permalink
		if ( ABLOCKS_VERSION !== $academy_version ) {
			Settings::save_settings();
			update_option( 'academy_version', ABLOCKS_VERSION );
		}
	}
}
