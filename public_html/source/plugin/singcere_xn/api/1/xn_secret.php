<?php

/**
 *      [Caogen8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: forumdisplay.php 35213 2015-02-26 06:15:12Z 草_根_吧 $
 */
if (!defined('IN_XN_APPSERVER_API')) {
    exit('Access Denied');
}

// define('MOBILE_HIDE_STICKY', !isset($_GET['hidesticky']) ? 1 : $_GET['hidesticky']);

$_GET['id'] = 'xn_secret';
include_once 'plugin.php';

class xn_appserver_api {

    function common() {
        global $_G;
        // if (!empty($_GET['pw'])) {
        //     $_GET['action'] = 'pwverify';
        // }
        // $_G['forum']['allowglobalstick'] = true;
        // if($_G['forum']['redirect']) {
        //     appserver_core::result(appserver_core::variable(array('forum' => array('fid' => $_G['fid'], 'redirect' => $_G['forum']['redirect']))));
        // }
    }

    function output() {
        global $_G, $threads, $iseditor;



        $threads = appserver_core::getvalues(array_values($GLOBALS['threads']), array('/^\d+$/'), array('tid', 'content', 'attachment', 'position', 'comments', 'subject', 'liked', 'like', 'lng', 'lat', 'position'));

        if ($_G['uid'] && $threads) {

            foreach ($threads as $key => $value) {

                $tids[] = $value['tid'];
            }
            $liked_arr = C::t("#xn_secret#xn_secret_like")->fetch_by_condition(array('tid' => $tids, 'uid' => $_G['uid']), '', '', '','tid');
       
        }

        foreach ($threads as $key => $value) {
            $value['position'] = substr($value['position'], 10, strlen($value['position']));
          //  mobile_parsesmiles($value['content']);
            $value['liked'] = $liked_arr[$value['tid']] ? 1 : false;
            $threads[$key] = $value;
        }



        $variable = array(
            'forum_threadlist' => $threads,
            'page' => array('page' => $GLOBALS['page'], 'perpage' => $_G['tpp'], 'realpage' => @ceil($_G['forum_threadcount'] / $_G['tpp'])),
        );

        $variable['iseditor'] = $iseditor;
        appserver_core::result(appserver_core::variable($variable));
    }

}
//WWW.CAOGEN8.CO
?>
