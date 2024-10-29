<?php
namespace ABlocks\Blocks\Countdown;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;
use ABlocks\Controls\Alignment;
use ABlocks\Controls\Typography;
use ABlocks\Controls\Border;
use ABlocks\Controls\BoxShadow;

class Block extends BlockBaseAbstract {
	protected $block_name = 'countdown';

	public function build_css( $attributes ) {
		$css_generator = new CssGenerator( $attributes );

		$css_generator->add_class_styles(
			'{{WRAPPER}}',
			$this->get_wrapper_css( $attributes ),
			$this->get_wrapper_css( $attributes, 'Tablet' ),
			$this->get_wrapper_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-block-container',
			$this->get_countdown_items_css( $attributes ),
			$this->get_countdown_items_css( $attributes, 'Tablet' ),
			$this->get_countdown_items_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-countdown__item',
			$this->get_countdown_item_css( $attributes ),
			$this->get_countdown_item_css( $attributes, 'Tablet' ),
			$this->get_countdown_item_css( $attributes, 'Mobile' )
		);
		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-countdown__item:hover',
			$this->get_countdown_item_hover_css( $attributes ),
			$this->get_countdown_item_hover_css( $attributes, 'Tablet' ),
			$this->get_countdown_item_hover_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-countdown__item .ablocks-countdown-label',
			$this->get_label_css( $attributes ),
			$this->get_label_css( $attributes, 'Tablet' ),
			$this->get_label_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-countdown__item .ablocks-countdown-value',
			$this->get_number_css( $attributes ),
			$this->get_number_css( $attributes, 'Tablet' ),
			$this->get_number_css( $attributes, 'Mobile' )
		);

		$css_generator->add_class_styles(
			'{{WRAPPER}} .ablocks-countdown__separator',
			$this->get_separator_css( $attributes )
		);

