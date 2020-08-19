
var aulv = "";
var eulv = "";
var dtus = "";
var aust = "";
var eust = "";
var addcust = "";
var dtcust = "";
var ecust = "";
var schcust = "";
var addjpro = "";
var schcust = "";
var product = "";

function showscreen(){
	var windowWidth = 1200;
	var windowHeight = 800;
	window.resizeTo(windowWidth,windowHeight);
	var xPos = (screen.width/2) - (windowWidth/2);
	var yPos = (screen.height/2) - (windowHeight/2);
	window.moveTo(xPos, yPos);
	window.focus();
	AppWindow = window.opener;
}

function chkelm(chkid){
	if(document.getElementById(chkid).value != ""){
		$("#" + chkid + "").removeClass("invalid").addClass("valid");
		$("#st_" + chkid + "").html("");
	}else{
		$("#" + chkid + "").removeClass("valid").addClass("invalid");
		$("#st_" + chkid + "").html("เป็นค่าว่างไม่ได้");
	}
}

function checkKey(n){

  if (window.event.keyCode == 13){ //Enter
	  if(n=="lg1"){
		chkelm(n);
		$('#lg2').focus();
	  }
	  if(n=="lg2"){
		chkelm(n);
		chklogin('lg',2);
	  }
  }else if(window.event.keyCode == 37){ //Left
	  //
  }else if(window.event.keyCode == 38){ //Up
	  //
  }else if(window.event.keyCode == 39){ //Right
	  //
  }else if(window.event.keyCode == 40){ //Down
	  //
  }else{
	  //
  }
}

