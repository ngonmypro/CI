<?
set_time_limit(0);
include "../../Connections/connect_sqlserver.php";
include "../../Connections/connect_mysql.php";
$tt =  iconv('utf-8','tis-620',"04 PKV84 คลอง1-ปทุมธาน");
  //$sql = "SELECT * from YCC_PROJECTTOTAL WHERE DATAAREAID = 'YC'"/*" SELECT * FROM YCC_PROJECTTOTAL WHERE DATAAREAID = 'YC' AND NAME = 'FVW204(0.10x0.40x1.64)'LIKE '%04 คา%'"*/;
  $sql = "SELECT ACCOUNTNUM , NAME , ADDRESS , BPC_TAX_WHTID FROM YCC_VENDOR WHERE DATAAREAID = 'YC'";
  $result = odbc_exec($cid, $sql) or die(odbc_error());



/*  foreach($kwd as $val){
$implode[] = "keyword like '%".$val."'%";
}

if($implode){
$sql .= " ".implode(" OR ", $implode);
}*/

  /*$mysql = "SELECT * FROM `jobproject_tb` where `jpro_name` like '%04 PRM พีระมิด ฉะเชิงเทรา%'";
  $su = mysql_query($mysql) or die(mysql_error());
  while($record_jprotb=mysql_fetch_array($su)){
    echo $record_jprotb['jpro_name'];
  }*/

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="display compact" cellspacing="1" width="100px">
<thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อโครงการ</th>
          <th>รหัสใบสั่งขาย</th>
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>จำนวน</th>
          <th>ราคา</th>
      </tr>
</thead>
<tbody>
  <?
      		   $numrows = 1;
      		  while($objResult = odbc_fetch_array($result))
      		   {



      		   ?>

                      <tr>
                        <td><?=$numrows;?></td>
                        <td><?= $objResult['ACCOUNTNUM'];?></td>
                        <td><?= iconv('tis-620','utf-8',$objResult['NAME']);?></td>
                        <td><?#= $objResult['PRODPOOLID'];?></td>
                        <td><?= iconv('tis-620','utf-8',$objResult['ADDRESS']);?></td>
                        <td><?= $objResult['BPC_TAX_WHTID'];?></td>
                        <td><?#= $objResult['SALESPRICE'];?></td>
                      </tr>


<?
$numrows = $numrows+1;
 }?>
</tbody>
</table>



  </body>
</html>
