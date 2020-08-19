<?
	$cmd = $_GET['cmd'];
	$eid = $_GET['eid'];


	include "../../Connections/connect_sqlserver.php";
	include "../../Connections/connect_mysql.php";

	if($cmd == 'edit' || $cmd == 'detail'){
		if($eid){
			$sql_seid = " select * from jobproject_tb where jpro_id='{$eid}' ";
			$result_seid = mysql_query($sql_seid) or die(mysql_error());
			$record_seid = mysql_fetch_array($result_seid);
				$jpro_id_seid = $record_seid['jpro_id'];
				$jpro_code_seid = $record_seid['jpro_code'];
				$jpro_name_seid = $record_seid['jpro_name'];
				$jpro_sale_id_seid = $record_seid['jpro_sale_id'];
				$jpro_foreman_id_seid = $record_seid['jpro_foreman_id'];
				$jpro_cust_id_seid = $record_seid['jpro_cust_id'];
				$jpro_cust_name_seid = $record_seid['jpro_cust_name'];
				$jpro_contract_doc_seid = $record_seid['jpro_contract_doc'];
				$jpro_contract_date_seid = $record_seid['jpro_contract_date'];
				$jpro_contract_bdate_seid = $record_seid['jpro_contract_bdate'];
				$jpro_contract_edate_seid	= $record_seid['jpro_contract_edate'];
				$jpro_contract_value_seid = $record_seid['jpro_contract_value'];
				$jpro_remark_seid = $record_seid['jpro_remark'];

			/*	$sql_seid2 = " select * from customer_tb where pcus_id={$jpro_cust_id_seid} ";
				$result_seid2 = mysql_query($sql_seid2) or die(mysql_error());
				$record_seid2 = mysql_fetch_array($result_seid2);
					$pcus_code_seid2 = $record_seid2['pcus_code'];
					$pcus_name_seid2 = $record_seid2['pcus_name'];*/

		}
	}

?>
<script type="text/javascript">
			$("#jpro2").change(function() {
					$.post("modules/allproject/chk_custname.php",
						{
								pro : $('#jpro2').val()
							},
							function(data){
								//alert(data);
								$("#jpro3").html(data);
							});
						});
</script>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project Form</title>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
<link rel="stylesheet" href="../../dist/bootstrap-select-1.12.4/dist/css/bootstrap-select.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<script src="../../dist/bootstrap-select-1.12.4/dist/js/bootstrap-select.js"></script>
</head>

