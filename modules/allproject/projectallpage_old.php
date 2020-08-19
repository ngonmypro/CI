<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>project all page</title>
<style>
/* Clear floats after the columns */
.row{
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 5px;
}
.col-25 {
    float: left;
    width: 25%;
    margin-top: 5px;
	margin-left: 5px;
	margin-right: 5px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 5px;
	margin-left: 5px;
	margin-right: 5px;
}

div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    #sproj0,#sproj2,#sproj2, #sproj3, div.gallery {
        width: 100%;
        margin-top: 0;
    }
}

</style>
</head>

<body>
	<div style="width:100%">

       <div class="row">
    	<div class="form-inline">
          <!--<div style="float:left;">-->	
          
          <!--</div>-->
          <!--<div style="float:right;">-->
          <div class="form-group">
            <label for="sproj1">ค้นหาจาก :</label>
            <select name="sproj1" id="sproj1" class="form-control" >
              <option value=""><--- เลือกรายการ ---></option>
              <option value="1">รหัสโครงการ</option>
              <option value="2">ชื่อโครงการ</option>
              <option value="3">เลขที่สัญญา</option>
              <option value="3">วันที่สัญญา</option>
              <option value="4">รหัสลูกค้า</option>
              <option value="5">ชื่อลูกค้า</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="sproj2" onFocus="this.select()" >
          </div>
          	<div class="form-group">
          	<button type="button" id="sproj3" class="btn btn-info"><i class="fa fa-search"></i> ค้นหา</button>
            </div>
            <div class="form-group">
          	<button type="button" id="sproj0" class="btn btn-success" onClick="javascript:addcustomertb('add');"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</button>
          </div>
            
          </div>
        <!--</div>-->
        </div>
      
      	<div class="row">
        	 <div class="gallery">
                <a target="_blank" href="javascript:loadprojectdetail();">
                  <img src="images/g1.jpg" alt="Trolltunga Norway" width="300" height="200">
                </a>
                <div class="desc">
                    โครงการพฤกษาวิลล์ 100 (พหลโยธิน-คลองหลวง)
                </div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g2.jpg" alt="Forest" width="600" height="400">
                </a>
                <div class="desc">04 เดอะคอนฟิเด้นซ์-ประชาอุทิศ 90</div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g3.jpg" alt="Northern Lights" width="600" height="400">
                  
                </a>
                <div class="desc">04 VSQ04 วสุธร มาบสามเกลียว</div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g4.jpg" alt="Mountains" width="600" height="400">
                </a>
                <div class="desc">04 DON3 ดอนเมือง-สรงประภา</div>
              </div>
        	  <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g5.jpg" alt="Trolltunga Norway" width="300" height="200">
                </a>
                <div class="desc">04 ไทย ฮาเซ AP BKM สุขาภิบาล5</div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g6.jpg" alt="Forest" width="600" height="400">
                </a>
                <div class="desc">บ้านพัก2ชั้น  T.AL-17 ชั้น1</div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g7.jpg" alt="Northern Lights" width="600" height="400">
                  
                </a>
                <div class="desc">บริษัท อินเตอร์ เอ็กซ์เพิร์ท </div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g8.jpg" alt="Mountains" width="600" height="400">
                </a>
                <div class="desc">05  PNC  ข้างบ.ยงคอนกรีต</div>
              </div>
              
              <div class="gallery">
                <a target="_blank" href="#">
                  <img src="images/g9.jpg" alt="Mountains" width="600" height="400">
                </a>
                <div class="desc">04 YAO02 เยาวฤทธิ์ หนองปรือ</div>
              </div>
              	
        </div>  

    </div>
   
    
</body>
</html>