function chklogin(n1,n2){
	//alert(n1 + "," + n2);
	//BootstrapDialog.alert("test");

	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//alert(data);
	//=========
	$.ajax({
		type: "POST",
		url: "modules/login/chk_login.php",
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				//loadproject();
				location.reload();
			}else
			if(msg=='N'){
				BootstrapDialog.alert('Username หรือ Password ไม่ถูกต้อง!');
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
	//========= ajax

	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function chklogout(){
	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	data = "";
	//=========
	$.ajax({
		type: "POST",
		url: "modules/login/chk_logout.php",
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				//loadproject();
				location.reload();
			}else
			if(msg=='N'){
				//
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
	//========= ajax
}

function loadprojectpage(){

	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#a1").load("modules/allproject/projecttb.php");

	$("#lim1").addClass("menu__item--current");
	$("#lim2").removeClass("menu__item--current");
	$("#lim3").removeClass("menu__item--current");
	$("#lim4").removeClass("menu__item--current");
	$("#lim5").removeClass("menu__item--current");

	$("#bs-example-navbar-collapse-1").collapse('toggle');
}

function loadprojectdetail(){
	$("#projectall").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#projectall").load("modules/allproject/projectdetail.php");
}

function loaduserpage(){

	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#a1").load("modules/user/userpage.php");

	$("#lim1").removeClass("menu__item--current");
	$("#lim2").addClass("menu__item--current");
	$("#lim3").removeClass("menu__item--current");
	$("#lim4").removeClass("menu__item--current");
	$("#lim5").removeClass("menu__item--current");

	$("#bs-example-navbar-collapse-1").collapse('toggle');
}

function loaduserlevelpage(){
	$("#userper").load("modules/user/userlevelpage.php");
}

function loadcustomerpage(){
	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#a1").load("modules/customer/customerpage.php");

	$("#lim1").removeClass("menu__item--current");
	$("#lim2").removeClass("menu__item--current");
	$("#lim3").addClass("menu__item--current");
	$("#lim4").removeClass("menu__item--current");
	$("#lim5").removeClass("menu__item--current");

	$("#bs-example-navbar-collapse-1").collapse('toggle');
}

function loadproductpage(){
	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#a1").load("modules/product/productpage.php");

	$("#lim1").removeClass("menu__item--current");
	$("#lim2").removeClass("menu__item--current");
	$("#lim3").removeClass("menu__item--current");
	$("#lim4").addClass("menu__item--current");
	$("#lim5").removeClass("menu__item--current");

	$("#bs-example-navbar-collapse-1").collapse('toggle');

}

function loadcontractorspage(){
	$("#a1").html("<img src='images/preloader-01.gif' width='32' height='32'>");
	$("#a1").load("modules/contractors/contractorspage.php");

	$("#lim1").removeClass("menu__item--current");
	$("#lim2").removeClass("menu__item--current");
	$("#lim3").removeClass("menu__item--current");
	$("#lim4").removeClass("menu__item--current");
	$("#lim5").addClass("menu__item--current");

	$("#bs-example-navbar-collapse-1").collapse('toggle');

}

function adduserlv(cmd){
	//alert(cmd);
	aulv = new BootstrapDialog({
		type: BootstrapDialog.TYPE_SUCCESS,
		title: "<i class='fa fa-plus-circle'></i></font> เพิ่มรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/user/userlevelfrm.php?cmd=" + cmd + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				adduserlv2(cmd,'ulv',2);
			}

		}]
	});
	//di1.realize();
    //var btn2 = di1.getButton('btn2');
    //btn2.click({'name': 'Apple'}, function(event){
    //alert('Hi, ' + event.data.name);
    //});
	//btn2.hide();
	aulv.open();
}

function adduserlv2(cmd,n1,n2){
	//alert(cmd + "," + n1 + "," + n2);
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		$.ajax({
			type: "POST",
			url: "modules/user/usercontrol.php?cmd=" + cmd,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					aulv.close();
					loaduserlevelpage();
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถเพิ่มข้อมูลได้ อาจมีข้อมูลนี้อยู่แล้ว !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function edituser(eid,cmd){
	eulv = new BootstrapDialog({
		type: BootstrapDialog.TYPE_WARNING,
		title: "<i class='fa fa-edit'></i></font> แก้ไขรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/user/userlevelfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save Edit",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				edituserlv2(eid,cmd,'ulv',2);
			}

		}]
	});
	//di1.realize();
    //var btn2 = di1.getButton('btn2');
    //btn2.click({'name': 'Apple'}, function(event){
    //alert('Hi, ' + event.data.name);
    //});
	//btn2.hide();
	eulv.open();
}

function edituserlv2(eid,cmd,n1,n2){
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		$.ajax({
			type: "POST",
			url: "modules/user/usercontrol.php?cmd=" + cmd + "&eid=" + eid,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					eulv.close();
					loaduserlevelpage();
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถแก้ไขข้อมูลได้ !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function deluserlv(deid,cmd,dename){
	//alert('test' + deid + ',' + cmd + ',' + dename);
	//alert(did + "," + dename + "," + cmd);
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการลบข้อมูล '" + dename + "' นี้ ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "dename=" + dename;
			  $.ajax({
				  type: "POST",
				  url: "modules/user/usercontrol.php?cmd=" + cmd + "&deid=" + deid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loaduserlevelpage();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//
		  }
	  }
	});

}

function detailuser(eid,cmd){
	//alert(eid + "," + cmd);
	dtus = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='fa fa-desktop'></i></font> รายละเอียด",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/user/userfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		}]
	});
	dtus.open();
}

function addusertb(cmd){
	aust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_SUCCESS,
		title: "<i class='fa fa-plus-circle'></i></font> เพิ่มรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/user/userfrm.php?cmd=" + cmd + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				addusertb2(cmd,'ust',5);
			}

		}]
	});

	aust.open();

}

function addusertb2(cmd,n1,n2){
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		$.ajax({
			type: "POST",
			url: "modules/user/usertbcontrol.php?cmd=" + cmd,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					aust.close();
					loadusertb();
					BootstrapDialog.alert('เพิ่มรายการข้อมูล เรียบร้อย !');
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถเพิ่มข้อมูลได้ อาจมีข้อมูลนี้อยู่แล้ว !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}

}

function loadusertb(){
	$("#userall").load("modules/user/userallpage.php");
}

function editusertb(eid,cmd){
	eust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_WARNING,
		title: "<i class='fa fa-edit'></i></font> แก้ไขรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/user/userfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save Edit",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				editusertb2(eid,cmd,'ust',5);
			}

		}]
	});
	eust.open();
}

