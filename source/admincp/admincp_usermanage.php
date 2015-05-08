<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'member';



if($operation == 'member') {

	if(!submitcheck('membersubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('info','update','assets','complain')) ? $_GET['anchor'] : 'info';
		showsubmenu('usermanage_member', array(
			array('member_info', 'usermanage&operation=member&anchor=info', $_GET['anchor'] == 'info'),
			array('member_update', 'usermanage&operation=member&anchor=update', $_GET['anchor'] == 'update'),
			array('member_assets', 'usermanage&operation=member&anchor=assets', $_GET['anchor'] == 'assets'),
			array('member_complain', 'usermanage&operation=member&anchor=complain', $_GET['anchor'] == 'complain'),
		));
		
		showformheader('usermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='info'){
			showtableheader('member_list');
		}elseif($_GET['anchor']=='update'){
			showtableheader('member_update');
		}elseif($_GET['anchor']=='assets'){
			showtableheader('member_assets');
		}elseif($_GET['anchor']=='complain'){
			showtableheader('member_complain');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('membersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=usermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}elseif($operation == 'counselor'){
	if(!submitcheck('counselorsubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('addinfo','addlog','managelog','applycensor','assess','punish')) ? $_GET['anchor'] : 'addinfo';
		showsubmenu('usermanage_counselor', array(
			array('counselor_addinfo', 'usermanage&operation=counselor&anchor=addinfo', $_GET['anchor'] == 'addinfo'),
			array('counselor_addlog', 'usermanage&operation=counselor&anchor=addlog', $_GET['anchor'] == 'addlog'),
			array('counselor_managelog', 'usermanage&operation=counselor&anchor=managelog', $_GET['anchor'] == 'managelog'),
			array('counselor_applycensor', 'usermanage&operation=counselor&anchor=applycensor', $_GET['anchor'] == 'applycensor'),
			array('counselor_assess', 'usermanage&operation=counselor&anchor=assess', $_GET['anchor'] == 'assess'),
			array('counselor_punish', 'usermanage&operation=counselor&anchor=punish', $_GET['anchor'] == 'punish'),
		));
		
		showformheader('usermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='addinfo'){
			showtableheader('counselor_addinfo');
		}elseif($_GET['anchor']=='addlog'){
			showtableheader('counselor_addlog');
		}elseif($_GET['anchor']=='managelog'){
			showtableheader('counselor_managelog');
		}elseif($_GET['anchor']=='applycensor'){
			showtableheader('counselor_applycensor');
		}elseif($_GET['anchor']=='assess'){
			showtableheader('counselor_assess');
		}elseif($_GET['anchor']=='punish'){
			showtableheader('counselor_punish');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('counselorsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=usermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}
}elseif($operation == 'user'){
	if(!submitcheck('usersubmit')) {
		$_GET['anchor'] = in_array($_GET['anchor'], array('info','oneinfo','tradeinfo','assets')) ? $_GET['anchor'] : 'info';
		showsubmenu('usermanage_user', array(
			array('user_info', 'usermanage&operation=user&anchor=info', $_GET['anchor'] == 'info'),
			array('user_oneinfo', 'usermanage&operation=user&anchor=oneinfo', $_GET['anchor'] == 'oneinfo'),
			array('user_tradeinfo', 'usermanage&operation=user&anchor=tradeinfo', $_GET['anchor'] == 'tradeinfo'),
			array('user_assets', 'usermanage&operation=user&anchor=assets', $_GET['anchor'] == 'assets'),
		));
		
		showformheader('usermanage', 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='info'){
			showtableheader('user_info');
		}elseif($_GET['anchor']=='oneinfo'){
			showtableheader('user_oneinfo');
		}elseif($_GET['anchor']=='tradeinfo'){
			showtableheader('user_tradeinfo');
		}elseif($_GET['anchor']=='assets'){
			showtableheader('user_assets');
		}
		showtagfooter('tbody');
		showtablefooter();

		showsubmit('usersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		showtablefooter();
		showformfooter();

	} else {

		cpmsg('update_success', 'action=usermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'succeed');
	}

}




?>