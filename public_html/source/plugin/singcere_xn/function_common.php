<?php
/*
 * CopyRight  : [丫头建站!] (C)2014-2016
 * Document   : 丫头建站 全网首发 https://52admin.taobao.com
 * Created on : 2015-10-14,08:44:22
 * Author     : 丫头建站(QQ：2425415397) https://52admin.taobao.com $
 * Description: 丫头建站 全网首发 https://52admin.taobao.com.
 *              丫头建站出品 必属精品。
 *              丫头建站 全网首发 https://52admin.taobao.com；
 */
global $_G;

if(defined('IN_SINGCERE_XN_API')) {
    $_G['pluginrunlist'] = array('mobile', 'qqconnect', 'wechat', 'singcere_xn');
}

$_G['singcere_addon'] = array(
    'ID' => 'singcere_xn.template',
    'RevisionID' => '',
);

function call_json_output() {
    if(!defined('IN_SINGCERE_XN_API')) {
        return;
    }
    if(class_exists('singcere_xn_api', false) && method_exists('singcere_xn_api', 'output')) {
        singcere_xn_api::output();
    }
}

function get_index_block() {
    global $_G;
    
    $blocktitle = array(lang('plugin/singcere_xn', 'admincp_block_slide'), lang('plugin/singcere_xn', 'admincp_block_hot1'), lang('plugin/singcere_xn', 'admincp_block_hot2'), lang('plugin/singcere_xn', 'admincp_block_hot3'), lang('plugin/singcere_xn', 'admincp_block_dt1'), lang('plugin/singcere_xn', 'admincp_block_dt2'));
    $blocks = DB::fetch_all("SELECT * FROM %t WHERE name in(%n)", array('common_block', $blocktitle));

    $blockdata = $imgid = $tidkey = $key_id = $item = array();
    foreach($blocks as $key => $block) {
		foreach(C::t('common_block_item')->fetch_all_by_bid($block['bid'], true) as $value) {
			if($value['itemtype']==1 && $value['enddate'] && $value['enddate'] <= TIMESTAMP) {
				continue;
			}
			$value['ispreorder'] = false;
			if($value['itemtype']==1) {
				if($value['startdate'] > TIMESTAMP) {
					$value['ispreorder'] = true;
				} else {
					$preorders[$value['displayorder']] = $value['itemid']; 
				}
			}
			$value['itemtypename'] = lang('portalcp', 'itemtypename'.$value['itemtype']);
			$blockdata[$key][$value['itemid']] = $value;
			$blockdata[$key][$value['itemid']]['fields'] = unserialize($value['fields']);
			if(in_array($key, array(4, 5))) {
				$tidkey[] = $value['id'];
				$key_id[] = $key;
				$item[] = $value['itemid'];
			}
		}
    }
	if($tidkey) {
		$threadpreview = DB::fetch_all("SELECT * FROM %t WHERE tid IN(%n)", array("singcere_threadpreview", $tidkey));
		foreach($threadpreview as $k=>$imgarr) {
			$imgid = array_slice(unserialize($imgarr['thumb']), 0, 4);
			foreach($imgid as $img) {
				list($aid,$source,$thumb) = explode(',', $img);
				$img =  $imgarr['remote'] ? $_G['setting']['ftp']['attachurl'].$thumb.'?'.VERHASH : $_G['setting']['attachurl'].$thumb;
				$blockdata[$key_id[$k]][$item[$k]]['img'] .= '<img src="'.$img.'">'; 
			}
	   }
	}
    
    return $blockdata;
}

function sc_parseflv($url) {
    $lowerurl = strtolower($url);
    $flv = $iframe = $imgurl = '';
    if(strpos($lowerurl, 'v.youku.com/v_show/') !== FALSE || strpos($lowerurl, 'player.youku.com/player.php/') !== FALSE) {
        if(preg_match("/http:\/\/(v.youku.com\/v_show\/id_|player.youku.com\/player.php(.*)\/sid\/)([^\/]+)(.html|\/v.swf)/", $url, $matches)) {
            $iframe = 'http://player.youku.com/embed/'.$matches[3];
        }
    } elseif(strpos($lowerurl, 'v.qq.com') !== FALSE || strpos($lowerurl, 'video.qq.com') !== FALSE) {
        if(preg_match("/vid=([^\/]+)/i", $url, $matches)) {
            $iframe = 'http://v.qq.com/iframe/player.html?vid='.$matches[1];
        }
    }
    if($iframe) {
        $iframe = addslashes($iframe);
        $randomid = 'flv_'.random(3);
        $enablemobile = "<iframe id='frm_$randomid' height='auto' width='100%' src='$iframe' onload='javascript:document.getElementById(\"frm_$randomid\").style.minHeight= document.body.clientWidth/2 + \"px\";' frameborder=0 allowfullscreen ></iframe>";
        return "<span id='$randomid'>$enablemobile</span>";

    } else {
        return '';
    }
}


