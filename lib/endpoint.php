<?php
use Closure as F;
use Df\Framework\W\Result\Json as J;
/**
 * 2020-03-04
 * @used-by \Inkifi\Pwinty\Controller\Index\Index::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\AddToCartEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\GetPriceEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\OneflowResponse::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\OrderStatusUpdateEndpoint::execute()
 * @used-by \Mangoit\MediaclipHub\Controller\Index\RenewMediaclipToken::execute()
 * @param F $f
 * @return J
 */
function ikf_endpoint(F $f) {/** @var mixed $r */
	try {$r = $f() ?: 'OK';}
	catch (\Exception $e) {
		df_500(); // 2019-05-17 https://doc.mediaclip.ca/hub/store-endpoints#replying-with-errors
		$r = ['code' => 500, 'message' => df_ets($e)];
		df_log($e, $this);
		if (df_my_local()) {
			throw $e; // 2016-03-27 It is convenient for me to the the exception on the screen.
		}
	}
	return J::i($r);
}