<?php
namespace ABlocks\Controls;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use ABlocks\Classes\ControlBaseAbstract;
class CssFilter extends ControlBaseAbstract {
	public static function get_attribute_default_value( $is_responsive = false ) {
		return [
			'blur' => '',
			'brightness' => '',
			'contrast' => '',
			'saturate' => '',
			'hue' => '',
			// css filter hover attributes
			'blurH' => '',
			'brightnessH' => '',
			'contrastH' => '',
			'saturateH' => '',
			'hueH' => '',
		];
	}
	public static function get_attribute( $attributeName, $isResponsive = false ) {
		return [
			$attributeName => [
				'type' => 'object',
				'default' => self::get_attribute_default_value(),
			],
		];
	}
	public static function get_css( $attribute_value, $property = '', $device = '' ) {
		$value = array_merge(
			self::get_attribute_default_value( (bool) $device ),
			$attribute_value
		);
		$css = [];
		$filterValues = [];
		if ( isset( $value['brightness'] ) && $value['brightness'] !== '' ) {
			$filterValues[] = 'brightness(' . ( $value['brightness'] ?? 100 ) . '%)';
		}
		if ( isset( $value['contrast'] ) && $value['contrast'] !== '' ) {
			$filterValues[] = 'contrast(' . ( $value['contrast'] ?? 100 ) . '%)';
		}
		if ( isset( $value['saturate'] ) && $value['saturate'] !== '' ) {
			$filterValues[] = 'saturate(' . ( $value['saturate'] ?? 100 ) . '%)';
		}
		if ( isset( $value['blur'] ) && $value['blur'] !== '' ) {
			$filterValues[] = 'blur(' . ( $value['blur'] ?? 0 ) . 'px)';
		}
		if ( isset( $value['hue'] ) && $value['hue'] !== '' ) {
			$filterValues[] = 'hue-rotate(' . ( $value['hue'] ?? 0 ) . 'deg)';
		}
		// Only add the filter property if there are valid filter values
		if ( ! empty( $filterValues ) ) {
			$css['filter'] = implode( ' ', $filterValues );
		}
		return $css;
	}
}