		return $css_generator->generate_css();
	}

	public function get_wrapper_css( $attributes, $device = '' ) {
		$alignment = ! empty( $attributes['alignment'] ) ? $attributes['alignment'] : '';
		return Alignment::get_css( $alignment, 'text-align', $device );
	}

	public function get_countdown_items_css( $attributes, $device = '' ) {
		$css = [];
		$box_size = ! empty( $attributes['boxSize'][ 'value' . $device ] ) ? $attributes['boxSize'][ 'value' . $device ] : '';
		$box_size_unit = ( ! empty( $attributes['boxSize'][ 'valueUnit' . $device ] ) ? $attributes['boxSize'][ 'valueUnit' . $device ] : 'px' );
		if ( $box_size ) {
			$css['min-height'] = $box_size . $box_size_unit;
		}
		if ( ! empty( $attributes[ 'direction' . $device ] ) ) {
			$css['flex-direction'] = $attributes[ 'direction' . $device ];
		}
		if ( ! empty( $attributes[ 'justify' . $device ] ) ) {
			$css['justify-content'] = $attributes[ 'justify' . $device ];
		}
		if ( ! empty( $attributes[ 'align' . $device ] ) ) {
			$css['align-items'] = $attributes[ 'align' . $device ];
		}
		if ( ! empty( $attributes[ 'wrap' . $device ] ) ) {
			$css['flex-wrap'] = $attributes[ 'wrap' . $device ];
		}
		if ( ! empty( $attributes['boxColumnGap'][ 'value' . $device ] ) ) {
			$css['column-gap'] = $attributes['boxColumnGap'][ 'value' . $device ]
			. ( ! empty( $attributes['boxColumnGap'][ 'valueUnit' . $device ] ) ? $attributes['boxColumnGap'][ 'valueUnit' . $device ] : 'px' );
		}

		if ( ! empty( $attributes['boxRowGap'][ 'value' . $device ] ) ) {
			$css['row-gap'] = $attributes['boxRowGap'][ 'value' . $device ]
				. ( ! empty( $attributes['boxRowGap'][ 'valueUnit' . $device ] ) ? $attributes['boxRowGap'][ 'valueUnit' . $device ] : 'px' );
		}
		return $css;
	}

	public function get_countdown_item_css( $attributes, $device = '' ) {
		$css = [];
		$box_size = ! empty( $attributes['boxSize'][ 'value' . $device ] ) ? $attributes['boxSize'][ 'value' . $device ] : '';
		$box_size_unit = ( ! empty( $attributes['boxSize'][ 'valueUnit' . $device ] ) ? $attributes['boxSize'][ 'valueUnit' . $device ] : 'px' );
		$box_background_color = ! empty( $attributes['boxBackgroundColor'] ) ? $attributes['boxBackgroundColor'] : '';
		$number_and_label_gap = ! empty( $attributes['numberAndLabelGap'][ 'value' . $device ] ) ? $attributes['numberAndLabelGap'][ 'value' . $device ] : '';
		$number_and_label_gap_unit = ! empty( $attributes['numberAndLabelGap'][ 'valueUnit' . $device ] ) ? $attributes['numberAndLabelGap'][ 'valueUnit' . $device ] : '';
		$label_position = ! empty( $attributes['labelPosition'] ) ? $attributes['labelPosition'] : '';
		if ( $label_position ) {
			$css['flex-direction'] = $label_position;
		}
		if ( $number_and_label_gap ) {
			$css['gap'] = $number_and_label_gap . $number_and_label_gap_unit;
		}
		if ( $box_size ) {
			$css['width'] = $box_size . $box_size_unit;
		}
		if ( $box_background_color ) {
			$css['background'] = $box_background_color;
		}

		// Check if 'boxBorder' exists in the attributes array before calling Border::get_css
		if ( isset( $attributes['boxBorder'] ) ) {
			$border_css = Border::get_css( $attributes['boxBorder'], '', $device );
		} else {
			$border_css = [];
		}

		return array_merge(
			$border_css,
			$css,
			BoxShadow::get_css( ! empty( $attributes['boxShadow'] ) ? $attributes['boxShadow'] : '', $device )
		);
	}

	public function get_countdown_item_hover_css( $attributes, $device = '' ) {
		return array_merge(
			Border::get_hover_css( ! empty( $attributes['boxBorder'] ) ? $attributes['boxBorder'] : [], '', $device ),
			BoxShadow::get_hover_css( $attributes['boxShadow'], '', $device )
		);
	}

	public function get_label_css( $attributes, $device = '' ) {
		$css = [];
		$label_color = ! empty( $attributes['labelColor'] ) ? $attributes['labelColor'] : '';
		if ( $label_color ) {
			$css['color'] = $label_color;
		}
		if ( $attributes['labelBgColor'] ) {
			$css['background'] = $attributes['labelBgColor'];
		}
		if ( $attributes['labelPosition'] === 'column' || $attributes['labelPosition'] === 'column-reverse' ) {
			$css['width'] = '100%';
			$css['flex'] = '1 1 30%';
			$css['display'] = 'flex';
			$css['justify-content'] = 'center';
			$css['align-items'] = 'center';
		}
		return array_merge(
			Typography::get_css( ! empty( $attributes['labelTypography'] ) ? $attributes['labelTypography'] : '', $device ),
			$css
		);
	}

	public function get_number_css( $attributes, $device = '' ) {
		$css = [];
		$number_color = ! empty( $attributes['numberColor'] ) ? $attributes['numberColor'] : '';
		if ( $number_color ) {
			$css['color'] = $number_color;
		}
		if ( $attributes['numberBgColor'] ) {
			$css['background'] = $attributes['numberBgColor'];
		}
		if ( $attributes['labelPosition'] === 'column' || $attributes['labelPosition'] === 'column-reverse' ) {
			$css['width'] = '100%';
			$css['flex'] = '1 1 70%';
			$css['display'] = 'flex';
			$css['justify-content'] = 'center';
			$css['align-items'] = 'center';
		}
		return array_merge(
			Typography::get_css( ! empty( $attributes['numberTypography'] ) ? $attributes['numberTypography'] : '', $device ),
			$css
		);
	}

	public function get_separator_css( $attributes, $device = '' ) {
		$css = [];
		$separator_color = ! empty( $attributes['separatorColor'] ) ? $attributes['separatorColor'] : '';
		if ( $separator_color ) {
			$css['color'] = $separator_color;
		}
		return array_merge(
			Typography::get_css( ! empty( $attributes['separatorTypography'] ) ? $attributes['separatorTypography'] : '', $device ),
			$css
		);
	}
}

