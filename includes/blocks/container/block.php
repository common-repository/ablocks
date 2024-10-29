<?php
namespace ABlocks\Blocks\Container;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\BackgroundOverlay;

class Block extends BlockBaseAbstract {
	protected $block_name = 'container';

	public function build_css( $attributes ) {
		$css_generator = new CssGenerator( $attributes, $this->block_name );

		$css_generator->add_class_styles(
			'{{WRAPPER}}.ablocks-block--container',
			$this->get_main_wrapper_css( $attributes ),
			$this->get_main_wrapper_css( $attributes, 'Tablet' ),
			$this->get_main_wrapper_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} > .ablocks-block-container',
			$this->get_block_container_css( $attributes ),
			$this->get_block_container_css( $attributes, 'Tablet' ),
			$this->get_block_container_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} > .ablocks-block-container',
			$this->get_inner_blocks_closest_parent_css( $attributes ),
			$this->get_inner_blocks_closest_parent_css( $attributes, 'Tablet' ),
			$this->get_inner_blocks_closest_parent_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} > .ablocks-block-container > *:not(style,.ablocks-block--container)',
			$this->get_container_inner_blocks_row_column_display_css( $attributes ),
			$this->get_container_inner_blocks_row_column_display_css( $attributes, 'Tablet' ),
			$this->get_container_inner_blocks_row_column_display_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}}::before',
			$this->get_container_before_css( $attributes ),
			$this->get_container_before_css( $attributes, 'Tablet' ),
			$this->get_container_before_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}}:hover::before',
			$this->get_container_before_hover_css( $attributes ),
			$this->get_container_before_hover_css( $attributes, 'Tablet' ),
			$this->get_container_before_hover_css( $attributes, 'Mobile' ),
		);

		return $css_generator->generate_css();
	}

	public function get_inner_blocks_closest_parent_css( $attributes, $device = '' ) {
		$css = [];

		$minimum_height = isset( $attributes['minimumHeight'] ) ? $attributes['minimumHeight'] : [];
		if ( ! empty( $minimum_height[ 'value' . $device ] ) ) {
			$css['min-height'] = $minimum_height[ 'value' . $device ]
				. ( ! empty( $minimum_height[ 'valueUnit' . $device ] ) ? $minimum_height[ 'valueUnit' . $device ] : 'px' );
		}

		if ( ! empty( $attributes[ 'direction' . $device ] ) ) {
			$css['flex-direction'] = $attributes[ 'direction' . $device ];
		}
		if ( ! empty( $attributes[ 'justify' . $device ] ) ) {
			$css['justify-content'] = $attributes[ 'justify' . $device ];
		}
		if ( ! empty( $attributes[ 'align' . $device ] ) ) {
			$css['align-items'] = $attributes[ 'align' . $device ];
		}
		if ( ! empty( $attributes[ 'wrap' . $device ] ) ) {
			$css['flex-wrap'] = $attributes[ 'wrap' . $device ];
		}

		$gap = isset( $attributes['gap'] ) ? $attributes['gap'] : [];
		if ( ! empty( $gap[ 'columnGap' . $device ] ) ) {
			$css['column-gap'] = $gap[ 'columnGap' . $device ]
			. ( ! empty( $gap[ 'columnGapUnit' . $device ] ) ? $gap[ 'columnGapUnit' . $device ] : 'px' );
		}

		if ( ! empty( $gap[ 'rowGap' . $device ] ) ) {
			$css['row-gap'] = $gap[ 'rowGap' . $device ]
				. ( ! empty( $gap[ 'rowGapUnit' . $device ] ) ? $gap[ 'rowGapUnit' . $device ] : 'px' );
		}

		return $css;
	}
	public function get_container_inner_blocks_row_column_display_css( $attributes, $device = '' ) {
		$css = [];
		if ( 'row' === $attributes[ 'direction' . $device ] ) {
			$css['display'] = 'inline-block';
			$css['width'] = 'auto';
		}
		return $css;
	}

	public function get_block_container_css( $attributes, $device = '' ) {
		$css = [];

		$content_box_width_value = $attributes['containerContentWidth'][ "value{$device}" ] ?? '';
		$content_box_width_unit = $attributes['containerContentWidth'][ "valueUnit{$device}" ] ?? 'px';

		if ( $attributes['containerWidthType'] === 'boxed' ) {
			$css['max-width'] = "min(100%, {$content_box_width_value}{$content_box_width_unit})";
			$css['margin-right'] = 'auto';
			$css['margin-left'] = 'auto';
		}

		return $css;
	}

	public function get_main_wrapper_css( $attributes, $device = '' ) {

		$css = [];
		$containerWidth = isset( $attributes['containerWidth'] )
			? $attributes['containerWidth']
			: [
				'value' => 100,
				'valueUnit' => '%'
			];
		$custom_width = ! empty( $containerWidth[ 'value' . $device ] )
				? $containerWidth[ 'value' . $device ]
				: false;
		$custom_width_unit = ! empty( $containerWidth[ 'valueUnit' . $device ] )
					? $containerWidth[ 'valueUnit' . $device ]
					: 'px';
		$is_root_container = isset( $attributes['isRootContainer'] ) ? $attributes['isRootContainer'] : false;
		$container_width_type = isset( $attributes['containerWidthType'] ) ? $attributes['containerWidthType'] : '';
		if ( $custom_width && ( ! $is_root_container || 'full' === $container_width_type ) ) {
			$css['max-width'] = "min(100%, {$custom_width}{$custom_width_unit})";

		}

		$css['overflow'] = ! empty( $attributes['overflow'] ) ? $attributes['overflow'] : 'visible';

		return array_merge(
			Dimensions::get_css( $attributes['_padding'], 'padding', $device ),
			$css
		);
	}
	public static function get_container_before_css( $attributes, $device = '' ) {
		return array_merge(
			BackgroundOverlay::get_before_css( $attributes['_backgroundOverlay'], 'background', $device ),
		);
	}
	public static function get_container_before_hover_css( $attributes, $device = '' ) {
		return array_merge(
			BackgroundOverlay::get_before_hover_css( $attributes['_backgroundOverlay'], 'background', $device ),
		);
	}
}
