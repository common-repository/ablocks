<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Alignment;
use ABlocks\Helper;
use ABlocks\Controls\Range;
use ABlocks\Controls\Icon;

$attributes = [
	'block_id' => [
		'type' => 'string',
		'default' => '',
	],
];

$attributes = array_merge(
	$attributes,
	Icon::get_attribute( '', false, 'icon' ),
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'flex-start' ] ),
);

return $attributes;
