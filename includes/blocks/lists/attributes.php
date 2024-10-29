<?php

use ABlocks\Controls\Alignment;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Typography;
use ABlocks\Controls\Width;
use ABlocks\Controls\Border;
use ABlocks\Controls\Range;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
	'markerType' => [
		'type' => 'string',
		'default' => 'icon',
	],
	'markerColor' => [
		'type' => 'string',
		'default' => ''
	],
	'markerSize' => [
		'type' => 'object',
		'default' => [
			'value' => 10,
			'valueTablet' => 10,
			'valueMobile' => 10
		]
	],
	'emoji' => [
		'type' => 'string',
		'default' => '✍',
	],
	'iconColor' => [
		'type' => 'string',
		'default' => '#000000',
	],
	'lists' => [
		'type' => 'array',
		'default' => [
			'id' => 0,
			'text' => 'Automatic dimming at night',
			'icon' => 'far fa-smile-beam',
			'link' => [
				'isLink' => false,
				'link' => '',
				'target' => '_',
			],
			'isOpen' => false,
		],
		[
			'id' => 1,
			'text' => '500 lumens of brightness',
			'icon' => 'far fa-calendar',
			'link' => [
				'isLink' => false,
				'link' => '',
				'target' => '_',
			],
			'isOpen' => false,
		],
		[
			'id' => 2,
			'text' => 'Extremely energy efficient',
			'icon' => 'far fa-edit',
			'link' => [
				'isLink' => true,
				'link' => 'https://www.google.com/',
				'target' => '_',
			],
			'isOpen' => false,
		],
	],
	'iconType' => [
		'type' => 'string',
		'default' => 'default',
	],
	'iconShape' => [
		'type' => 'string',
		'default' => 'circle',
	],
	'iconSize' => [
		'type' => 'object',
		'default' => [
			'value' => 20,
			'valueTablet' => 20,
			'valueMobile' => 20,
		],
	],
	'iconBackground' => [
		'type' => 'boolean',
		'default' => false,
	],
	'iconBackgroundColor' => [
		'type' => 'string',
		'default' => '',
	],
	'stack' => [
		'type' => 'string',
		'default' => 'vertical',
	],
	'belowItem' => [
		'type' => 'number',
		'default' => 0,
	],
	'horizontalAlignment' => [
		'type' => 'string',
		'default' => 'start',
	],
	'verticalAlignment' => [
		'type' => 'string',
		'default' => 'flex-start',
	],
	'divider' => [
		'type' => 'boolean',
		'default' => false,
	],
	'dividerPatternUrl' => [
		'type' => 'string',
		'default' => 'solid',
	],
	'borderColor' => [
		'type' => 'string',
		'default' => '#000000',
	],
];

$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'position', true, [ 'value' => 'center' ] ),
	Width::get_attribute( 'width', false ),
	Dimensions::get_attribute( 'padding', false ),
	Border::get_attribute( 'border', true ),
	Typography::get_attribute( 'typography', true ),
	Range::get_attribute([
		'attributeName' => 'iconSize',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 20,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	]),
	Range::get_attribute([
		'attributeName' => 'textIndent',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 8,
		'defaultValueTablet' => 8,
		'defaultValueMobile' => 8,

	]),
	Range::get_attribute([
		'attributeName' => 'spaceBetween',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 20,
	]),
	Range::get_attribute([
		'attributeName' => 'width',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 100,
		'defaultValueTablet' => 100,
		'defaultValueMobile' => 100,
		'hasUnit' => true,
		'unitDefaultValue' => '%',
	]),
	Range::get_attribute([
		'attributeName' => 'weight',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 1,
		'defaultValueTablet' => 1,
		'defaultValueMobile' => 1,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	]),
);
return $attributes;
