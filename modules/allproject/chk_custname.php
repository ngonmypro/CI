
  <?php
include "../../Connections/connect_sqlserver.php";
  $sqlcust1 = "SELECT ACCOUNTNUM , NAME FROM YCC_CUSTOMER WHERE DATAAREAID = 'YC' AND ACCOUNTNUM = '".$_POST['pro']."' GROUP BY ACCOUNTNUM , NAME";
  $resultcust1 = odbc_exec($cid, $sqlcust1) or die(odbc_error());
        while($objResultcust1 = odbc_fetch_array($resultcust1)) { ?>
  <option value="<?=iconv('tis-620','utf-8',$objResultcust1['NAME']); ?>" ><?=iconv('tis-620','utf-8',$objResultcust1['NAME']); ?></option>
  <?php } ?>
