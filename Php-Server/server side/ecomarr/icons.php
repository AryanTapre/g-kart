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
<title>Shoppy an Admin Panel Category Flat Bootstrap Responsive Website Template | Icons :: w3layouts</title>
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
   <div class="boost-icons">
   	       <div class="boost-icons-head">
				 <h2>Icons </h2>
		  </div>
		  <div class="boost-icons-bottom">
				<div class="boost-icons-list">
					<ul>
						<li><i class="glyphicon glyphicon-home" aria-hidden="true"></i> glyphicon-home</li>
						<li><i class="glyphicon glyphicon-asterisk" aria-hidden="true"></i> glyphicon-asterisk</li>
						<li><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> glyphicon-plus</li>
						<li><i class="glyphicon glyphicon-euro" aria-hidden="true"></i> glyphicon-euro</li>
						<li><i class="glyphicon glyphicon-eur" aria-hidden="true"></i> glyphicon-eur</li>
						<li><i class="glyphicon glyphicon-minus" aria-hidden="true"></i> glyphicon-minus</li>
						<li><i class="glyphicon glyphicon-cloud" aria-hidden="true"></i> glyphicon-cloud</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> glyphicon-envelope</li>
						<li><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> glyphicon-pencil</li>
						<li><i class="glyphicon glyphicon-glass" aria-hidden="true"></i> glyphicon-glass</li>
						<li><i class="glyphicon glyphicon-music" aria-hidden="true"></i> glyphicon-music</li>
						<li><i class="glyphicon glyphicon-search" aria-hidden="true"></i> glyphicon-search</li>
						<li><i class="glyphicon glyphicon-heart" aria-hidden="true"></i> glyphicon-heart</li>
						<li><i class="glyphicon glyphicon-star" aria-hidden="true"></i> glyphicon-star</li>
						<li><i class="glyphicon glyphicon-star-empty" aria-hidden="true"></i> glyphicon-star-empty</li>
						<li><i class="glyphicon glyphicon-film" aria-hidden="true"></i> glyphicon-film</li>
						<li><i class="glyphicon glyphicon-th-large" aria-hidden="true"></i> glyphicon-th-large</li>
						<li><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i> glyphicon-th-list</li>
						<li><i class="glyphicon glyphicon-ok" aria-hidden="true"></i> glyphicon-ok</li>
						<li><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> glyphicon-remove</li>
						<li><i class="glyphicon glyphicon-zoom-in" aria-hidden="true"></i> glyphicon-zoom-in</li>
						<li><i class="glyphicon glyphicon-zoom-out" aria-hidden="true"></i> glyphicon-zoom-out</li>
						<li><i class="glyphicon glyphicon-off" aria-hidden="true"></i> glyphicon-off</li>
						<li><i class="glyphicon glyphicon-signal" aria-hidden="true"></i> glyphicon-signal</li>
						<li><i class="glyphicon glyphicon-cog" aria-hidden="true"></i> glyphicon-cog</li>
						<li><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> glyphicon-trash</li>
						<li><i class="glyphicon glyphicon-file" aria-hidden="true"></i> glyphicon-file</li>
						<li><i class="glyphicon glyphicon-road" aria-hidden="true"></i> glyphicon-road</li>
						<li><i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i> glyphicon-download-alt</li>
						<li><i class="glyphicon glyphicon-download" aria-hidden="true"></i> glyphicon-download</li>
						<li><i class="glyphicon glyphicon-upload" aria-hidden="true"></i> glyphicon-upload</li>
						<li><i class="glyphicon glyphicon-inbox" aria-hidden="true"></i> glyphicon-inbox</li>
						<li><i class="glyphicon glyphicon-play-circle" aria-hidden="true"></i> glyphicon-play-circle</li>
						<li><i class="glyphicon glyphicon-repeat" aria-hidden="true"></i> glyphicon-repeat</li>
						<li><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i> glyphicon-refresh</li>
						<li><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> glyphicon-list-alt</li>
						<li><i class="glyphicon glyphicon-lock" aria-hidden="true"></i> glyphicon-lock</li>
						<li><i class="glyphicon glyphicon-flag" aria-hidden="true"></i> glyphicon-flag</li>
						<li><i class="glyphicon glyphicon-headphones" aria-hidden="true"></i> glyphicon-headphones</li>
						<li><i class="glyphicon glyphicon-volume-off" aria-hidden="true"></i> glyphicon-volume-off</li>
						<li><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> glyphicon-trash</li>
						<li><i class="glyphicon glyphicon-file" aria-hidden="true"></i> glyphicon-file</li>
						<li><i class="glyphicon glyphicon-road" aria-hidden="true"></i> glyphicon-road</li>
						<li><i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i> glyphicon-download-alt</li>
						<li><i class="glyphicon glyphicon-download" aria-hidden="true"></i> glyphicon-download</li>
						<li><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> glyphicon-trash</li>
						<li><i class="glyphicon glyphicon-file" aria-hidden="true"></i> glyphicon-file</li>
						<li><i class="glyphicon glyphicon-road" aria-hidden="true"></i> glyphicon-road</li>
						<li><i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i> glyphicon-download-alt</li>
						<li><i class="glyphicon glyphicon-download" aria-hidden="true"></i> glyphicon-download</li>
					</ul>
					<div class="clearfix"> </div>
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


                      
						
