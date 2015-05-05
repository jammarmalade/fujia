<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'basic';

if(!submitcheck('usersubmit')) {

	showsubmenu('usermanage_'.$operation);
	showformheader('usermanage', 'enctype');
	showhiddenfields(array('operation' => $operation));
	
	if($operation == 'basic') {
		
		showtableheader('usermanage_basic');
		showsetting('usermanage_search', 'search', '', 'text');
		showtagfooter('tbody');
		showtablefooter();
	}

	showsubmit('usersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('update_success', 'action=usermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
}


?>