function editusertb2(eid,cmd,n1,n2){
	//alert('test');
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		//alert(data);

		$.ajax({
			type: "POST",
			url: "modules/user/usertbcontrol.php?cmd=" + cmd + "&eid=" + eid,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					eust.close();
					loadusertb();
					BootstrapDialog.alert('บันทึกการแก้ไขรายการข้อมูล เรียบร้อย !');
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถแก้ไขข้อมูลได้ !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function delusertb(deid,cmd,dename){
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการลบข้อมูล '" + dename + "' นี้ ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "dename=" + dename;
			  $.ajax({
				  type: "POST",
				  url: "modules/user/usertbcontrol.php?cmd=" + cmd + "&deid=" + deid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loadusertb();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//
		  }
	  }
	});

}

function addcustomertb(cmd){
		addcust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_SUCCESS,
		title: "<i class='fa fa-plus-circle'></i></font> เพิ่มรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/customer/customerfrm.php?cmd=" + cmd + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				addcustomertb2(cmd,'cust',7);
			}

		}]
	});

	addcust.open();

}

function addcustomertb2(cmd,n1,n2){
	//alert(cmd + "," + n1 + "," + n2);
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	//alert(data);

	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		$.ajax({
			type: "POST",
			url: "modules/customer/customertbcontrol.php?cmd=" + cmd,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					addcust.close();
					loadcustomertb();
					BootstrapDialog.alert('เพิ่มรายการข้อมูล เรียบร้อย !');
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถเพิ่มข้อมูลได้ อาจมีข้อมูลนี้อยู่แล้ว !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}


}

function loadcustomertb(){
	$("#customerall").load("modules/customer/customerallpage.php");
}

function detailcust(eid,cmd){
	//alert(eid + "," + cmd);
	dtcust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='fa fa-desktop'></i></font> รายละเอียด",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/customer/customerfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		}]
	});
	dtcust.open();
}

function editcustomertb(eid,cmd){
	ecust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_WARNING,
		title: "<i class='fa fa-edit'></i></font> แก้ไขรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/customer/customerfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save Edit",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				editcustomertb2(eid,cmd,'cust',7);
			}

		}]
	});
	ecust.open();
}

function editcustomertb2(eid,cmd,n1,n2){
	//alert('test');
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste==0){ //ถ้าป้อนข้อมูลครบ
		//=========
		//alert(data);

		$.ajax({
			type: "POST",
			url: "modules/customer/customertbcontrol.php?cmd=" + cmd + "&eid=" + eid,
			data: data,
			success: function(msg){
				//alert(msg);
				if(msg=='Y'){
					ecust.close();
					loadcustomertb();
					BootstrapDialog.alert('บันทึกการแก้ไขรายการข้อมูล เรียบร้อย !');
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถแก้ไขข้อมูลได้ !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}

}

function delcustomertb(deid,cmd,dename){
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการลบข้อมูล '" + dename + "'  ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "dename=" + dename;
			  $.ajax({
				  type: "POST",
				  url: "modules/customer/customertbcontrol.php?cmd=" + cmd + "&deid=" + deid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loadcustomertb();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//
		  }
	  }
	});
}

function schcustax(){
	schcust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='fa fa-search'></i></font> ค้นหารายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/customer/customersch.php"),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		/*},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save Edit",
			cssClass: 'btn-primary',
			//hotkey: 13, //enter
			action: function(dialogItself){
				editcustomertb2(eid,cmd,'cust',7);
			}*/

		}]
	});
	schcust.open();
}

function addjprotb(cmd){
	addjpro = new BootstrapDialog({
		type: BootstrapDialog.TYPE_SUCCESS,
		title: "<i class='fa fa-plus-circle'></i></font> เพิ่มรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/projectfrm.php?cmd=" + cmd ),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save",
			cssClass: 'btn-success',
			//hotkey: 13, //enter
			action: function(dialogItself){
				addjprotb2(cmd,'jpro',10);
			}

		}]
	});

	addjpro.open();

}

