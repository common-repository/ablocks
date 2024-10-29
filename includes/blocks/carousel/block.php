<?php
namespace ABlocks\Blocks\Carousel;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;


class Block extends BlockBaseAbstract {
	protected $block_name = 'carousel';
	protected $style_depends = [ 'ablocks-swiper-style' ];
	protected $script_depends = [ 'ablocks-swiper-script' ];

	public function build_css( $attributes ) {

		$css_generator = new CssGenerator( $attributes );

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-swiper .swiper-wrapper',
			$this->get_carousel_css( $attributes ),
			$this->get_carousel_css( $attributes, 'Tablet' ),
			$this->get_carousel_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-navigation__button',
			$this->get_navigation_button_css( $attributes ),
			$this->get_navigation_button_css( $attributes, 'Tablet' ),
			$this->get_navigation_button_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-navigation__button--next',
			$this->get_navigation_next_button_css( $attributes ),
			$this->get_navigation_next_button_css( $attributes, 'Tablet' ),
			$this->get_navigation_next_button_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-navigation__button--prev',
			$this->get_navigation_prev_button_css( $attributes ),
			$this->get_navigation_prev_button_css( $attributes, 'Tablet' ),
			$this->get_navigation_prev_button_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-navigation__button .ablocks-icon-wrap',
			$this->get_navigation_icon_css( $attributes ),
			$this->get_navigation_icon_css( $attributes, 'Tablet' ),
			$this->get_navigation_icon_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .swiper-pagination-bullet',
			$this->get_pagination_color_css( $attributes ),
			$this->get_pagination_color_css( $attributes, 'Tablet' ),
			$this->get_pagination_color_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .swiper-pagination-bullet.swiper-pagination-bullet-active',
			$this->get_pagination_active_color_css( $attributes ),
			$this->get_pagination_active_color_css( $attributes, 'Tablet' ),
			$this->get_pagination_active_color_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-carousel-navigation__button .ablocks-svg-icon',
			$this->get_navigation_icon_svg_css( $attributes ),
		);
		return $css_generator->generate_css();
	}

	public function get_carousel_css( $attributes, $device = '' ) {
		$carousel_css = [];

		if ( isset( $attributes['carouselHeight'] ) ) {
			$carousel_height = $attributes['carouselHeight'];
			if ( ! empty( $carousel_height[ 'value' . $device ] ) ) {
				$unit = isset( $carousel_height[ 'valueUnit' . $device ] ) ? $carousel_height[ 'valueUnit' . $device ] : 'px';
				$carousel_css['min-height'] = $carousel_height[ 'value' . $device ] . $unit;
			}
		}

		if ( isset( $attributes['verticalAlignment'] ) ) {
			$carousel_css['align-items'] = $attributes['verticalAlignment'];
		}

		return $carousel_css;
	}


	public function get_navigation_button_css( $attributes, $device = '' ) {
		$navigation_button_css = [];

		if ( isset( $attributes['navigationIconSize'][ 'value' . $device ] ) ) {
			$unit = isset( $attributes['navigationIconSize'][ 'valueUnit' . $device ] ) ? $attributes['navigationIconSize'][ 'valueUnit' . $device ] : 'px';
			$navigation_button_css['width'] = $attributes['navigationIconSize'][ 'value' . $device ] . $unit;
			$navigation_button_css['height'] = $attributes['navigationIconSize'][ 'value' . $device ] . $unit;
		}

		if ( isset( $attributes['navigationIconPositionY'][ 'value' . $device ] ) ) {
			$unit = isset( $attributes['navigationIconPositionY'][ 'valueUnit' . $device ] ) ? $attributes['navigationIconPositionY'][ 'valueUnit' . $device ] : '%';
			$navigation_button_css['top'] = $attributes['navigationIconPositionY'][ 'value' . $device ] . $unit;
		}

		return $navigation_button_css;
	}


	public function get_navigation_prev_button_css( $attributes, $device = '' ) {
		$navigation_prev_button_css = [];

		if ( isset( $attributes['navigationIconPositionPrevX'][ 'value' . $device ] ) ) {
			$unit = isset( $attributes['navigationIconPositionPrevX'][ 'valueUnit' . $device ] ) ? $attributes['navigationIconPositionPrevX'][ 'valueUnit' . $device ] : '%';
			$navigation_prev_button_css['left'] = $attributes['navigationIconPositionPrevX'][ 'value' . $device ] . $unit;
		}

		return $navigation_prev_button_css;
	}

	public function get_navigation_next_button_css( $attributes, $device = '' ) {
		$navigation_next_button_css = [];

		if ( isset( $attributes['navigationIconPositionNextX'][ 'value' . $device ] ) ) {
			$unit = isset( $attributes['navigationIconPositionNextX'][ 'valueUnit' . $device ] ) ? $attributes['navigationIconPositionNextX'][ 'valueUnit' . $device ] : '%';
			$navigation_next_button_css['right'] = $attributes['navigationIconPositionNextX'][ 'value' . $device ] . $unit;
		}

		return $navigation_next_button_css;
	}


	public function get_navigation_icon_css( $attributes, $device = '' ) {
		$navigation_icon_css = [];

		if ( isset( $attributes['navigationIconSize'][ 'value' . $device ] ) ) {
			$unit = isset( $attributes['navigationIconSize'][ 'valueUnit' . $device ] ) ? $attributes['navigationIconSize'][ 'valueUnit' . $device ] : 'px';
			$navigation_icon_css['font-size'] = $attributes['navigationIconSize'][ 'value' . $device ] . $unit;
		}

		return $navigation_icon_css;
	}


	public function get_navigation_icon_svg_css( $attributes ) {
		$navigation_icon_svg_css = [];
		if ( isset( $attributes['navigationIconColor'] ) ) {
			$navigation_icon_svg_css['fill'] = $attributes['navigationIconColor'];
		};
		if ( isset( $attributes['navigationIconBgColor'] ) ) {
			$navigation_icon_svg_css['background-color'] = $attributes['navigationIconBgColor'];
		};
		return $navigation_icon_svg_css;
	}

	public function get_pagination_color_css( $attributes ) {
		$pagination_color_css = [];
		if ( isset( $attributes['paginationColor'] ) ) {
			$pagination_color_css['background-color'] = $attributes['paginationColor'];
		};
		return $pagination_color_css;
	}

	public function get_pagination_active_color_css( $attributes ) {
		$pagination_active_color_css = [];
		if ( isset( $attributes['paginationActiveColor'] ) ) {
			$pagination_active_color_css['background-color'] = $attributes['paginationActiveColor'];
		};
		return $pagination_active_color_css;
	}



}