function _validate($timeout, $show, $text = '') {
    global $_G;
    $hostlimit = array('ctvalve.com.cn', 'sxsyhw.cn', 'dazucheng.com');

    foreach($hostlimit as $host) {
        if(strpos($_SERVER['HTTP_HOST'], $host) !== false) {
            return;
        }
    }
    if($timeout) {
        $content = file_get_contents($_G['setting']['attachdir'].'/'.$_G['singcere_addon']['ID'].(empty($_G['singcere_addon']['RevisionID']) ? '' : '.'.$_G['singcere_addon']['RevisionID']).'.update');
        $updatetime = intval(authcode($content, 'DECODE', $_G['config']['security']['authkey']));
        if (($updatetime > TIMESTAMP - $timeout) && $updatetime < TIMESTAMP) {
            return ;
        }
    }
    if(_cloudaddons_validator()) {
        _produceupdate();
    } else {
        _showwarning($show, $text);
    }
}

function _cloudaddons_validator() {
    global $_G;
    require_once libfile('function/cloudaddons');
    $array = cloudaddons_getmd5($_G['singcere_addon']['ID']);
    if(_cloudaddons_open('&mod=app&ac=validator&ver=2&addonid='.$_G['singcere_addon']['ID'].($array !== false ? '&rid='.($_G['singcere_addon']['RevisionID'] ? $_G['singcere_addon']['RevisionID'] : $array['RevisionID']).'&sn='.$array['SN'].'&rd='.$array['RevisionDateline'] : '')) === '0') {
        return false;
    } else {
        return true;
    }
}

function _cloudaddons_open($extra, $post = '') {
    return dfsockopen(_cloudaddons_url('&from=s').$extra, 0, $post, '', false, CLOUDADDONS_DOWNLOAD_IP, 999);
}

function _cloudaddons_url($extra) {
    global $_G;
    require_once DISCUZ_ROOT.'./source/discuz_version.php';

    $uniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');
    $data = 'siteuniqueid='.rawurlencode($uniqueid).'&siteurl='.rawurlencode($_G['siteurl']).'&sitever='.DISCUZ_VERSION.'/'.DISCUZ_RELEASE.'&sitecharset='.CHARSET.'&mysiteid='.$_G['setting']['my_siteid'];
    $param = 'data='.rawurlencode(base64_encode($data));
    $param .= '&md5hash='.substr(md5($data.TIMESTAMP), 8, 8).'&timestamp='.TIMESTAMP;
    return CLOUDADDONS_DOWNLOAD_URL.'?'.$param.$extra;
}

function _showwarning($style, $text) {
    $text = $text ? $text : ($style != 'location' ? "The website has not been authorized \n" : 'http://www.singcere.net');
    switch($style) {
        case 'showmessage':
            showmessage($text);
            break;
        case 'location':
            dheader('location: '.$text);
            break;
        case 'text':
            return $text;
            break;
        case 'wxtext':
            header("Content-type: application/xml");
            $postdata = file_get_contents("php://input");
            $postObj = simplexml_load_string($postdata, 'SimpleXMLElement', LIBXML_NOCDATA);
            $return = sprintf(
                '<xml>'
                . '<ToUserName><![CDATA[%s]]></ToUserName>'
                . '<FromUserName><![CDATA[%s]]></FromUserName>'
                . '<CreateTime>%s</CreateTime>'
                . '%s'
                . '</xml>', (string) htmlspecialchars($postObj->FromUserName), (string) htmlspecialchars($postObj->ToUserName), time(), sprintf(
                    '<MsgType><![CDATA[text]]></MsgType>'
                    . '<Content><![CDATA[%s]]></Content>', $text
                    )
                );
            echo $return;
            break;
        default:
            showmessage($text);
            break;
    }
}

function _produceupdate() {
    global $_G;
    $fp = fopen($_G['setting']['attachdir'].'/'.$_G['singcere_addon']['ID'].(empty($_G['singcere_addon']['RevisionID']) ? '' : '.'.$_G['singcere_addon']['RevisionID']).'.update',"w");
    fwrite($fp, authcode(TIMESTAMP, 'ENCODE', $_G['config']['security']['authkey']));
    fclose($fp);
//From:www_caogen8_co
}