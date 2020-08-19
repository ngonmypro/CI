<?
	include "connect_mysql.php";
	
	//ดึงข้อมูล ผู้รับเหมา จาก item
	$sql_prod =" select * from item order by itemid asc; ";
	$result_prod = mysql_query($sql_prod) or die(mysql_error());
	while($record_prod=mysql_fetch_array($result_prod)){
		$itemid_prod = $record_prod['itemid']; //ลำดับ
		$item_id_prod = $record_prod['item_id']; //Code
		$item_name_prod = str_replace("'"," ",$record_prod['item_name']); //name
		$item_pool_prod = $record_prod['item_pool']; //type code
		
		//echo " {$itemid_prod}, {$item_id_prod}, {$item_name_prod}, {$item_pool_prod} <br>";
		
		if(!$item_id_prod){
			$item_id_prod = '-';	
		}
		if(!$item_name_prod){
			$item_name_prod = '-';	
		}
		if(!$item_pool_prod){
			$item_pool_prod = '-';	
		}
		
		//เพิ่มข้อมูลใตตาราง product_tb
		$sql_s = "SELECT * FROM product_tb where prod_code='{$item_id_prod}'";
		$result_s = mysql_query($sql_s) or die(mysql_error());
		if (mysql_num_rows($result_s)==0){
			$sql = " INSERT INTO product_tb (prod_id, prod_code,  prod_name, prod_type_code, prod_unit_code, prod_image_path, prod_remark, prod_status, prod_createby, prod_createtime, prod_updateby, prod_updatetime)";
			$sql .=  " VALUES (NULL , '{$item_id_prod}' ,'{$item_name_prod}', '{$item_pool_prod}', '-', '-', '-', 1, 'admin', NOW(), 'admin', NOW() )";
			$result = mysql_query($sql) or die(mysql_error());
		}
		
	}//while cont
	


	mysql_close($c);
?>