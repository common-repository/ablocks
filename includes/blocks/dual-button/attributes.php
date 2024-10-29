<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Controls\Alignment;
use ABlocks\Controls\Border;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\Range;

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
	'stack' => [
		'type' => 'string',
		'default' => 'horizontal',
	],
	'justifyItems' => [
		'type' => 'string',
		'default' => 'start',
	],
	'buttonType' => [
		'type' => 'string',
		'default' => '#ddd',
	],
	'buttonSize' => [
		'type' => 'string',
		'default' => 'small',
	],
	'textColor' => [
		'type' => 'string',
		'default' => '#000000',
	],
	'textColorH' => [
		'type' => 'string',
		'default' => '',
	],
	'background' => [
		'type' => 'string',
		'default' => '',
	],
	'backgroundH' => [
		'type' => 'string',
		'default' => '',
	],
	'transition' => [
		'type' => 'number',
		'default' => 0,
	],
];

$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'flex-start' ] ),
	Border::get_attribute( 'border', true ),
	Dimensions::get_attribute( 'padding', true ),
	Typography::get_attribute( 'typography', true ),
	TextShadow::get_attribute( 'textShadow' ),
	Range::get_attribute([
		'attributeName' => 'gap',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 10,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	]),
);

return $attributes;

