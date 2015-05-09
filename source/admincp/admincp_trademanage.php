<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'fundinvestment';



if($operation == 'fundinvestment') {

	if(!submitcheck('investmentsubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('investmenta','investmentb')) ? $_GET['anchor'] : 'investmenta';
		showsubmenu('trademanage_investment', array(
			array('trademanage_investmenta', 'trademanage&operation=fundinvestment&anchor=investmenta', $_GET['anchor'] == 'investmenta'),
			array('trademanage_investmentb', 'trademanage&operation=fundinvestment&anchor=investmentb', $_GET['anchor'] == 'investmentb'),
		));
		
		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='investmenta'){
			showtableheader('trademanage_investmenta');
		}elseif($_GET['anchor']=='investmentb'){
			showtableheader('trademanage_investmentb');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('investmentsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'fundbuy'){
	if(!submitcheck('fundbuysubmit')) {
		showsubmenu('trademanage_fundbuy');
		
		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('trademanage_fundbuyinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('fundbuysubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'stockbuy'){
	if(!submitcheck('stockbuysubmit')) {

		showsubmenu('trademanage_stockbuy');
		
		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('trademanage_stockbuyinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('stockbuysubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'raisebuy'){
	if(!submitcheck('raisebuysubmit')) {

		showsubmenu('trademanage_raisebuy');
		
		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('trademanage_raisebuyinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('raisebuysubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'raisesupport'){
	if(!submitcheck('raisesupportsubmit')) {

		showsubmenu('trademanage_raisesupport');
		
		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('trademanage_raisesupportinfo');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('raisesupportsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'distribution'){
	if(!submitcheck('distributionsubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('stockindex','stock')) ? $_GET['anchor'] : 'stockindex';
		showsubmenu('trademanage_distribution', array(
			array('trademanage_stockindex', 'trademanage&operation=distribution&anchor=stockindex', $_GET['anchor'] == 'stockindex'),
			array('trademanage_stock', 'trademanage&operation=distribution&anchor=stock', $_GET['anchor'] == 'stock'),
		));

		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		if($_GET['anchor']=='stockindex'){
			showtableheader('trademanage_stockindex');
		}elseif($_GET['anchor']=='stock'){
			showtableheader('trademanage_stock');
		}

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('distributionsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'openaccount'){
	if(!submitcheck('openaccountsubmit')) {

		$_GET['anchor'] = in_array($_GET['anchor'], array('accountstock','accountfutures')) ? $_GET['anchor'] : 'accountstock';
		showsubmenu('trademanage_openaccount', array(
			array('trademanage_accountstock', 'trademanage&operation=openaccount&anchor=accountstock', $_GET['anchor'] == 'accountstock'),
			array('trademanage_accountfutures', 'trademanage&operation=openaccount&anchor=accountfutures', $_GET['anchor'] == 'accountfutures'),
		));

		showformheader('trademanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		if($_GET['anchor']=='accountstock'){
			showtableheader('trademanage_accountstock');
		}elseif($_GET['anchor']=='accountfutures'){
			showtableheader('trademanage_accountfutures');
		}

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('openaccountsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=trademanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}





?>