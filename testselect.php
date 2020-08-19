<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
	include "connect_sqlserver.php";
	 $sql = " select * from INVENTSITE "; //ตรวจสอบว่ามในระบบ ITEC หรือไม่
     $result = odbc_exec($cid,$sql);
     $supitem = odbc_fetch_array($result);
            $supcode = $supitem['SITEID'];
            $supname = $supitem['NAME'];
			
			echo "{$supcode}, {$supname}";
	odbc_close($cid);
?>
</body>
</html>