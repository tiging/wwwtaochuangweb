<?php

/**
 *      (C)2015-2016 caogen8.co
 *      草根吧源码论坛 全网首发 http://www.Caogen8.co
 *
 *      $Id$
 */
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

global $_G, $pluginid, $scriptlang;
$langs = $scriptlang['singcere_xn'];



$step = max(1, intval($_GET['step']));

showsubmenusteps($langs['admincp_rebuild_block'], array(
  array($langs['admincp_rebuild_chk'], $step == 1),
  array($langs['admincp_rebuild_create'], $step == 2),
  array($langs['admincp_rebuild_result'], $step == 2)
));

$blockarray = array(
  array('name'=>$langs['admincp_block_slide'], 'blockclass'=>'forum_thread'),
  array('name'=>$langs['admincp_block_hot1'], 'blockclass'=>'forum_thread'),
  array('name'=>$langs['admincp_block_hot2'], 'blockclass'=>'forum_thread'),
  array('name'=>$langs['admincp_block_hot3'], 'blockclass'=>'forum_thread'),
  array('name'=>$langs['admincp_block_dt1'], 'blockclass'=>'forum_thread'),
  array('name'=>$langs['admincp_block_dt2'], 'blockclass'=>'forum_thread'),
);



if ($step == 1) {
    cpmsg(cplang($langs['admincp_rebuild_unfind']), "action=plugins&operation=config&do=$pluginid&identifier=singcere_xn&pmod=admincp_block&step=2", 'button', '', FALSE);
} elseif ($step == 2) {
    require_once libfile('function/block');
    foreach ($blockarray as $value) {
        $block = DB::fetch_first("SELECT * FROM %t WHERE name = %s", array('common_block', $value['name']));
        C::t('common_block')->delete($block['bid']);
        C::t('common_block_style')->delete($block['styleid']);
        block_parse_template($langs['block_index_style'], $value);
        $styleid = C::t('common_block_style')->insert($value, true);
        updatecache('blockclass');
        if($value['name'] == $langs['admincp_block_slide']) {
            $setarr = array(
              'blockclass' => 'portal_article',
              'name' => $value['name'],
              'styleid' => $styleid,
              'script' => 'article',
              'cachetime' => 3600,
              'cachetimerange' => '',
              'punctualupdate' => '0',
              'shownum' => 3,
              'picwidth' => 300,
              'picheight' => 200,
              'target' => 'self',
              'dateuformat' => 1,
              'dateformat' => 'Y-m-d',
              'hidedisplay' => 0,
              'dateline' => TIMESTAMP,
              'uid' => $_G['uid'],
              'username' => $_G['username'],
              'notinherited' => 0,
            );
        }elseif(in_array($value['name'], array($langs['admincp_block_hot1'], $langs['admincp_block_hot2'], $langs['admincp_block_hot3']))) {
            $setarr = array(
              'blockclass' => 'forum_thread',
              'name' => $value['name'],
              'styleid' => $styleid,
              'script' => 'thread',
              'cachetime' => 3600,
              'cachetimerange' => '',
              'punctualupdate' => '0',
              'shownum' => 5,
              'picwidth' => 160,
              'picheight' => 120,
              'target' => 'self',
              'dateuformat' => 1,
              'dateformat' => 'Y-m-d',
              'hidedisplay' => 0,
              'dateline' => TIMESTAMP,
              'uid' => $_G['uid'],
              'username' => $_G['username'],
              'notinherited' => 0,
            );
        }elseif(in_array($value['name'], array($langs['admincp_block_dt1'], $langs['admincp_block_dt2']))) {
            $setarr = array(
              'blockclass' => 'forum_thread',
              'name' => $value['name'],
              'styleid' => $styleid,
              'script' => 'thread',
              'cachetime' => 3600,
              'cachetimerange' => '',
              'punctualupdate' => '0',
              'shownum' => 1,
              'target' => 'self',
              'dateuformat' => 1,
              'dateformat' => 'Y-m-d',
              'hidedisplay' => 0,
              'dateline' => TIMESTAMP,
              'uid' => $_G['uid'],
              'username' => $_G['username'],
              'notinherited' => 0,
            );
        }

        $bid = C::t('common_block')->insert($setarr, true);
        DB::insert('common_template_block', array('tpldirectory' => './template/singcere_xn', 'targettplname' => 'portal/index', bid => $bid));
        block_updatecache($bid, true);
    }





    cpmsg(cplang('fileperms_check_waiting'), "action=plugins&operation=config&do=$pluginid&identifier=singcere_xn&pmod=admincp_block&step=3", 'loading', '', FALSE);
} elseif ($step == 3) {
    cpmsg($langs['admincp_update_success'], "action=plugins&operation=config&do=$pluginid&identifier=singcere_xn&pmod=admincp_block", 'succeed');
}