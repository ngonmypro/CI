<?
	$cmd = $_GET['cmd'];
	$eid = $_GET['eid'];
 	
	include "../../Connections/connect_mysql.php";
	
	if($cmd == 'edit' || $cmd == 'detail'){
		if($eid){
			$sql_seid = " select * from customer_tb where pcus_id='{$eid}' ";
			$result_seid = mysql_query($sql_seid) or die(mysql_error());
			$record_seid = mysql_fetch_array($result_seid);
				$pcus_id_seid = $record_seid['pcus_id'];
				$pcus_code_seid = $record_seid['pcus_code'];
				$pcus_name_seid = $record_seid['pcus_name'];
				$pcus_addr_seid = $record_seid['pcus_addr'];
				$pcus_tel_seid = $record_seid['pcus_tel'];
				$pcus_contact_seid = $record_seid['pcus_contact'];
				$pcus_wht_seid = $record_seid['pcus_wht'];
				$pcus_acc_seid = $record_seid['pcus_acc'];
				$pcus_remark_seid = $record_seid['pcus_remark'];
				$pcus_status_seid = $record_seid['pcus_status'];
				
		}
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>customer tb frm</title>
</head>

<body>
<div style="width:90%">

      <div class="row" style="margin-top:5px;"><!-- รัหสลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust1">รหัสลูกค้า :</label>
          </div>
          <div style="float:left; width:50%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust1" id="cust1" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_code_seid?>">
          </div>
          <div style="float:left; width:20%; text-align:left; padding-left:5px;">
          	<button class="btn btn-info" onClick="schcustax();"><i class="fa fa-search"></i> AX </button>
          </div>
      </div>
      
      <div class="row" style="margin-top:5px;"><!-- ชื่อลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust2">ชื่อลูกค้า :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust2" id="cust2" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_name_seid?>">
          </div>
      </div>
      
      <div class="row" style="margin-top:5px;"><!-- ที่อยู่ลูกค้า -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust3">ที่อยู่ลูกค้า :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <textarea rows="4" cols="50" class="form-control" name="cust3" id="cust3" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> ><?=$pcus_addr_seid?></textarea>
          </div>
      </div>
      
      <div class="row" style="margin-top:5px;"><!-- เบอร์โทรศัพท์ -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust4">เบอร์โทรศัพท์ :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust4" id="cust4" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_tel_seid?>">
          </div>
      </div>
      
       <div class="row" style="margin-top:5px;"><!-- ชื่อผู้ติดต่อ -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust5">ชื่อผู้ติดต่อ :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust5" id="cust5" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_contact_seid?>">
          </div>
      </div>
      
      <div class="row" style="margin-top:5px;"><!-- เลขประจำตัว 13 หลัก -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust6">เลขประจำตัว 13 หลัก :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust6" id="cust6" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_wht_seid?>">
          </div>
      </div>
      
      <div class="row" style="margin-top:5px;"><!-- รหัสบัญชี AX -->
          <div style="float:left; width:30%; text-align:right; padding-right:5px;">
              <label class="contact-p1" for="cust7">รหัสบัญชี AX :</label>
          </div>
          <div style="float:left; width:70%; text-align:left; padding-left:5px;">
              <input type="text" class="form-control" name="cust7" id="cust7" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$pcus_acc_seid?>">
          </div>
      </div>
      
      	
</div>
</body>
</html>
<?
	mysql_close($c);
?>