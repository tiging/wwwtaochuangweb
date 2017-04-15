<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: profile.php 34314 2014-02-20 01:04:24Z 草_根_吧 $
 */

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

include_once 'plugin.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {
	}

	//note 程序模板输出前运行的代码
	function output() {
		json_output();
	}

}

function json_output() {
	mobile_core::result(mobile_core::variable(array('html' => $GLOBALS['variable'])));
}
//WWW.CAOGEN8.CO
?>
