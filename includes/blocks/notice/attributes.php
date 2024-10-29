<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Icon;


$attributes = [
	'block_id' => array(
		'type' => 'string',
		'default' => '',
	),
	'heading' => array(
		'type' => 'string',
		'source' => 'html',
		'selector' => '.ablocks-notice-title',
		'default' => 'Add Your Heading Text Here',
	),
	'headingTag' => array(
		'type' => 'string',
		'default' => 'h2',
	),
	'textColor' => array(
		'type' => 'string',
		'default' => '',
	),
	'backgroundColor' => array(
		'type' => 'string',
		'default' => '#EFEFF0',
	),

];

$attributes = array_merge(
	$attributes,
	Alignment::get_attribute( 'alignment', true, [ 'value' => 'left' ] ),
	Typography::get_attribute( 'typography', true ),
	TextShadow::get_attribute( 'textShadow' ),
	TextStroke::get_attribute( 'textStroke', true ),
	Dimensions::get_attribute( 'noticeHeaderPadding', true ),
	Icon::get_attribute( '', false, 'icon', [ 'size' => 20 ] ),
);


return $attributes;
