<?php

/**
 *      [CAOGEN8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id$
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
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


?>