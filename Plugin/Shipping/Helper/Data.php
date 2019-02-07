<?php
namespace Inkifi\Core\Plugin\Shipping\Helper;
use Magento\Sales\Model\AbstractModel as M;
use Magento\Sales\Model\Order\Shipment;
use Magento\Sales\Model\Order\Shipment\Track;
use Magento\Sales\Model\ResourceModel\Order\Shipment\Track\Collection as Tracks;
use Magento\Shipping\Helper\Data as Sb;
// 2019-01-05
// «Improve MediaClip module for Magento 2: add USPS shipping tracking URLs to emails»:
// https://www.upwork.com/ab/f/contracts/21337553
// https://github.com/inkifi/core/issues/5
final class Data {
	/**
	 * 2019-01-05
	 * @see \Magento\Shipping\Helper\Data::getTrackingPopupUrlBySalesModel()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param M $m
	 * @return string
	 */
	function aroundGetTrackingPopupUrlBySalesModel(Sb $sb, \Closure $f, M $m) {
		// 2019-01-05 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
		// «Improve MediaClip module for Magento 2: add USPS shipping tracking URLs to emails»
		// https://www.upwork.com/ab/f/contracts/21337553
    	$r = null; /** @var string|null $r */
 		if ($m instanceof Track) {
    		$r = $this->dfTrackUrl($m);
		}
    	else if ($m instanceof Shipment) {
			$tracks = $m->getTracks(); /** @var Tracks $tracks */
			if ($track = df_first($tracks->getItems())) {   /** @var Track $track */
				$r = $this->dfTrackUrl($track);;
			}
		}
		return $r ?: $f($m);
	}

	/**
	 * 2019-01-05 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
	 * «Improve MediaClip module for Magento 2: add USPS shipping tracking URLs to emails»
	 * https://www.upwork.com/ab/f/contracts/21337553
	 * @param Track $t
	 * @return string|null
	 */
    private static function dfTrackUrl(Track $t) {return
		!df_starts_with($c = $t->getCarrierCode(), 'shqcustom') || !($n = $t->getTrackNumber()) ? null : (
			df_contains($c, 'ups')
				? "https://www.ups.com/track?loc=en_US&tracknum=$n"
				: "https://tools.usps.com/go/TrackConfirmAction?tLabels=$n"
		)
	;}
}