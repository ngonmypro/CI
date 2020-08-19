<?php

include "connect_mysql.php";

$sql_s1 = "SELECT * FROM user_tb";
$result_s1 = mysql_query($sql_s1) or die(mysql_error());
if (mysql_num_rows($result_s1)==0){ //ถ้ายังไม่มี admin ในระบบ
	$sql1 = " INSERT INTO user_tb (use_id, use_nameth, use_nameen, use_username, use_password, use_level, use_remark, use_createby, use_createtime, use_updateby, use_updatetime, use_status) ";
	$sql1 .= " VALUES (NULL, 'ผู้ดูแล ระบบ', 'Admini Strator', 'admin', 'admin', 1, '-', 'admin', NOW(), 'admin', NOW(), 1); ";
	$result1 = mysql_query($sql1) or die(mysql_error());
}


$sql_s2 = "SELECT * FROM user_level_tb";
$result_s2 = mysql_query($sql_s2) or die(mysql_error());
if (mysql_num_rows($result_s2)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql2 = " INSERT INTO user_level_tb (ulv_id, ulv_name, ulv_remark, ulv_createby, ulv_createtime, ulv_updateby, ulv_updatetime, ulv_status) ";
$sql2 .= " VALUES (NULL, 'Administrator', 'ผู้ดูแลระบบ', 'admin', NOW(), 'admin', NOW(), 1) , ";
$sql2 .= " (NULL, 'Information Officer', 'เจ้าหน้าที่บันทึกข้อมูล', 'admin', NOW(), 'admin', NOW(), 1) , ";
$sql2 .= " (NULL, 'Inspection Engineer', 'วิศวะกรตรวจหน้างาน', 'admin', NOW(), 'admin', NOW(), 1) , ";
$sql2 .= " (NULL, 'Sales Person', 'พนักงานขาย', 'admin', NOW(), 'admin', NOW(), 1); ";
$result2 = mysql_query($sql2) or die(mysql_error());
}

$sql_s3 = "SELECT * FROM jobsite_tb";
$result_s3 = mysql_query($sql_s3) or die(mysql_error());
if (mysql_num_rows($result_s3)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql3 = " INSERT INTO jobsite_tb (jsite_id, jsite_code, jsite_name, jsite_remark, jsite_status, jsite_createby, jsite_createtime, jsite_updateby, jsite_updatetime) ";
$sql3 .= " VALUES (NULL, '00', 'ท่าม่วง', '-', 1, 'admin', NOW(), 'admin', NOW()) , ";
$sql3 .= " (NULL, '04', 'ชลบุรี', '-', 1, 'admin', NOW(), 'admin', NOW()) , ";
$sql3 .= " (NULL, '05', 'บางเลน', '-', 1, 'admin', NOW(), 'admin', NOW()); ";
$result3 = mysql_query($sql3) or die(mysql_error());
}