/*function addjprotb2() {

}*/
function addjprotb2(cmd,n1,n2){
	//alert(cmd + "," + n1 + "," + n2);
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
				alert(data = data + "" + n1 + i + "=" + el[i]);
		}else{
				alert(data = data + "&" + n1 + i + "=" + el[i]);
		}
 		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}

	//alert(ste);
	//alert(data);

	if(ste<=1){ //ถ้าป้อนข้อมูลครบ
		//=========
		//alert(data);
		$.ajax({
			type: "POST",
			url: "modules/allproject/projrcttbcontrol.php?cmd=" + cmd,
			data: data,
			success: function(msg){
				alert(msg);
				if(msg=='Y'){
					addjpro.close();
					loadprojecttb();
					BootstrapDialog.alert('เพิ่มรายการข้อมูล เรียบร้อย !');
				}else if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถเพิ่มข้อมูลได้ อาจมีข้อมูลนี้อยู่แล้ว !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function editprojecttb(eid,cmd){
	//alert("EDIT" + "," + eid + "," + cmd);
	eust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_WARNING,
		title: "<i class='fa fa-edit'></i></font> แก้ไขรายการ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/projectfrm.php?cmd=" + cmd + "&eid=" + eid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		},{
			id: 'btn1',
			label: "<i class='glyphicon glyphicon-check'></i>&nbsp; Save Edit",
			cssClass: 'btn-warning',
			//hotkey: 13, //enter
			action: function(dialogItself){
				editprojecttb2(eid,cmd,'jpro',10);
			}

		}]
	});
	eust.open();
}

function editprojecttb2(eid,cmd,n1,n2){
	//alert("EDIT" + "," + eid + "," + cmd + "," + n1 + "," + n2);
	var ste=0;
	var data="";
	var el = []; //new FormData($("#frm")[0])
	var i=0;
	for(i=1; i<=n2 ; i++){ //วนลูปตรวจสอบ ค่าว่าง
		el[i] = $("#" + n1 + i + "").val();
		if(el[i]==""){
			ste += 1;
		}
		if(i==1){
		   data = data + "" + n1 + i + "=" + el[i];
		}else{
		   data = data + "&" + n1 + i + "=" + el[i];
		}
		chkelm("" + n1 + i + ""); //เปลี่ยน class ถ้าเป็นค่าว่าง
	}
	//alert(ste);
	if(ste<=1){ //ถ้าป้อนข้อมูลครบ
		//=========
		//alert(data);

		$.ajax({
			type: "POST",
			url: "modules/allproject/projrcttbcontrol.php?cmd=" + cmd + "&eid=" + eid,
			data: data,
			success: function(msg){
				alert(msg);
				if(msg=='Y'){
					eust.close();
					loadprojecttb();
					BootstrapDialog.alert('บันทึกการแก้ไขรายการข้อมูล เรียบร้อย !');
				}else
				if(msg=='N'){
					BootstrapDialog.alert('ไม่สามารถแก้ไขข้อมูลได้ !');
				}
			},
			error: function(){
				//
			},
			complete: function(){
				//
			}
		});
		//========= ajax
	}else{
		BootstrapDialog.alert('กรุณาป้อนข้อมูลให้ครบถ้วน!');
	}
}

function delprojecttb(deid,cmd,dename){
	//alert("DELETE" + "," + deid + "," + cmd  + "," + dename);
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการลบโครงการ '" + dename + "' นี้ ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "dename=" + dename;
			  $.ajax({
				  type: "POST",
				  url: "modules/allproject/projrcttbcontrol.php?cmd=" + cmd + "&deid=" + deid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loadprojecttb();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//alert("เชื่อมต่อเซิฟเวอร์ผิดพลาด");
		  }
	  }
	});

}

function closeprojecttb(cloid,cmd,cloname) {
	//alert("CLOSE" + "," + cloid + "," + cmd + "," + cloname);
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการจบโครงการ '" + cloname + "' นี้ ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_INFO, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "cloname=" + cloname;
			  $.ajax({
				  type: "POST",
				  url: "modules/allproject/projrcttbcontrol.php?cmd=" + cmd + "&cloid=" + cloid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loadprojecttb();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//alert("เชื่อมต่อเซิฟเวอร์ผิดพลาด");
		  }
	  }
	});
}

