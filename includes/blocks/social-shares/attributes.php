<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Controls\Alignment;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Width;
use ABlocks\Controls\Border;
use ABlocks\Controls\Range;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;

$attributes = [
	'block_id'               => [
		'type'               => 'string',
		'default'            => '',
	],
	'iconShape'          => [
		'type'           => 'string',
		'default'        => 'circle',
	],
	'stack'                 => [
		'type'              => 'string',
		'default'           => 'horizontal',
	],
	'belowItem'             => [
		'type'              => 'number',
		'default'           => 0,
	],
	'horizontalAlignment'   => [
		'type'              => 'string',
		'default'           => 'start',
	],
	'verticalAlignment'   => [
		'type'              => 'string',
		'default'           => 'flex-start',
	],
	'buttonBackground' => [
		'type' => 'string',
		'default' => '',

	],
	'buttonHover' => [
		'type' => 'string',
		'default' => '',

	],
	'shareButtonIconColor' => [
		'type' => 'string',
		'default' => '#170a1b',

	],
];
$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'position', true, [ 'value' => 'center' ] ),
	Width::get_attribute( 'width', false ),
	Dimensions::get_attribute( 'radius', false ),
	Border::get_attribute( 'border', true ),
	Border::get_attribute( 'itemBorder', true ),
	Range::get_attribute( [
		'attributeName' => 'spaceBetween',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 20,
		'defaultValueTablet' => 20,
		'defaultValueMobile' => 20,
	]),
	Range::get_attribute( [
		'attributeName' => 'shareSize',
		'isResponsive' => false,
		'defaultValue' => 48,
		'defaultValueTablet' => 48,
		'defaultValueMobile' => 48,
	]),
	Range::get_attribute( [
		'attributeName' => 'shareIconSize',
		'isResponsive' => false,
		'defaultValue' => 16,
		'defaultValueTablet' => 16,
		'defaultValueMobile' => 16,
	]),
	Range::get_attribute( [
		'attributeName' => 'shareItemIconSize',
		'isResponsive' => false,
		'defaultValue' => 25,
		'defaultValueTablet' => 25,
		'defaultValueMobile' => 25,
	]),
	Range::get_attribute( [
		'attributeName' => 'itemIconWidth',
		'isResponsive' => false,
		'defaultValue' => '43',
	]),
	Range::get_attribute( [
		'attributeName' => 'itemIconHeight',
		'isResponsive' => false,
		'defaultValue' => '42',
	]),
	Range::get_attribute( [
		'attributeName' => 'itemTextWidth',
		'isResponsive' => false,
		'defaultValue' => '80',
	]),
	Range::get_attribute( [
		'attributeName' => 'itemTextHeight',
		'isResponsive' => false,
		'defaultValue' => '26',
	]),
);

return $attributes;
