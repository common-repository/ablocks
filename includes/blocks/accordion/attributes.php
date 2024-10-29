<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use ABlocks\Controls\Alignment;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
use ABlocks\Controls\Border;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Range;
use ABlocks\Helper;
$attributes = [
	'block_id' => array(
		'type' => 'string',
		'default' => '',
	),
	'allowMultiple' => [
		'type' => 'boolean',
		'default' => true,
	],
	'initialOpen' => [
		'type' => 'number',
		'default' => 1,
	],
	'iconColor' => [
		'type' => 'string',
		'default' => '#000000'
	],
	'iconColorH' => [
		'type' => 'string',
		'default' => '',
	],
	'iconActiveColor' => [
		'type' => 'string',
		'default' => '',
	],
	'headerTextColor' => [
		'type' => 'string',
		'default' => '#000000'
	],
	'headerTextColorH' => [
		'type' => 'string',
		'default' => '',
	],
	'headerTextActiveColor' => [
		'type' => 'string',
		'default' => '',
	],
	'bodyBackgroundH' => [
		'type' => 'string',
		'default' => '',
	],
	'bodyBackground' => [
		'type' => 'string',
		'default' => '#F9F9F9'
	],
	'headingTag' => [
		'type' => 'string',
		'default' => 'p'
	],
	'iconPosition' => [
		'type' => 'string',
		'default' => 'right'
	],
	'showIcon' => [
		'type' => 'boolean',
		'default' => true
	],
	'headerBackgroundActiveColor' => [
		'type' => 'string',
		'default' => '',
	],
	'headerBackgroundColorH' => [
		'type' => 'string',
		'default' => '',
	],
	'headerBackgroundColor' => [
		'type' => 'string',
		'default' => '#F9F9F9'
	],
];
$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'center' ] ),
	Typography::get_attribute( 'headerTypography', true ),
	TextShadow::get_attribute( 'headerTextShadow' ),
	TextStroke::get_attribute( 'headerTextStroke', true ),
	Border::get_attribute( 'itemBorder', true ),
	Dimensions::get_attribute( 'headerPadding', true ),
	Dimensions::get_attribute( 'bodyPadding', true ),
	Border::get_attribute( 'headerBorder', true ),
	Helper::get_icon_picker_attribute( 'leftCloseIcon', [ 'className' => '' ] ),
	Helper::get_icon_picker_attribute( 'leftActiveIcon', [ 'className' => '' ] ),
	Helper::get_icon_picker_attribute( 'rightCloseIcon', [
		'path' => 'M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z',
		'viewBox' => '0 0 576 512',
		'className' => 'far fa-star',
	] ),
	Helper::get_icon_picker_attribute( 'rightActiveIcon', [ 'className' => '' ] ),
	Range::get_attribute( [
		'attributeName' => 'itemSpace',
		'isResponsive' => false,
		'defaultValue' => 10,
	] ),
	Range::get_attribute([
		'attributeName' => 'iconSize',
		'isResponsive' => false,
		'defaultValue' => 30,
	]),
	Range::get_attribute([
		'attributeName' => 'iconSpace',
		'isResponsive' => false,
		'defaultValue' => 10,
	]),
);
return $attributes;
