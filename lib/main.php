<?php
use Magento\Sales\Model\Order as O;
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
 * @param int|string $v
 * @param O|null $o [optional]
 * @return string
 */
function ikf_ite($v, $o = null) {return dfcf(function($v, $o) {/** @var O|null $o */ return
	!df_contains(df_cfg('api/api_auth/api_id', $o ? $o->getStore() : null), 'staging') ? $v : "staging-$v"
;}, [$v, $o]);}
