<?php

namespace ABlocks\Blocks\Divider;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\TextStroke;
use ABlocks\Controls\Typography;
use ABlocks\Controls\Icon;

class Block extends BlockBaseAbstract {

	protected $block_name = 'divider';

	public function build_css( $attributes ) {
		$css_generator = new CssGenerator( $attributes, $this->block_name );
		$css_generator->add_class_styles(
			'{{WRAPPER}}',
			$this->get_wrapper_css( $attributes ),
			$this->get_wrapper_css( $attributes, 'Tablet' ),
			$this->get_wrapper_css( $attributes, 'Mobile' ),
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container',
			$this->get_divider_container_css( $attributes ),
			$this->get_divider_container_css( $attributes, 'Tablet' ),
			$this->get_divider_container_css( $attributes, 'Mobile' ),
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-divider',
			$this->get_divider_css( $attributes ),
			$this->get_divider_css( $attributes, 'Tablet' ),
			$this->get_divider_css( $attributes, 'Mobile' ),
		);
		// element text

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-divider__element-text',
			$this->get_divider_element_text_css( $attributes ),
			$this->get_divider_element_text_css( $attributes, 'Tablet' ),
			$this->get_divider_element_text_css( $attributes, 'Mobile' ),
		);
		// Icon Style
		$css_generator->add_class_styles(
			'{{WRAPPER}}  .ablocks-divider__element-icon .ablocks-icon-wrap',
			Icon::get_wrapper_css( $attributes ),
			Icon::get_wrapper_css( $attributes, 'Tablet' ),
			Icon::get_wrapper_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}}  .ablocks-divider__element-icon .ablocks-icon-wrap',
			array_merge( Icon::get_wrapper_css( $attributes ), $this->get_icon_spacing_margins( $attributes, '' ) ),
			array_merge( Icon::get_wrapper_css( $attributes, 'Tablet' ), $this->get_icon_spacing_margins( $attributes, 'Tablet' ) ),
			array_merge( Icon::get_wrapper_css( $attributes, 'Mobile' ), $this->get_icon_spacing_margins( $attributes, 'Mobile' ) )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-divider__element-icon .ablocks-icon-wrap img.ablocks-image-icon',
			Icon::get_element_image_css( $attributes )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-divider__element-icon .ablocks-icon-wrap svg.ablocks-svg-icon',
			Icon::get_element_css( $attributes ),
		);
		return $css_generator->generate_css();
	}

	public function get_wrapper_css( $attributes, $device = '' ) {
		if ( isset( $attributes['alignment'] ) ) {
			return Alignment::get_css( $attributes['alignment'], 'text-align', $device );
		}
		return [];
	}

	public function get_divider_element_text_css( $attributes, $device = '' ) {
		$divider_text_styles = [];
		if ( ! empty( $attributes['elementTextColor'] ) ) {
			$divider_text_styles['color'] = $attributes['elementTextColor'];
		}
		$text_spacing_value = isset( $attributes['elementTextSpacing'][ 'value' . $device ] ) ? $attributes['elementTextSpacing'][ 'value' . $device ] : '';
		$text_spacing_unit = ! empty( $attributes['elementTextSpacing'][ 'valueUnit' . $device ] ) ? $attributes['elementTextSpacing'][ 'valueUnit' . $device ] : 'px';
		$divider_text_styles['padding-left'] = $text_spacing_value . $text_spacing_unit;
		$divider_text_styles['padding-right'] = $text_spacing_value . $text_spacing_unit;
		return array_merge(
			$divider_text_styles,
			isset( $attributes['elementTextTypography'] ) ? Typography::get_css( $attributes['elementTextTypography'], $device ) : [],
			isset( $attributes['elementTextStroke'] ) ? TextStroke::get_css( $attributes['elementTextStroke'], $device ) : [],
		);
	}


	public function get_divider_container_css( $attributes, $device = '' ) {
		$divider_container_css = [];
		if ( ! empty( $attributes['gap'][ 'value' . $device ] ) ) {
			$divider_container_css['padding-block-start'] = $attributes['gap'][ 'value' . $device ] . 'px';
			$divider_container_css['padding-block-end'] = $attributes['gap'][ 'value' . $device ] . 'px';
		}
		if ( ! empty( $attributes['alignment'][ 'value' . $device ] ) ) {
			$divider_container_css['justify-content'] = $attributes['alignment'][ 'value' . $device ];
		}
		return $divider_container_css;
	}

	public function get_divider_css( $attributes, $device = '' ) {
		$divider_css = [];
		$width = isset( $attributes['width'] ) ? $attributes['width'] : array();
		$key = 'value' . $device;
		if ( ! empty( $width[ $key ] ) ) {
			$value_unit = isset( $width['valueUnit'] ) ? $width['valueUnit'] : 'px';
			$divider_css['width'] = $width[ $key ] . $value_unit;
		}
		return $divider_css;
	}

	public function get_icon_spacing_margins( $attributes, $device = '' ) {

		$icon_spacing_value = isset( $attributes['elementIconSpacing'][ 'value' . $device ] ) ? $attributes['elementIconSpacing'][ 'value' . $device ] : '';
		$icon_spacing_unit = ! empty( $attributes['elementIconSpacing'][ 'valueUnit' . $device ] ) ? $attributes['elementIconSpacing'][ 'valueUnit' . $device ] : 'px';
		$icon_spacing = $icon_spacing_value . $icon_spacing_unit;

		return [
			'margin-left'  => $icon_spacing,
			'margin-right' => $icon_spacing
		];
	}
}
