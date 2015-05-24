<?php

/**
 *      
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();


$operation = $operation ? $operation : 'member';

$lpp = empty($_GET['lpp']) ? 2 : $_GET['lpp'];
$start = ($page - 1) * $lpp;
shownav('usermanage', 'usermanage_'.$operation);
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
			
			$namevalue = trim($_GET['namevalue']);
			if($namevalue!=''){
				$nametype=trim($_GET['nametype']);
			}
			$starttime = trim($_GET['starttime']);
			$endtime = trim($_GET['endtime']);
			$str_stime=strtotime($starttime);
			$str_etime=strtotime($endtime);
			$roletype = trim($_GET['role']) ? trim($_GET['role']) : 'none';

			$balancevalue = trim($_GET['balancevalue']);
			if(is_numeric($balancevalue) && $balancevalue>0){
				$balancevalue=intval($balancevalue);
				$balance=trim($_GET['balance']);
			}
			$coinvalue = trim($_GET['coinvalue']);
			if(is_numeric($coinvalue) && $coinvalue>0){
				$coinvalue=intval($coinvalue);
				$coin=trim($_GET['coin']);
			}
			//search
			showtableheader('search');
			$nametypearr=array(
				'username'=>$lang['member_loginname'],
				'realname'=>$lang['member_realname'],
				'nickname'=>$lang['member_nickname'],
			);
			$nametypeselect='';
			foreach($nametypearr as $k=>$v){
				$nametypeselect.='<option value="'.$k.'"'.($k == $nametype ? ' selected' : '').'>'.$v.'</option>';
			}
			$roletypearr=array(
				'0'=>$lang['none'],
				'2'=>$lang['yes'],
				'1'=>$lang['no'],
			);
			$roleselect='';
			foreach($roletypearr as $k=>$v){
				$roletypeselect.='<option value="'.$k.'"'.($k == $roletype ? ' selected' : '').'>'.$v.'</option>';
			}
			$comparetypearr=array(
				'none'=>$lang['none'],
				'>'=>$lang['above'],
				'<'=>$lang['lower_than'],
				'='=>$lang['equal_to'],
			);
			$comparebalanceselect=$comparecoinselect='';
			foreach($comparetypearr as $k=>$v){
				$comparebalanceselect.='<option value="'.$k.'"'.($k == $balance ? ' selected' : '').'>'.$v.'</option>';
				$comparecoinselect.='<option value="'.$k.'"'.($k == $coin ? ' selected' : '').'>'.$v.'</option>';
			}
print <<<SEARCH
	<script src="static/js/calendar.js"></script>
	<input type="hidden" name="operation" value="$operation">
	<table cellspacing="3" cellpadding="3">
		<tr>
			<th>$lang[member_searchname] </th>
			<td><select name="nametype">$nametypeselect</select>&nbsp;&nbsp;<input type="text" class="txt" name="namevalue" value="$namevalue" /></td>
		</tr>
		<tr>
			<th>$lang[startendtime] </th><td><input type="text" onclick="showcalendar(event, this)" style="width: 80px; margin-right: 5px;" value="$starttime" name="starttime" class="txt" /> -- <input type="text" onclick="showcalendar(event, this)" style="width: 80px; margin-left: 5px;" value="$endtime" name="endtime" class="txt" /></td>
		</tr>
		<tr>
			<th>$lang[member_role]</th><td><select name="role">$roletypeselect</select></td>
		</tr>
		<tr>
			<th>$lang[member_balance]</th><td><select name="balance">$comparebalanceselect</select>&nbsp;&nbsp;<input type="text" class="txt" name="balancevalue" value="$balancevalue" /></td>
		</tr>
		<tr>
			<th>$lang[member_coin]</th><td><select name="coin">$comparecoinselect</select>&nbsp;&nbsp;<input type="text" class="txt" name="coinvalue" value="$coinvalue" /></td>
		</tr>
		<tr>
			<th><input type="submit" name="membersearch" value="$lang[search]" class="btn" /></th><td></td>
		</tr>
	</table>
SEARCH;
			//create sql
			$where='';
			if(in_array($nametype,array('username','realname','nickname'))){
				$where.=$nametype." LIKE '%$namevalue%'";
			}
			if($str_stime>0 || $str_etime>0){
				$where.=($where!='' ? " AND ":' ')."regtime>$str_stime AND regtime<=$str_etime";
			}
			if(in_array($roletype,array(1,2))){
				$where.=($where!='' ? " AND ":' ')."role=$roletype";
			}
			if(in_array($balance,array('>','<','='))){
				$where.=($where!='' ? " AND ":' ')."balance $balance $balancevalue";
			}
			if(in_array($coin,array('>','<','='))){
				$where.=($where!='' ? " AND ":' ')."coin $coin $coinvalue";
			}

			if($where!=''){
				$membercount=DB::result_first("SELECT count(*) FROM tp_users WHERE $where");
				$memberlist=DB::fetch_all("SELECT * FROM tp_users WHERE $where LIMIT $start,$lpp");
			}else{
				$membercount=DB::result_first('SELECT count(*) FROM tp_users');
				$memberlist=DB::fetch_all("SELECT * FROM tp_users LIMIT $start,$lpp");
			}
			showtableheader('member_list');
			if($memberlist){
				showtablerow('class="header"', array('class="td24"','class="td24"','class="td24"','class="td24"','class="td24"','class="td24"','class="td24"',''), array($lang['member_loginname'], $lang['member_realname'], $lang['member_nickname'], $lang['member_idcard'],$lang['member_balance'],$lang['member_coin'],$lang['member_regdatetime'],$lang['operation']));
				foreach($memberlist as $m) {
					showtablerow('', '', array($m['username'],$m['realname'],$m['nickname'],$m['idcard'],$m['balance'],$m['coin'],date('Y-m-d H:i', $m['regtime']),
						'<a href="admin.php?action=usermanage&operation=member&anchor=update&uid='.$m['id'].'">'.$lang['detail'].'</a>'));
				}
				$multipage = multi($membercount, $lpp, $page, ADMINSCRIPT."?action=usermanage&operation=$operation&lpp=$lpp&namevalue=$namevalue&nametype=&nametype&starttime=$starttime&endtime=$endtime&role=$roletype&balancevalue=$balancevalue&balance=$balance&coinvalue=$coinvalue&coin=$coin");
			}else{
				showtablerow('', 'colspan=8', array($lang['none']));
			}
			
			showsubmit('', '', '', '', $multipage);
		}elseif($_GET['anchor']=='update'){
			showtableheader('member_update');
			$uid=$_GET['uid'];
			if($uid>0){
				$uinfo=DB::fetch_first("SELECT * FROM tp_users WHERE id=$uid");
				if($uinfo){
					showsetting('member_loginname', '', '', $uinfo['username']);
					showsetting('member_loginpwd', 'update[pwdnew]', '', 'text');
					showsetting('member_paypwd', 'update[paypwdnew]', '', 'text');
					showsetting('member_realname', 'update[realname]', $uinfo['realname'], 'text');
					showsetting('member_nickname', 'update[nickname]', $uinfo['nickname'], 'text');
					showsetting('member_idcard', 'update[idcard]', $uinfo['idcard'], 'text');
					showsetting('member_balance', 'update[balance]', $uinfo['balance'], 'text');
					showsetting('member_coin', 'update[coin]', $uinfo['coin'], 'text');
					showsetting('member_role', array('update[role]', array(array('2',cplang('yes')), array('1',cplang('no')))), $uinfo['role'], 'select');
					showsetting('member_consumertype', 'update[consumertype]', '', 'text');
					showhiddenfields(array('update[id]' => $uinfo['id']));
				}else{
					showtablerow('', '', array($lang['member_notexist']));
				}
			}else{
				showtablerow('', '', array('<a href="admin.php?action=usermanage&operation=member&anchor=info">'.$lang['member_please_search'].'</a>'));
			}
		}elseif($_GET['anchor']=='assets'){
			showtableheader('member_assets');
		}elseif($_GET['anchor']=='complain'){
			showtableheader('member_complain');
		}
		showtagfooter('tbody');
		showtablefooter();
		if(in_array($_GET['anchor'],array('update'))){
			showsubmit('membersubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		}
		showtablefooter();
		showformfooter();

	} else {
		$anchor = $_GET['anchor'];
		if($anchor=='update'){
			$updatedata=array_filter($_POST['update']);
			$uid=$updatedata['id'];
			unset($updatedata['id']);
			if($uid>0){
				$sql=DB::implode($updatedata);
				DB::query("UPDATE tp_users set $sql WHERE id=$uid");
			}else{
				cpmsg('member_update_error_parame', 'action=usermanage&operation='.$operation.(!empty($_GET['anchor']) ? '&anchor='.$_GET['anchor'] : ''), 'error');
			}
		}

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
		
		showformheader('usermanage&operation='.$operation.'&anchor='.$_GET['anchor'], 'enctype');
		showhiddenfields(array('operation' => $operation));
		
		if($_GET['anchor']=='addinfo'){
			showtableheader('counselor_addinfo');
		}elseif($_GET['anchor']=='addlog'){
			showtableheader('counselor_addlog');
			
echo <<<EOT
<script type="text/javascript" src="static/image/editor/editor_function.js"></script>
<script type="text/JavaScript">
function validate(obj) {
	edit_save();
	window.onbeforeunload = null;
	obj.form.submit();
	return false;
}
</script>
EOT;
			$info['content']='ascbhasjbcnjsabcjb';
			showtablerow('', array('class="td27"', 'class="td28"'), array($lang['message'].':<textarea class="userData" name="content" id="uchome-ttHtmlEditor" style="height: 100%; width: 100%; display: none; border: 0px">'.$info['content'].'</textarea>'));
			showtablerow('', array('class="td25"', 'class="td28"'), array(" <iframe src='home.php?mod=editor&charset={CHARSET}&allowhtml=1&isportal=0' name='uchome-ifrHtmlEditor' id='uchome-ifrHtmlEditor'  scrolling='no' style='width:700px;height:400px;border:1px solid #C5C5C5;position:relative;' border=0 frameborder=0 ></iframe>",));
			showtablerow('', array('class="td25"', 'class="td28"'), array("<input id='submit_editsubmit' class='btn' type='submit' value='".$lang['submit']."'  name='editsubmit' onClick='validate(this);'>"));

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
		if(in_array($_GET['anchor'],array('managelog'))){
			showsubmit('counselorsubmit', 'submit', '', (!empty($from) ? '<input type="hidden" name="from" value="'.$from.'">' : ''));
		}
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