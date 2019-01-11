<?php
use Exception as E;
use Magento\Framework\DataObject;
/**
 * 2018-09-11
 * @used-by \Mangoit\MediaclipHub\Controller\Index\RenewMediaclipToken::execute()
 * @param DataObject|mixed[]|mixed|E $v
 */
function ikf_log($v) {df_log_l('Inkifi_Core', $v); df_sentry('Inkifi_Core', $v);}