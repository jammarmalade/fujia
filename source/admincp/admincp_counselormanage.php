<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'basic';

if(!submitcheck('counselorsubmit')) {

	showsubmenu('counselormanage_'.$operation);
	showformheader('counselormanage', 'enctype');
	showhiddenfields(array('operation' => $operation));
	
	if($operation == 'basic') {
		
		showtableheader('counselormanage_basic');
		showsetting('counselormanage_search', 'search', '', 'text');
		showtagfooter('tbody');
		showtablefooter();
	}

	showsubmit('counselorsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('update_success', 'action=counselormanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
}


?>