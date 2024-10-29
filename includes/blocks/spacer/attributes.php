<?php

use ABlocks\Controls\Range;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => ''
	]
];
$attributes = array_merge(
	$attributes,
	Range::get_attribute( [
		'attributeName' => 'spacerHeight',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 50,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	] ),
);
return $attributes;
