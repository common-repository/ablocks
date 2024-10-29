<?php
namespace ABlocks\Blocks\SocialShares;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Width;
use ABlocks\Controls\Border;
use ABlocks\Controls\Dimensions;
use ABlocks\Controls\Typography;
use ABlocks\Controls\TextShadow;
use ABlocks\Controls\TextStroke;
class Block extends BlockBaseAbstract {
	protected $block_name = 'social-shares';

	public function build_css( $attributes ) {
		// Initialize CSS Generator
		$css_generator = new CssGenerator( $attributes );

			// Social Share CSS
			$css_generator->add_class_styles(
				'{{WRAPPER}}.ablocks-block--social-shares .ablocks-block-container',
				$this->get_share_css( $attributes, '' ),
				$this->get_share_css( $attributes, 'Tablet' ),
				$this->get_share_css( $attributes, 'Mobile' )
			);
		// Social Button Styles
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-social-share',
			$this->get_social_share_bar_css( $attributes ),
			$this->get_social_share_bar_css( $attributes, 'Table' ),
			$this->get_social_share_bar_css( $attributes, 'Mobile' )
		);
			// share Hover Styles
			$css_generator->add_class_styles(
				'{{WRAPPER}} .ablocks-block-container .ablocks-social-share:hover',
				$this->get_share_border_hover_css( $attributes, '' ),
				$this->get_share_border_hover_css( $attributes, 'Tablet' ),
				$this->get_share_border_hover_css( $attributes, 'Mobile' )
			);
		// share Icon Size
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-social-share > .ablocks-svg-icon',
			$this->get_share_icon_css( $attributes ),
			$this->get_share_icon_css( $attributes, 'Table' ),
			$this->get_share_icon_css( $attributes, 'Mobile' ),
		);
		// item style
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-social-share-item',
			$this->get_item_border_css( $attributes ),
			$this->get_item_border_css( $attributes, 'Tablet' ),
			$this->get_item_border_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container .ablocks-social-share-item:hover',
			$this->get_Item_border_hover_css( $attributes ),
			$this->get_Item_border_hover_css( $attributes, 'Tablet' ),
			$this->get_Item_border_hover_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-social-share-item--icon',
			$this->get_share_item_css( $attributes ),
			$this->get_share_item_css( $attributes, 'Tablet' ),
			$this->get_share_item_css( $attributes, 'Mobile' ),
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-social-share-item--icon>.ablocks-svg-icon',
			[
				'height' => $attributes['shareItemIconSize'] . 'px !important',
			]
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-social-share-item--text',
			$this->get_share_item_text_css( $attributes, '' ),
			$this->get_share_item_text_css( $attributes, 'Tablet' ),
			$this->get_share_item_text_css( $attributes, 'Mobile' )
		);
		return $css_generator->generate_css();
	}

	public function get_share_css( $attributes, $device = '' ) {
		$css = [];

		if ( isset( $attributes['spaceBetween'][ 'value' . $device ] ) && ! empty( $attributes['spaceBetween'][ 'value' . $device ] ) ) {
			$css['gap'] = $attributes['spaceBetween'][ 'value' . $device ] . 'px';
		}

		$stack = $attributes['stack'] ?? '';
		if ( $stack === 'vertical' && ! empty( $attributes['verticalAlignment'] ) ) {
			$css['align-items'] = $attributes['verticalAlignment'];
		} elseif ( $stack === 'horizontal' ) {
			$css['flex-direction'] = 'row';
			if ( ! empty( $attributes['horizontalAlignment'] ) ) {
				$css['justify-content'] = $attributes['horizontalAlignment'];
			}
		}
		return array_merge(
			$css,
			isset( $attributes['width'] ) ? Width::get_css( $attributes['width'], 'width', $device ) : []
		);
	}
	public function get_social_share_bar_css( $attributes, $device = '' ) {
		$css = [
			'background' => $attributes['buttonBackground'],
			'width' => $attributes['shareSize'] . 'px',
			'height' => $attributes['shareSize'] . 'px',
		];
	
		return array_merge(
			$css,
			Border::get_css( $attributes['border'], $device )
		);
	}
	
	public function get_share_border_hover_css( $attributes, $device = '' ) {
		$css = [];
		if ( ! empty( $attributes['buttonHover'] ) ) {
			$css['background'] = $attributes['buttonHover'];
		}
		return array_merge(
			$css,
			( isset( $attributes['border'] ) ? Border::get_hover_css( $attributes['border'], '', $device ) : [] )
		);
	}
	public function get_share_icon_css( $attributes, $device = '' ) {
		$css = [];

		if ( ! empty( $attributes['shareIconSize'] ) ) {
			$css['width'] = $attributes['shareIconSize'] . 'px';
			$css['height'] = $attributes['shareIconSize'] . 'px';
		}

		if ( ! empty( $attributes['shareButtonIconColor'] ) ) {
			$css['fill'] = $attributes['shareButtonIconColor'] . ' !important';
		}

		return $css;
	}

	public function get_share_item_css( $attributes, $device = '' ) {
		$css = [];
		if ( isset( $attributes['itemIconHeight'] ) ) {
			$css['height'] = $attributes['itemIconHeight'] . 'px';
		}
		if ( isset( $attributes['itemIconWidth'] ) ) {
			$css['width'] = $attributes['itemIconWidth'] . 'px';
		}
		return $css;
	}
	public function get_item_border_css( $attributes, $device = '' ) {
		$css = [];
		if ( isset( $attributes['itemTextHeigh'] ) ) {
			$css['height'] = $attributes['itemTextHeigh'] . 'px';
		}

		return array_merge(
			$css,
			( isset( $attributes['itemBorder'] )
			? Border::get_css( $attributes['itemBorder'], '', $device )
			: [] )
		);
	}
	public function get_Item_border_hover_css( $attributes, $device = '' ) {
		return array_merge(
			( isset( $attributes['itemBorder'] ) ? Border::get_hover_css( $attributes['itemBorder'], '', $device ) : [] )
		);
	}
	public function get_share_item_text_css( $attributes, $device = '' ) {
		$css = [];

		if ( isset( $attributes['itemTextHeight'] ) ) {
			$css['height'] = $attributes['itemTextHeight'] . 'px';
		}

		if ( isset( $attributes['itemTextWidth'] ) ) {
			$css['width'] = $attributes['itemTextWidth'] . 'px';
		}
		return array_merge(
			$css,
			isset( $attributes['alignment'] ) ? Alignment::get_css( $attributes['alignment'], 'text-align', $device ) : [],
			isset( $attributes['typography'] ) ? Typography::get_css( $attributes['typography'], '', $device ) : [],
			isset( $attributes['textShadow'] ) ? TextShadow::get_css( $attributes['textShadow'], '', $device ) : [],
			isset( $attributes['textStroke'] ) ? TextStroke::get_css( $attributes['textStroke'], '', $device ) : []
		);
	}

}
