<?
	include "connect_mysql.php";
	
	//ดึงข้อมูล ผู้รับเหมา จาก Project_vender
	$sql_cont =" select * from project_vendor order by vend_id asc; ";
	$result_cont = mysql_query($sql_cont) or die(mysql_error());
	while($record_cont=mysql_fetch_array($result_cont)){
		$vend_id_cont = $record_cont['vend_id']; 
		$vend_num_cont = $record_cont['vend_num'];
		$vend_name_cont = $record_cont['vend_name'];
		$vend_wht_cont = $record_cont['vend_wht'];
		//echo " {$vend_id_cont}, {$vend_num_cont}, {$vend_name_cont}, {$vend_wht_cont} <br>";
		if(!$vend_num_cont){
			$vend_num_cont = '-';	
		}
		if(!$vend_name_cont){
			$vend_name_cont = '-';	
		}
		if(!$vend_wht_cont){
			$vend_wht_cont = '-';	
		}
		
		//เพิ่มข้อมูลใตตาราง contractors_tb
		$sql_s = "SELECT * FROM contractors_tb where cont_code='{$vend_num_cont}' ";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO contractors_tb (cont_id, cont_code, cont_name, cont_texid, cont_address, cont_tel, cont_bankname, cont_bankaccname, cont_bankaccnumber, cont_img, cont_remark, cont_status, cont_createby, cont_createtime, cont_updateby, cont_updatetime)";
			$sql .=  " VALUES (NULL, '{$vend_num_cont}', '{$vend_name_cont}', '{$vend_wht_cont}', '-', '-', '-', '-', '-', '-', '-', 1, 'admin', NOW(), 'admin', NOW() )";
			$result = mysql_query($sql) or die(mysql_error());
		}
		
	}//while cont
	
	mysql_close($c);
?>