<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>customer page</title>
<script>
	$(document).ready( function () {
		$("#customerall").load("modules/customer/customerallpage.php");
	});
</script>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="agileits_heading_section">
        			<h3 class="wthree_head">Customer</h3>
            		<p class="w3l_sub_para_agile">ลูกค้า</p>
                </div>
                    
                    <h3> </h3>
                      <div class="tabbable-panel">
                          <div class="tabbable-line">
                              <ul class="nav nav-tabs ">
                                  <li class="active">
                                      <a href="#tab_default_1" data-toggle="tab" title="ลูกค้าโครงการ"><i class="glyphicon glyphicon-user"></i> Customer </a>
                                  </li>
                              </ul>
                              <div class="tab-content">
                                  <div class="tab-pane active" id="tab_default_1">
                                     <div id="customerall"></div> 
                              	  </div>
                              </div>
                         </div>
                      </div>
        		
            </div>
        </div>
    </div>
</body>
</html>