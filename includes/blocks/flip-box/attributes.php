<?php

use ABlocks\Controls\Border;
use ABlocks\Controls\Background;
use ABlocks\Controls\Dimensions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
	'flipDirection' => [
		'type' => 'string',
		'default' => 'left',
	],
	'transitionSpeed' => [
		'type' => 'number',
		'default' => 0.6,
	],
	'showSide' => [
		'type' => 'string',
		'default' => 'front',
	],
];

$attributes = array_merge(
	$attributes,
	Border::get_attribute( 'cardBorder', true ),
	Background::get_attribute( 'frontCardBackground', true ),
	Background::get_attribute( 'backCardBackground', true ),
	Dimensions::get_attribute( 'frontPadding', true ),
	Dimensions::get_attribute( 'backPadding', true ),
);

return $attributes;
