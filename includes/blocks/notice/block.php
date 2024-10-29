<?php
namespace ABlocks\Blocks\Notice;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Icon;

class Block extends BlockBaseAbstract {
	protected $block_name = 'notice';

	public function build_css( $attributes ) {
		$css_generator = new CssGenerator( $attributes, $this->block_name );
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-notice-header',
			$this->get_notice_header_css( $attributes ),
			$this->get_notice_header_css( $attributes, 'Tablet' ),
			$this->get_notice_header_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-notice-header .ablocks-notice-title',
			$this->get_notice_header_title_css( $attributes ),
			$this->get_notice_header_title_css( $attributes, 'Tablet' ),
			$this->get_notice_header_title_css( $attributes, 'Mobile' )
		);

		// Icon CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-notice-header .ablocks-icon-wrap',
			Icon::get_wrapper_css( $attributes ),
			Icon::get_wrapper_css( $attributes, 'Tablet' ),
			Icon::get_wrapper_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-notice-header .ablocks-icon-wrap img.ablocks-image-icon',
			Icon::get_element_image_css( $attributes )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-notice-header .ablocks-icon-wrap svg.ablocks-svg-icon',
			Icon::get_element_css( $attributes ),
		);

		return $css_generator->generate_css();
	}

	public function get_notice_header_css( $attributes, $device = '' ) {
		$css = [];
		if ( ! empty( $attributes['backgroundColor'] ) ) {
			$css['background'] = $attributes['backgroundColor'];
		}
		return array_merge(
			Dimensions::get_css( $attributes['noticeHeaderPadding'], 'padding', $device ),
			$css
		);
	}

	public function get_notice_header_title_css( $attributes, $device = '' ) {
		$css = [];
		if ( ! empty( $attributes['textColor'] ) ) {
			$css['color'] = $attributes['textColor'];
		}
		return array_merge(
			Alignment::get_css( $attributes['alignment'], 'justify-content', $device ),
			Typography::get_css( $attributes['typography'], '', $device ),
			TextShadow::get_css( $attributes['textShadow'], '', $device ),
			TextStroke::get_css( $attributes['textStroke'], '', $device ),
			$css,
		);
	}

}
