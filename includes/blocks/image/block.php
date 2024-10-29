<?php
namespace ABlocks\Blocks\Image;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Border;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Typography;
use ABlocks\Controls\CssFilter;
use ABlocks\Controls\BoxShadow;

class Block extends BlockBaseAbstract {
	protected $block_name = 'image';

	public function build_css( $attributes ) {
		// Generate CSS
		$css_generator = new CssGenerator( $attributes, $this->block_name );
		// Image Wrapper CSS
		$css_generator->add_class_styles(
			'{{WRAPPER}}',
			$this->get_wrapper_css( $attributes ),
			$this->get_wrapper_css( $attributes, 'Tablet' ),
			$this->get_wrapper_css( $attributes, 'Mobile' ),
		);

		// Image container css
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container',
			$this->get_image_container_css( $attributes ),
			$this->get_image_container_css( $attributes, 'Tablet' ),
			$this->get_image_container_css( $attributes, 'Mobile' ),
		);
		// Image css
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-image-figure img',
			$this->get_image_css( $attributes ),
			$this->get_image_css( $attributes, 'Tablet' ),
			$this->get_image_css( $attributes, 'Mobile' ),
		);
		// Image caption css
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-image-figure .ablocks-image-caption',
			$this->get_image_caption_css( $attributes ),
			$this->get_image_caption_css( $attributes, 'Tablet' ),
			$this->get_image_caption_css( $attributes, 'Mobile' ),
		);
		// Image hover css
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-image-figure img:hover',
			$this->get_image_hover_css( $attributes ),
			$this->get_image_hover_css( $attributes, 'Tablet' ),
			$this->get_image_hover_css( $attributes, 'Mobile' ),
		);
		// Image caption hover css
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-image-figure .ablocks-image-caption:hover',
			$this->get_image_caption_hover_css( $attributes ),
			$this->get_image_caption_hover_css( $attributes, 'Tablet' ),
			$this->get_image_caption_hover_css( $attributes, 'Mobile' )
		);

		return $css_generator->generate_css();
	}

	public function get_wrapper_css( $attributes, $device = '' ) {
		return array_merge(
			isset( $attributes['padding'] ) ? Dimensions::get_css( $attributes['padding'], 'padding', $device ) : [],
		);
	}

	public function get_image_css( $attributes, $device = '' ) {
		$css = [];
		if ( ! empty( $attributes[ 'imgUrl' . $device ] ) ) {
			$css['max-width'] = '100%';
			$css['transition'] = '0.3s ease';
		}

		if ( ! empty( $attributes['widthHeightWidget'][ 'width' . $device ] ) ) {
			$css['width'] = $attributes['widthHeightWidget'][ 'width' . $device ] . 'px';
		} elseif ( ! empty( $attributes['widthHeightWidget']['imgNaturalWidth'] ) ) {
			$css['width'] = $attributes['widthHeightWidget']['imgNaturalWidth'] . 'px';
		}

		if ( ! empty( $attributes['widthHeightWidget'][ 'customHeight' . $device ] ) ) {
			$css['height'] = $attributes['widthHeightWidget'][ 'height' . $device ] . 'px';
		} else {
			$css['height'] = '100%';
		}

		if ( isset( $attributes['objectFit'][ 'value' . $device ] ) && '' !== $attributes['objectFit'][ 'value' . $device ] && 'default' !== $attributes['objectFit'][ 'value' . $device ] ) {
			$css['object-fit'] = $attributes['objectFit'][ 'value' . $device ];
		}

		if ( isset( $attributes['aspectRatio'] ) && 'original' !== $attributes['aspectRatio'] && null !== $attributes['aspectRatio'] ) {
			$css['aspect-ratio'] = $attributes['aspectRatio'];
		}

		if ( ! empty( $attributes['opacity'] ) ) {
			$css['opacity'] = $attributes['opacity'];
		}
		if ( isset( $attributes['onHoverImg'] ) && 'slide' === $attributes['onHoverImg'] ) {
			$css['transform'] = 'translate3d(-40px, 0, 0)';
			$css['transition'] = 'transform 0.3s';
		}

		if ( ! empty( $attributes['transitionDuration'] ) ) {
			$css['transition'] = $attributes['transitionDuration'] . 's';
		}
		if ( ! empty( $attributes['filterTransitionDuration'] ) ) {
			$css['transition'] = 'filter ' . $attributes['filterTransitionDuration'] . 's, transform 0.3s';
		}

		return array_merge(
			$css,
			isset( $attributes['border'] ) ? Border::get_css( $attributes['border'], $device ) : [],
			isset( $attributes['cssFilter'] ) ? CssFilter::get_css( $attributes['cssFilter'], $device ) : [],
			isset( $attributes['boxShadow'] ) ? BoxShadow::get_css( $attributes['boxShadow'], $device ) : []
		);
	}

	public function get_image_caption_css( $attributes, $device = '' ) {
		$css = [];

		if ( isset( $attributes['captionColor'] ) && ! empty( $attributes['captionColor'] ) ) {
			$css['color'] = $attributes['captionColor'];
		}
		if ( isset( $attributes['captionBackground'] ) && ! empty( $attributes['captionBackground'] ) ) {
			$css['background'] = $attributes['captionBackground'];
		}
		if ( isset( $attributes['captionPosition'] ) && ! empty( $attributes['captionPosition'] && 'overlap' === $attributes['captionPosition'] ) ) {
			$css['width'] = '100%';
			$css['position'] = 'absolute';
			$css['bottom'] = 0;
			$css['left'] = 0;
		}

		return array_merge(
			$css,
			( isset( $attributes['captionPadding'] ) ) ? Dimensions::get_css( $attributes['captionPadding'], 'padding', $device ) : [],
			( isset( $attributes['captionAlignment'] ) ) ? Alignment::get_css( $attributes['captionAlignment'], 'text-align', $device ) : [],
			( isset( $attributes['captionTypography'] ) ) ? Typography::get_css( $attributes['captionTypography'], $device ) : [],
			( isset( $attributes['captionBorder'] ) ) ? Border::get_css( $attributes['captionBorder'], $device ) : [],
		);
	}

	public function get_image_hover_css( $attributes, $device = '' ) {
		$css = [];
		$opacityH = $attributes['opacityH'] ?? null;

		if ( isset( $attributes['onHoverImg'] ) ) {
			$on_Hover_Img = $attributes['onHoverImg'];
			if ( 'zoomin' === $on_Hover_Img ) {
				$css['transform'] = 'scale(1.1)';
				$css['transition'] = 'transform 0.3s';
			} elseif ( 'grayscale' === $on_Hover_Img ) {
				$css['filter'] = 'grayscale(100%)';
				$css['transition'] = 'transform 0.3s';
			} elseif ( 'blur' === $on_Hover_Img ) {
				$css['filter'] = 'blur(3px)';
				$css['transition'] = 'transform 0.3s';
			} elseif ( 'slide' === $on_Hover_Img ) {
				$css['transform'] = 'translate3d(0, 0, 0)';
				$css['transition'] = 'transform 0.3s';
			}
		}

		if ( '' !== $opacityH && null !== $opacityH ) {
			$css['opacity'] = $opacityH;
		}
		if ( ! empty( $attributes['filterTransitionDuration'] ) ) {
			$css['transition'] = 'filter ' . $attributes['filterTransitionDuration'] . 's, transform 0.3s';
		}

		$border_hover_css = Border::get_hover_css( isset( $attributes['border'] ) ? $attributes['border'] : null, $device );

		return array_merge(
			$css,
			$border_hover_css,
			( isset( $attributes['boxShadow'] ) ) ? BoxShadow::get_hover_css( $attributes['boxShadow'], $device ) : [],
			( isset( $attributes['cssHoverFilter'] ) ) ? CssFilter::get_css( $attributes['cssHoverFilter'], $device ) : [],
		);
	}

	public function get_image_container_css( $attributes, $device = '' ) {
		$alignment_value = $attributes['alignment'][ 'value' . $device ] ?? '';

		$css = [];
		if ( ! empty( $alignment_value ) ) {
			$css['display'] = 'flex';
			$css['justify-content'] = $alignment_value;
		}
		return $css;
	}

	public function get_image_caption_hover_css( $attributes, $device = '' ) {
		if ( isset( $attributes['captionBorder'] ) ) {
			return Border::get_hover_css( $attributes['captionBorder'], $device );
		}
		return [];
	}
}
