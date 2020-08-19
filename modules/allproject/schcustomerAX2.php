<?
	$schtxt = iconv('utf-8', 'tis-620',$_GET['schtxt']);
	//echo "{$schtxt}";

	//include "../../Connections/connect_sqlserver.php";
?>
<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.table4_1 table {
	width:100%;
	margin:15px 0;
	border:0;
}
.table4_1 th {
	background-color:#93DAFF;
	color:#000000
}
.table4_1,.table4_1 th,.table4_1 td {
	font-size:0.95em;
	text-align:center;
	padding:4px;
	border-collapse:collapse;
}
.table4_1 th,.table4_1 td {
	border: 1px solid #c1e9fe;
	border-width:1px 0 1px 0
}
.table4_1 tr {
	border: 1px solid #c1e9fe;
}
.table4_1 tr:nth-child(odd){
	background-color:#dbf2fe;
}
.table4_1 tr:nth-child(even){
	background-color:#fdfdfd;
}
.table4_1 tr:hover {
    background-color:#DFE3E0;
}
</style>
</head>

<body>
<div style="overflow-x:auto;">
<table id="schcusttb" class="display compact table4_1" cellspacing="0" width="100%">
	<thead>
      <tr>
          <th style="text-align:center;">ลำดับที่</th>
          <th style="text-align:left; padding-left:10px;">รหัสลูกค้า</th>
          <th style="text-align:left; padding-left:10px;">ชื่อลูกค้า</th>

      </tr>
    </thead>
    <tbody>
    	<?
		 /*  $sql_cust_ax = "select * from YCC_CUST where DATAAREAID = 'yc' and NAME Like '%{$schtxt}%' ";
		   $result_cust_ax = odbc_exec($cid,$sql_cust_ax) or die(odbc_error());
		   $rownum = 1;
		   while ($row_cust_ax = odbc_fetch_array($result_cust_ax)){
			   $cust_code_ax = $row_cust_ax['ACCOUNTNUM'];
			   $cust_tax_ax = $row_cust_ax['BPC_TAX_WHTID'];
			   $cust_site_ax = $row_cust_ax['DATAAREAID'];
			   $cust_name_ax = iconv('tis-620','utf-8',$row_cust_ax['NAME']);*/
		?>
    	<tr style="cursor:pointer;" onClick="senddatacust('<?//=$cust_code_ax?>', '<?//=$cust_name_ax?>');">
        	<td style="text-align:center;"><?//=$rownum?></td>
          	<td style="text-align:left; padding-left:10px;"><?//=$cust_code_ax?></td>
          	<td style="text-align:left; padding-left:10px;"><?//=$cust_name_ax?></td>

        </tr>
        <?
			   //$rownum += 1;
		   //}
		?>
    </tbody>
</table>
</div>
</body>
</html>-->
<?
	//odbc_close($cid);
?>


<?
	include "../../Connections/connect_mysql.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User ALL page</title>
<script>
	$(document).ready( function () {
		var table = $('#usertb').DataTable({
		//dom: 'Bfrtip',
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        //fixedColumns:   {
            //leftColumns: 1,
            //rightColumns: 1
        //}
		sort: false,
		select: true,
    	});

		 $('#usertb tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  table.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );

	/*	$('#usertb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='qr-code') && (title !='จบงาน')  ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		});

		// Apply the search ค้นหาจาก footer ------------------------
		$('#usertb').DataTable().columns().every( function () {
			var that = this;
			//ค้นหาจาก footer
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			});
		});*/

	});
</script>
</head>

<body>

	<div><button type="button" class="btn btn-success" onClick="javascript:addusertb('add');"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</button></div>
	<table id="usertb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>
                  <th style="text-align:center;">ลำดับที่</th>
                  <th style="text-align:left; padding-left:10px;">ชื่อ Thai</th>
                  <th style="text-align:left; padding-left:10px;">ชื่อ Eng</th>
                  <th style="text-align:left; padding-left:10px;">ระดับสิทธิ์</th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
              </tr>
          </thead>
          <!--<tfoot>
          	  <tr>
                   <th style="text-align:center;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
              </tr>
          </tfoot>-->
          <tbody>
          <?
		  		$sql_usetb =" select * from user_tb order by use_id desc; ";
				$result_usetb = mysql_query($sql_usetb) or die(mysql_error());
				$rowint = 1;
				$sumamnt = 0.00;
				while($record_usetb=mysql_fetch_array($result_usetb)){
					$use_id_usetb = $record_usetb['use_id'];
					$use_nameth_usetb = $record_usetb['use_nameth'];
					$use_nameen_usetb = $record_usetb['use_nameen'];
					$use_username_usetb = $record_usetb['use_username'];
					$use_password_usetb = $record_usetb['use_password'];
					$use_level_usetb = $record_usetb['use_level'];
					$use_remark_usetb = $record_usetb['use_remark'];
					$use_createby_usetb = $record_usetb['use_createby'];
					$use_createtime_usetb = $record_usetb['use_createtime'];
					$use_updateby_usetb = $record_usetb['use_updateby'];
					$use_updatetime_usetb = $record_usetb['use_updatetime'];
					$use_status_usetb = $record_usetb['use_status'];

					$sql_usetb2 = " select * from user_level_tb where ulv_id={$use_level_usetb} ";
					$result_usetb2 = mysql_query($sql_usetb2) or die(mysql_error());
					$record_usetb2 = mysql_fetch_array($result_usetb2);
						$ulv_name_usetb2 = $record_usetb2['ulv_name'];
						$ulv_remark_usetb2 = $record_usetb2['ulv_remark'];


		  ?>
          	  <tr>
                  <td style="text-align:center;" onClick="javascript:detailuser(<?=$use_id_usetb?>,'detail');"><?=$rowint?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$use_id_usetb?>,'detail');"><?=$use_nameth_usetb?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$use_id_usetb?>,'detail');"><?=$use_nameen_usetb?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$use_id_usetb?>,'detail');"><?=$ulv_name_usetb2?>::<?=$ulv_remark_usetb2?></td>
				  <td style="text-align:center;"><button class="btn btn-warning" onClick="javascript:editusertb(<?=$use_id_usetb?>,'edit');"><i class="fa fa-edit"></i></button></td>
                  <td style="text-align:center;">
                  	<? if($use_id_usetb != 1){ ?>
                    	<button class="btn btn-danger" onClick="javascript:delusertb(<?=$use_id_usetb?>,'del','<?=$use_nameen_usetb?>');"><i class="fa fa-times"></i></button>
                    <? } ?>
                  </td>
              </tr>
          <?
		  		$rowint += 1;
		  	}//while
		  ?>
          </tbody>

    </table>

</body>
</html>
<?
	mysql_close($c);
?>