function openprojecttb(opid,cmd,opname) {
	//alert("OPNE" + "," + opid + "," + cmd + "," + opname);
	var data = "";
	BootstrapDialog.confirm({
	  title: 'ยืนยันการลบข้อมูล',
	  message: " ต้องการเปิดโครงการ '" + opname + "' นี้ ไช่ หรือ ไม่?",
	  type: BootstrapDialog.TYPE_SUCCESS, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
	  closable: true, // <-- Default value is false
	  draggable: true, // <-- Default value is false
	  btnOKLabel: 'OK', // <-- Default value is 'OK',
	  btnCancelLabel: 'Cancel', // <-- Default value is 'Cancel',
	  callback: function(result) {
		  if(result) {
			  data = "opname=" + opname;
			  $.ajax({
				  type: "POST",
				  url: "modules/allproject/projrcttbcontrol.php?cmd=" + cmd + "&opid=" + opid,
				  data: data,
				  success: function(msg){
					  //alert(msg);
					  if(msg=='Y'){
						 loadprojecttb();
						 BootstrapDialog.alert('ลบรายการข้อมูล เรียบร้อย!');
					  }else
					  if(msg=='N'){
						BootstrapDialog.alert('ไม่สามารถ ลบข้อมูลได้!');
					  }

				  },
				  error: function(){
					//
				  },
				  complete: function(){
					//
				  }
			  });
		  }else{
			//alert("เชื่อมต่อเซิฟเวอร์ผิดพลาด");
		  }
	  }
	});
}

function detailPD(dtid,cmd,dtname) {
	//alert("DETAIL" + "," + dtid + "," + cmd + "," + dtname);
	//var data = "dtid=" + dtid /*+ "&dtname=" + dtname*/;
	product = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='fa fa-search'></i></font> รายละเอียดสินค้า " + dtname ,
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/show_product.php?dtid=" + dtid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		}]
	});
	product.open();
}

function detailChart(dtid,cmd,dtname) {
	alert("DETAIL" + "," + dtid + "," + cmd + "," + dtname);
	//var data = "dtid=" + dtid /*+ "&dtname=" + dtname*/;
	product = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='fa fa-search'></i></font> รายละเอียดสินค้า " + dtname ,
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/show_chart.php?dtid=" + dtid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}
		}]
	});
	product.open();
}

function detailpd_DV(dtid,cmd,namemysql) {
	//alert("DETAIL" + "," + dtid + "," + cmd + "," + namemysql);
	//var data = "dtid=" + dtid /*+ "&dtname=" + dtname*/;
	product = new BootstrapDialog({
		type: BootstrapDialog.TYPE_SUCCESS,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='fa fa-search'></i></font> รายการส่งสินค้า " + namemysql ,
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/show_product_DV.php?dtid=" + dtid),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}

		}]
	});
	product.open();
}

function loadprojecttb(){
	$("#projectall").load("modules/allproject/projectallpage.php");
}

function schjproax(){

	schcust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='fa fa-search'></i></font> ค้นหารายการ ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/test.php"),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}

		}]
	});
	schcust.open();

}

function schjproax2(schtxt){

	var jprotxt1 = $("#" + jprotxt + "").val();
	var data = "jprotxt=" + jprotxt1;
	$("#result_jpro_sch").html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading...");
	$("#result_jpro_sch").load("modules/allproject/test2.php?jprotxt=" + jprotxt1 );

}

function schcustax1(){

	schcust = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='fa fa-search'></i></font> ค้นหารายการ ",
		message: $('<div></div>').html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading..."),
		message: $('<div></div>').load("modules/allproject/schcustomerAX.php"),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
			id: 'btn0',
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			cssClass: 'btn-secondary',
			action: function(dialogItself){
				dialogItself.close();
			}

		}]
	});
	schcust.open();

}

function schcustAx2(schtxt){

	var schtxt1 = $("#" + schtxt + "").val();
	var data = "schtxt=" + schtxt1;
	$("#result_cust_sch").html("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading...");
	$("#result_cust_sch").load("modules/allproject/schcustomerAX2.php?schtxt=" + schtxt1 );

}

function senddatacust(custcode, custname){
	alert(custcode + "," + custname);
	schcust.close();
	addjpro.setMessage("<img src='images/preloader-01.gif' height='32' width='32' /> <br> Loading...");
	addjpro.setMessage($("<div></div>").load("modules/allproject/projectfrm.php?cmd=add&custcode=" + custcode + "&custname=" + custname));
}
