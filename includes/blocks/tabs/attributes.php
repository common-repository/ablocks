<?php
use ABlocks\Controls\Typography;
use ABlocks\Controls\Range;
use ABlocks\Controls\Icon;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Border;

$attributes = [
	'block_id' => [
		'type'      => 'string',
		'default'   => '',
	],
	'className' => [
		'type' => 'string',
		'default'   => '',
	],
	'tabPositionChange' => [
		'type' => 'boolean',
		'default' => false
	],
	'tabHeaders' => [
		'type' => 'array',
		'default' => [
			__( 'Tab 1', 'ablocks' ),
			__( 'Tab 2', 'ablocks' ),
			__( 'Tab 3', 'ablocks' ),
		]
	],
	'tabSubTitles' => [
		'type' => 'array',
		'default' => [
			__( 'Subtitle 1 Content: This tab provides general information about our company', 'ablocks' ),
			__( 'Subtitle 2 Content: This tab provides general information about our company', 'ablocks' ),
			__( 'Subtitle 3 Content: This tab provides general information about our company', 'ablocks' ),
		]
	],
	'tabActive' => [
		'type' => 'number',
		'default' => 0
	],
	'previousTotalBlock' => [
		'type' => 'number',
		'default' => 3
	],
	'tabsMenuPosition' => [
		'type' => 'string',
		'default' => 'left',
	],
	'tabsMenuPositionTablet' => [
		'type' => 'string',
		'default' => 'left',
	],
	'tabsMenuPositionMobile' => [
		'type' => 'string',
		'default' => 'left',
	],
	'initialOpen' => [
		'type' => 'number',
		'default' => 1
	],
	'tabMenuAlign' => [
		'type' => 'string',
		'default'   => '',
	],
	'tabMenuAlignTablet' => [
		'type' => 'string',
		'default'   => '',
	],
	'tabMenuAlignMobile' => [
		'type' => 'string',
		'default'   => '',
	],
	'menuContentAlign' => [
		'type' => 'string',
		'default' => 'center'
	],
	'menuContentAlignTablet' => [
		'type' => 'string',
		'default' => '',
	],
	'menuContentAlignMobile' => [
		'type' => 'string',
		'default' => '',
	],
	'tabBackgroundColor' => [
		'type' => 'string',
		'default' => '#F9F9F9'
	],
	'tabActiveBackgroundColor' => [
		'type' => 'string',
		'default' => '#61CE70'
	],
	'titleTextColor' => [
		'type' => 'string',
		'default' => '#13191B'
	],
	'titleTextActiveColor' => [
		'type' => 'string',
		'default' => '#0A0909'
	],
	'subTitleTextColor' => [
		'type' => 'string',
		'default' => '#74777C'
	],
	'subTitleTextActiveColor' => [
		'type' => 'string',
		'default' => '#74777C'
	],
	'contentBackgroundColor' => [
		'type' => 'string',
		'default' => '#FFFFFF'
	],
	'activeBorderColor' => [
		'type' => 'string',
		'default'   => 'transparent',
	],
	'showTitle' => [
		'type' => 'boolean',
		'default' => true
	],
	'showSubTitle' => [
		'type' => 'boolean',
		'default' => false
	],
	'showIcon' => [
		'type' => 'boolean',
		'default' => false
	],
	'iconPosition' => [
		'type' => 'string',
		'default' => 'left'
	],
	'iconColor' => [
		'type' => 'string',
		'default' => '#000000'
	],
	'iconActiveColor' => [
		'type' => 'string',
		'default'   => '',
	],
	'iconType' => [
		'type' => 'string',
		'default' => 'default'
	],
	'iconShape' => [
		'type' => 'string',
		'default' => 'circle'
	],
	'iconBackground' => [
		'type' => 'string',
		'default' => '#FFFFFF'
	],
	'iconActiveBackground' => [
		'type' => 'string',
		'default' => '#E5E5EC'
	],
];

$attributes = array_merge(
	$attributes,
	Range::get_attribute( [
		'attributeName' => 'size',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 18,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	] ),
	Range::get_attribute( [
		'attributeName' => 'spacing',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 0,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	] ),
	Range::get_attribute( [
		'attributeName' => 'tabsGap',
		'attributeObjectKey' => 'value',
		'isResponsive' => true,
		'defaultValue' => 10,
		'hasUnit' => true,
		'unitDefaultValue' => 'px',
	] ),
	Icon::get_attribute( '', false, 'icon' ),
	Dimensions::get_attribute( 'contentMargin', true ),
	Typography::get_attribute( 'titleTypography', true ),
	Typography::get_attribute( 'subTitleTypography', true ),
	Dimensions::get_attribute( 'menuContentPadding', true ),
	Dimensions::get_attribute( 'contentPadding', true ),
	Border::get_attribute( 'menuContentBorder', true ),
	Border::get_attribute( 'contentBorder', true ),
);

return $attributes;
