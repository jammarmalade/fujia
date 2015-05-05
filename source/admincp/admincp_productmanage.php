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

	showsubmenu('productmanage_'.$operation);
	showformheader('productmanage', 'enctype');
	showhiddenfields(array('operation' => $operation));
	
	if($operation == 'basic') {
		
		showtableheader('productmanage_basic');
		showsetting('productmanage_search', 'search', '', 'text');
		showtagfooter('tbody');
		showtablefooter();
	}

	showsubmit('usersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
	showtablefooter();
	showformfooter();

} else {

	cpmsg('update_success', 'action=productmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
}


?>