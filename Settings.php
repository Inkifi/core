<?php
namespace Inkifi\Core;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
// 2018-08-17
/** @method static Settings s() */
final class Settings extends \Df\Config\Settings {
	/**
	 * 2018-08-17 «Mediaclip API ID»
	 * @used-by ikf_ite()
	 * @param null|string|int|S|Store|array(string, int) $s [optional]
	 * @return string
	 */
	function id($s = null) {return $this->v('api_id', $s);}

	/**
	 * 2018-08-17 «Mediaclip API KEY»
	 * @param null|string|int|S|Store|array(string, int) $s [optional]
	 * @return string
	 */
	function key($s = null) {return $this->v('api_key', $s);}

	/**
	 * 2018-08-17 «Mediaclip API Url»
	 * @param null|string|int|S|Store|array(string, int) $s [optional]
	 * @return string
	 */
	function url($s = null) {return $this->v('api_url', $s);}

	/**
	 * 2018-08-17
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'api/api_auth';}
}