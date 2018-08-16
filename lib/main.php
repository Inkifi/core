<?php
use Magento\Sales\Model\Order as O;
use Magento\Store\Model\Store as S;
/**
 * 2018-08-16
 * «Modify orders numeration for Mediaclip»
 * https://github.com/Inkifi-Connect/Media-Clip-Inkifi/issues/1
 * @used-by \Mangoit\MediaclipHub\Controller\Index\OrderStatusUpdateEndpoint::execute()
 * @param string $v
 * @return string
 */
function ikf_eti($v) {return df_last(explode('-', $v));}

/**
 * 2018-08-16
 * «Modify orders numeration for Mediaclip»
 * https://github.com/Inkifi-Connect/Media-Clip-Inkifi/issues/1
 * @used-by \Mangoit\MediaclipHub\Observer\CheckoutSuccess::post()
 * @param int|string|O $v
 * @return string
 */
function ikf_ite($v) {return dfcf(function($v) {
	list($v, $s) = $v instanceof O ? [$v->getId(), $v->getStore()] : [$v, null]; /** @var S|null $s */
	return !df_contains(df_cfg('api/api_auth/api_id', $s), 'staging') ? $v : "staging-$v";
}, [$v]);}
