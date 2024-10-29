<?php
namespace ABlocks\Blocks\PriceMenu;

use ABlocks\Classes\BlockBaseAbstract;
use ABlocks\Classes\CssGenerator;

class Block extends BlockBaseAbstract {
	protected $block_name = 'price-menu';

	public function build_css( $attributes ) {

		$css_generator = new CssGenerator( $attributes, $this->block_name );
		return $css_generator->generate_css();
	}
}
