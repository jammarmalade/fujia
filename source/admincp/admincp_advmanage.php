<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'guide';



if($operation == 'guide') {

	if(!submitcheck('guidesubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('firstguide','loginguide')) ? $_GET['anchor'] : 'firstguide';
		showsubmenu('advmanage_guide', array(
			array('advmanage_firstguide', 'advmanage&operation=guide&anchor=firstguide', $_GET['anchor'] == 'firstguide'),
			array('advmanage_loginguide', 'advmanage&operation=guide&anchor=loginguide', $_GET['anchor'] == 'loginguide'),
		));
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='firstguide'){
			showtableheader('advmanage_firstguide');
		}elseif($_GET['anchor']=='loginguide'){
			showtableheader('advmanage_loginguide');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('guidesubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'popup'){
	if(!submitcheck('popupsubmit')) {
		showsubmenu('advmanage_popup');
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('advmanage_popupinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('popupsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'goldhome'){
	if(!submitcheck('goldhomesubmit')) {

		showsubmenu('advmanage_goldhome');
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('advmanage_goldhomeinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('goldhomesubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'product'){
	if(!submitcheck('productsubmit')) {

		$_GET['anchor'] = in_array($_GET['anchor'], array('distribution','fund','stock','raise','openaccount')) ? $_GET['anchor'] : 'distribution';
		showsubmenu('advmanage_product', array(
			array('advmanage_distribution', 'advmanage&operation=product&anchor=distribution', $_GET['anchor'] == 'distribution'),
			array('advmanage_fund', 'advmanage&operation=product&anchor=fund', $_GET['anchor'] == 'fund'),
			array('advmanage_stock', 'advmanage&operation=product&anchor=stock', $_GET['anchor'] == 'stock'),
			array('advmanage_raise', 'advmanage&operation=product&anchor=raise', $_GET['anchor'] == 'raise'),
			array('advmanage_openaccount', 'advmanage&operation=product&anchor=openaccount', $_GET['anchor'] == 'openaccount'),
		));
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='distribution'){
			showtableheader('advmanage_distribution');
		}elseif($_GET['anchor']=='fund'){
			showtableheader('advmanage_fund');
		}elseif($_GET['anchor']=='stock'){
			showtableheader('advmanage_stock');
		}elseif($_GET['anchor']=='raise'){
			showtableheader('advmanage_raise');
		}elseif($_GET['anchor']=='openaccount'){
			showtableheader('advmanage_openaccount');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('productsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'info'){
	if(!submitcheck('infosubmit')) {

		showsubmenu('advmanage_info');
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('advmanage_infoinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('infosubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'discover'){
	if(!submitcheck('discoversubmit')) {

		showsubmenu('advmanage_discover');
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('advmanage_discoverinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('discoversubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'system'){
	if(!submitcheck('systemsubmit')) {

		showsubmenu('advmanage_system');
		
		showformheader('advmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('advmanage_systeminfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('systemsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=advmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}





?>