<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'basic';

if(!submitcheck('membersubmit')) {

	showsubmenu('membermanage_'.$operation);
	showformheader('membermanage', 'enctype');
	showhiddenfields(array('operation' => $operation));
	
	if($operation == 'basic') {
		
		showtableheader('membermanage_basic');
		showsetting('membermanage_search', 'search', '', 'text');
		showtagfooter('tbody');
		showtablefooter();
	}

	showsubmit('membersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('update_success', 'action=membermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
}


?>