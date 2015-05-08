<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'distribution';



if($operation == 'distribution') {

	if(!submitcheck('distributionsubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('stockindex','stock')) ? $_GET['anchor'] : 'stockindex';
		showsubmenu('productmanage_distribution', array(
			array('distribution_stockindex', 'productmanage&operation=distribution&anchor=stockindex', $_GET['anchor'] == 'stockindex'),
			array('distribution_stock', 'productmanage&operation=distribution&anchor=stock', $_GET['anchor'] == 'stock'),
		));
		
		showformheader('productmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='stockindex'){
			showtableheader('distribution_stockindex');
		}elseif($_GET['anchor']=='stock'){
			showtableheader('distribution_stock');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('distributionsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=productmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'fund'){
	if(!submitcheck('fundsubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('investment','bay')) ? $_GET['anchor'] : 'investment';
		showsubmenu('productmanage_fund', array(
			array('product_investment', 'productmanage&operation=fund&anchor=investment', $_GET['anchor'] == 'investment'),
			array('product_bay', 'productmanage&operation=fund&anchor=bay', $_GET['anchor'] == 'bay'),
		));
		
		showformheader('productmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='investment'){
			showtableheader('product_investment');
		}elseif($_GET['anchor']=='bay'){
			showtableheader('product_bay');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('fundsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=productmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'stock'){
	if(!submitcheck('stocksubmit')) {

		showsubmenu('productmanage_stock');
		
		showformheader('productmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('product_stock');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('stocksubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=productmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'raise'){
	if(!submitcheck('raisesubmit')) {

		showsubmenu('productmanage_raise');
		
		showformheader('productmanage', 'enctype');
		showhiddenfields(array('operation' => $operation));

		showtableheader('product_raise');

		showtagfooter('tbody');
		showtablefooter();

		showsubmit('raisesubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=productmanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}





?>