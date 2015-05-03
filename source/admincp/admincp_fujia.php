<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();

$extbutton = '';
$operation = $operation ? $operation : 'basic';

if(!submitcheck('settingsubmit')) {

	showsubmenu('fujia_'.$operation);
	showformheader('fujia&edit=yes', 'enctype');
	showhiddenfields(array('operation' => $operation));

	if($operation == 'basic') {
		
		showtableheader('fujia_basic');
		showsetting('fujia_domain', 'fujia[domain]', '', 'text');
		showtagfooter('tbody');	
		
		showtablefooter();

	}

	showsubmit('settingsubmit', 'submit', '', $extbutton.(!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('setting_update_succeed', 'action=setting&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : '').(!empty($from) ? '&from='.$from : ''), 'succeed');
}


?>