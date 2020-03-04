<?php
use Closure as F;
use Df\Framework\W\Result\Json;
use Df\Framework\W\Result\Text;
/**
 * 2020-03-04
 * @used-by \Inkifi\Pwinty\Controller\Index\Index::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\AddToCartEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\GetPriceEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\OneflowResponse::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\OrderStatusUpdateEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\RenewMediaclipToken::execute()
 * @param F $f
 * @param string $onSuccess [optional]
 * @param bool $plain [optional]
 * @return Json|Text
 */
function ikf_endpoint(F $f, $onSuccess = 'OK', $plain = false) {/** @var mixed $r */
	try {$r = $f() ?: $onSuccess;}
	catch (\Exception $e) {
		df_500(); // 2019-05-17 https://doc.mediaclip.ca/hub/store-endpoints#replying-with-errors
		$r = ['code' => 500, 'message' => df_ets($e)];
		df_log($e, $this);
		if (df_my_local()) {
			throw $e; // 2016-03-27 It is convenient for me to the the exception on the screen.
		}
	}
	return $plain ? Text::i($r) : Json::i($r);
}