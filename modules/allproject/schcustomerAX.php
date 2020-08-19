<?
	$custcode = $_GET['custcode'];
	
	echo "{$custcode}";
	
	include "../../Connections/connect_sqlserver.php"; 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Customer AX</title>
</head>

<body>
<div style="width:90%">
	  
      <div class="row" style="margin-top:5px;"><!-- ชื่อลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="scut1">ค้นหาลูกค้าชื่อ :</label>
          </div>
          <div style="float:left; width:50%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="scut1" id="scut1" onFocus="this.select()" >
          </div>
          <div style="float:left; width:20%; text-align:left; padding-left:5px;">
          	<button class="btn btn-info" onClick="schcustAx2('scut1');"><i class="fa fa-search"></i></button>
          </div>
      </div>
      
      <div id="result_cust_sch" style="margin-top:10px; text-align:center;"></div>
      
</div>
<?	
/*   $sql_cust_ax = "select * from YCC_CUST where DATAAREAID = 'yc' ";
   $result_cust_ax = odbc_exec($cid,$sql_cust_ax) or die(odbc_error());
   while ($row_cust_ax = odbc_fetch_array($result_cust_ax)){
	   $cust_code_ax = $row_cust_ax['ACCOUNTNUM'];
	   $cust_tax_ax = $row_cust_ax['BPC_TAX_WHTID'];
	   $cust_site_ax = $row_cust_ax['DATAAREAID'];
	   $cust_name_ax = iconv('tis-620','utf-8',$row_cust_ax['NAME']);
	   
	   //echo "{$cust_code_ax},{$cust_tax_ax},{$cust_site_ax},{$cust_name_ax} <br>";
   }
*/
?>
</body>
</html>
<?
	odbc_close($cid);
?>