<body>
	<div style="width:90%" onload="load();">
		      <div class="row" style="margin-top:5px;"><!-- ชื่อโครงการ -->
		          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
		              <label class="contact-p1" for="jpro1">ชื่อโครงการ :</label>
		          </div>
		          <div style="float:left; width:55%; text-align:left; padding-left:5px;">
			 						 <? if($cmd == 'detail'){ ?>
			 								 <input type="text" class="form-control" name="jpro1" id="jpro1" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_name_seid?>">
			 							 <? }else if($cmd == 'add'){ ?>
			 								 <select name="jpro1" id="jpro1" class="form-control" onBlur="chkelm(this.id);">
			 										 <option value=""> # เลือกชื่อโครงการ # </option>
			 										 <?php $sqlax = "SELECT BPC_DIMENSION4_ FROM YCC_PROJECTTOTAL WHERE DATAAREAID = 'YC' AND BPC_DIMENSION2_ = '203' GROUP BY BPC_DIMENSION4_";
			 													 $resultax = odbc_exec($cid, $sqlax) or die(odbc_error());
			 													 while($objResult = odbc_fetch_array($resultax)) { ?>
			 										 <option value="<?=iconv('tis-620','utf-8',$objResult['BPC_DIMENSION4_']); ?>" ><?=iconv('tis-620','utf-8',$objResult['BPC_DIMENSION4_']); ?></option>
			 										 <?php } ?>
			 										 </select>
												 <?php }else if($cmd == 'edit'){?>
			 		 				        	 <select name="jpro1" id="jpro1" class="form-control" onBlur="chkelm(this.id);" disabled>
			 		 				              <option value=""> # เลือกชื่อโครงการ # </option>
																<?php $sqlaxed = "SELECT BPC_DIMENSION4_ FROM YCC_PROJECTTOTAL WHERE DATAAREAID = 'YC' AND BPC_DIMENSION2_ = '203' GROUP BY BPC_DIMENSION4_";
			 		 						                $resultaxed = odbc_exec($cid,$sqlaxed) or die(odbc_error());
			 		 						                while ($rowaxed = odbc_fetch_array($resultaxed)) {
			 		 															$jpro_name = iconv('tis-620','utf-8',$rowaxed['BPC_DIMENSION4_']); ?>
			 		 											<option <? if($jpro_name_seid==$jpro_name){ ?> selected <? } ?> value="<?=$jpro_name?>" ><?=$jpro_name?></option>
																<option value="<?=iconv('tis-620','utf-8',$objResult['BPC_DIMENSION4_']); ?>" ><?=iconv('tis-620','utf-8',$objResult['BPC_DIMENSION4_']); ?></option>
			 		 						          <?php } ?>
			 		 				          </select>
			 		 				        <? } ?>
							</div>
							<!--<div style="float:left; width:10%; text-align:left; padding-left:5px;">
		          	<button class="btn btn-info" onClick="schjproax();"><i class="fa fa-search"></i> AX </button>
		          </div>-->
		      </div>

    <!--	<div class="row" style="margin-top:5px;"><!-- รหัสโครงการ --
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro2">ประเภทโครงการ :</label>
          </div>
          <div style="float:left; width:50%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="jpro2" id="jpro2" <?# if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <?# } ?> value="<?#=$jpro_code_seid?>">
          </div>

      </div> -->

      <div class="row" style="margin-top:5px;"><!-- รัหสลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro3">รหัสลูกค้า :</label>
          </div>
					<div style="float:left; width:55%; text-align:left; padding-left:5px;">
							 <? if($cmd == 'detail'){ ?>
									 <input type="text" class="form-control" name="jpro2" id="jpro2" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_cust_id_seid?>">
								 <? }else if($cmd == 'add'){ ?>
									 <select name="jpro2" id="jpro2" class="form-control" onBlur="chkelm(this.id);">
											 <option value=""> # เลือกรหัสลูกค้า # </option>
											 <?php $sqlcust1 = "SELECT ACCOUNTNUM , NAME FROM YCC_CUSTOMER WHERE DATAAREAID = 'YC' GROUP BY ACCOUNTNUM , NAME";
										   $resultcust1 = odbc_exec($cid, $sqlcust1) or die(odbc_error());
														 while($objResultcust1 = odbc_fetch_array($resultcust1)) { ?>
											 <option value="<?=iconv('tis-620','utf-8',$objResultcust1['ACCOUNTNUM']); ?>" ><?=iconv('tis-620','utf-8',$objResultcust1['ACCOUNTNUM']); ?>::<?=iconv('tis-620','utf-8',$objResultcust1['NAME']); ?></option>
											 <?php } ?>
											 </select>
											 <?php }else if($cmd == 'edit'){ ?>
												 <select name="jpro2" id="jpro2" class="form-control" onBlur="chkelm(this.id);" disabled>
														<option value=""> # เลือกรหัสลูกค้า # </option>
														<?php $sqlcusted = "SELECT ACCOUNTNUM , NAME FROM YCC_CUSTOMER WHERE DATAAREAID = 'YC' GROUP BY ACCOUNTNUM , NAME";
																	$resultcusted = odbc_exec($cid, $sqlcusted) or die(odbc_error());
																	while ($rowcusted = odbc_fetch_array($resultcusted)) {
																		$cust2_id = iconv('tis-620','utf-8',$rowcusted['ACCOUNTNUM']);
																		$cust2_name = iconv('tis-620','utf-8',$rowcusted['NAME']); ?>
														<option <? if($jpro_cust_id_seid==$cust2_id){ ?> selected <? } ?> value="<?=$cust2_id?>" ><?=$cust2_id?>::<?=$cust2_name?></option>
														<?php } ?>
												</select>
											<? } ?>
					</div>

          <!--<div style="float:left; width:20%; text-align:left; padding-left:5px;">
          	<button class="btn btn-info" onClick="schcustax();"><i class="fa fa-search"></i> AX </button>
          </div>-->
      </div>

	   <div class="row" style="margin-top:5px;"><!-- ชื่อลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro3">ชื่อลูกค้า :</label>
          </div>
					<div style="float:left; width:70%; text-align:left; padding-left:5px;">
						<? if($cmd == 'detail'){ ?>
								<input type="text" class="form-control" name="jpro3" id="jpro3" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_name_seid?>">
							<? }else if($cmd == 'add'){ ?>
								<select name="jpro3" id="jpro3" class="form-control" onBlur="chkelm(this.id);" disabled>
										<option value=""> # เลือกชื่อลูกค้า # </option>
										</select>
										<?php }else if($cmd == 'edit'){ ?>
											<select name="jpro3" id="jpro3" class="form-control" onBlur="chkelm(this.id);" disabled>
												 <option value="<?=$jpro_cust_name_seid?>"><?=$jpro_cust_name_seid?></option>
										 </select>
									 <? } ?>
				</div>
          <!--<div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="jpro4" id="jpro4" <?# if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <?# } ?> value="<?#=$jpro_cust_name_seid?>">
          </div>-->
      </div>

       <div class="row" style="margin-top:5px;"><!-- มูลค่าโครงการ -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro4">มูลค่าโครงการ 100% :</label>
          </div>
          <div style="float:left; width:50%; text-align:left; padding-left:5px;">
						<? if($cmd == 'detail'){ ?>
              <input type="text" class="form-control" name="jpro4" id="jpro4" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_value_seid?>">
							<? }else if($cmd == 'add'){ ?>
								<input type="text" class="form-control" name="jpro4" id="jpro4" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_value_seid?>">
							<?php }else if($cmd == 'edit'){ ?>
								<input type="text" class="form-control" name="jpro4" id="jpro4" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_value_seid?>" disabled>
							<? } ?>
				  </div>
          <div style="float:left; width:20%; text-align:left; padding-left:5px;">
          	 บาท
          </div>
      </div>

      <div class="row" style="margin-top:5px;"><!-- เลขที่สัญญา -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro5">เลขที่สัญญา :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
							<? if($cmd == 'detail'){ ?>
	              <input type="text" class="form-control" name="jpro5" id="jpro5" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_doc_seid?>">
								<? }else if($cmd == 'add'){ ?>
									<input type="text" class="form-control" name="jpro5" id="jpro5" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_doc_seid?>">
								<?php }else if($cmd == 'edit'){ ?>
									<input type="text" class="form-control" name="jpro5" id="jpro5" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_doc_seid?>"disabled>
								<? } ?>
					</div>
      </div>

      <div class="row" style="margin-top:5px;"><!-- วันที่สัญญา -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro6">วันที่สัญญา :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
						<? if($cmd == 'detail'){ ?>
							<input type="date" class="form-control" name="jpro6" id="jpro6" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_date_seid?>">
							<? }else if($cmd == 'add'){ ?>
								<input type="date" class="form-control" name="jpro6" id="jpro6" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_date_seid?>">
							<?php }else if($cmd == 'edit'){ ?>
								<input type="date" class="form-control" name="jpro6" id="jpro6" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_date_seid?>" disabled>
							<? } ?>
          </div>
      </div>

      <div class="row" style="margin-top:5px;"><!-- วันที่เริ่มงาน -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro7">วันที่เริ่มงาน :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
						<? if($cmd == 'detail'){ ?>
						<input type="date" class="form-control" name="jpro7" id="jpro7" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_bdate_seid?>">
							<? }else if($cmd == 'add'){ ?>
              <input type="date" class="form-control" name="jpro7" id="jpro7" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_bdate_seid?>">
							<?php }else if($cmd == 'edit'){ ?>
              <input type="date" class="form-control" name="jpro7" id="jpro7" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_bdate_seid?>" disabled>
							<? } ?>
          </div>
      </div>

      <div class="row" style="margin-top:5px;"><!-- วันที่จบงาน -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="jpro8">วันที่จบงาน :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
						<? if($cmd == 'detail'){ ?>
							<input type="date" class="form-control" name="jpro8" id="jpro8" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_edate_seid?>">
						<? }else if($cmd == 'add'){ ?>
							<input type="date" class="form-control" name="jpro8" id="jpro8" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_edate_seid?>">
						<?php }else if($cmd == 'edit'){ ?>
							<input type="date" class="form-control" name="jpro8" id="jpro8" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$jpro_contract_edate_seid?>">
						<? } ?>
              </div>
      </div>

			 <div class="row" style="margin-top:5px;"><!-- พนักงานขาย -->
				 <div style="float:left; width:30%; text-align:right; padding-right:5px;">
						 <label class="contact-p1" for="jpro9">ชื่อพนักงานขาย :</label>
					 </div>
					 <div style="float:left; width:70%; text-align:left; padding-left:5px;">
						 <? if($cmd == 'detail'){ ?>
								 <input type="text" class="form-control" name="jpro9" id="jpro9" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> >
							 <? }else if($cmd == 'add'){ ?>
								 <select name="jpro9" id="jpro9" class="form-control" onBlur="chkelm(this.id);" >
										 <option value=""> # เลือกพนักงานขาย # </option>
										 <?php $sqlcom = 'SELECT * FROM user_tb WHERE use_level = 1 ';
													 $resultcom = mysql_query($sqlcom) or die(mysql_error());
													 while ($rowcom = mysql_fetch_array($resultcom)) { ?>
										 <option value="<?php echo $rowcom['use_id']; ?>" ><?php echo $rowcom['use_nameth']; ?></option>
										 <?php } ?>
										 </select>
										 <?php }else if($cmd == 'edit'){ ?>
		 				        	 <select name="jpro9" id="jpro9" class="form-control" onBlur="chkelm(this.id);" disabled>
		 				              <option value=""> # เลือกพนักงานขาย # </option>
		 											<?php $sqlcom = 'SELECT * FROM user_tb WHERE use_level = 1 ';
		 						                $resultcom = mysql_query($sqlcom) or die(mysql_error());
		 						                while ($rowcom = mysql_fetch_array($resultcom)) {
		 															$sale_id = $rowcom['use_id']; ?>
		 											<option <? if($jpro_sale_id_seid==$sale_id){ ?> selected <? } ?> value="<?php echo $rowcom['use_id']; ?>" ><?php echo $rowcom['use_nameth']; ?></option>
		 						          <?php } ?>
		 				          </select>
		 				        <? } ?>
					 </div>
			 </div>

				<div class="row" style="margin-top:5px;"><!-- โฟร์แมน -->
					<div style="float:left; width:30%; text-align:right; padding-right:5px;">
				    	<label class="contact-p1" for="jpro10">ชื่อโฟร์แมน :</label>
				    </div>
				    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
				    	<? if($cmd == 'detail'){ ?>
				        	<input type="text" class="form-control" name="jpro10" id="jpro10" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> >
				        <? }else if($cmd == 'add'){ ?>
				          <select name="jpro10" id="jpro10" class="form-control" onBlur="chkelm(this.id);">
				              <option value=""> # เลือกโฟร์แมน # </option>
											<?php $sqlcom = 'SELECT * FROM user_tb WHERE use_level = 3 ';
						                $resultcom = mysql_query($sqlcom) or die(mysql_error());
						                while ($rowcom = mysql_fetch_array($resultcom)) { ?>
						          <option value="<?php echo $rowcom['use_id']; ?>" ><?php echo $rowcom['use_nameth']; ?></option>
						          <?php } ?>
				          </select>
				        <? }else if($cmd == 'edit'){ ?>
				        	 <select name="jpro10" id="jpro10" class="form-control" onBlur="chkelm(this.id);">
				              <option value=""> # เลือกโฟร์แมน # </option>
											<?php $sqlcom1 = 'SELECT * FROM user_tb WHERE use_level = 3 ';
						                $resultcom1 = mysql_query($sqlcom1) or die(mysql_error());
						                while ($rowcom1 = mysql_fetch_array($resultcom1)) {
															$foreman_id1 = $rowcom1['use_id']; ?>
											<option <? if($jpro_foreman_id_seid==$foreman_id1){ ?> selected <? } ?> value="<?=$foreman_id1?>" ><?php echo $rowcom1['use_nameth']; ?></option>
						          <?php } ?>
				          </select>
				        <? } ?>
				    </div>
				</div>

    </div>
</body>
</html>
<?
	mysql_close($c);
?>
