<?
	session_start();

	$cmd= $_GET['cmd'];
	$editid = $_GET['eid'];
	$delid = $_GET['deid'];
	
	$cust1 = $_POST['cust1'];//รัหสลูกค้า
	$cust2 = $_POST['cust2']; //ชื่อลูกค้า
	$cust3 = $_POST['cust3']; //ที่อยู่ลูกค้า
	$cust4 = $_POST['cust4']; //เบอร์โทรศัพท์
	$cust5 = $_POST['cust5']; //ชื่อผู้ติดต่อ
	$cust6 = $_POST['cust6']; //เลขประจำตัว 13 หลัก
	$cust7 = $_POST['cust7']; //รหัสบัญชี AX
	
	$userlogin = $_SESSION['use_nameen'];
	
	//echo "{$cmd}, {$editid}, {$delid}, {$cust1}, {$cust2}, {$cust3}, {$cust4}, {$cust5}, {$cust6}, {$cust7} , {$userlogin}";
	
	include "../../Connections/connect_mysql.php";
	
	if($cmd=="add"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sql_s = "SELECT * FROM customer_tb where pcus_code='{$cust1}' ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO customer_tb (pcus_id, pcus_code, pcus_name, pcus_addr, pcus_tel, pcus_contact, pcus_wht, pcus_acc, pcus_remark, pcus_createby, pcus_createtime, pcus_updateby, pcus_updatetime, pcus_status)"; 
			$sql .=  " VALUES (NULL, '{$cust1}', '{$cust2}', '{$cust3}', '{$cust4}', '{$cust5}', '{$cust6}', '{$cust7}', '-', '{$userlogin}', NOW(), '{$userlogin}', NOW(), 1)";
			$result = mysql_query($sql) or die(mysql_error());	
			if($result){
				echo "Y";	
			}else{
				echo "N";	
			}
		}
		
	}else if($cmd=="edit"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlED = "UPDATE customer_tb SET pcus_code='{$cust1}', pcus_name='{$cust2}', pcus_addr='{$cust3}', pcus_tel='{$cust4}', pcus_contact='{$cust5}', pcus_wht='{$cust6}', pcus_acc='{$cust7}' WHERE pcus_id = {$editid} ";
		$resultED = mysql_query($sqlED) or die(mysql_error());
		if($resultED){
			echo "Y";
		}else{
			echo "N";
		}
	}else if($cmd=="del"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlDEL = " DELETE FROM customer_tb WHERE pcus_id={$delid} ";
		$resultDEL = mysql_query($sqlDEL) or die(mysql_error());
		
		if($resultDEL){
			echo "Y";
		}else{
			echo "N";	
		}
	}
	
	mysql_close($c);

?>