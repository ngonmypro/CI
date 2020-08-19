<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>all project</title>
<script>
	$(document).ready( function () {
		$("#projectall").load("modules/allproject/projectallpage.php");
	});
</script>
</head>

<body>
   	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="agileits_heading_section">
        			<h3 class="wthree_head">Project ALL</h3>
            		<p class="w3l_sub_para_agile">โครงการทั้งหมด</p>
        		</div>

                <h3> </h3>
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<ul class="nav nav-tabs ">
							<li class="active">
								<a href="#tab_default_1" data-toggle="tab" title="โครงการทั้งหมด"><i class="fa fa-building-o"></i> Project ALL </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_default_1">
								<div id="projectall" style="width:100%;"></div>
						</div>
					</div>
				</div>
			</div>

            </div>
        </div>
    </div>

</body>
</html>
