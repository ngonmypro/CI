<?
	session_start();

	$cmd= $_GET['cmd'];
	$editid = $_GET['eid'];
	$delid = $_GET['deid'];
	
	$ust1 = $_POST['ust1'];//ชื่อ thai
	$ust2 = $_POST['ust2']; //ชื่อ eng
	$ust3 = $_POST['ust3']; //username
	$ust4 = $_POST['ust4']; //password
	$ust5 = $_POST['ust5']; //level permission
	
	$userlogin = $_SESSION['use_nameen'];
	
	//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
	
		include "../../Connections/connect_mysql.php";
	
	if($cmd=="add"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sql_s = "SELECT * FROM user_tb where use_username='{$ust3}' ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO user_tb (use_id, use_nameth, use_nameen, use_username, use_password, use_level, use_remark, use_createby, use_createtime, use_updateby, use_updatetime, use_status)"; 
			$sql .=  " VALUES (NULL, '{$ust1}', '{$ust2}', '{$ust3}', '{$ust4}', {$ust5}, '-', '{$userlogin}', NOW(), '{$userlogin}', NOW(), 1)";
			$result = mysql_query($sql) or die(mysql_error());	
			if($result){
				echo "Y";	
			}else{
				echo "N";	
			}
		}
		
	}else if($cmd=="edit"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlED = "UPDATE user_tb SET use_nameth='{$ust1}', use_nameen='{$ust2}', use_username='{$ust3}', use_password='{$ust4}',  use_level={$ust5}, use_updateby='{$userlogin}', use_updatetime=NOW() WHERE use_id = {$editid} ";
		$resultED = mysql_query($sqlED) or die(mysql_error());
		if($resultED){
			echo "Y";
		}else{
			echo "N";
		}
	}else if($cmd=="del"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlDEL = " DELETE FROM user_tb WHERE use_id={$delid} ";
		$resultDEL = mysql_query($sqlDEL) or die(mysql_error());
		
		if($resultDEL){
			echo "Y";
		}else{
			echo "N";	
		}
	}
	
	mysql_close($c);

?>