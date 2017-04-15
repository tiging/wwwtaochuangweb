<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: forumdisplay.php 35213 2015-02-26 06:15:12Z 草_根_吧 $
 */
if (!defined('IN_SINGCERE_XN_API')) {
	exit('Access Denied');
}

// define('MOBILE_HIDE_STICKY', !isset($_GET['hidesticky']) ? 1 : $_GET['hidesticky']);

$_GET['mod'] = 'forumdisplay';
include_once 'forum.php';

class singcere_xn_api {

	function common() {
		global $_G;
		if (!empty($_GET['pw'])) {
			$_GET['action'] = 'pwverify';
		}
		$_G['forum']['allowglobalstick'] = true;
		if($_G['forum']['redirect']) {
			sc_xnserver_core::result(sc_xnserver_core::variable(array('forum' => array('fid' => $_G['fid'], 'redirect' => $_G['forum']['redirect']))));
		}
	}

	static function output() {
		global $_G;
		include_once 'source/plugin/singcere_xn/api/1/sub_threadlist.php';

		$variable['plugin'] = sc_xnserver_core::activeHook('forum', 'forumdisplay', array('forumdisplay_thread_mobile'));
		sc_xnserver_core::result(sc_xnserver_core::variable($variable));
	}

}
//WWW.CAOGEN8.CO
?>
