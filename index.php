<?
	session_start();
	date_default_timezone_set('Asia/Bangkok');

	include "Connections/create_new_db.php";
	include "Connections/create_new_tb.php";
	include "Connections/insert_admim.php";

$level = $_SESSION['use_level'];
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Yong Construction Inspection | ระบบตรวจสอบหน้างานโครงการ</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="YongConcrete, YongHouse, Construction inspection" />
<link rel="icon" type="image/png" href="images/cifavicon.png"><!--sizes="96x96"-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/JiSlider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="application/javascript" src="ajax/function.js"></script>

<script src="dist/js/jquery.min.js"></script>
<script src="js/jquery-2.1.4.min.js"></script>

<!-- lobipanel -->
<link rel="stylesheet" type="text/css" href="lib/lobipanel/css/lobipanel.min.css">
<script src="lib/lobipanel/js/lobipanel.min.js"></script>

<!-- datatable -->
<link rel="stylesheet" type="text/css" href="lib/datatable/jquery.Datatable.css">
<script src="lib/datatable/jquery.Datatable.js"></script>
<link rel="stylesheet" type="text/css" href="lib/datatable/fixedColumns.dataTables.min.css">
<script src="lib/datatable/dataTables.fixedColumns.min.js"></script>


<script src="dist/js/bootstrap.min.js"></script>
<!-- include bootstrap dialog -->
<link href="dist/css/bootstrap-dialog.min.css" rel="stylesheet">
<script src="dist/js/bootstrap-dialog.min.js"></script>

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<script src="dist/charts/charts/Chart.min.js"></script>
<script src="dist/charts/charts/Chart.bundle.min.js"></script>
<style>
input.invalid, textarea.invalid, select.invalid{
	border: 2px solid red;
}
input.valid, textarea.valid, select.valid{
	border: 2px solid green;
}

/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}

/* Below tabs mode */

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid #fbcdcf;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}
</style>
<script>

</script>

</head>
<body>
<!-- header -->
<div class="banner-top">

	<div class="w3_navigation navbar-fixed-top">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php"><i class="fa fa-camera" aria-hidden="true"></i> Construction  <p class="logo_w3l_agile_caption">Inspection Yong Group</p></a></h1>
				</div>
				<div class=""> <br><br><br> </div>
                <? if($_SESSION['use_id']){ ?>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li id="lim1" class="menu__item menu__item--current"><a href="" onClick="javascript:loadprojectpage();" class="menu__link"><i class="fa fa-home"></i> Home</a></li>
							<? if ($level == 1 || $level == 2) { ?>
														<li id="lim2" class="menu__item menu__item">
                            	<a href="javascript:();" onClick="javascript:loaduserpage();" class="menu__link"><i class="fa fa-user"></i> User</a>
                            </li>
                            <li id="lim3" class="menu__item menu__item">
                            	<a href="javascript:();" onClick="javascript:loadcustomerpage();" class="menu__link"><i class="glyphicon glyphicon-user"></i> Custormer</a>
                            </li>
                            <li id="lim4" class="menu__item menu__item">
                            	<a href="javascript:();" onClick="javascript:loadproductpage();" class="menu__link"><i class="glyphicon glyphicon-list-alt"></i> Product</a>
                            </li>
                            <li id="lim5" class="menu__item menu__item">
                            	<a href="javascript:();" onClick="javascript:loadcontractorspage();" class="menu__link"><i class="glyphicon glyphicon-wrench"></i> Contractors</a>
                            </li>
													<? } ?>
                            <li id="lim6" class="menu__item menu__item"><a href="#" onClick="javascript:chklogout();" class="menu__link"><i class="fa fa-sign-out"></i> Log Out</a></li>

						</ul>
					</nav>
				</div>
                <? } ?>
			</nav>

		</div>
	</div>
<!-- //header -->
<?  if($_SESSION['use_id']){ ?>
<div class="container">
<div id="a0" style="margin-top:5px; float:right; color:#0C0; margin-right:10px; font-size:14px;">
	<?=$_SESSION['use_nameen']?>
</div>
<hr>
</div>
<? } ?>
<div id="a1" style="margin-top:100px;">
<?  if(!$_SESSION['use_id']){ ?>
<!--login-->
	<div class="container">
    	<div class="agileits_heading_section">
        	<h3 class="wthree_head">Login</h3>
            <p class="w3l_sub_para_agile">เข้าสู่ระบบ</p>
        </div>
        <!--<div class="col-md-6  w3l_area_its" style="width:100%;">-->
        <div style="float:left; width:20%; color:#FFF">div1</div>
        <div style="float:left; width:60%;">
        <div class="control-group form-group">
        	<div class="controls">
            	<label class="contact-p1">User Name:</label>
                <input type="text" class="form-control" name="lg1" id="lg1" onKeyUp="javascript:checkKey(this.id);"  onFocus="this.select()" onBlur="chkelm(this.id);" >
                <small id="st_lg1" class="form-text text-muted" style="color:#F30;"></small>
            </div>
       	</div>
        <div class="control-group form-group">
        	<div class="controls">
            	<label class="contact-p1">Password:</label>
                <input type="password" class="form-control" name="lg2" id="lg2" onKeyUp="javascript:checkKey(this.id);" onFocus="this.select()" onBlur="chkelm(this.id);">
                <small id="st_lg2" class="form-text text-muted" style="color:#F30;"></small>
            </div>
       	</div>
        <div style="text-align:center;">
        	<button type="button" class="btn btn-primary" onClick="javascript:chklogin('lg',2);" style="width:200px;"><i class="fa fa-sign-in"></i> Login</button><!--chklogin('lg',2);-->
        </div>
        </div>
        <div style="float:left; width:20%;"> </div>
        <!--</div>-->
    </div>
<!--//login-->
<? }else{ ?>
<!--/all project -->
	<script>
    	loadprojectpage();
    </script>
<!-- //all project -->
<? } ?>
</div>

<!-- footer -->
    <div class="copy-right navbar-fixed-bottom" style="background-color:#003;">
       <p style="text-align:center;">© <?=date("Y")?> All rights reserved | Design by <a href="index.php">IT Yong Group</a></p>
    </div>
<!-- //footer -->

<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


	<!-- js -->


<script src="js/JiSlider.js"></script>
		<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
			<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>

<!-- start-smoth-scrolling -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<!-- //for bootstrap working -->
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script>
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>

<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->




</body>
</html>
