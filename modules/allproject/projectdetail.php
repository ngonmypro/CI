<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project detail page</title>
<link rel="stylesheet" type="text/css" href="cardstyle.css">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<style>
	.row{
		margin-left: 5px;
		margin-right: 5px;
		margin-top: 5px;
	}
	@media screen and (max-width: 600px) {
    	#btnback {
        	width: 100%;
        	margin-top: 0;
    	}
	}
	{box-sizing: border-box}
	
	.containerbar {
	  width: 100%;
	  background-color: #ddd;
	}
	
	.status {
	  text-align: right;
	  padding-right: 20px;
	  line-height: 40px;
	  color: white;
	}
	
	.sj1 {width: 100%; background-color: #4CAF50;}
	.sj2 {width: 80%; background-color: #2196F3;}
	.sj3 {width: 65%; background-color: #f44336;}
	.sj4 {width: 60%; background-color: #808080;}
	.sj5 {width: 50%; background-color: #F60;}
	.sj6 {width: 80%; background-color: #09F;}
	
	div.gallery2 {
    	margin: 5px;
		float:left;
    	/*border: 1px solid #ccc;*/
    	float: left;
    	width: 50%;
	}
	
	div.gallery3 {
    	margin: 5px;
		float:left;
    	/*border: 1px solid #ccc;*/
    	float: right;
    	width: 100%;
	}
	
	@media screen and (max-width: 600px) {
    	div.gallery2, div.gallery3, #tt1, #tt2 {
        	width: 100%;
        	margin-top: 0;
    	}
	}
	
</style>
</head>

<body>
	<div style="width:100%">
    	<!-- เมนู page -->
    	<div class="row">
        	<div class="form-inline">
            	<div class="form-group">
                	<button id="btnback" class="btn btn-info" onClick="javascript:loadprojectpage();"><i class="fa fa-mail-reply"></i> ย้อนกลับ</button>
                </div>
            </div>
        </div>
        <!-- //เมนู page -->
        <div class="row">
        	<h4>โครงการพฤกษาวิลล์ 100 (พหลโยธิน-คลองหลวง)</h4>
        </div>
        
  <div class="row">   
  	<div class="gallery3">
  		<div class="w3-row">
    		<div class="w3-container w3-half">
    			<div class="w3-card-4">
            		<header class="w3-container w3-light-grey">
                		<h4>สถานะโครงการ</h4>
            		</header>
            		<div class="w3-container" style="padding-bottom:10px;">
                 		
                        <p>มลค่า : 9,300,00.17 บาท</p>
                		<div class="containerbar">
                  			<div class="status sj1">100%</div>
                		</div>
                
                        <p>การจัดส่งสินค้า</p>
                        <div class="containerbar">
                          <div class="status sj2">80%</div>
                        </div>
                
                        <p>โฟร์แมนตรวจงาน/ส่งงานผู้รับเหมาเบิกค่าแรง</p>
                        <div class="containerbar">
                          <div class="status sj3">65%</div>
                        </div>
                
                        <p>วางบิล / ส่งงวดงาน</p>
                        <div class="containerbar">
                          <div class="status sj4">60%</div>
                        </div>
                
                        <p>รับชำระเงิน</p>
                        <div class="containerbar">
                          <div class="status sj5">50%</div>
                        </div>
                
                      <p>Retentiion</p>
                      <div class="containerbar">
                        <div class="status sj6">80%</div>
                      </div>
                
            </div>
    </div>
    <div class="w3-container w3-half">
      
    </div>
  </div>
  </div>
  </div>
	
</body>
</html>