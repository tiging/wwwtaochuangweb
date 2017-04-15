<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: mobile.php 35114 2014-11-27 01:07:53Z 草_根_吧 $
 */

define('IN_SINGCERE_XN_API', 1);
define('IN_MOBILE_API', 1);
define('IN_MOBILE', 2);

chdir('../../../');

require_once 'source/plugin/singcere_xn/mhook.class.php';

$modules = array('extends', 'buyattachment', 'buythread', 'checkpost', 'connect',
	'favforum', 'favthread', 'forumdisplay', 'forumindex',
	'forumnav', 'forumupload', 'friend', 'hotforum', 'hotthread',
	'login', 'myfavforum', 'myfavthread', 'mypm', 'mythread',
	'newthread', 'profile', 'publicpm', 'register', 'seccode',
	'secure', 'sendpm', 'sendreply', 'sub_checkpost', 'sublist',
	'toplist', 'viewthread', 'uploadavatar', 'pollvote', 'mynotelist', 'credit', 'profiles',
	'modcp', 'topicadmin', 'forumimage', 'newthreads', 'signin', 'smiley', 'threadrecommend', 'check', 'mobilesign',
	'wsqindex', 'wsqsiteinfo', 'recommend',
	'wechat', 'wechat_clearlogin', 'checkinfo', 'seccodehtml',
	'showactivity', 'bestanswer', 'forummisc', 'checkcookie', 'viewcomment', 'plugin', 'xn_secret');



if(!in_array($_GET['module'], $modules)) {
	sc_xnserver_core::result(array('error' => 'module_not_exists'));
}
$_GET['version'] = !empty($_GET['version']) ? intval($_GET['version']) : 1;


if(empty($_GET['module']) || empty($_GET['version']) || !preg_match('/^[\w\.]+$/', $_GET['module']) || !preg_match('/^[\d\.]+$/', $_GET['version'])) {
	sc_xnserver_core::result(array('error' => 'param_error'));
}

$apifile = 'source/plugin/singcere_xn/api/'.$_GET['version'].'/'.$_GET['module'].'.php';

if(file_exists($apifile)) {
	require_once $apifile;
} else {
	sc_xnserver_core::result(array('error' => 'module_not_exists'));
}
//WWW.CAOGEN8.CO
?>
