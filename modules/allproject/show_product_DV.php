<?  include "../../Connections/connect_sqlserver.php";
    include "../../Connections/connect_mysql.php";
  $dtid = $_GET['dtid'];
  $mysql = " SELECT * FROM jobproject_tb WHERE jpro_id = '{$dtid}'";
  $resultmysql = mysql_query($mysql) or die(mysql_error());
  while($rowmysql = mysql_fetch_array($resultmysql)){
    $jpro_nameDV = iconv('utf-8','tis-620',$rowmysql['jpro_name']);
    $jpro_namePJDV = $rowmysql['jpro_name'];
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project All Page</title>
<script>
	$(document).ready( function () {
		var tableDV = $('#productDV').DataTable({
		//dom: 'Bfrtip',
        //scrollY:        "430px",
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

		 $('#productDV tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  tableDV.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );

		$('#productDV tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='สถานะ') && (title !='ลบ') && (title !='สินค้า')  ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		});

		// Apply the search ค้นหาจาก footer ------------------------
		$('#productDV').DataTable().columns().every( function () {
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
 <table id="productDV" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>
                  <th style="text-align:center;">ลำดับที่</th>
                  <!--<th style="text-align:left; padding-left:10px;">รหัสโครงการ</th>-->
                  <th style="text-align:left; padding-left:10px;">รหัสใบสั่งขาย</th>
                  <th style="text-align:left; padding-left:10px;">วันที่ส่ง</th>
                  <th style="text-align:left; padding-left:10px;">รหัสใบส่งสินค้า</th>
                  <th style="text-align:left; padding-left:10px;">รหัสสินค้า</th>
                  <th style="text-align:left; padding-left:10px;">ชื่อสินค้า</th>
                  <th style="text-align:left; padding-left:10px;">จำนวน</th>
                  <th style="text-align:left; padding-left:10px;">ราคา/หน่วย</th>
                  <th style="text-align:left; padding-left:10px;">สถานะ</th>

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
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <!--<th style="text-align:left; padding-left:10px;"></th>--
              </tr>
          </tfoot>-->
          <tbody>
          <?

          $sqldv = "SELECT * FROM YCC_PACKING WHERE DATAAREAID = 'YC' AND BPC_DIMENSION4_ = '{$jpro_nameDV}'";
          $resultdv = odbc_exec($cid, $sqldv) or die(odbc_error());
          $rowint = 1;
          while($objResultdv = odbc_fetch_array($resultdv))
           {
             $ReferenceId = $objResultdv['REFERENCEID'];
             //$DateFinancial = $objResultdv['DATEPH'];
             $ItemId = $objResultdv['ITEMID'];
             $DatePhysical = substr($objResultdv['DATEPHYSICAL'], 8, 2)."/".substr($objResultdv['DATEPHYSICAL'], 5, 2)."/".substr($objResultdv['DATEPHYSICAL'], 2, 2);
             $Voucher = $objResultdv['VOUCHER'];
             $Qty = $objResultdv['QTY'];
             $SalesPrice = $objResultdv['SALESPRICE'];
             $StatusIssue = $objResultdv['STATUSISSUE'];
             $Name = iconv('tis-620','utf-8',$objResultdv['NAME']);
             //$sumdv = $qtyordereddv * $salespricedv;

		  ?>
          	  <tr>
                  <td style="text-align:center;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$rowint?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$ReferenceId?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$DatePhysical?></td>
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?#=?></td>-->
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$Voucher?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$ItemId?></td>
   				  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=$Name?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=number_format($Qty);?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?=number_format($SalesPrice,2);?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');">
                    <? if ($StatusIssue == 0 ) { echo "None"; }
                    elseif ($StatusIssue == 1) { echo "Sold"; }
                    elseif ($StatusIssue == 2) { echo "Deducted"; }
                    elseif ($StatusIssue == 3) { echo "Picked"; }
                    elseif ($StatusIssue == 4) { echo "ReservPhysical"; }
                    elseif ($StatusIssue == 5) { echo "ReservOrdered"; }
                    elseif ($StatusIssue == 6) { echo "OnOrder"; }
                    elseif ($StatusIssue == 7) { echo "QuotationIssue"; }?></td>
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
