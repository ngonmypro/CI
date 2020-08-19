<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>test bootstrap dialog</title>
 <!-- Bootstrap -->
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<!--<script src="media/js/jquery-1.12.4.js"></script>-->
<script src="dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/bootstrapdialog/bootstrap-dialog.min.css">
<script src="lib/bootstrapdialog/bootstrap-dialog.min.js"></script>
<script>
	function test(){
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
</script>
</head>

<body>
<button type="button" onClick="javascript:test();">test</button>
</body>
</html>