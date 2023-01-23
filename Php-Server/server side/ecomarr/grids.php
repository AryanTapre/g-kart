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
<title>Shoppy an Admin Panel Category Flat Bootstrap Responsive Website Template | Grids :: w3layouts</title>
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
<!--//skycons-icons-->
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
    <div class="cols-grids panel-widget">
    	<h2>Grids</h2>
		<div class="chute chute-center text-center">
				<div class="row mb40">
					<div class="col-md-12">
						<div class="demo-grid">
							<code>.col-md-12</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-6">
						<div class="demo-grid">
							<code>.col-md-6</code>
						</div>
					</div>
					<div class="col-md-6">
						<div class="demo-grid">
							<code>.col-md-6</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-4">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
				</div>

				<div class="row mb40">
					<div class="col-md-8 mb5">
						<div class="demo-grid">
							<code>.col-md-8</code>
						</div>
					</div>
					<div class="col-md-4 mb5">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
					<div class="col-md-3 mb5">
						<div class="demo-grid">
							<code>.col-md-3</code>
						</div>
					</div>
					<div class="col-md-6 mb5">
						<div class="demo-grid">
							<code>.col-md-6</code>
						</div>
					</div>
				</div>
				<div class="row mb40">
					<div class="col-md-8 mb5">
						<div class="demo-grid">
							<code>.col-md-8</code>
						</div>
					</div>
					<div class="col-md-4 mb5">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>

				</div>
				<div class="row mb40">
					<div class="col-md-4">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-2">
						<div class="demo-grid">
							<code>.col-md-2</code>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<code>.col-md-4</code>
						</div>
					</div>
				</div>
		  </div>
	 </div>	
</div>
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

              
