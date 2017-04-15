<?php

/**
 *      [CAOGEN8!] (C)2015-2016 Caogen8.Co.
 *      丫头建站 全网首发 https://52admin.taobao.com
 *
 *      $Id: admincp_slide.inc.php 39 2014-03-16 15:28:08Z 丫头建站 $
 */
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

$pluginlang = &$scriptlang['singcere_xn'];

$forumnav = unserialize($_G['setting']['singcere_xn_forumnav']);

$mainnav = unserialize($_G['setting']['singcere_xn_mainnav']);

if(empty($mainnav)) {

    $navarr = array(
        array('displayorder' => 0, 'name' => lang('plugin/singcere_xn', 'admincp_nav_home'), 'url' => 'portal.php', 'type' => 'system', 'enable' => 1, 'identifier' => 'portal'),
        array('displayorder' => 0, 'name' => lang('plugin/singcere_xn', 'admincp_nav_forum'), 'url' => 'forum.php', 'type' => 'system', 'enable' => 1, 'identifier' => 'forum'),
    );
    C::t('common_setting')->update_batch(array('singcere_xn_mainnav' => serialize($navarr)));
    $mainnav = $navarr;
} 

if (!submitcheck('navsubmit')) {

print <<<EOF
    <script type="text/JavaScript">
    var rowtypedata = [
        [[1,'<input type="text"  class="td25" name="main[displayorder][]" value="0" />', 'td25'], 
        [1,'<input type="text" class="td80"  name="main[name][]" />', ''],
        [1,'<input type="text" class="td31" size="160" name="main[url][]"/>', ''], 

        [1,'<input type="text" size="80" class="td80" id=\"{1}_v\"  name="main[hcolor][]" />', ''],
        [1, "<input type=\"button\"  class=\"pn colorwd pt\" onClick=\"createPalette('bgcolor_{1}_ctrl', '{1}_v');\" style=\"background-color:$value[style] ;\" id=\"cbgcolor_{1}_ctrl\" fwin=\"mods\">", 'td100'],
        
        
        [1,'<input type="checkbox" size="80" class="td80"  name="main[enable][]" value="1" />', ''],
        [1, '<div><a href="javascript:;" class="deleterow" onClick="deleterow(this)"></a></div>', '']],
        

        [[1,'<input type="text"  class="td25" name="forum[displayorder][]" value="0" />', 'td25'], 
        [1,'<input type="text" class="td80"  name="forum[fid][]" />', ''],
        [1,'<input type="text" class="td150" size="80" name="forum[title][]"/>', ''], 
        [1,'<input type="text" size="80" class="td80"  name="forum[css][]" />', ''],
        [1,'<input type="text" size="80" class="td80" id=\"{1}_v\"  name="forum[color][]" />', ''],
        [1, "<input type=\"button\"  class=\"pn colorwd pt\" onClick=\"createPalette('bgcolor2_{1}_ctrl', '{1}_v');\" style=\"background-color:$value[style] ;\" id=\"cbgcolor2_{1}_ctrl\" fwin=\"mods\">", 'td100'],
        [1, '<div><a href="javascript:;" class="deleterow" onClick="deleterow(this)"></a></div>', '']],
    ];      
    </script>           
    <style>.td150 {width:150px;}.td100 {width:100px;}.td80 {width:80px;}</style>
EOF;
    showformheader("plugins&operation=config&do=$plugin[pluginid]&identifier=$plugin[identifier]&pmod=$module[name]", 'navsubmit');

    showtableheader(lang('plugin/singcere_xn', 'admincp_nav_main'));
    showsubtitle(array('display_order', 'name', 'url', lang('plugin/singcere_xn', 'admincp_navcolor'), '',  'enable', 'delete'), 'header', array('', '', ''));
    foreach ($mainnav as $key => $value) {
        showtablerow('class="data"', array('class="td25"', 'width="80"', 'class="td31"', 'class="td25"', 'width="80"', 'width="80"'), array(
            "<input type=\"text\" class=\"td25\" name=\"main[displayorder][$key]\" value=\"$value[displayorder]\">",
            "<input type=\"text\" name=\"main[name][$key]\" value=\"$value[name]\" class=\"td80\">",
            "<input type=\"text\" size=\"160\" name=\"main[url][$key]\" value=\"$value[url]\" class=\"td31\" ".($value['type'] == 'system' ? 'readonly="true" style="color:#999"' : '')."  >".'<input type="hidden" name="main[identifier]['.$key.']" value="'.$value['identifier'].'"><input type="hidden" name="main[type]['.$key.']" value="'.($value['type'] == 'system' ? 'system' : '').'">',
            "<input type=\"text\" size=\"80\" name=\"main[hcolor][$key]\" value=\"$value[hcolor]\" id=\"bgcolor[$key]\" class=\"td80\">",
            "<input type=\"button\"  class=\"pn colorwd pt\" onClick=\"createPalette('bgcolor_{$key}_ctrl', 'bgcolor[$key]');\" style=\"background-color:$value[hcolor] ;\" id=\"cbgcolor_{$key}_ctrl\" fwin=\"mods\">",
            "<input class=\"checkbox\" type=\"checkbox\" name=\"main[enable][$key]\" value=\"1\" ".($value['enable'] ? 'checked="checked"' : '').">",
            $value['type'] == 'system' ? 'NaN' : '<div><a href="javascript:;" class="deleterow" onClick="deleterow(this)">'.lang('delete').'</a></div>',
        ));
    }
    showtablerow('class="noborder"', array('colspan="15"'), array("<div><a href=\"###\" onclick=\"addrow(this, 0)\" class=\"addtr\">".lang('plugin/singcere_xn', 'admincp_nav_new')."</a></div>"));
        
    showtablefooter();


    showtableheader(lang('plugin/singcere_xn', 'admincp_nav_forum2'));
    showsubtitle(array('display_order', lang('plugin/singcere_xn', 'admincp_navfid'), lang('plugin/singcere_xn', 'admincp_navforumname') ,'class', lang('plugin/singcere_xn', 'admincp_navcolor'), "", 'delete', ''), 'header', array('', '', ''));
    foreach ($forumnav as $key => $value) {
        showtablerow('class="data"', array('class="td25"', 'width="80"', 'class="td150"', 'width="80"', 'width="80"', 'width="100"'), array(
            "<input type=\"text\" class=\"td25\" name=\"forum[displayorder][]\" value=\"$value[displayorder]\">",
            "<input type=\"text\" name=\"forum[fid][]\" value=\"$value[fid]\" class=\"td80\">",
            "<input type=\"text\" size=\"80\" name=\"forum[title][]\" value=\"$value[title]\" class=\"td150\">",
             "<input type=\"text\" size=\"80\" name=\"forum[css][]\" value=\"$value[css]\" class=\"td80\">",
             "<input type=\"text\" size=\"80\" name=\"forum[color][]\" value=\"$value[color]\" id=\"bgcolor2[$key]\" class=\"td80\">",
             "<input type=\"button\"  class=\"pn colorwd pt\" onClick=\"createPalette('bgcolor2_{$key}_ctrl', 'bgcolor2[$key]');\" style=\"background-color:$value[color] ;\" id=\"cbgcolor2_{$key}_ctrl\" fwin=\"mods\">",
            '<div><a href="javascript:;" class="deleterow" onClick="deleterow(this)">'.lang('delete').'</a></div>',
                 "<input type=\"hidden\" name=\"id[$value[id]]\" value=\"$value[id]\">" 
        ));
    }
    showtablerow('class="noborder"', array('colspan="15"'), array("<div><a href=\"###\" onclick=\"addrow(this, 1, 'rd' + Math.random().toString(36).substring(4,8))\" class=\"addtr\">".lang('plugin/singcere_xn', 'admincp_nav_new')."</a></div>"));
        
    showtablefooter();
    showsubmit('navsubmit');
    showformfooter();
} else {
    loadcache('forums');
 
 
    function cmp($a, $b) {

        if($a['displayorder'] == $b['displayorder']) {
            return $a['url'] > $b['url'] ? 1 : -1;
        } else {
            return $a['displayorder'] > $b['displayorder'] ? 1 : -1;
        }
    }
 
    $mainnavarr = array();
    foreach($_GET['main']['name'] as $key => $name) {
        if($_GET['main']['type'][$key] != 'system' && empty($name)) {
            continue;
        }
        $_GET['main']['url'][$key] = trim($_GET['main']['url'][$key]) ? trim($_GET['main']['url'][$key]) : '#';
        $mainnavarr[] = array(
            'displayorder' => intval($_GET['main']['displayorder'][$key]),
            'name' => dhtmlspecialchars($name),
            'url' => dhtmlspecialchars($_GET['main']['url'][$key]),
            'hcolor' => dhtmlspecialchars($_GET['main']['hcolor'][$key]),
            'enable' => intval($_GET['main']['enable'][$key]),
            'type' => dhtmlspecialchars($_GET['main']['type'][$key]),
            'identifier' => dhtmlspecialchars($_GET['main']['identifier'][$key])
     
        );
    }

  
    if(!empty($mainnavarr)) {
        usort($mainnavarr, 'cmp');
    }
    $settings = array('singcere_xn_mainnav' => serialize($mainnavarr));
    C::t('common_setting')->update_batch($settings);


    $forumnavarr = array();
    if(is_array($_GET['forum']['fid'])) {
        foreach($_GET['forum']['fid'] as $key => $fid) {
            if($_G['cache']['forums'][$fid]) {
                $forumnavarr[] = array(
                    'displayorder' => intval($_GET['forum']['displayorder'][$key]),
                    'fid' => intval($fid),
                    'title' => dhtmlspecialchars($_GET['forum']['title'][$key]),
                    'css' => dhtmlspecialchars($_GET['forum']['css'][$key]),
                    'color' => dhtmlspecialchars($_GET['forum']['color'][$key]),
                );
            }
        }
    }
    if(!empty($forumnavarr)) {
        usort($forumnavarr, 'cmp');
    }

    $settings = array('singcere_xn_forumnav' => serialize($forumnavarr));
    C::t('common_setting')->update_batch($settings);









    updatecache('setting');
    
    cpmsg('setting_update_succeed', "action=plugins&operation=config&do=$plugin[pluginid]&identifier=$plugin[identifier]&pmod=$module[name]", 'succeed');
}