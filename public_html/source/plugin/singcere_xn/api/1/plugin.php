<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      Ѿͷ��վ ȫ���׷� https://52admin.taobao.com
 *
 *      $Id: profile.php 34314 2014-02-20 01:04:24Z ��_��_�� $
 */

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

include_once 'plugin.php';

class mobile_api {

	//note ����ģ��ִ��ǰ��Ҫ���еĴ���
	function common() {
	}

	//note ����ģ�����ǰ���еĴ���
	function output() {
		json_output();
	}

}

function json_output() {
	mobile_core::result(mobile_core::variable(array('html' => $GLOBALS['variable'])));
}
//WWW.CAOGEN8.CO
?>
