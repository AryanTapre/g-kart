<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:index.php');
} 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Shoppy an Admin Panel Category Flat Bootstrap Responsive Website Template | Buttons :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--button css-->
<link href="css/demo-page.css" rel="stylesheet" media="all">
<link href="css/hover.css" rel="stylesheet" media="all">
<!--//but-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
			<?php
			include 'header.php';
			?>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
     <div class="buttons-main">
           <div class="progressbar-heading btn-main-heading">
				<h2>Buttons</h2>
			</div>
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>2D Transitions</h4>
					</div>
					<a href="#" class="hvr-grow">Grow</a>
						<a href="#" class="hvr-shrink">Shrink</a>
						<a href="#" class="hvr-pulse">Pulse</a>
						<a href="#" class="hvr-pulse-grow">Pulse Grow</a>
						<a href="#" class="hvr-pulse-shrink">Pulse Shrink</a>
						<a href="#" class="hvr-push">Push</a>
						<a href="#" class="hvr-pop">Pop</a>
						<a href="#" class="hvr-bounce-in">Bounce In</a>
						<a href="#" class="hvr-bounce-out">Bounce Out</a>
						<a href="#" class="hvr-rotate">Rotate</a>
						<a href="#" class="hvr-grow-rotate">Grow Rotate</a>
						<a href="#" class="hvr-float">Float</a>
						<a href="#" class="hvr-sink">Sink</a>
						<a href="#" class="hvr-bob">Bob</a>
						<a href="#" class="hvr-hang">Hang</a>
						<a href="#" class="hvr-skew">Skew</a>
						<a href="#" class="hvr-skew-forward">Skew Forward</a>
						<a href="#" class="hvr-skew-backward">Skew Backward</a>
						<a href="#" class="hvr-wobble-horizontal">Wobble Horizontal</a>
						<a href="#" class="hvr-wobble-vertical">Wobble Vertical</a>
						<a href="#" class="hvr-wobble-to-bottom-right">Wobble To Bottom Right</a>
						<a href="#" class="hvr-wobble-to-top-right">Wobble To Top Right</a>
						<a href="#" class="hvr-wobble-top">Wobble Top</a>
						<a href="#" class="hvr-wobble-bottom">Wobble Bottom</a>
						<a href="#" class="hvr-wobble-skew">Wobble Skew</a>
						<a href="#" class="hvr-buzz">Buzz</a>
						<a href="#" class="hvr-buzz-out">Buzz Out</a>
				</div>	
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Background Transitions</h4>
					</div>
						<a href="#" class="hvr-fade">Fade</a>
						<a href="#" class="hvr-back-pulse">Back Pulse</a>
						<a href="#" class="hvr-sweep-to-right">Sweep To Right</a>
						<a href="#" class="hvr-sweep-to-left">Sweep To Left</a>
						<a href="#" class="hvr-sweep-to-bottom">Sweep To Bottom</a>
						<a href="#" class="hvr-sweep-to-top">Sweep To Top</a>
						<a href="#" class="hvr-bounce-to-right">Bounce To Right</a>
						<a href="#" class="hvr-bounce-to-left">Bounce To Left</a>
						<a href="#" class="hvr-bounce-to-bottom">Bounce To Bottom</a>
						<a href="#" class="hvr-bounce-to-top">Bounce To Top</a>
						<a href="#" class="hvr-radial-out">Radial Out</a>
						<a href="#" class="hvr-radial-in">Radial In</a>
						<a href="#" class="hvr-rectangle-in">Rectangle In</a>
						<a href="#" class="hvr-rectangle-out">Rectangle Out</a>
						<a href="#" class="hvr-shutter-in-horizontal">Shutter In Horizontal</a>
						<a href="#" class="hvr-shutter-out-horizontal">Shutter Out Horizontal</a>
						<a href="#" class="hvr-shutter-in-vertical">Shutter In Vertical</a>
						<a href="#" class="hvr-shutter-out-vertical">Shutter Out Vertical</a>	
				</div>
				
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Icons</h4>
					</div>
						<a href="#" class="hvr-icon-back">Icon Back</a>
						<a href="#" class="hvr-icon-forward">Icon Forward</a>
						<a href="#" class="hvr-icon-down">Icon Down</a>
						<a href="#" class="hvr-icon-up">Icon Up</a>
						<a href="#" class="hvr-icon-spin">Icon Spin</a>
						<a href="#" class="hvr-icon-drop">Icon Drop</a>
						<a href="#" class="hvr-icon-fade">Icon Fade</a>
						<a href="#" class="hvr-icon-float-away">Icon Float Away</a>
						<a href="#" class="hvr-icon-sink-away">Icon Sink Away</a>
						<a href="#" class="hvr-icon-grow">Icon Grow</a>
						<a href="#" class="hvr-icon-shrink">Icon Shrink</a>
						<a href="#" class="hvr-icon-pulse">Icon Pulse</a>
						<a href="#" class="hvr-icon-pulse-grow">Icon Pulse Grow</a>
						<a href="#" class="hvr-icon-pulse-shrink">Icon Pulse Shrink</a>
						<a href="#" class="hvr-icon-push">Icon Push</a>
						<a href="#" class="hvr-icon-pop">Icon Pop</a>
						<a href="#" class="hvr-icon-bounce">Icon Bounce</a>
						<a href="#" class="hvr-icon-rotate">Icon Rotate</a>
						<a href="#" class="hvr-icon-grow-rotate">Icon Grow Rotate</a>
						<a href="#" class="hvr-icon-float">Icon Float</a>
						<a href="#" class="hvr-icon-sink">Icon Sink</a>
						<a href="#" class="hvr-icon-bob">Icon Bob</a>
						<a href="#" class="hvr-icon-hang">Icon Hang</a>
						<a href="#" class="hvr-icon-wobble-horizontal">Icon Wobble Horizontal</a>
						<a href="#" class="hvr-icon-wobble-vertical">Icon Wobble Vertical</a>
						<a href="#" class="hvr-icon-buzz">Icon Buzz</a>
						<a href="#" class="hvr-icon-buzz-out">Icon Buzz Out</a>
				</div>
				
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Border Transitions</h4>
					</div>
						<a href="#" class="hvr-border-fade">Border Fade</a>
						<a href="#" class="hvr-hollow">Hollow</a>
						<a href="#" class="hvr-trim">Trim</a>
						<a href="#" class="hvr-ripple-out">Ripple Out</a>
						<a href="#" class="hvr-ripple-in">Ripple In</a>
						<a href="#" class="hvr-outline-out">Outline Out</a>
						<a href="#" class="hvr-outline-in">Outline In</a>
						<a href="#" class="hvr-round-corners">Round Corners</a>
						<a href="#" class="hvr-underline-from-left">Underline From Left</a>
						<a href="#" class="hvr-underline-from-center">Underline From Center</a>
						<a href="#" class="hvr-underline-from-right">Underline From Right</a>
						<a href="#" class="hvr-reveal">Reveal</a>
						<a href="#" class="hvr-underline-reveal">Underline Reveal</a>
						<a href="#" class="hvr-overline-reveal">Overline Reveal</a>
						<a href="#" class="hvr-overline-from-left">Overline From Left</a>
						<a href="#" class="hvr-overline-from-center">Overline From Center</a>
						<a href="#" class="hvr-overline-from-right">Overline From Right</a>
				</div>
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Shadow and Glow Transitions</h4>
					</div>
						<a href="#" class="hvr-shadow">Shadow</a>
						<a href="#" class="hvr-grow-shadow">Grow Shadow</a>
						<a href="#" class="hvr-float-shadow">Float Shadow</a>
						<a href="#" class="hvr-glow">Glow</a>
						<a href="#" class="hvr-shadow-radial">Shadow Radial</a>
						<a href="#" class="hvr-box-shadow-outset">Box Shadow Outset</a>
						<a href="#" class="hvr-box-shadow-inset">Box Shadow Inset</a>	
				</div>
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Speech Bubbles</h4>
					</div>
						<a href="#" class="hvr-bubble-top">Bubble Top</a>
						<a href="#" class="hvr-bubble-right">Bubble Right</a>
						<a href="#" class="hvr-bubble-bottom">Bubble Bottom</a>
						<a href="#" class="hvr-bubble-left">Bubble Left</a>
						<a href="#" class="hvr-bubble-float-top">Bubble Float Top</a>
						<a href="#" class="hvr-bubble-float-right">Bubble Float Right</a>
						<a href="#" class="hvr-bubble-float-bottom">Bubble Float Bottom</a>
						<a href="#" class="hvr-bubble-float-left">Bubble Float Left</a>
				</div>
				<div class="btn-effcts panel-widget">
					<div class="button-heading">
						<h4>Curls</h4>
					</div>
						<a href="#" class="hvr-curl-top-left">Curl Top Left</a>
						<a href="#" class="hvr-curl-top-right">Curl Top Right</a>
						<a href="#" class="hvr-curl-bottom-right">Curl Bottom Right</a>
						<a href="#" class="hvr-curl-bottom-left">Curl Bottom Left</a>
				</div>
			</div>          
</div>
<!--climate end here-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php
include 'footer.php';
?>
<!--COPY rights end here-->
</div>
<!--slider menu-->
<?php
include 'sidebar.php';
?>
 <!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                    