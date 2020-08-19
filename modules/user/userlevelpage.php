<?
	include "../../Connections/connect_mysql.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Level Pages</title>
<script>
	$(document).ready( function () {
		var table = $('#userlvtb').DataTable({
		//dom: 'Bfrtip',
        //scrollY:        "300px",
        //scrollX:        true,
        //scrollCollapse: true,
        paging:         false,
        //fixedColumns:   {
            //leftColumns: 1,
            //rightColumns: 1
        //}
		sort: false,
		select: true,
    	});
		
		 $('#userlvtb tbody').on( 'click', 'tr', function () {
			  if ( $(this).hasClass('selected') ) {
				  $(this).removeClass('selected');
			  }
			  else {
				  table.$('tr.selected').removeClass('selected');
				  $(this).addClass('selected');
			  }
		  } );
		
		$('#userlvtb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='qr-code') && (title !='จบงาน')  ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');	
			}
		});
		
		// Apply the search ค้นหาจาก footer ------------------------
		$('#userlvtb').DataTable().columns().every( function () {
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
<!-- dialog1 -->
	<div id="c1"></div>
<!-- ////// -->
	<div><button type="button" class="btn btn-success" onClick="javascript:adduserlv('add');"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</button></div>
	<table id="userlvtb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
    	<thead>
              <tr>	
                  <!--<th style="text-align:center;">ลำดับที่</th>-->
                  <th style="text-align:left; padding-left:10px;">ชื่อระดับสิทธิ์</th>
                  <th style="text-align:left;">หมายเหตุ</th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>	                 
              </tr>
          </thead>
          <tfoot>
          	  <tr>	
                  <!--<th style="text-align:center;">ลำดับที่</th>-->
                  <th style="text-align:left; padding-left:10px;"></th>
                  <th style="text-align:left;"></th>
				  <th style="text-align:center;">แก้ไข</th>
                  <th style="text-align:center;">ลบ</th>	       
              </tr>
          </tfoot>
          <tbody>
          <?
		  		$sql_uselv =" select * from user_level_tb order by ulv_id desc; ";
				$result_uselv = mysql_query($sql_uselv) or die(mysql_error());
				$rowint = 1;
				$sumamnt = 0.00;
				while($record_uselv=mysql_fetch_array($result_uselv)){
					$ulv_id_uselv = $record_uselv['ulv_id']; 
					$ulv_name_uselv = $record_uselv['ulv_name'];
					$ulv_remark_uselv = $record_uselv['ulv_remark'];
					$ulv_status_uselv = $record_uselv['ulv_status'];	 
				
		  ?>
          	  <tr>	
                  <!--<th style="text-align:center;">...</th>-->
                  <th style="text-align:left; padding-left:10px;"><?=$ulv_name_uselv?></th>
                  <th style="text-align:left;"><?=$ulv_remark_uselv?></th>
				  <th style="text-align:center;"><button class="btn btn-warning" onClick="javascript:edituser(<?=$ulv_id_uselv?>,'edit');"><i class="fa fa-edit"></i></button></th>
                  <th style="text-align:center;">
                  	<? if($ulv_id_uselv != 1){ ?>
                    	<button class="btn btn-danger" onClick="javascript:deluserlv(<?=$ulv_id_uselv?>,'del','<?=$ulv_name_uselv?>');"><i class="fa fa-times"></i></button>
                    <? } ?>
                  </th>	       
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