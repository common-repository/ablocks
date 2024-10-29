<?php
namespace ABlocks\Controls;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Classes\ControlBaseAbstract;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Range;

class Icon extends ControlBaseAbstract {
	public static function get_attribute_default_value( $is_responsive = false ) {
		return [];
	}

	public static function get_attribute( $attributeName, $isResponsive = false, $attribute_prefix = 'icon', $default = [] ) {
		$default_args = wp_parse_args($default, [
			'size' => 55,
			'color' => '#69727d',
			'BgColor' => ''
		]);

		$svgPathKey = $attribute_prefix . 'SvgPath';
		$svgViewBoxKey = $attribute_prefix . 'SvgViewBox';
		$svgClassKey = $attribute_prefix . 'Class';

		$attribute = [
			$svgPathKey => [
				'type' => 'string',
				'default' => '',
				'source' => 'attribute',
				'selector' => 'svg.ablocks-svg-icon path',
				'attribute' => 'd',
			],
			$svgViewBoxKey => [
				'type' => 'string',
				'default' => '',
				'source' => 'attribute',
				'selector' => 'svg.ablocks-svg-icon',
				'attribute' => 'viewBox',
			],
			$svgClassKey => [
				'type' => 'string',
				'default' => '',
			],

		];
		$attribute[ $attribute_prefix . 'Color' ] = [
			'type' => 'string',
			'default' => $default_args['color'],
		];
		$attribute[ $attribute_prefix . 'BgColor' ] = [
			'type' => 'string',
			'default' => $default_args['BgColor'],
		];

		$attribute[ $attribute_prefix . 'Type' ] = [
			'type' => 'string',
			'default' => 'default',
		];
		$attribute[ $attribute_prefix . 'Shape' ] = [
			'type' => 'string',
			'default' => 'circle',
		];

		$attribute = array_merge(
			$attribute,
			Dimensions::get_attribute( $attribute_prefix . 'Padding', false ),
			Dimensions::get_attribute( $attribute_prefix . 'BorderRadius', false ),
			Dimensions::get_attribute( $attribute_prefix . 'BorderWidth', false ),
			Range::get_attribute([
				'attributeName' => $attribute_prefix . 'Size',
				'isResponsive' => false,
				'defaultValue' => $default_args['size'],
			] ),
			Range::get_attribute([
				'attributeName' => $attribute_prefix . 'Rotate',
				'isResponsive' => false,
				'defaultValue' => 0,
			] ),
		);

		if ( isset( $defaultValue['path'] ) && isset( $defaultValue['viewBox'] ) ) {
			$attribute[ $svgPathKey ]['default'] = $defaultValue['path'];
			$attribute[ $svgViewBoxKey ]['default'] = $defaultValue['viewBox'];
		}
		if ( isset( $defaultValue['className'] ) ) {
			$attribute[ $svgClassKey ]['default'] = $defaultValue['className'];
		}
		return $attribute;
	}
	public static function get_css( $attribute_value, $property = '', $device = '' ) {
		return [];
	}



	public static function get_wrapper_css( $attributes, $device = '', $attributePrefix = 'icon' ) {
		$iconType = $attributes[ $attributePrefix . 'Type' ];
		$iconShape = $attributes[ $attributePrefix . 'Shape' ];
		$backgroundColor = $attributes[ $attributePrefix . 'BgColor' ];
		$primaryColor = $attributes[ $attributePrefix . 'Color' ];
		$iconViewCSS = [];

		if ( $iconType !== 'default' ) {
			if ( $iconType === 'stacked' ) {
				if ( $iconShape === 'circle' ) {
					$iconViewCSS = [
						'background' => $backgroundColor ? $backgroundColor : '#ddd',
						'border-radius' => '50px',
						'padding' => '.5em',
					];
				} elseif ( $iconShape === 'square' ) {
					$iconViewCSS = [
						'background' => $backgroundColor ? $backgroundColor : '#ddd',
						'padding' => '.5em',
					];
				}
			} elseif ( $iconType === 'framed' ) {
				if ( $iconShape === 'circle' ) {
					$iconViewCSS = [
						'background' => $backgroundColor ? $backgroundColor : 'transparent',
						'padding' => '.5em',
						'border-radius' => '50px',
						'border' => '2px solid ' . ( $primaryColor ? $primaryColor : '#69727d' ),
					];
				} elseif ( $iconShape === 'square' ) {
					$iconViewCSS = [
						'background' => $backgroundColor ? $backgroundColor : 'transparent',
						'padding' => '.5em',
						'border' => '2px solid ' . ( $primaryColor ? $primaryColor : '#69727d' ),
					];
				}
			}//end if
		}//end if

		if ( ! empty( $attributes[ $attributePrefix . 'Size' ] ) && empty( $attributes[ $attributePrefix . 'ImageUrl' ] ) ) {
			$iconViewCSS['font-size'] = $attributes[ $attributePrefix . 'Size' ] . 'px';
		}
		// Remove font size for fixing
		if ( isset( $attributes[ $attributePrefix . 'ImageUrl' ] ) && ! empty( $attributes[ $attributePrefix . 'ImageUrl' ] ) ) {
			$iconViewCSS['font-size'] = 'unset';
		}

		return array_merge(
			[ 'background' => $backgroundColor ],
			$iconViewCSS,
			'default' !== $iconType ? array_merge(
				Dimensions::get_css( $attributes[ $attributePrefix . 'Padding' ], 'padding', $device ),
				Dimensions::get_css( $attributes[ $attributePrefix . 'BorderRadius' ], 'border-radius', $device ),
				Dimensions::get_css( $attributes[ $attributePrefix . 'BorderWidth' ], 'border-width', $device )
			) : []
		);
	}

	public static function get_element_css( $attributes, $device = '', $attributePrefix = 'icon' ) {
		$iconType = $attributes[ $attributePrefix . 'Type' ] ?? 'default';
		$iconShape = $attributes[ $attributePrefix . 'Shape' ] ?? '';
		$primaryColor = $attributes[ $attributePrefix . 'Color' ] ?? '#69727d';
		$rotate = $attributes[ $attributePrefix . 'Rotate' ] ?? 0;
		$iconViewCSS = [];

		if ( $iconType !== 'default' ) {
			$iconViewCSS['fill'] = $primaryColor;
		}

		if ( $rotate ) {
			$iconViewCSS['transform'] = 'rotate(' . $rotate . 'deg)';
		}

		return array_merge(
			[ 'fill' => $primaryColor ],
			$iconViewCSS
		);
	}

	public static function get_element_image_css( $attributes, $device = '', $attributePrefix = 'icon' ) {
		$rotate = $attributes[ $attributePrefix . 'Rotate' ] ?? 0;
		$iconViewCSS = [];

		if ( $rotate ) {
			$iconViewCSS['transform'] = 'rotate(' . $rotate . 'deg)';
		}

		return array_merge(
			[
				'width' => $attributes[ $attributePrefix . 'Size' ] . 'px',
				'height' => 'auto'
			],
			$iconViewCSS
		);
	}
}
