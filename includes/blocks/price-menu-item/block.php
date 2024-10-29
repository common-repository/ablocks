<?php
namespace ABlocks\Blocks\PriceMenuItem;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;

class Block extends BlockBaseAbstract {
	protected $block_name = 'price-menu-item';

	public function build_css( $attributes ) {

		$css_generator = new CssGenerator( $attributes, $this->block_name );

		// Price Item CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-price-menu-item',
			$this->get_Item_css( $attributes, '' ),
			$this->get_Item_css( $attributes, 'Tablet' ),
			$this->get_Item_css( $attributes, 'Mobile' ),
		);
		// TitleText CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-price-menu-item-details-title',
			$this->get_TitleText_css( $attributes, '' ),
			$this->get_TitleText_css( $attributes, 'Tablet' ),
			$this->get_TitleText_css( $attributes, 'Mobile' ),
		);
		// DescriptionText CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-price-menu-item-details-des',
			$this->get_DescriptionText_css( $attributes, '' ),
			$this->get_DescriptionText_css( $attributes, 'Tablet' ),
			$this->get_DescriptionText_css( $attributes, 'Mobile' ),
		);
		// SeparatorText CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-price-menu-item-separator',
			$this->get_SeparatorText_css( $attributes, '' ),
			$this->get_SeparatorText_css( $attributes, 'Tablet' ),
			$this->get_SeparatorText_css( $attributes, 'Mobile' ),
		);
		// PriceText CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-price-menu-item-price',
			$this->get_PriceText_css( $attributes, '' ),
			$this->get_PriceText_css( $attributes, 'Tablet' ),
			$this->get_PriceText_css( $attributes, 'Mobile' ),
		);

		return $css_generator->generate_css();
	}


	public function get_Item_css( $attributes, $device = '' ) {
		$css = [];
		$position_items = isset( $attributes['positionItems'] ) ? $attributes['positionItems'] : '';
		$justify_items = isset( $attributes['justifyItems'] ) ? $attributes['justifyItems'] : '';
		$gap_items = isset( $attributes['gap'][ 'value' . $device ] ) ? $attributes['gap'][ 'value' . $device ] : '';
		$unit = $attributes['gap'][ 'valueUnit' . $device ] ?? 'px';
		if ( isset( $attributes['positionItems'] ) && ! empty( $attributes['positionItems'] ) ) {
			$css['align-items'] = $position_items;
		}
		if ( isset( $attributes['justifyItems'] ) && ! empty( $attributes['justifyItems'] ) ) {
			$css['justify-content'] = $justify_items;
		}
		if ( isset( $attributes['gap'] ) && ! empty( $attributes['gap'] ) ) {
			$css['gap'] = $gap_items . $unit;
		}

		return $css;
	}
	public function get_TitleText_css( $attributes, $device = '' ) {
		$css = [];
		$title_size = isset( $attributes['titleSize'][ 'value' . $device ] ) ? $attributes['titleSize'][ 'value' . $device ] : '';
		$title_unit = $attributes['titleSize'][ 'valueUnit' . $device ] ?? 'px';
		$title_color = isset( $attributes['titleColor'] ) ? $attributes['titleColor'] : '';
		if ( isset( $attributes['titleSize'] ) && ! empty( $attributes['titleSize'] ) ) {
			$css['font-size'] = $title_size . $title_unit;
		}
		if ( isset( $attributes['titleColor'] ) && ! empty( $attributes['titleColor'] ) ) {
			$css['color'] = $title_color;
		}

		return $css;
	}
	public function get_DescriptionText_css( $attributes, $device = '' ) {
		$css = [];
		$description_size = isset( $attributes['descriptionSize'][ 'value' . $device ] ) ? $attributes['descriptionSize'][ 'value' . $device ] : '';
		$description_unit = $attributes['descriptionSize'][ 'valueUnit' . $device ] ?? 'px';
		$description_color = isset( $attributes['descriptionColor'] ) ? $attributes['descriptionColor'] : '';
		if ( isset( $attributes['descriptionSize'] ) && ! empty( $attributes['descriptionSize'] ) ) {
			$css['font-size'] = $title_size . $title_unit;
		}
		if ( isset( $attributes['descriptionColor'] ) && ! empty( $attributes['descriptionColor'] ) ) {
			$css['color'] = $title_color;
		}

		return $css;
	}
	public function get_SeparatorText_css( $attributes, $device = '' ) {
		$css = [];
		$separator_width = isset( $attributes['separatorWidth'][ 'value' . $device ] ) ? $attributes['separatorWidth'][ 'value' . $device ] : '';
		$separator_unit = $attributes['separatorWidth'][ 'valueUnit' . $device ] ?? 'px';
		$separator_color = isset( $attributes['separatorColor'] ) ? $attributes['separatorColor'] : '';
		if ( isset( $attributes['separatorWidth'] ) && ! empty( $attributes['separatorWidth'] ) ) {
			$css['width'] = $separator_width . $separator_unit;
		}
		if ( isset( $attributes['separatorColor'] ) && ! empty( $attributes['separatorColor'] ) ) {
			$css['background-color'] = $separator_color;
		}

		return $css;
	}
	public function get_PriceText_css( $attributes, $device = '' ) {
		$css = [];
		$price_size = isset( $attributes['priceSize'][ 'value' . $device ] ) ? $attributes['priceSize'][ 'value' . $device ] : '';
		$price_unit = $attributes['priceSize'][ 'valueUnit' . $device ] ?? 'px';
		$price_color = isset( $attributes['priceColor'] ) ? $attributes['priceColor'] : '';
		if ( isset( $attributes['priceSize'] ) && ! empty( $attributes['priceSize'] ) ) {
			$css['font-size'] = $price_size . $price_unit;
		}
		if ( isset( $attributes['priceColor'] ) && ! empty( $attributes['priceColor'] ) ) {
			$css['color'] = $price_color;
		}

		return $css;
	}
}
