<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use ABlocks\Controls\Range;
use ABlocks\Controls\BackgroundOverlay;

$attributes = [
	'block_id' => array(
		'type' => 'string',
		'default' => ''
	),
	'className' => [
		'type' => 'string',
		'default' => '',
	],
	'isRootContainer' => [
		'type' => 'boolean',
		'default' => false,
	],
	'variationSelected' => [
		'type' => 'boolean',
		'default' => true,
	],
	'containerWidthType' => [
		'type' => 'string',
		'default' => 'boxed',
	],
	'overflow' => [
		'type' => 'string',
		'default' => 'visible',
	],
	// flex direction start
	'direction' => [
		'type' => 'string',
		'default' => 'column',
	],
	'directionTablet' => [
		'type' => 'string',
		'default' => '',
	],
	'directionMobile' => [
		'type' => 'string',
		'default' => '',
	],
	// flex 'justify content' start
	'justify' => [
		'type' => 'string',
		'default' => '',
	],
	'justifyTablet' => [
		'type' => 'string',
		'default' => '',
	],
	'justifyMobile' => [
		'type' => 'string',
		'default' => '',
	],
	// flex 'align items" start
	'align' => [
		'type' => 'string',
		'default' => '',
	],
	'alignTablet' => [
		'type' => 'string',
		'default' => '',
	],
	'alignMobile' => [
		'type' => 'string',
		'default' => '',
	],
	// flex 'wrap" start
	'wrap' => [
		'type' => 'string',
		'default' => '',
	],
	'wrapTablet' => [
		'type' => 'string',
		'default' => '',
	],
	'wrapMobile' => [
		'type' => 'string',
		'default' => '',
	],

];

$attributes = array_merge(
	$attributes,
	Range::get_attribute( [
		'attributeName' => 'minimumHeight',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => null,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	] ),
	Range::get_attribute([
		'attributeName' => 'containerWidth',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 100,
		'hasUnit' => true,
		'unitDefaultValue' => '%',
	]),
	Range::get_attribute([
		'attributeName' => 'containerContentWidth',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => \ABlocks\Helper::get_settings( 'default_container_width', 1140 ),
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	]),
	Range::get_attribute([
		'attributeName' => 'gap',
		'isResponsive' => true,
		'defaultValue' => null,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	]),
	BackgroundOverlay::get_attribute( '_backgroundOverlay', true ),
);

return $attributes;
