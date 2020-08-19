<?  include "../../Connections/connect_sqlserver.php";
    include "../../Connections/connect_mysql.php";
  $dtid = $_GET['dtid'];
  $mysql = " SELECT * FROM jobproject_tb WHERE jpro_id = '{$dtid}'";
  $resultmysql = mysql_query($mysql) or die(mysql_error());
  while($rowmysql = mysql_fetch_array($resultmysql)){
    $jpro_name = iconv('utf-8','tis-620',$rowmysql['jpro_name']);
    $jpro_namePJ = $rowmysql['jpro_name'];
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project All Page</title>
<script>
	$(document).ready( function () {
		var table = $('#producttb').DataTable({
		dom: 'Bfrtip',
        //scrollY:        "435px",
        //scrollX:        true,
        //scrollCollapse: true,
        paging:         true,
      //  fixedColumns:   {
          //  leftColumns: 1,
          //  rightColumns: 1
        //}
		sort: false,
		select: true,
    /*"dom": '<"toolbar">Bfrtip',
    lengthMenu: [
            [ 10, 25, 50, 100, -1 ],
            [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
        ],
        buttons: [{
          extend: 'pageLength'
        }],*/

    	});

		 $('#producttb tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  table.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );

		$('#producttb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='สถานะ') && (title !='ลบ') && (title !='สินค้า')  ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		});

		// Apply the search ค้นหาจาก footer ------------------------
		$('#producttb').DataTable().columns().every( function () {
			var that = this;
			//ค้นหาจาก footer
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			});
		});

	});
</script>

</head>

<body>
  <td style="text-align:center;">
    <button class="btn btn-info" onClick="javascript:detailpd_DV('<?=$dtid?>','detail','<?=$jpro_namePJ?>');" title="ดูรายละเอียดสินค้า"><i class="fa fa-search"></i> รายการส่งสินค้า</button>
  </td>
 <table id="producttb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>
                  <th style="text-align:center;">ลำดับที่</th>
                  <!--<th style="text-align:left; padding-left:10px;">รหัสโครงการ</th>-->
                  <th style="text-align:left; padding-left:10px;">รหัสใบสั่งขาย</th>
                  <th style="text-align:left; padding-left:10px;">รหัสสินค้า</th>
                  <th style="text-align:left; padding-left:10px;">ชื่อสินค้า</th>
                  <th style="text-align:left; padding-left:10px;">จำนวน</th>
                  <th style="text-align:left; padding-left:10px;">ราคา/หน่วย</th>
                  <th style="text-align:left; padding-left:10px;">ราคารวม</th>

                  <!--<th style="text-align:left; padding-left:10px;">ไฟล์แนบ</th>-->
              </tr>
          </thead>
          <!--<tfoot>
          	  <tr>
                  <th style="text-align:center;"></th>
                <!--  <th style="text-align:left; padding-left:10px;"></th>--
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <!--<th style="text-align:left; padding-left:10px;"></th>--
									<th style="text-align:center;">สินค้า</th>
              </tr>
          </tfoot>-->
          <tbody>
          <?
          $sql = "SELECT * FROM YCC_PROJECTTOTAL WHERE DATAAREAID = 'YC' AND BPC_DIMENSION4_ = '{$jpro_name}'";
          $result = odbc_exec($cid, $sql) or die(odbc_error());
          $rowint = 1;
          while($objResult = odbc_fetch_array($result))
           {
             $test = iconv('tis-620','utf-8',$objResult['NAME']);
             $itemid = $objResult['ITEMID'];
             $salesid = $objResult['SALESID'];
             $qtyordered = $objResult['QTYORDERED'];
             $salesprice = $objResult['SALESPRICE'];
             $sum = $qtyordered * $salesprice;


		  ?>
          	  <tr>
                  <td style="text-align:center;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$rowint?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$salesid?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$itemid?></td>
   				  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$test?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=number_format($qtyordered);?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=number_format($salesprice,2);?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=number_format($sum,2);?></td>
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?#=$jpro_remark_jprotb?></td>-->
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?/* if ($jpro_status_jprotb == 1) {
                  	echo "OPEN";
                  } else {
                  	echo "CLOSE";
                  }*/?></td>-->

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