/*
$sql_s3 = "SELECT * FROM tbltypeuser";
$result_s3 = mysql_query($sql_s3) or die(mysql_error());
if (mysql_num_rows($result_s3)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql3 = " INSERT INTO `db_credit`.`tbltypeuser` ( ";
$sql3 .= " `tuse_id` , ";
$sql3 .= " `tuse_nameth` , ";
$sql3 .= " `tuse_nameen` , ";
$sql3 .= " `tuse_createby` , ";
$sql3 .= " `tuse_createtime` , ";
$sql3 .= " `tuse_updateby` , ";
$sql3 .= " `tuse_updatetime` ";
$sql3 .= " ) ";
$sql3 .= " VALUES ( ";
$sql3 .= " NULL , 'ผู้ดูแลระบบ (PM)', 'AdminPM', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้ดูแลระบบ (บช.ลน)', 'AdminAR', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้เสนอขออนุมัติ', 'Requester', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ) , ( ";
$sql3 .= " NULL , 'ผู้อนุมัติ', 'Approver', 'admin', NOW(),'admin', NOW()";
$sql3 .= " ); ";
$result3 = mysql_query($sql3) or die(mysql_error());
}

$sql_s4 = "SELECT * FROM tbltypeapprove";
$result_s4 = mysql_query($sql_s4) or die(mysql_error());
if (mysql_num_rows($result_s4)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql4 = " INSERT INTO `db_credit`.`tbltypeapprove` ( ";
$sql4 .= " `tapp_id` , ";
$sql4 .= " `tapp_tuseid` , ";
$sql4 .= " `tapp_name` , ";
$sql4 .= " `tapp_createby` , ";
$sql4 .= " `tapp_createtime` , ";
$sql4 .= " `tapp_updateby` , ";
$sql4 .= " `tapp_updatetime` , ";
$sql4 .= " `tapp_status` ";
$sql4 .= " ) ";
$sql4 .= " VALUES ( ";
$sql4 .= " NULL , '1', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW(),1";
$sql4 .= " ) , ( ";
//$sql4 .= " NULL , '2', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW()";
//$sql4 .= " ) , (  ";
//$sql4 .= " NULL , '3', 'ไม่มีสิทธิ์อนุมัติ', 'admin', NOW(),'admin', NOW()";
//$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้พิจารณา 1 (ผู้จัดการฝ่ายขาย)', 'admin', NOW(),'admin', NOW(),4 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้พิจารณา 2 (ผู้จัดการฝ่ายสินเชื่อ/บัญชีลูกหนี้)', 'admin', NOW(),'admin', NOW(),5 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้อนุมัติ 1 (ผู้จัดการฝ่ายการเงิน)', 'admin', NOW(),'admin', NOW(),6 ";
$sql4 .= " ) , (  ";
$sql4 .= " NULL , '4', 'ผู้อนุมัติ 2 (กรรมการผู้จัดการ)', 'admin', NOW(),'admin', NOW(),7 ";
$sql4 .= " ); ";
$result4 = mysql_query($sql4) or die(mysql_error());
}

$sql_s5 = "SELECT * FROM tblbrand";
$result_s5 = mysql_query($sql_s5) or die(mysql_error());
if (mysql_num_rows($result_s5)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql5 = " INSERT INTO `db_credit`.`tblbrand` ( ";
$sql5 .= " `bran_id` , ";
$sql5 .= " `bran_name` , ";
$sql5 .= " `bran_names` , ";
$sql5 .= " `bran_createby` , ";
$sql5 .= " `bran_createtime` , ";
$sql5 .= " `bran_updateby` , ";
$sql5 .= " `bran_updatetime` ";
$sql5 .= " ) ";
$sql5 .= " VALUES ( ";
$sql5 .= " NULL , 'สาขาสำนักงานใหญ่', 'MT', 'admin', NOW(),'admin', NOW()";
$sql5 .= " ); ";
$result5 = mysql_query($sql5) or die(mysql_error());
}

$sql_s6 = "SELECT * FROM tbltypeopen";
$result_s6 = mysql_query($sql_s6) or die(mysql_error());
if (mysql_num_rows($result_s6)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql6 = " INSERT INTO `db_credit`.`tbltypeopen` ( ";
$sql6 .= " `open_id` , ";
$sql6 .= " `open_name` , ";
$sql6 .= " `open_createby` , ";
$sql6 .= " `open_createtime` , ";
$sql6 .= " `open_updateby` , ";
$sql6 .= " `open_updatetime` ";
$sql6 .= " ) ";
$sql6 .= " VALUES ( ";
$sql6 .= " NULL , 'บริษัท', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , ( ";
$sql6 .= " NULL , 'ห้างหุ้นส่วนจำกัด', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'ร้านค้า', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'บุคคลธรรมดา', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'หน่วยราชการ', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ) , (  ";
$sql6 .= " NULL , 'อื่นๆ', 'admin', NOW(),'admin', NOW()";
$sql6 .= " ); ";
$result6 = mysql_query($sql6) or die(mysql_error());
}

$sql_s7 = "SELECT * FROM tbltypeconstruct";
$result_s7 = mysql_query($sql_s7) or die(mysql_error());
if (mysql_num_rows($result_s7)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql7 = " INSERT INTO `db_credit`.`tbltypeconstruct` ( ";
$sql7 .= " `cont_id` , ";
$sql7 .= " `cont_name` , ";
$sql7 .= " `cont_createby` , ";
$sql7 .= " `cont_createtime` , ";
$sql7 .= " `cont_updateby` , ";
$sql7 .= " `cont_updatetime` ";
$sql7 .= " ) ";
$sql7 .= " VALUES ( ";
$sql7 .= " NULL , 'บ้านพักส่วนตัว', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'บ้านจัดสรร', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงงาน', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงแรม', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'รีสอร์ท', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'อาคารพาณิชย์', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'โรงเรียน', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ) , ( ";
$sql7 .= " NULL , 'อื่น ๆ', 'admin', NOW(),'admin', NOW()";
$sql7 .= " ); ";
$result7 = mysql_query($sql7) or die(mysql_error());
}

$sql_s8 = "SELECT * FROM tbltypepayment";
$result_s8 = mysql_query($sql_s8) or die(mysql_error());
if (mysql_num_rows($result_s8)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql8 = " INSERT INTO `db_credit`.`tbltypepayment` ( ";
$sql8 .= " `pay_id` , ";
$sql8 .= " `pay_name` , ";
$sql8 .= " `pay_createby` , ";
$sql8 .= " `pay_createtime` , ";
$sql8 .= " `pay_updateby` , ";
$sql8 .= " `pay_updatetime` ";
$sql8 .= " ) ";
$sql8 .= " VALUES ( ";
$sql8 .= " NULL , 'เช็ค', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'บัตรเครดิต', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'โอนเข้าบัญชี', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ) , ( ";
$sql8 .= " NULL , 'อื่น ๆ', 'admin', NOW(),'admin', NOW()";
$sql8 .= " ); ";
$result8 = mysql_query($sql8) or die(mysql_error());
}

$sql_s9 = "SELECT * FROM tbldoctype";
$result_s9 = mysql_query($sql_s9) or die(mysql_error());
if (mysql_num_rows($result_s9)==0){ //ถ้ายังไม่มี admin ในระบบ
	$sql9 = " INSERT INTO `db_credit`.`tbldoctype`  ";
	$sql9 .= " (`dty_id`, `dty_name`, `dty_createby`, `dty_createtime`, `dty_updateby`, `dty_updatetime`, `dty_status` ) ";
	$sql9 .= " VALUES ";
	$sql9 .= " (NULL, 'เอกสารแบบฟอร์มหลัก', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql9 .= " (NULL, 'เอกสารหลักฐานของลูกหนี้ ประกอบการพิจารณา', 'admin', NOW(), 'admin', NOW(), '1'); ";
	$result9 = mysql_query($sql9) or die(mysql_error());
}

$sql_s10 = "SELECT * FROM tblconsideration";
$result_s10 = mysql_query($sql_s10) or die(mysql_error());
if (mysql_num_rows($result_s10)==0){ //ถ้ายังไม่มี admin ในระบบ
	$sql10 = " INSERT INTO `db_credit`.`tblconsideration`  ";
	$sql10 .= " ( `consi_id`, `consi_name`, `consi_createby`, `consi_createtime`, `consi_updateby`, `consi_updatetime`, `consi_status` ) ";
	$sql10 .= " VALUES ";
	$sql10 .= " (NULL, 'เขตกาญจนบุรี', 'admin', NOW(), 'admin', NOW(), '1'), ";
	$sql10 .= " (NULL, 'เขตนครปฐม', 'admin', NOW(), 'admin', NOW(), '1'); ";
	$result10 = mysql_query($sql10) or die(mysql_error());
}
*/

mysql_close($c);
?>
