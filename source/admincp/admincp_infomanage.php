<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'basic';

if(!submitcheck('infosubmit')) {

	showsubmenu('infomanage_'.$operation);
	showformheader('infomanage', 'enctype');
	showhiddenfields(array('operation' => $operation));
	
	if($operation == 'basic') {
		
		showtableheader('infomanage_basic');
		showtablerow('class="header"', array('class="td25"','class="td24"','class="td31"','class="td30"','class="td30"'), array(
			cplang('infomanage_title_id'),
			cplang('infomanage_title_subject'),
			cplang('infomanage_title_content'),
			cplang('infomanage_title_time'),
			cplang('operate'),
		));

		$info=array(1,diconv('测试资讯','gbk'),diconv('资讯内容','gbk'),'2015-05-05 17:55:43',diconv('更新|删除','gbk'));
		showtablerow('', '', $info);

		showtagfooter('tbody');
		showtablefooter();
	}

	showsubmit('infosubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('update_success', 'action=infomanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
}


?>