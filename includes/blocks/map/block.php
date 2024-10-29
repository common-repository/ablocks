<?php
namespace ABlocks\Blocks\Map;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;

class Block extends BlockBaseAbstract {
	protected $block_name = 'map';
	protected $style_depends = [ 'ablocks-leaflet-style', 'ablocks-leaflet-full-screen-style' ];
	protected $script_depends = [ 'ablocks-leaflet-script', 'ablocks-leaflet-full-screen-script' ];

	private function get_map_height_width_css( $attributes, $device = '' ) {
		$css = [];

		if ( isset( $attributes['mapWidth'][ 'value' . $device ] ) ) {
			$width = esc_attr( $attributes['mapWidth'][ 'value' . $device ] );
			$unit = isset( $attributes['mapWidth'][ 'valueUnit' . $device ] ) ? esc_attr( $attributes['mapWidth'][ 'valueUnit' . $device ] ) : '%';
			$css['width'] = "{$width}{$unit}";
		}

		if ( isset( $attributes['mapHeight'][ 'value' . $device ] ) ) {
			$height = esc_attr( $attributes['mapHeight'][ 'value' . $device ] );
			$unit = isset( $attributes['mapHeight'][ 'valueUnit' . $device ] ) ? esc_attr( $attributes['mapHeight'][ 'valueUnit' . $device ] ) : 'px';
			$css['height'] = "{$height}{$unit}";
		}

		return $css;
	}

	public function build_css( $attributes ) {
		$css_generator = new CssGenerator( $attributes, $this->block_name );

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-map-block',
			$this->get_map_height_width_css( $attributes ),
			$this->get_map_height_width_css( $attributes, 'Tablet' ),
			$this->get_map_height_width_css( $attributes, 'Mobile' )
		);

		return $css_generator->generate_css();
	}

	public static function escaping_array_data( $array ) {
		foreach ( $array as $key => &$value ) {
			if ( is_array( $value ) ) {
				$value = self::escaping_array_data( $value );
			} else {
				$value = esc_attr( $value );
			}
		}
		return $array;
	}

	public function render_block_content( $attributes, $content, $block_instance ) {
		$settings = [
			'mapMarkerList' => $this->escaping_array_data( isset( $attributes['mapMarkerList'] ) ? $attributes['mapMarkerList'] : [] ),
			'mapZoom' => ( isset( $attributes['mapZoom'] ) ? esc_attr( $attributes['mapZoom'] ) : 10 ),
			'scrollWheelZoom' => ( isset( $attributes['scrollWheelZoom'] ) ? esc_attr( $attributes['scrollWheelZoom'] ) : false ),
			'mapType' => ( isset( $attributes['mapType'] ) ? esc_attr( $attributes['mapType'] ) : 'GM' ),
			'centerIndex' => ( isset( $attributes['centerIndex'] ) ? intval( esc_attr( $attributes['centerIndex'] ) ) : 0 ),
			'defaultMarkerIcon' => esc_url( ABLOCKS_ASSETS_URL . 'images/marker-icon.png' ),
		];
		ob_start();
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
		<div data-settings='<?php echo htmlspecialchars( wp_json_encode( $settings ), ENT_QUOTES, 'UTF-8' ); ?>' class="ablocks-map-block"></div>
		<?php
		$output = ob_get_clean();
		return $output;
	}
}
