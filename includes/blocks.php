<?php
namespace ABlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly.
}

use ABlocks\Classes\AssetsGenerator;
use ABlocks\Helper;
use ABlocks\Classes\FileUpload;

class Blocks {
	public static function init() {
		$self = new self();
		// block initialization
		add_action( 'init', [ $self, 'blocks_init' ] );
		add_action( 'enqueue_block_assets', [ $self, 'load_academy_core_scripts' ] );
		add_filter( 'block_categories_all', [ $self, 'register_block_category' ], 10, 2 );
		// Assets Generator
		add_action( 'save_post', [ $self, 'generate_block_assets' ], 10, 3 );
	}

	public function blocks_init() {
		if ( Helper::is_plugin_active( 'academy/academy.php' ) ) {
			add_filter( 'academy/is_load_common_scripts', '__return_true' );
			if ( Helper::is_gutenberg_editor() ) {
				add_filter( 'academy/is_load_common_js_scripts', '__return_false' );
			}
			new \ABlocks\Blocks\AcademyCourses\Block();
			new \ABlocks\Blocks\AcademyEnrollForm\Block();
			new \ABlocks\Blocks\AcademyStudentRegistrationForm\Block();
			new \ABlocks\Blocks\AcademyCourseSearch\Block();
			new \ABlocks\Blocks\AcademyInstructorRegistrationForm\Block();
			new \ABlocks\Blocks\AcademyPdf\Block();
			new \ABlocks\Blocks\AcademyPasswordResetForm\Block();
			new \ABlocks\Blocks\AcademyLoginForm\Block();

			if ( ( helper::is_gutenberg_editor() && Helper::check_post_type_from_admin( 'academy_certificate' ) ) || ( ! helper::is_gutenberg_editor() && ! is_admin() ) ) {
				new \ABlocks\Blocks\AcademyCertificate\Block();
				new \ABlocks\Blocks\AcademyCertificateText\Block();
				if ( Helper::is_plugin_active( 'academy-pro/academy-pro.php' ) ) {
					new \ABlocks\Blocks\AcademyCertificateId\Block();
				}
			}
		}//end if
		new \ABlocks\Blocks\Container\Block();
		new \ABlocks\Blocks\Heading\Block();
		new \ABlocks\Blocks\Paragraph\Block();
		new \ABlocks\Blocks\Image\Block();
		new \ABlocks\Blocks\Button\Block();
		new \ABlocks\Blocks\DualButton\Block();
		new \ABlocks\Blocks\Icon\Block();
		new \ABlocks\Blocks\Lists\Block();
		new \ABlocks\Blocks\Counter\Block();
		new \ABlocks\Blocks\StarRatings\Block();
		new \ABlocks\Blocks\Divider\Block();
		new \ABlocks\Blocks\Spacer\Block();
		new \ABlocks\Blocks\Video\Block();
		new \ABlocks\Blocks\Carousel\Block();
		new \ABlocks\Blocks\CarouselChild\Block();
		new \ABlocks\Blocks\Toggle\Block();
		new \ABlocks\Blocks\ToggleChild\Block();
		new \ABlocks\Blocks\Accordion\Block();
		new \ABlocks\Blocks\SingleAccordion\Block();
		new \ABlocks\Blocks\Tabs\Block();
		new \ABlocks\Blocks\TabsChild\Block();
		new \ABlocks\Blocks\Countdown\Block();
		new \ABlocks\Blocks\Coupon\Block();
		new \ABlocks\Blocks\ContentTimeline\Block();
		new \ABlocks\Blocks\ContentTimelineChild\Block();
		new \ABlocks\Blocks\Map\Block();
		new \ABlocks\Blocks\TableOfContent\Block();
		new \ABlocks\Blocks\ImageComparison\Block();
		new \ABlocks\Blocks\FlipBox\Block();
		new \ABlocks\Blocks\FlipBoxChild\Block();
		new \ABlocks\Blocks\SocialShares\Block();
		new \ABlocks\Blocks\Notice\Block();
		new \ABlocks\Blocks\SvgDraw\Block();
	}

	public function register_block_category( $categories, $post ) {
		return array_merge(
			[
				[
					'slug' => 'ablocks',
					'title' => __( 'ABlocks', 'ablocks' ),
				],
				[
					'slug' => 'academy',
					'title' => __( 'Academy LMS', 'ablocks' ),
				],
			],
			$categories
		);
	}

	public function load_academy_core_scripts() {
		if ( ! Helper::is_plugin_active( 'academy/academy.php' ) || ! is_admin() ) {
			return;
		}
		$ScriptsBase = new \Academy\Assets();
		$ScriptsBase->frontend_common_assets();
	}

	public function generate_block_assets( $post_id, $post, $update ) {
		if ( ! Helper::is_enabled_assets_generation() ) {
			return;
		}

		if ( isset( $post->post_status ) && 'auto-draft' === $post->post_status ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( false !== wp_is_post_revision( $post_id ) ) {
			return;
		}

		// Don't save FSE theme assets
		if ( ( function_exists( 'wp_is_block_theme' ) && wp_is_block_theme() ) ) {
			return;
		}

		AssetsGenerator::write_frontend_css_in_uploads_folder( $post_id );
	}
}
