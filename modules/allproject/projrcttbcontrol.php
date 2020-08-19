<?
	session_start();

	$cmd= $_GET['cmd'];
	$editid = $_GET['eid'];
	$delid = $_GET['deid'];
  $cloid = $_GET['cloid'];
  $opid = $_GET['opid'];

	$jpro1 = $_POST['jpro1'];//ชื่อโครงการ
	//$jpro2 = $_POST['jpro2']; //ประเภทโครงการ
	$jpro2 = $_POST['jpro2']; //รหัสลูกค้า
	$jpro3 = $_POST['jpro3']; //ชื่อลูกค้า
	$jpro4 = $_POST['jpro4']; //มูลค่าโครงการ 100%
	$jpro5 = $_POST['jpro5']; //เลขที่สัญญา
	$jpro6 = $_POST['jpro6']; //วันที่ทำสัญญา
  $jpro7 = $_POST['jpro7']; //วันที่เริ่มงาน
  $jpro8 = $_POST['jpro8']; //วันที่จบงาน
  $jpro9 = $_POST['jpro9']; //ชื่อพนักงานขาย
  $jpro10 = $_POST['jpro10']; //ชื่อโฟร์แมน

	$userlogin = $_SESSION['use_nameen'];

	//echo "{$cmd}, {$editid}, {$delid}, {$jpro1}, {$jpro2}, {$jpro2}, {$jpro3}, {$jpro4}, {$jpro5}, {$jpro6} , {$userlogin}";

	include "../../Connections/connect_mysql.php";

	if($cmd=="add"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		/*$sql_s = "SELECT * FROM jobproject_tb where pcus_code='{$jpro1}' ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){*/
			$sql = " INSERT INTO jobproject_tb (jpro_name, jpro_sale_id, jpro_foreman_id, jpro_cust_id, jpro_cust_name, jpro_contract_doc, jpro_contract_date, jpro_contract_bdate, jpro_contract_edate, jpro_contract_value, jpro_createby, jpro_createtime, jpro_updateby, jpro_updatetime)";
			$sql .=  " VALUES ('{$jpro1}', '{$jpro9}', '{$jpro10}', '{$jpro2}', '{$jpro3}', '{$jpro5}', '{$jpro6}', '{$jpro7}', '{$jpro8}', '{$jpro4}', '{$userlogin}', NOW(), '{$userlogin}', NOW())";
			$result = mysql_query($sql) or die(mysql_error());
			if($result){
				echo "Y";
			}else{
				echo "N";
			}
		//}

	}else if($cmd=="edit"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlED = "UPDATE jobproject_tb SET jpro_name='{$jpro1}', jpro_sale_id='{$jpro9}', jpro_foreman_id='{$jpro10}', jpro_cust_id='{$jpro2}', jpro_cust_name='{$jpro3}', jpro_contract_doc='{$jpro5}', jpro_contract_date='{$jpro6}', jpro_contract_bdate='{$jpro7}', jpro_contract_edate='{$jpro8}', jpro_contract_value='{$jpro4}',
     jpro_updateby='{$userlogin}', jpro_updatetime = NOW() WHERE jpro_id = {$editid} ";
		$resultED = mysql_query($sqlED) or die(mysql_error());
		if($resultED){
			echo "Y";
		}else{
			echo "N";
		}
	}else if($cmd=="del"){
		//echo "{$cmd}, {$editid}, {$delid}, {$ust1}, {$ust2}, {$ust3}, {$ust4}, {$ust5} , {$userlogin}";
		$sqlDEL = " DELETE FROM jobproject_tb WHERE jpro_id={$delid} ";
		$resultDEL = mysql_query($sqlDEL) or die(mysql_error());

		if($resultDEL){
			echo "Y";
		}else{
			echo "N";
		}
	}else if ($cmd=="close") {
    $sqlClose = " UPDATE jobproject_tb SET jpro_status = '0' WHERE jpro_id = '{$cloid}'";
    $resultClose = mysql_query($sqlClose) or die(mysql_error());
		if($resultClose){
			echo "Y";
		}else{
			echo "N";
		}
  }else if ($cmd=="open") {
    $sqlOpen = " UPDATE jobproject_tb SET jpro_status = 1 WHERE jpro_id = '{$opid}'";
    $resultOpen = mysql_query($sqlOpen) or die(mysql_error());
		if($resultOpen){
			echo "Y";
		}else{
			echo "N";
		}
  }

	mysql_close($c);

?>
