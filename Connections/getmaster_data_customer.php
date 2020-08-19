<?
	include "connect_mysql.php";
	
	//ดึงข้อมูล ผู้รับเหมา จาก projet_customer
	$sql_cust =" select * from projet_customer where datareaid='yc' order by cus_id asc; ";
	$result_cust = mysql_query($sql_cust) or die(mysql_error());
	while($record_cust=mysql_fetch_array($result_cust)){
		$cus_id_cust = $record_cust['cus_id']; 
		$cus_account_cust = $record_cust['cus_account'];
		$cus_WHT_cust = $record_cust['cus_WHT'];
		$cus_name_cust = str_replace("'"," ",$record_cust['cus_name']);
		$datareaid_cust = $record_cust['datareaid'];
		
		//echo " {$cus_id_cust}, {$cus_account_cust}, {$cus_WHT_cust}, {$cus_name_cust}, {$datareaid_cust} <br>";
		
		if(!$cus_account_cust){
			$cus_account_cust = '-';	
		}
		if(!$cus_WHT_cust){
			$cus_WHT_cust = '-';	
		}
		if(!$cus_name_cust){
			$cus_name_cust = '-';	
		}
		
		//เพิ่มข้อมูลใตตาราง customer_tb
		$sql_s = "SELECT * FROM customer_tb where pcus_code='{$cus_account_cust}'";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO customer_tb (pcus_id, pcus_code, pcus_name, pcus_addr, pcus_tel, pcus_contact, pcus_wht, pcus_acc, pcus_remark, pcus_createby, pcus_createtime, pcus_updateby, pcus_updatetime, pcus_status)";
			$sql .=  " VALUES (NULL, '{$cus_account_cust}', '{$cus_name_cust}', '-', '-', '-', '{$cus_WHT_cust}', '{$cus_account_cust}', '-', 'admin', NOW(), 'admin', NOW(), 1)";
			$result = mysql_query($sql) or die(mysql_error());
		}
		
	}//while cont
	
	

	mysql_close($c);
?>