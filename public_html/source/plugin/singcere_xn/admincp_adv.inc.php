<?php
/*
Author:��.��.��
Website:www.Caogen8.Co
Qq:2575-163-778
*/
if (!defined('IN_DISCUZ') || !defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$operation = !empty($_GET['operation']) ? $_GET['operation'] : 'list';


$positon = array(
    1 => "��������ҳͷ�����λ",
	2 => "��������ҳһ¥�ײ����λ",
    3 => "��������ҳ�ײ����λ",
	4 => "�����б�ҳͷ�����λ",
	5 => "�����б�ҳ�ײ����λ",
    6 => "�����б�ҳ�ײ����λ",
    7 => "��������ҳͷ�����λ",
	8 => "��������ҳһ¥�ײ����λ",
	9 => "��������ҳ�ײ����λ",
    10 => "ͼ�ⶥ�����λ",
	11 => "��ҳ���λ"
);

if (submitcheck("advdel")) {

    if ($_GET['delete']) {
        DB::query("delete from %t where " . DB::field("adid", $_GET['delete']), array("singcere_xn_adv"));

        cpmsg("ɾ���ɹ�", dreferer());
    }
}

if (submitcheck("modadvsubmit")) {

    if (!empty($_GET['title']) && !empty($_GET['adid'])) {

        if (!empty($_FILES['advnewimage'])) {
            $filepath = getfilepath($_FILES['advnewimage']);
            $path = substr($filepath, strlen(DISCUZ_ROOT));
        } else {
            $path = $_GET["advnewimage"];
        }
        DB::update("singcere_xn_adv", array(
            title => $_GET['title'],
            advnewimage => $path,
            link => $_GET['link'],
            type => $_GET['type'],
            display => $_GET['display'],
            alt => $_GET['alt']
                ), array(adid => $_GET['adid']));

        cpmsg('�޸ĳɹ�');
    } else {
        cpmsg('ʧ��');
    }
}

if (submitcheck("addadvsubmit")) {

    if (!empty($_GET['title'])) {
        if (!empty($_FILES['advnewimage'])) {
            $filepath = getfilepath($_FILES['advnewimage']);
            $path = substr($filepath, strlen(DISCUZ_ROOT));
        } else {
            $path = $_GET["advnewimage"];
        }
        $adid = DB::insert("singcere_xn_adv", array(
                    title => $_GET['title'],
                    advnewimage => $path,
                    type => $_GET['type'],
                    link => $_GET['link'],
                    display => $_GET['display'],
                    alt => $_GET['alt']
                        ), true);
        if ($adid)
            cpmsg('��ӳɹ�');
    }else {
        cpmsg('ʧ��');
    }
}

if ($operation == "config") {

    $baseurl = "plugins&operation=edit&identifier=singcere_xn&pmod=admincp_adv";
    $advs = DB::fetch_all("SELECT * FROM %t ", array("singcere_xn_adv"));

    foreach ($advs as $key => $value) {
        $fieldoption .= showtablerow('', array('class="td25"', 'class="td28"'), array(
            "<input class='checkbox' type='checkbox' name='delete[]' value='$value[adid]'>",
            $key,
            $value['title'],
            $positon[$value[type]],
            "<a href=\"" . ADMINSCRIPT . "?action=$baseurl&adid=$value[adid]\" class=\"act\">�޸�</a>"
                ), TRUE);
    }

    showformheader("$baseurl&subaction=fieldoption", '', 'fieldoption');
    //showhiddenfields(array('classid' => $_GET['classid']));
    showtableheader();

    showsubtitle(array('', '˳��', '����', '���λ��', '����'));
    $baseurl = "plugins&operation=add&identifier=singcere_xn&pmod=admincp_adv";
    echo $fieldoption;
    echo '<tr><td></td><td colspan="5"><div><a href= ' . ADMINSCRIPT . '?action=' . $baseurl . '  class="addtr">' . "���" . '</a></div></td></tr>';
    showsubmit('advdel', 'submit', 'del');

    showtablefooter();
    showformfooter();
}
if ($operation == "add" || $operation == "edit") {

    $url = "plugins&operation=$operation&identifier=singcere_xn&pmod=admincp_adv&adid=" . $_GET['adid'];

    if (!empty($_GET['adid'])) {
        $adv = DB::fetch_first("SELECT * FROM %t WHERE adid=%d", array("singcere_xn_adv", $_GET[adid]));
    }
    showformheader($url, 'enctype');
    showtableheader();
    showtitle('adv_edit_style_image');
    showsetting('adv_edit_title', 'title', $adv['title'], 'text');
    showsetting('��ʾ˳��', 'display', $adv['display'], 'text');
    showsetting('Ͷ��λ��', array('type', array(
            array(1, $positon[1], array('regverifyext' => 'none')),
            array(2, $positon[2], array('regverifyext' => '')),
            array(3, $positon[3], array('regverifyext' => '')),
            array(4, $positon[4], array('regverifyext' => '')),
            array(5, $positon[5], array('regverifyext' => '')),
            array(6, $positon[6], array('regverifyext' => '')),
            array(7, $positon[7], array('regverifyext' => '')),
            array(8, $positon[8], array('regverifyext' => '')),
            array(9, $positon[9], array('regverifyext' => '')),
            array(10, $positon[10], array('regverifyext' => '')),
            array(11, $positon[11], array('regverifyext' => ''))
        )), $adv['type'], 'mradio');

    showsetting('adv_edit_style_image_url', 'advnewimage', $adv['advnewimage'], 'filetext');
    showsetting('adv_edit_style_image_link', 'link', $adv['link'], 'text');
    showsetting('adv_edit_style_image_alt', 'alt', $adv['alt'], 'text');
    showtablefooter();

    if ($operation == "edit") {
        showsubmit('modadvsubmit');
    } else {
        showsubmit('addadvsubmit');
    }
    showformfooter();
}

function getfilepath($files) {
    include libfile("class/image");
    $filename = $files['name'];
    if ($filename != "") {
        $path = DISCUZ_ROOT . "data/attachment/singcere_file/singcere_xn_adv" . "/" . "a" . date("Ym");
        if (!file_exists($path)) {
            dmkdir($path);
        }


        $picname = md5(rand(0, 10000) . $files['name']) . strrchr($files['name'], ".");

        $file = $path . "/" . "a" . $picname;
        $image = new image;
        $image->Thumb($file, "", 250, null, 2, 1);
        move_uploaded_file($files['tmp_name'], $file);
    }
    return $file;
}
