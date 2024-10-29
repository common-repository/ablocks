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

$attributes = [
	'block_id' => array(
		'type' => 'string',
		'default'   => '',
	),
	'accordionTitle' => [
		'type' => 'string',
		'default' => 'Accordion Title'
	],
	'headerTextColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'headerTextColorH' => [
		'type' => 'string',
		'default'   => '',
	],
	'headerTextActiveColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'headerBackgroundActiveColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'headerBackgroundColorH' => [
		'type' => 'string',
		'default'   => '',
	],
	'headerBackgroundColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'itemSpace' => [
		'type' => 'number',
		'default'   => 0,
	],
	'iconSize' => [
		'type' => 'number',
		'default'   => 0,
	],
	'iconColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'iconColorH' => [
		'type' => 'string',
		'default'   => '',
	],
	'bodyBackgroundH' => [
		'type' => 'string',
		'default'   => '',
	],
	'bodyBackground' => [
		'type' => 'string',
		'default'   => '',
	],
];
$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'center' ] ),
	Typography::get_attribute( 'headerTypography', true, [ 'weight' => '' ] ),
	TextShadow::get_attribute( 'headerTextShadow' ),
	TextStroke::get_attribute( 'headerTextStroke', true ),
	Border::get_attribute( 'itemBorder', true ),
	Dimensions::get_attribute( 'headerPadding', true ),
	Dimensions::get_attribute( 'bodyPadding', true ),
	Border::get_attribute( 'headerBorder', true )
);
return $attributes;
