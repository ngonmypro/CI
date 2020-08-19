<?
	session_start();
	
	$cmd= $_GET['cmd'];
	$editid = $_GET['eid'];
	$delid = $_GET['deid'];
	
	$ulv1 = $_POST['ulv1'];//ชื่อระดับ
	$ulv2 = $_POST['ulv2']; //หมายเหตู
	
	//echo "{$ulv1}, {$ulv2}, {$cmd}";
	
	$userlogin = $_SESSION['use_nameen'];
	
	include "../../Connections/connect_mysql.php";
	
	if($cmd=="add"){
		
		$sql_s = "SELECT * FROM user_level_tb where ulv_name='{$ulv1}' ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO user_level_tb (ulv_id, ulv_name, ulv_remark, ulv_createby, ulv_createtime, ulv_updateby, ulv_updatetime, ulv_status)"; 
			$sql .=  " VALUES (NULL, '{$ulv1}', '{$ulv2}', '{$userlogin}', NOW(), '{$userlogin}', NOW(), 1)";
			$result = mysql_query($sql) or die(mysql_error());	
			if($result){
				echo "Y";	
			}else{
				echo "N";	
			}
		}
		
	}else if($cmd=="edit"){
		//echo "{$cmd},{$editid},{$ulv1},{$ulv2}";
		$sqlED = "UPDATE user_level_tb SET ulv_name='{$ulv1}', ulv_remark='{$ulv2}', ulv_updateby='{$userlogin}', ulv_updatetime=NOW() WHERE ulv_id = {$editid} ";
		$resultED = mysql_query($sqlED) or die(mysql_error());
		if($resultED){
			echo "Y";
		}else{
			echo "N";
		}
	}else if($cmd=="del"){
		//echo "{$cmd}, {$delid}";
		$sqlDEL = " DELETE FROM user_level_tb WHERE ulv_id={$delid} ";
		$resultDEL = mysql_query($sqlDEL) or die(mysql_error());
		
		if($resultDEL){
			echo "Y";
		}else{
			echo "N";	
		}
	}
	
	mysql_close($c);
?>