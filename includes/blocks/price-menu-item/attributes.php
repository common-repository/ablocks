<?php

use ABlocks\Controls\Alignment;
use ABlocks\Controls\Range;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default'  => '',
	],
	'positionItems' => [
		'type' => 'string',
		'default' => 'baseline',
		'copyStyle' => true,
	],
	'justifyItems' => [
		'type' => 'string',
		'default' => 'space-between',
		'copyStyle' => true,
	],
	'gap' => [
		'type' => 'object',
		'default' => [
			'value' => 20,
			'valueTablet' => 20,
			'valueMobile' => 10,
		],
	],
	'image' => [
		'type' => 'string',
		'default' => '',
	],
	'title' => [
		'type' => 'string',
		'source' => 'html',
		'selector' => '.ablocks-price-menu-item-details-title',
		'default' => 'Title',
	],
	'titleSize' => [
		'type' => 'object',
		'default' => [
			'value' => 20,
			'valueTablet' => 20,
			'valueMobile' => 14,
		],
	],
	'titleColor' => [
		'type' => 'string',
		'default' => 'black',
		'copyStyle' => true,
	],
	'description' => [
		'type' => 'string',
		'source' => 'html',
		'selector' => '.ablocks-price-menu-item-details-des',
		'default' => 'Description',
	],
	'descriptionSize' => [
		'type' => 'object',
		'default' => [
			'value' => 17,
			'valueTablet' => 17,
			'valueMobile' => 10,
		],
	],
	'descriptionColor' => [
		'type' => 'string',
		'default' => 'gray',
		'copyStyle' => true,
	],
	'separatorWidth' => [
		'type' => 'object',
		'default' => [
			'value' => 200,
			'valueTablet' => 200,
			'valueMobile' => 100,
		],
	],
	'separatorHeight' => [
		'type' => 'object',
		'default' => [
			'value' => 2,
			'valueTablet' => 2,
			'valueMobile' => 2,
		],
	],
	'separatorColor' => [
		'type' => 'string',
		'default' => 'gray',
		'copyStyle' => true,
	],
	'price' => [
		'type' => 'number',
		'source' => 'html',
		'selector' => '.ablocks-price-menu-item-price',
		'default' => 20,
	],
	'priceSize' => [
		'type' => 'object',
		'default' => [
			'value' => 20,
			'valueTablet' => 20,
			'valueMobile' => 14,
		],
	],
	'priceColor' => [
		'type' => 'string',
		'default' => 'red',
		'copyStyle' => true,
	],
];

$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'position', true, [ 'value' => 'left' ] ),
	Typography::get_attribute( 'typography', true ),
	TextShadow::get_attribute( 'textShadow' ),
	TextStroke::get_attribute( 'textStroke', true ),
	Range::get_attribute([
		'attributeName' => 'gap',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 10,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	]),
	Range::get_attribute([
		'attributeName' => 'titleSize',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 14,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	]),
	Range::get_attribute([
		'attributeName' => 'descriptionSize',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 17,
		'defaultValueTablet' => 17,
		'defaultValueMobile' => 10,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	]),
	Range::get_attribute([
		'attributeName' => 'separatorWidth',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 200,
		'defaultValueTablet' => 200,
		'defaultValueMobile' => 100,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	]),
	Range::get_attribute([
		'attributeName' => 'separatorHeight',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 2,
		'defaultValueTablet' => 2,
		'defaultValueMobile' => 2,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	]),
	Range::get_attribute([
		'attributeName' => 'priceSize',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 14,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
		'copyStyle' => true,
	])
);

return $attributes;
