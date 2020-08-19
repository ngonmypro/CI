<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Page</title>
<script>
	$(document).ready( function () {
		$("#userall").load("modules/user/userallpage.php");
		$("#userper").load("modules/user/userlevelpage.php");
	});
</script>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="agileits_heading_section">
        			<h3 class="wthree_head">User</h3>
            		<p class="w3l_sub_para_agile">ผู้ใช้งานระบบ</p>
        		</div>	
                
                <h3> </h3>
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_default_1" data-toggle="tab" title="ผู้ใช้งานทั้งหมด"><i class="fa fa-users"></i> User ALL </a>
							</li>
							<li>
								<a href="#tab_default_2" onClick="javascript:loaduserlevelpage();" data-toggle="tab" title="สิทธิ์การใช้งาน"><i class="fa fa-key"></i> User Permission </a>
							</li>
						</ul>
						<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<div id="userall"></div>
						</div>
						<div class="tab-pane" id="tab_default_2">
							<div id="userper"></div>
						</div>
						
					</div>
				</div>
			</div>
                
            </div>
        </div>
    </div>
</body>
</html>