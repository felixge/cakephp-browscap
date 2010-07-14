<?php
require(dirname(dirname(dirname(__FILE__))).'/vendors/phpbrowscap/browscap/Browscap.php');

class BrowscapComponent extends Object{
	public $Browscap;

	public function startup() {
		$cacheDir = TMP.'/cache/';
		$this->Browscap = new Browscap($cacheDir);
	}

	public function get($path = null) {
		$browser = $this->Browscap->getBrowser(null, true);
		return (empty($path))
			? $browser
			: Set::extract($browser, $path);
	}
}

?>