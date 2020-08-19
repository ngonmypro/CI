<?
	include "../../Connections/connect_sqlserver.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>custoemr all page</title>
<script>
	$(document).ready( function () {
		var table = $('#customertb').DataTable({
		//dom: 'Bfrtip',
        //scrollY:        "300px",
        //scrollX:        true,
        //scrollCollapse: true,
        paging:         true,
        //fixedColumns:   {
            //leftColumns: 1,
            //rightColumns: 1
        //}
		sort: false,
		select: true,
    	});

		 $('#customertb tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  table.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );

		/*$('#customertb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='qr-code') && (title !='จบงาน')  ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		});

		// Apply the search ค้นหาจาก footer ------------------------
		$('#customertb').DataTable().columns().every( function () {
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
		<!--<div><button type="button" class="btn btn-success" onClick="javascript:addcustomertb('add');"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</button></div>-->
	<table id="customertb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>
                  <th style="text-align:center;">ลำดับที่</th>
                  <th style="text-align:left; padding-left:10px;">รหัสลูกค้า</th>
                  <th style="text-align:left; padding-left:10px;">ชื่อลูกค้า</th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
              </tr>
          </thead>
          <!--<tfoot>
          	  <tr>
                   <th style="text-align:center;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
              </tr>
          </tfoot>-->
          <tbody>
          <?

					$sqlcusted = "SELECT ACCOUNTNUM , NAME FROM YCC_CUSTOMER WHERE DATAAREAID = 'YC' GROUP BY ACCOUNTNUM , NAME";
								$resultcusted = odbc_exec($cid, $sqlcusted) or die(odbc_error());
								$rowint = 1;
								while ($rowcusted = odbc_fetch_array($resultcusted)) {
									$cust2_id = iconv('tis-620','utf-8',$rowcusted['ACCOUNTNUM']);
									$cust2_name = iconv('tis-620','utf-8',$rowcusted['NAME']);

		  		/*$sql_custtb =" select * from customer_tb order by pcus_id desc; ";
				$result_custtb = mysql_query($sql_custtb) or die(mysql_error());
				$rowint = 1;
				$sumamnt = 0.00;
				while($record_custtb=mysql_fetch_array($result_custtb)){
					$pcus_id_custtb = $record_custtb['pcus_id'];
					$pcus_code_custtb = $record_custtb['pcus_code'];
					$pcus_name_custtb = $record_custtb['pcus_name'];
					$pcus_addr_custtb = $record_custtb['pcus_addr'];
					$pcus_tel_custtb = $record_custtb['pcus_tel'];
					$pcus_contact_custtb = $record_custtb['pcus_contact'];
					$pcus_wht_custtb = $record_custtb['pcus_wht'];
					$pcus_acc_custtb = $record_custtb['pcus_acc'];
					$pcus_remark_custtb = $record_custtb['pcus_remark'];
					$pcus_status_custtb = $record_custtb['pcus_status'];*/

					/*$sql_usetb2 = " select * from user_level_tb where ulv_id={$use_level_usetb} ";
					$result_usetb2 = mysql_query($sql_usetb2) or die(mysql_error());
					$record_usetb2 = mysql_fetch_array($result_usetb2);
						$ulv_name_usetb2 = $record_usetb2['ulv_name'];
						$ulv_remark_usetb2 = $record_usetb2['ulv_remark'];*/


		  ?>
          	  <tr>
                  <td style="text-align:center;" onClick="javascript:detailcust(<?#=$pcus_id_custtb?>,'detail');"><?=$rowint?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailcust(<?#=$pcus_id_custtb?>,'detail');"><?=$cust2_id?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailcust(<?#=$pcus_id_custtb?>,'detail');"><?=$cust2_name?></td>

				  <td style="text-align:center;"><button class="btn btn-warning" onClick="javascript:editcustomertb(<?#=$pcus_id_custtb?>,'edit');"><i class="fa fa-edit"></i></button></td>
                  <td style="text-align:center;">

                    	<button class="btn btn-danger" onClick="javascript:delcustomertb(<?=$pcus_id_custtb?>,'del','<?=$pcus_name_custtb?>');"><i class="fa fa-times"></i></button>

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
	//mysql_close($c);
?>
