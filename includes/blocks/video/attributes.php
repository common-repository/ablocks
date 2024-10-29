<?php

use ABlocks\Controls\CssFilter;

$attributes = [
	'block_id'        => [
		'type'        => 'string',
		'default'     => '',
	],
	'videoSource'     => [
		'type'        => 'string',
		'default'     => 'youtube',
	],
	'videoStartTime'  => [
		'type'        => 'string',
		'default'     => '',
	],
	'videoEndTime'    => [
		'type'        => 'string',
		'default'     => '',
	],
	'videoUrl'         => [
		'type'        => 'string',
		'default'     => '',
	],
	'selfHostedURL'   => [
		'type'        => 'string',
		'default'     => ''
	],
	'externalLink'    => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'autoplay'        => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'mute'            => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'loop'            => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'playerControl'   => [
		'type'        => 'boolean',
		'default'     => true,
	],
	'downloadButton'  => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'vimeoURL'        => [
		'type'        => 'string',
		'default'     => 'https://vimeo.com/889428749',
	],
	'youtubeURL'      => [
		'type'        => 'string',
		'default'     => 'https://www.youtube.com/watch?v=9hg-KpQoL5M&t=5s',
	],
	'privacyMode'     => [
		'type'        => 'boolean',
		'default'     => false,
	],
	'introTitle'      => [
		'type'        => 'boolean',
		'default'     => true,
	],
	'introPortrait'   => [
		'type'        => 'boolean',
		'default'     => true,
	],
	'introByline'     => [
		'type'        => 'boolean',
		'default'     => true,
	],
	'poster'          => [
		'type'        => 'string',
		'default'     => '',
	],
	'preload'         => [
		'type'        => 'string',
		'default'     => 'metadata',
	],
	'aspectRatio'     => [
		'type'        => 'string',
		'default'     => '1.77777',
	],
];

$attributes = array_merge(
	$attributes,
	CssFilter::get_attribute( 'cssFilter' )
);

return $attributes;
