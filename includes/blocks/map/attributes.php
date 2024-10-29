<?php

use ABlocks\Controls\Range;

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
	'mapMarkerList' => [
		'type' => 'array',
		'default' => [],
	],
	'mapZoom' => [
		'type' => 'number',
		'default' => 10,
	],
	'mapType' => [
		'type' => 'string',
		'default' => 'GM',
	],
	'scrollWheelZoom' => [
		'type' => 'boolean',
		'default' => false,
	],
	'centerIndex' => [
		'type' => 'number',
		'default' => 0,
	],
];

$attributes = array_merge(
	$attributes,
	Range::get_attribute([
		'attributeName' => 'mapWidth',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'hasUnit' => true,
		'unitDefaultValue' => '%',
		'defaultValue' => 100,
		'defaultValueMobile' => 100,
		'defaultValueTablet' => 100,
	]),
	Range::get_attribute([
		'attributeName' => 'mapHeight',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'defaultValue' => 500,
		'defaultValueMobile' => 500,
		'defaultValueTablet' => 500,
	])
);

return $attributes;

