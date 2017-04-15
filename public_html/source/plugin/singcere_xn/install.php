<?php

/**
 *      [CAOGEN8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: install.php 42 2014-09-02 09:04:09Z 丫头建站 $
 */

if(!defined('IN_DISCUZ')) { 
	exit('Access Denied');
}



/* main nav */
$mainnav = unserialize($_G['setting']['singcere_xn_mainnav']); 
if(empty($mainnav)) {
	$navarr = array(
		array('displayorder' => 0, 'name' => $installlang['home'], 'url' => 'portal.php?mod=index', 'type' => 'system', 'identifier' => 'portal', 'enable' => 1),
		array('displayorder' => 0, 'name' => $installlang['forum'], 'url' => 'forum.php?mod=index', 'type' => 'system', 'identifier' => 'forum', 'enable' => 1),
	); 
	C::t('common_setting')->update_batch(array('singcere_xn_mainnav' => serialize($navarr)));
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_singcere_xn_adv` (
  `adid` int(3) NOT NULL AUTO_INCREMENT,
  `advnewimage` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(3) DEFAULT NULL,
  `display` int(4) NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=MyISAM;
EOF;
runquery($sql);
$finish = TRUE;