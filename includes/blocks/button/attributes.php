<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Controls\Border;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Link;
use ABlocks\Helper;
use ABlocks\Controls\BoxShadow;
use ABlocks\Controls\Icon;

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
	'text' => [
		'type' => 'string',
		'default' => 'Click here',
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
		'default' => '',
	],
	'iconPosition' => [
		'type' => 'string',
		'default' => 'left',
	],
	'iconSpace' => [
		'type' => 'number',
		'default' => 0,
	],

];


$attributes = array_merge(
	$attributes,
	Icon::get_attribute( '', false ),
	Link::get_attribute( 'link' ),
	Border::get_attribute( 'border', true ),
	Dimensions::get_attribute( 'padding', true ),
	Typography::get_attribute( 'typography', true ),
	TextShadow::get_attribute( 'textShadow' ),
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'left' ] ),
	Helper::get_icon_picker_attribute( 'icon', [ 'className' => '' ] ),
	BoxShadow::get_attribute( '_boxShadow', true ),
);

return $attributes;
