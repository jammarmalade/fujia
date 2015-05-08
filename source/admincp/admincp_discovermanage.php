<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'gold';



if($operation == 'gold') {

	if(!submitcheck('goldsubmit')) {
		showsubmenu('discovermanage_gold');
		
		showformheader('discovermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('discover_gold');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('raisesubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=discovermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'game'){
	if(!submitcheck('gamesubmit')) {
		showsubmenu('discovermanage_game');
		
		showformheader('discovermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('discover_game');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('gamesubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=discovermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'order'){
	if(!submitcheck('ordersubmit')) {

		showsubmenu('discovermanage_order');
		
		showformheader('discovermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('discover_order');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('ordersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=discovermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'goods'){
	if(!submitcheck('goodssubmit')) {

		$_GET['anchor'] = in_array($_GET['anchor'], array('goodsupdate','infoupdate')) ? $_GET['anchor'] : 'goodsupdate';
		showsubmenu('discovermanage_goods', array(
			array('discover_goodsupdate', 'discovermanage&operation=goods&anchor=goodsupdate', $_GET['anchor'] == 'goodsupdate'),
			array('discover_infoupdate', 'discovermanage&operation=goods&anchor=infoupdate', $_GET['anchor'] == 'infoupdate'),
		));
		
		showformheader('discovermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='goodsupdate'){
			showtableheader('discover_goodsupdate');
		}elseif($_GET['anchor']=='infoupdate'){
			showtableheader('discover_infoupdate');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('goodssubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=discovermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}





?>