<?
include "connect_sqlserver96.php";

/*$sql_s = "SELECT * FROM [sumtotalsale_tb]";
$result_s = odbc_exec($cid,$sql_s) or die(odbc_error());
$items = 0;
while ($row = odbc_fetch_array($result_s)) 
   {
       $items++; //หาจำนวน reccord ใน table sql_server                          
   }  
 	odbc_free_result($result_s);
	
echo "<br>total No. of rows: $items";

if ($items==0){
*/

//====== วนลูปดึงข้อมูล จาก mysql ================================

	include "connect_mysql.php";
	$sql_int2 = " SELECT * FROM sumtotalsale_tb WHERE sum_status='y' ";
	$result_int2 = mysql_query($sql_int2) or die(mysql_error());
	$roundi = 0;
	while($record_int2 = mysql_fetch_array($result_int2)){
		$sum_id_int2 = $record_int2['sum_id']; 
		$sum_saledate_int2 = $record_int2['sum_saledate']; 
		$sum_saleid_int2 = $record_int2['sum_saleid'];
		$sum_salecode_int2 = $record_int2['sum_salecode'];
		$sum_salename_int2 = iconv('utf-8','tis-620',$record_int2['sum_salename']);
		$sum_salenicname_int2 = iconv('utf-8','tis-620',$record_int2['sum_salenicname']);
		$sum_saleposition_int2 = iconv('utf-8','tis-620',$record_int2['sum_saleposition']);
		$sum_docuno_int2 = $record_int2['sum_docuno'];
		$sum_saleamnt_int2 = $record_int2['sum_saleamnt'];
		$sum_status_int2 = $record_int2['sum_status'];
		$sum_remark_int2 = $record_int2['sum_remark'];
		$sum_createuser_int2 = $record_int2['sum_createuser'];
		$sum_createdatetime_int2 = $record_int2['sum_createdatetime'];
		$sum_updateuser_int2 = $record_int2['sum_updateuser'];
		$sum_updatedatetime_int2 = $record_int2['sum_updatedatetime'];
		
		//echo "{$sum_id_int2}, {$sum_saledate_int2}, {$sum_saleid_int2}, {$sum_salecode_int2}, {$sum_salename_int2}, {$sum_salenicname_int2}, {$sum_saleposition_int2}, {$sum_docuno_int2}, {$sum_saleamnt_int2}, {$sum_status_int2}, {$sum_remark_int2}, {$sum_createuser_int2}, {$sum_createdatetime_int2}, {$sum_updateuser_int2}, {$sum_updatedatetime_int2}";
		
		//ค้นหาชื่อแผนก จาก id ของพนักงานขาย =========================================
			$sql_sch1 = " SELECT * FROM saleman_tb WHERE sal_id={$sum_saleid_int2} ";
			$result_sch1 = mysql_query($sql_sch1) or die(mysql_error());
			$record_sch1 = mysql_fetch_array($result_sch1);
				$sal_dep_id_sch1 = $record_sch1['sal_dep_id'];
			 
			$sql_sch2 = " SELECT * FROM department_tb WHERE dep_id={$sal_dep_id_sch1} ";
			$result_sch2 = mysql_query($sql_sch2) or die(mysql_error());
			$record_sch2 = mysql_fetch_array($result_sch2);
				$dep_code_sch2 = $record_sch2['dep_code']; 
				$dep_name_sch2 = iconv('utf-8', 'tis-620', $record_sch2['dep_name']);
				
				$dep_txt = "(" . $dep_code_sch2 . ") " . $dep_name_sch2;
		//=======================================================================
		
//====== ค้นหา รหัสพนักงาน กับ เลขที่บิล ใน SQL Server ว่ามีหรือยัง ถ้ายังไม่มีค่อยนำเข้า =================================================
$sql_s = "SELECT * FROM [sumtotalsale_tb] WHERE sum_salecode = '" . $sum_salecode_int2 . "' AND sum_docuno ='" . $sum_docuno_int2 . "' AND sum_saleamnt =". $sum_saleamnt_int2 . "";
$result_s = odbc_exec($cid,$sql_s) or die(odbc_error());
$items = 0;
while ($row = odbc_fetch_array($result_s)) 
   {
       $items++; //หาจำนวน reccord ใน table sql_server                          
   }  
 	//odbc_free_result($result_s);
	
if ($items==0){
		
//====== นำเข้า SQL Server =====================================================
		$sql = " INSERT INTO [sumtotalsale_tb] ( sum_saledate, sum_saleid, sum_salecode, sum_salename, sum_salenicname, sum_saleposition, sum_docuno, sum_saleamnt, sum_status, sum_remark, sum_createuser, sum_createdatetime, sum_updateuser, sum_updatedatetime ) ";
		$sql .= " VALUES (  '{$sum_saledate_int2}', {$sum_saleid_int2}, '{$sum_salecode_int2}', '{$sum_salename_int2}', '{$sum_salenicname_int2}', '{$sum_saleposition_int2}', '{$sum_docuno_int2}', {$sum_saleamnt_int2}, '{$sum_status_int2}', '{$dep_txt}', '{$sum_createuser_int2}', '{$sum_createdatetime_int2}', '{$sum_updateuser_int2}', '{$sum_updatedatetime_int2}') ";

	
	/*
		$sql .= " VALUES ( 627,'1629345', 'Miss', 'KANYAKORN', 'WANNASRI', null, null, 1, 'Active', 'A001' , getdate() , 'A001', getdate()), "; 
		$sql .= " (119, '1511084','Mr.','KOMSAN','BUNTENGSUK',null, null, 1, 'Active','A002', getdate(),	'A002', getdate()), ";
		$sql .= " ( 425, '1605032','Mr.','RACHAN','KHONGKHAM', null, 'khongkham.r@pg.com',1,'Active'	,'A003', getdate(),	'A003', getdate()), "; 
		$sql .= " ( 711, '1676982','Miss','RATTANA','SANPAUNG','QAQC','sanpaung.r@pg.com', 1,'Active', 'A004',  getdate(),'A004',  getdate()), ";
		$sql .= " ( 653, '1642665','Miss', 'PORNTIP','WANNAPAK','HR', null, 1,'Active','A005', getdate(),'A005', getdate()), "; 
		$sql .= " ( 172, '1511421','Mr.','TEERASAK','KHAEWCHAROEN',null,null,1,'Active','A006',getdate(),'A006', getdate()), ";
		$sql .= " ( 155, '1511380','Mr.','SANIT','BOONJARAT', null, null,1,'Active','A007', getdate(),'A007', getdate()), ";
		$sql .= " (1308,  '99991111','Mr.','PITAK','EIAMSAMANG',null,'EIAMSUM.PI',2,'Active','A008', getdate(),'A008',getdate()) ";
	*/

		$insert_dt1 =odbc_exec($cid,$sql) or die(odbc_error()); 

		if($insert_dt1){
			// update status record is t
			$sql_upd1 = " update sumtotalsale_tb set sum_status='t' where sum_id={$sum_id_int2} ";
			$result_upd1 = mysql_query($sql_upd1) or die(mysql_error());
			
			//echo " Insert data success! ";
			echo "Y";
		}else{
			//echo " Cannot Insert data! ";
			echo "N";	
		}

		$roundi = $roundi + 1;
			
		}//while
		
		mysql_close($c);

}//=== if ($items==0){	

/*}else{
  	echo " Cannot Insert Data";	
}*/

odbc_close($cid);
?>