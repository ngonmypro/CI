<?
	$cmd = $_GET['cmd'];
	$eid = $_GET['eid'];
 	
	include "../../Connections/connect_mysql.php";
	
	if($cmd == 'edit'){
		if($eid){
			$sql_seid = "SELECT * FROM user_level_tb where 	ulv_id='{$eid}' ";
			$result_seid = mysql_query($sql_seid) or die(mysql_error());
			$record_seid = mysql_fetch_array($result_seid);
				$ulv_id_seid = $record_seid['ulv_id']; 
				$ulv_name_seid = $record_seid['ulv_name'];
				$ulv_remark_seid = $record_seid['ulv_remark'];
				$ulv_status_seid = $record_seid['ulv_status'];		
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>user level form</title>
</head>

<body>
<div style="float:left; width:45%;">        	
<div class="control-group form-group">
    <div class="controls">
        <label class="contact-p1">ชื่อระดับสิทธิ์ :</label>
        <input type="text" class="form-control" name="ulv1" id="ulv1" onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" value="<?=$ulv_name_seid?>">
        <!--<small id="st_ulv1" class="form-text text-muted" style="color:#F30;"></small>-->
    </div>
</div>
</div>
<div style="float:left; width:45%;">
<div class="control-group form-group">
    <div class="controls">
        <label class="contact-p1">หมายเหตุ :</label>
        <input type="text" class="form-control" name="ulv2" id="ulv2" onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" value="<?=$ulv_remark_seid?>" >
        <!--<small id="st_ulv2" class="form-text text-muted" style="color:#F30;"></small>-->
    </div>
</div>
</div>            
</body>
</html>
<?
	mysql_close($c);
?>