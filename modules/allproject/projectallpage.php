<?
	session_start();
	include "../../Connections/connect_mysql.php";

		$level = $_SESSION['use_level'];
		$useid = $_SESSION['use_id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project All Page</title>
<script>
	$(document).ready( function () {
		var table = $('#jprotb').DataTable({
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

		 $('#jprotb tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  table.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );

		$('#jprotb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='สถานะ') && (title !='ลบ') && (title !='สินค้า') && (title != 'ภาพรวม') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		});

		// Apply the search ค้นหาจาก footer ------------------------
		$('#jprotb').DataTable().columns().every( function () {
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
	<? if ($level == 1 || $level == 2) { ?>
 <div><button type="button" class="btn btn-success" onClick="javascript:addjprotb('add');"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</button></div>
<? } ?>
 <br>
 <table id="jprotb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>
                  <th style="text-align:center;">ลำดับที่</th>
                  <!--<th style="text-align:left; padding-left:10px;">รหัสโครงการ</th>-->
                  <th style="text-align:left; padding-left:10px;">ชื่อโครงการ</th>
                  <th style="text-align:left; padding-left:10px;">ลูกค้า</th>
                  <th style="text-align:left; padding-left:10px;">เลขที่สัญญา</th>
                  <th style="text-align:left; padding-left:10px;">วันที่สัญญา</th>
                  <th style="text-align:left; padding-left:10px;">วันที่เริ่มงาน</th>
                  <th style="text-align:left; padding-left:10px;">วันที่จบงาน</th>
                  <th style="text-align:left; padding-left:10px;">มูลค่าโครงการ 100%</th>
                  <!--<th style="text-align:left; padding-left:10px;">ไฟล์แนบ</th>-->
									<th style="text-align:center;">ภาพรวม</th>
									<th style="text-align:center;">สินค้า</th>
                  <th style="text-align:center;">สถานะ</th>
									<? if ($level == 1 || $level == 2) { ?>
				  			<th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
								<? } ?>
              </tr>
          </thead>
          <tfoot>
          	  <tr>
                  <th style="text-align:center;"></th>
                <!--  <th style="text-align:left; padding-left:10px;"></th>-->
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left; padding-left:10px;"></th>
                  <!--<th style="text-align:left; padding-left:10px;"></th>-->
									<th style="text-align:center;">ภาพรวม</th>
									<th style="text-align:center;">สินค้า</th>
                  <th style="text-align:center;">สถานะ</th>
									<? if ($level == 1 || $level == 2) { ?>
				  			 <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>
								<? } ?>
              </tr>
          </tfoot>
          <tbody>
          <?
					if ($level == 3) {
		  		$sql_jprotb =" SELECT * FROM jobproject_tb WHERE jpro_foreman_id = '{$useid}' ORDER BY jpro_id DESC; ";
				$result_jprotb = mysql_query($sql_jprotb) or die(mysql_error());
				$rowint = 1;
				$sumamnt = 0.00;
				while($record_jprotb=mysql_fetch_array($result_jprotb)){
					$jpro_id_jprotb = $record_jprotb['jpro_id'];
					$jpro_code_jprotb = $record_jprotb['jpro_code'];
					$jpro_name_jprotb = $record_jprotb['jpro_name'];
					$jpro_cust_id_jprotb = $record_jprotb['jpro_cust_id'];
					$jpro_cust_name_jprotb = $record_jprotb['jpro_cust_name'];
					$jpro_contract_doc_jprotb = $record_jprotb['jpro_contract_doc'];
					$jpro_contract_date_jprotb = substr($record_jprotb['jpro_contract_date'], 8, 2)."/".substr($record_jprotb['jpro_contract_date'], 5, 2)."/".substr($record_jprotb['jpro_contract_date'], 2, 2);
					$jpro_contract_bdate_jprotb = substr($record_jprotb['jpro_contract_bdate'], 8, 2)."/".substr($record_jprotb['jpro_contract_bdate'], 5, 2)."/".substr($record_jprotb['jpro_contract_bdate'], 2, 2);
					$jpro_contract_edate_jprotb	= substr($record_jprotb['jpro_contract_edate'], 8, 2)."/".substr($record_jprotb['jpro_contract_edate'], 5, 2)."/".substr($record_jprotb['jpro_contract_edate'], 2, 2);
					$jpro_contract_value_jprotb = $record_jprotb['jpro_contract_value'];
					$jpro_remark_jprotb = $record_jprotb['jpro_remark'];
					$jpro_status_jprotb = $record_jprotb['jpro_status'];
					?>
					<tr>
							<td style="text-align:center;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$rowint?></td>
							<!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_code_jprotb?></td>-->
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_name_jprotb?></td>
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_cust_name_jprotb?></td>
				<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_contract_doc_jprotb?></td>
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
								<? if($jpro_contract_date_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_date_jprotb; }?></td>
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
								<? if($jpro_contract_bdate_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_bdate_jprotb; }?></td>
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
								<? if($jpro_contract_edate_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_edate_jprotb; }?></td>
							<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=number_format($jpro_contract_value_jprotb,2);?></td>
							<!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?#=$jpro_remark_jprotb?></td>-->
							<!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?/* if ($jpro_status_jprotb == 1) {
								echo "OPEN";
							} else {
								echo "CLOSE";
							}*/?></td>-->
							<td style="text-align:center;">
								<button class="btn btn-info" onClick="javascript:detailPD(<?=$jpro_id_jprotb?>,'detail','<?=$jpro_name_jprotb?>');" title="ภาพรวมโครงการ"><i class="fa fa-search"></i></button>
							</td>
							<td style="text-align:center;">
								<button class="btn btn-info" onClick="javascript:detailPD(<?=$jpro_id_jprotb?>,'detail','<?=$jpro_name_jprotb?>');" title="ดูรายละเอียดสินค้า"><i class="fa fa-search"></i></button>
							</td>
							<td style="text-align:center;">
								<?php if ($jpro_status_jprotb == 1) { ?>
								<button class="btn btn-success" onClick=""> OPEN </button>
								<?php } else { ?>
								<button class="btn btn-danger" onClick=""> CLOSE </i></button>
							<?php } ?>
							</td>

							<? if ($level == 1 || $level == 2) { ?>
							<td style="text-align:center;">
								<? if($jpro_status_jprotb == 1){ ?>
								<button class="btn btn-warning" onClick=""><i class="fa fa-edit"></i></button>
								<? } ?>
							</td>
							<td style="text-align:center;">
								<? if($jpro_status_jprotb == 1){ ?>
									<button class="btn btn-danger" onClick=""><i class="fa fa-times"></i></button>
								<? } ?>
							</td>
						<? } ?>
					</tr>
			<?
			$rowint += 1;
		}//while
	?>

			<?	}else {
				//echo "ทั้งหมด";
					$sql_jprotb =" SELECT * FROM jobproject_tb ORDER BY jpro_id DESC; ";
				$result_jprotb = mysql_query($sql_jprotb) or die(mysql_error());
				$rowint = 1;
				$sumamnt = 0.00;
				while($record_jprotb=mysql_fetch_array($result_jprotb)){
					$jpro_id_jprotb = $record_jprotb['jpro_id'];
					$jpro_code_jprotb = $record_jprotb['jpro_code'];
					$jpro_name_jprotb = $record_jprotb['jpro_name'];
					$jpro_cust_id_jprotb = $record_jprotb['jpro_cust_id'];
					$jpro_cust_name_jprotb = $record_jprotb['jpro_cust_name'];
					$jpro_contract_doc_jprotb = $record_jprotb['jpro_contract_doc'];
					$jpro_contract_date_jprotb = substr($record_jprotb['jpro_contract_date'], 8, 2)."/".substr($record_jprotb['jpro_contract_date'], 5, 2)."/".substr($record_jprotb['jpro_contract_date'], 2, 2);
					$jpro_contract_bdate_jprotb = substr($record_jprotb['jpro_contract_bdate'], 8, 2)."/".substr($record_jprotb['jpro_contract_bdate'], 5, 2)."/".substr($record_jprotb['jpro_contract_bdate'], 2, 2);
					$jpro_contract_edate_jprotb	= substr($record_jprotb['jpro_contract_edate'], 8, 2)."/".substr($record_jprotb['jpro_contract_edate'], 5, 2)."/".substr($record_jprotb['jpro_contract_edate'], 2, 2);
					$jpro_contract_value_jprotb = $record_jprotb['jpro_contract_value'];
					$jpro_remark_jprotb = $record_jprotb['jpro_remark'];
					$jpro_status_jprotb = $record_jprotb['jpro_status'];


		  ?>
          	  <tr>
                  <td style="text-align:center;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$rowint?></td>
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_code_jprotb?></td>-->
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_name_jprotb?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_cust_name_jprotb?></td>
   				  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=$jpro_contract_doc_jprotb?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
										<? if($jpro_contract_date_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_date_jprotb; }?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
										<? if($jpro_contract_bdate_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_bdate_jprotb; }?></td>
                  <td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');">
										<? if($jpro_contract_edate_jprotb == 0000-00-00){ echo ""; } else { echo $jpro_contract_edate_jprotb; }?></td>
									<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?=$jpro_id_jprotb?>,'detail');"><?=number_format($jpro_contract_value_jprotb,2);?></td>
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?#=$jpro_remark_jprotb?></td>-->
                  <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:detailuser(<?#=$jpro_id_jprotb?>,'detail');"><?/* if ($jpro_status_jprotb == 1) {
                  	echo "OPEN";
                  } else {
                  	echo "CLOSE";
                  }*/?></td>-->
									<td style="text-align:center;">
										<button class="btn btn-info" onClick="javascript:detailChart(<?=$jpro_id_jprotb?>,'detail','<?=$jpro_name_jprotb?>');" title="ภาพรวมโครงการ"><i class="fa fa-search"></i></button>
									</td>
									<td style="text-align:center;">
										<button class="btn btn-info" onClick="javascript:detailPD(<?=$jpro_id_jprotb?>,'detail','<?=$jpro_name_jprotb?>');" title="ดูรายละเอียดสินค้า"><i class="fa fa-search"></i></button>
									</td>
									<? if ($level == 1 || $level == 2) { ?>
									<td style="text-align:center;">
										<?php if ($jpro_status_jprotb == 1) { ?>
										<button class="btn btn-success" onClick="javascript:closeprojecttb(<?=$jpro_id_jprotb?>,'close','<?=$jpro_name_jprotb?>');"> OPEN </button>
										<?php } else { ?>
										<button class="btn btn-danger" onClick="javascript:openprojecttb(<?=$jpro_id_jprotb?>,'open','<?=$jpro_name_jprotb?>');"> CLOSE </i></button>
									<?php } ?>
									</td>

				  				<td style="text-align:center;">
										<? if($jpro_status_jprotb == 1){ ?>
										<button class="btn btn-warning" onClick="javascript:editprojecttb(<?=$jpro_id_jprotb?>,'edit');"><i class="fa fa-edit"></i></button>
										<? } ?>
									</td>
                  <td style="text-align:center;">
                  	<? if($jpro_status_jprotb == 1){ ?>
                    	<button class="btn btn-danger" onClick="javascript:delprojecttb(<?=$jpro_id_jprotb?>,'del','<?=$jpro_name_jprotb?>');"><i class="fa fa-times"></i></button>
                    <? } ?>
                  </td>
								<? } ?>
              </tr>
          <?
		  		$rowint += 1;
		  	} }//while
		  ?>
          </tbody>

    </table>
</body>
</html>
<?
	mysql_close($c);
?>
