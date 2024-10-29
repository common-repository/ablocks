<?php

use ABlocks\Controls\Alignment;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
use ABlocks\Controls\Typography;

$attributes = [
	'block_id'          => [
		'type'          => 'string',
		'default'       => ''
	],
	'paragraph'         => [
		'type'          => 'string',
		'source'        => 'html',
		'selector'      => '.ablocks-paragraph-text',
		'default'       => 'Add Your Paragraph Text ...',
	],
	'dropCaps'          => [
		'type'          => 'boolean',
		'default'       => false,
	],
	'dropCapsTextColor' => [
		'type'          => 'string',
		'default'       => '#0f2aff',
	],
	'paragraphSize'     => [
		'type'          => 'string',
		'default'       => 'md',
	],
	'textColor'         => [
		'type'          => 'string',
		'default'       => '#000000',
	]
];

$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'left' ] ),
	Typography::get_attribute( 'typography', true ),
	TextShadow::get_attribute( 'textShadow' ),
	TextStroke::get_attribute( 'textStroke', true ),
);

return $attributes;
