<?php
namespace ABlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use ABlocks\Classes\FileUpload;
use ABlocks\Classes\BlockGlobal;

class Helper {

	public static function get_time() {
		return time() + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS );
	}

	public static function get_settings( $key, $default = null ) {
		global $ablocks_settings;

		if ( isset( $ablocks_settings->{$key} ) ) {
			return $ablocks_settings->{$key};
		}

		return $default;
	}


	public static function is_plugin_installed( $path ) {
		$installed_plugins = get_plugins();
		return isset( $installed_plugins[ $path ] );
	}

	public static function is_active_academy() {
		$academy = 'academy/academy.php';
		return self::is_plugin_active( $academy );
	}


	public static function is_active_storeengine() {
		$storeengine = 'storeengine/storeengine.php';
		return self::is_plugin_active( $storeengine );
	}

	public static function is_active_wp_map_block() {
		$wp_map_block = 'wp-map-block/wp-map-block.php';
		return self::is_plugin_active( $wp_map_block );
	}

	public static function is_enabled_assets_generation() {
		$flag = false;
		if ( (bool) self::get_settings( 'enabled_assets_file_generation' ) ) {
			$flag = function_exists( 'wp_is_block_theme' ) ? ! wp_is_block_theme() : true;
		}
		return apply_filters( 'ablocks/is_enabled_assets_generation', $flag );
	}

	public static function is_plugin_active( $basename ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			include_once ABSPATH . '/wp-admin/includes/plugin.php';
		}
		return is_plugin_active( $basename );
	}

	public static function is_dev_mode_enable() {
		$environment = wp_get_environment_type();
		if ( 'local' === $environment || 'development' === $environment ) {
			return true;
		}
	}

	public static function get_admin_menu_list() {
		$menu                                     = [];
		$menu[ ABLOCKS_PLUGIN_SLUG ]              = [
			'parent_slug' => ABLOCKS_PLUGIN_SLUG,
			'title'       => __( 'Dashboard', 'ablocks' ),
			'capability'  => 'manage_options',
		];
		$menu[ ABLOCKS_PLUGIN_SLUG . '-settings' ]   = [
			'parent_slug' => ABLOCKS_PLUGIN_SLUG,
			'title'       => __( 'Settings', 'ablocks' ),
			'capability'  => 'manage_options',
		];
		$menu[ ABLOCKS_PLUGIN_SLUG . '-get-pro' ] = [
			'parent_slug' => ABLOCKS_PLUGIN_SLUG,
			'title'       => '<span class="dashicons dashicons-awards academy-blue-color"></span> ' . __( 'Get Pro', 'ablocks' ),
			'capability'  => 'manage_options',
		];
		return apply_filters( 'ablocks/admin_menu_list', $menu );
	}

	public static function get_preloader_html() {
		ob_start();
		?>
			<div class="ablocks-initial-preloader"><?php esc_html_e( 'Loading...', 'ablocks' ); ?></div>
		<?php
		return ob_get_clean();
	}
	public static function has_value( $value ) {
		return isset( $value ) && ! empty( $value );
	}
	public static function is_gutenberg_editor() {
		global $pagenow;
		if ( $pagenow === 'post.php' || $pagenow === 'post-new.php' ) {
			return true;
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return ( isset( $_GET['context'] ) && 'edit' === $_GET['context'] ) || ( isset( $_GET['action'] ) && 'edit' === $_GET['action'] );
	}
	public static function attr_shortcode( $attr_array ) {
		$html_attr = '';
		foreach ( $attr_array as $attr_name => $attr_val ) {
			if ( empty( $attr_val ) ) {
				continue;
			}
			if ( is_array( $attr_val ) ) {
				$html_attr .= $attr_name . '="' . implode( ',', $attr_val ) . '" ';
			} else {
				$html_attr .= $attr_name . '="' . $attr_val . '" ';
			}
		}
		return $html_attr;
	}

	public static function get_attribute_value( $attributes, $attribute_name ) {
		return isset( $attributes[ $attribute_name ] ) ? $attributes[ $attribute_name ] : '';
	}

	public static function get_terms_list( $taxonomy = 'category' ) {
		$options = [];
		$terms   = get_terms( [
			'taxonomy'   => $taxonomy,
			'hide_empty' => true,
		] );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[] = [
					'label' => $term->name,
					'value' => $term->term_id,
				];
			}
		}

		return $options;
	}

	public static function get_icon_picker_attribute( $attributePrefix = 'icon', $defaultValue = [] ) {
		$svgPathKey = $attributePrefix . 'SvgPath';
		$svgViewBoxKey = $attributePrefix . 'SvgViewBox';
		$svgClassKey = $attributePrefix . 'Class';

		$attribute = [
			$svgPathKey => [
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'svg.ablocks-svg-icon path',
				'attribute' => 'd',
			],
			$svgViewBoxKey => [
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'svg.ablocks-svg-icon',
				'attribute' => 'viewBox',
			],
			$svgClassKey => [
				'type' => 'string',
			],
		];

		if ( isset( $defaultValue['path'] ) && isset( $defaultValue['viewBox'] ) ) {
			$attribute[ $svgPathKey ]['default'] = $defaultValue['path'];
			$attribute[ $svgViewBoxKey ]['default'] = $defaultValue['viewBox'];
		}
		if ( isset( $defaultValue['className'] ) ) {
			$attribute[ $svgClassKey ]['default'] = $defaultValue['className'];
		}
		return $attribute;
	}
	public static function is_fse_theme() {
		return function_exists( 'wp_is_block_theme' ) && wp_is_block_theme();
	}

	public static function check_post_type_from_admin( $post_type ) {
		global $post;
		if ( is_admin() ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( $post && get_post_type( $post ) === $post_type ) {
				return true;
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			} elseif ( isset( $_GET['post_type'] ) && $_GET['post_type'] === $post_type ) {
				return true;
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			} elseif ( isset( $_GET['post'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$queried_post_type = get_post_type( $_GET['post'] );
				if ( $queried_post_type === $post_type ) {
					return true;
				}
			}
		}
		return false;
	}


	public static function render_svg_icon_using_attr( $attributes = array() ) {
		$default_attributes = array(
			'path' => '',
			'viewBox' => '0 0 24 24',
			'className' => 'icon-class',
			'width' => '24',
			'height' => '24',
		);

		// Merge passed attributes with default values
		$attributes = array_merge( $default_attributes, $attributes );

		// Sanitize attributes for safety
		$path = esc_attr( $attributes['path'] );
		$viewBox = esc_attr( $attributes['viewBox'] );
		$className = esc_attr( $attributes['className'] );
		$width = esc_attr( $attributes['width'] );
		$height = esc_attr( $attributes['height'] );

		// Output the SVG
		return '
		<svg 
			xmlns="http://www.w3.org/2000/svg" 
			viewBox="' . $viewBox . '" 
			class="' . $className . '" 
			width="' . $width . '" 
			height="' . $height . '">
			<path d="' . $path . '"></path>
		</svg>';
	}
}
