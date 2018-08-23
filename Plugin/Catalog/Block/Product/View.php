<?php
namespace Inkifi\Core\Plugin\Catalog\Block\Product;
use Magento\Catalog\Block\Product\View as Sb;
use Magento\Catalog\Model\Product as P;
// 2018-08-22
// "Implement an ability to add alternate URLs to products":
// https://github.com/inkifi/core/issues/2
final class View {
	/**
	 * 2018-08-22
	 * @see \Magento\Framework\View\Element\AbstractBlock::setLayout()
	 * @param Sb $sb
	 * @return Sb
	 */
	function afterSetLayout(Sb $sb) {
		// 2018-08-23
		// Syntax:
		// 	en-GB https://dev2.inkifi.com/prints/retro-prints.html
		// 	en-US https://dev2.inkifi.com/us/prints/retro-prints.html
		foreach (df_explode_n($sb->getProduct()['inkifi_alternate_urls']) as $row) { /** @var string $row */
			// 2018-08-23
			// «Undefined offset: 1 in vendor/inkifi/core/Plugin/Catalog/Block/Product/View.php on line 21»
			// https://github.com/inkifi/core/issues/3
			if ($row && ($rowA = df_trim(explode(' ', $row))) && 2 === count($rowA)) { /** @var string $rowA */
				list($lang, $url) = df_trim(explode(' ', $row)); /** @var string $lang */ /** @var string $url */
				df_page_config()->addRemotePageAsset($url, 'alternate', ['attributes' => [
					'hreflang' => $lang, 'rel' => 'alternate'
				]]);
			}
		}
		return $sb;
	}
}