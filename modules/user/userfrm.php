<?
	$cmd = $_GET['cmd'];
	$eid = $_GET['eid'];

	include "../../Connections/connect_mysql.php";

	if($cmd == 'edit' || $cmd == 'detail'){
		if($eid){
			$sql_seid = " select * from user_tb where use_id='{$eid}' ";
			$result_seid = mysql_query($sql_seid) or die(mysql_error());
			$record_seid = mysql_fetch_array($result_seid);
				$use_id_seid = $record_seid['use_id'];
				$use_nameth_seid = $record_seid['use_nameth'];
				$use_nameen_seid = $record_seid['use_nameen'];
				$use_username_seid = $record_seid['use_username'];
				$use_password_seid = $record_seid['use_password'];
				$use_level_seid = $record_seid['use_level'];
				$use_remark_seid = $record_seid['use_remark'];
				$use_createby_seid = $record_seid['use_createby'];
				$use_createtime_seid = $record_seid['use_createtime'];
				$use_updateby_seid = $record_seid['use_updateby'];
				$use_updatetime_seid = $record_seid['use_updatetime'];
				$use_status_seid = $record_seid['use_status'];

				$sql_seid2 = " select * from user_level_tb where ulv_id={$use_level_seid} ";
				$result_seid2 = mysql_query($sql_seid2) or die(mysql_error());
				$record_seid2 = mysql_fetch_array($result_seid2);
					$ulv_name_seid2 = $record_seid2['ulv_name'];
					$ulv_remark_seid2 = $record_seid2['ulv_remark'];
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>user tb form</title>

</head>

<body>
<div style="width:90%">

<div class="row" style="margin-top:5px;"><!-- ชื่อไทย -->
	<div style="float:left; width:30%; text-align:right; padding-right:5px;">
    	<label class="contact-p1" for="ust1">ชื่อ-สกุล Thai :</label>
    </div>
    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
    	<input type="text" class="form-control" name="ust1" id="ust1" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$use_nameth_seid?>">
    </div>
</div>

<div class="row" style="margin-top:5px;"><!-- ชื่อ eng -->
	<div style="float:left; width:30%; text-align:right; padding-right:5px;">
    	<label class="contact-p1" for="ust2">ชื่อ-สกุล eng :</label>
    </div>
    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
    	<input type="text" class="form-control" name="ust2" id="ust2" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$use_nameen_seid?>">
    </div>
</div>

<div class="row" style="margin-top:5px;"><!-- username -->
	<div style="float:left; width:30%; text-align:right; padding-right:5px;">
    	<label class="contact-p1" for="ust3">User name :</label>
    </div>
    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
    	<input type="text" class="form-control" name="ust3" id="ust3" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$use_username_seid?>">
    </div>
</div>

<div class="row" style="margin-top:5px;"><!-- password -->
	<div style="float:left; width:30%; text-align:right; padding-right:5px;">
    	<label class="contact-p1" for="ust4">Password :</label>
    </div>
    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
    	<input type="password" class="form-control" name="ust4" id="ust4" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$use_password_seid?>">
    </div>
</div>

<div class="row" style="margin-top:5px;"><!-- level permission -->
	<div style="float:left; width:30%; text-align:right; padding-right:5px;">
    	<label class="contact-p1" for="ust5">ระดับสิทธิ์ :</label>
    </div>
    <div style="float:left; width:70%; text-align:left; padding-left:5px;">
    	<? if($cmd == 'detail'){ ?>

        	<input type="text" class="form-control" name="ust5" id="ust5" <? if($cmd != 'detail'){ ?> onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" <? } ?> value="<?=$ulv_name_seid2?> :: <?=$ulv_remark_seid2?>">

        <? }else if($cmd == 'add'){ ?>

          <select name="ust5" id="ust5" class="form-control" onBlur="chkelm(this.id);">
              <option value=""><--- เลือกรายการ ---></option>
              <?
			  	$sql_seid3 = " select * from user_level_tb";
				$result_seid3 = mysql_query($sql_seid3) or die(mysql_error());
				while($record_seid3 = mysql_fetch_array($result_seid3)){
					$ulv_id_seid3 = $record_seid3['ulv_id'];
					$ulv_name_seid3 = $record_seid3['ulv_name'];
					$ulv_remark_seid3 = $record_seid3['ulv_remark'];
			  ?>
              		<option value="<?=$ulv_id_seid3?>"><?=$ulv_name_seid3?> :: <?=$ulv_remark_seid3?></option>
              <?
				}//while
			  ?>
          </select>

        <? }else if($cmd == 'edit'){ ?>
        	 <select name="ust5" id="ust5" class="form-control" onBlur="chkelm(this.id);">
              <option value=""><--- เลือกรายการ ---></option>
              <?
			  	$sql_seid3 = " select * from user_level_tb";
				$result_seid3 = mysql_query($sql_seid3) or die(mysql_error());
				while($record_seid3 = mysql_fetch_array($result_seid3)){
					$ulv_id_seid3 = $record_seid3['ulv_id'];
					$ulv_name_seid3 = $record_seid3['ulv_name'];
					$ulv_remark_seid3 = $record_seid3['ulv_remark'];
			  ?>
              		<option <? if($use_level_seid==$ulv_id_seid3){ ?> selected <? } ?> value="<?=$ulv_id_seid3?>"><?=$ulv_name_seid3?> :: <?=$ulv_remark_seid3?></option>
              <?
				}//while
			  ?>
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
