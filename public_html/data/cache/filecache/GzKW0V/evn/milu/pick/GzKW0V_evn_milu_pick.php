<?php
$data = array (
  'exp' => 0,
  'data' => 
  array (
    'article_status' => 
    array (
      0 => '全部',
      1 => '未导入',
      2 => '已导入',
      3 => '回收站',
      4 => '定时发布',
    ),
    'pick_config' => 
    array (
      'pick_num' => 10,
      'time_out' => 10,
      'max_redirs' => 2,
      'ask_mode' => 1,
      'index_localtion_cache_time' => 3600,
      'index_server_cache_time' => 3600,
      'evo_index_server_cache_time' => 3600,
      'is_big' => 0,
      'max_memory_per' => '90%',
    ),
    'evo_rules' => 
    array (
      'no_title' => 
      array (
        0 => '403 Forbidden',
        1 => '404 Not Found',
      ),
      'no_url' => 
      array (
        0 => 'javascript:',
        1 => 'sendpwd',
        2 => 'login',
        3 => 'mod=register',
        4 => 'mod=ranklist',
        5 => '/uid-',
        6 => '/username-',
        7 => '?mod=rss&',
      ),
    ),
    'system_rules' => 
    array (
      1 => '论坛',
      2 => '文章',
    ),
    'long_text' => 
    array (
      0 => '网址',
      1 => '地址',
      2 => '网站名称',
    ),
    'filter_html' => 
    array (
      0 => 
      array (
        'name' => '链接<a',
        'search' => 'a',
      ),
      1 => 
      array (
        'name' => '表格<table',
        'search' => 'table',
      ),
      2 => 
      array (
        'name' => '表格行<tr',
        'search' => 'tr',
      ),
      3 => 
      array (
        'name' => '单元<td',
        'search' => 'td',
      ),
      4 => 
      array (
        'name' => '段落<p',
        'search' => 'p',
      ),
      5 => 
      array (
        'name' => '字体<font',
        'search' => 'font',
      ),
      6 => 
      array (
        'name' => '层<div',
        'search' => 'div',
      ),
      7 => 
      array (
        'name' => '<span',
        'search' => 'span',
      ),
      8 => 
      array (
        'name' => '表格体<tbody',
        'search' => 'tbody',
      ),
      9 => 
      array (
        'name' => '图像<img',
        'search' => 'img',
      ),
      10 => 
      array (
        'name' => '加粗<b<strong',
        'search' => 'b|strong',
      ),
      11 => 
      array (
        'name' => '换行<br>',
        'search' => '<br>',
        'flag' => 1,
      ),
      12 => 
      array (
        'name' => '空格&nbsp;',
        'search' => '&nbsp;',
        'flag' => 1,
      ),
      13 => 
      array (
        'name' => 'H标签<h1-7',
        'search' => 'h1|h2|h3|h4|h5|h6|h7',
      ),
      14 => 
      array (
        'name' => 'hr标签<hr>',
        'search' => 'hr',
        'flag' => 1,
      ),
      15 => 
      array (
        'name' => '表单<form',
        'search' => 'form',
      ),
      17 => 
      array (
        'name' => '列表<li<ul<dd<dt<dl',
        'search' => 'li|ul|dd|dt',
      ),
      18 => 
      array (
        'name' => '上下标<sub<sup',
        'search' => 'sub|sup',
      ),
      19 => 
      array (
        'name' => '表单元素<input<select<textarea<label<option<button',
        'search' => 'input|select|textarea|label|option|button',
        'no_show' => 1,
      ),
      21 => 
      array (
        'name' => '<object<embed<param',
        'search' => 'object|embed',
        'no_show' => 1,
      ),
    ),
    'evo_img' => 
    array (
      '*none.gif' => 'file',
      '*bbsLoading.jpg' => 'src2',
      '*imgloading.gif' => 'original',
      '*txt.mop.com' => 'data-original',
      '*blog.sina.com.cn/s/' => 'real_src ',
      '*sg_trans.gif' => 'real_src ',
    ),
    'evo_img_no' => 
    array (
      0 => 'static/image/smiley/',
      1 => 'piccache3.soso.com/face',
      2 => 'cache.soso.com/img/',
      3 => 'emot/em',
      4 => 'static/image/common',
      5 => 'static/image/filetype/',
    ),
  ),
);
