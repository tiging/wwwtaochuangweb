<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: newthread.php 35252 2015-04-09 06:07:41Z 草_根_吧 $
 */
//note 版块forum >> newthread(新帖) @ Discuz! X2.5

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

$_GET['mod'] = 'post';
$_GET['action'] = 'newthread';
include_once 'forum.php';

class mobile_api {

	//note 程序模块执行前需要运行的代码
	function common() {		
	}

	function post_mobile_message($message, $url_forward, $values, $extraparam, $custom) {
		if($values['tid'] && $values['pid']) {
			global $_G;

			$threadstatus = DB::result_first("SELECT status FROM ".DB::table('forum_thread')." WHERE tid='$values[tid]'");
			if(!empty($_POST['allowsound'])) {
				$setstatus = array(1, 0, 0);
			} elseif(!empty($_POST['allowphoto'])) {
				$setstatus = array(0, 1, 1);
			} elseif(!empty($_POST['allowlocal'])) {
				$setstatus = array(0, 1, 0);
			} else {
				$setstatus = array(0, 0, 1);
			}
			foreach($setstatus as $i => $bit) {
				$threadstatus = setstatus(13 - $i, $bit, $threadstatus);
			}
			//note DB::update('forum_thread', array('status' => $threadstatus), "tid='$values[tid]'");
			C::t('forum_thread')->update($values['tid'], array('status' => $threadstatus));

			$poststatus = DB::result_first("SELECT status FROM ".DB::table('forum_post')." WHERE pid='$values[pid]'");
			$poststatus = setstatus(4, 1, $poststatus);
			if(!empty($_POST['allowlocal'])) {
				$poststatus = setstatus(6, 1, $poststatus);
			}
			if(!empty($_POST['allowsound'])) {
				$poststatus = setstatus(7, 1, $poststatus);
			}
			if(!empty($_POST['mobiletype'])) {
				$mobiletype = base_convert($_POST['mobiletype'], 10, 2);
				$mobiletype = sprintf('%03d', $mobiletype);
				for($i = 0;$i < 3;$i++) {
					$poststatus = setstatus(10 - $i, $mobiletype{$i}, $poststatus);
				}
			}
			//note DB::update('forum_post', array('status' => $poststatus), "pid='$values[pid]'");
			C::t('forum_post')->update(0, $values['pid'], array('status' => $poststatus));

			if($_POST['location']) {
				list($mapx, $mapy, $location) = explode('|', dhtmlspecialchars($_POST['location']));
				C::t('forum_post_location')->insert(array(
					'pid' => $values['pid'],
					'tid' => $values['tid'],
					'uid' => $_G['uid'],
					'mapx' => $mapx,
					'mapy' => $mapy,
					'location' => $location,
				));
			}
		}
	}

	//note 程序模板输出前运行的代码
	function output() {
		global $_G;
		$variable = array(
			'tid' => $GLOBALS['tid'],
			'pid' => $GLOBALS['pid'],
		);
		if(!empty($_G['forum']['threadtypes'])) {
			$variable['threadtypes'] = $_G['forum']['threadtypes'];
		}
		mobile_core::result(mobile_core::variable($variable));
	}

}
//WWW.CAOGEN8.CO
?>