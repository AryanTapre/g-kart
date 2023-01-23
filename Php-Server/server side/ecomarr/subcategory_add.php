<?php
session_start();
include 'function.php';
if(!isset($_SESSION['email']))
{
	header('location:index.php');
}

 
$response=fetch_valid_category();
?>

<?php
if(isset($_POST['submit'])){
include 'conn.php';
$name=$_POST['sub_cat_name'];
$desc=$_POST['sub_cat_desc'];
$status=$_POST['statuscategory'];   
$category_id=$_POST['categoryid'];       
date_default_timezone_set('asia/kolkata');
$today=date('y-m-d');


$target_dir = "subcategory_upload/";
$target_file = $target_dir . basename($_FILES["sub_cat_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["sub_cat_image"]["tmp_name"]);
  if($check !== false) {
   
    $uploadOk = 1;
  } else {
    header('location:subcategory_add.php?msg_image_not=success');
    
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    header('location:subcategory_add.php?msg_image_already_exists');
  $uploadOk = 0;
}

// Check file size
if ($_FILES["sub_cat_image"]["size"] > 500000) {
    header('location:subcategory_add.php?msg_image_too_large=success');
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header('location:subcategory_add.php?msg_image_format_mismatch=success');
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // header('location:category_add.php?msg_image_not_uploaded=success');

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["sub_cat_image"]["tmp_name"], $target_file)) {
   

    $sql="INSERT INTO `sub_category_ecom`(`s_c_name`, `s_c_pic`, `s_c_status`, `s_c_desc`, `c_id`,`s_date`) VALUES ('$name','$target_file','$status','$desc','$category_id','$today')";
    $conn->query($sql);
            header('location:subcategory_add.php?msg_pass=success');
  } else {
    header('location:subcategory_add.php?msg_fail=success');
  }
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add  sub category</title>

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
<style>
.blankpage-main{
  height: 350px;
        position: relative;
        width: 700px;
        left: 18%;
}
.child{
        position: absolute;
        top: 15%;
        left: 37%;
       
    }
    
.btn:hover {
background-color: green;

}
    
      .textstyle{
      width: 250px;
      height: 30px;
      border: 2px solid #aaa;
      border-radius: 4px;
      margin: 8px 0;
      outline: none;
      padding: 8px;
      box-sizing: border-box;
      transition: 0.3s;
      
    }
    input[type="text"]:focus {
      border-color: dodgerBlue;
      box-shadow: 0 0 8px 0 pink;
    }
    input[type="submit"]:focus {
      border-color: dodgerBlue;
      box-shadow: 0 0 8px 0 pink;
    }
      .adjust {
      margin-left: -23px;
      margin-bottom: -7px;
    } 
    .list_cat{
        margin-left: 800px;
        position: absolute;
        margin-top: -28px;
    }
    .runtime{
        margin-left: 240px;
        position: absolute;
        margin-top: -18px;
        color:green;
    }
    .runtime2{
        margin-left: 240px;
        position: absolute;
        margin-top: -18px;
        color:red;
    }
    .adjustdropdown{
      /* border-color: dodgerBlue;
      box-shadow: 0 0 8px 0 pink; */
    }
    input[type="select"]:focus {
      border-color: pink;
      box-shadow: 0 0 8px 0 pink;
    }
   
</style>
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
    <div class="blank">

	        

     
        <div class="list_cat">
            <a href="subcategory_list.php">list category</a>
        </div>
        
    	<div class="blankpage-main">

        <?php
if(isset($_GET['msg_pass']))
{

?>
	        <div class="runtime">
                <strong>one category added</strong> 
            </div>
            

<?php	
}
?> 
<?php
if(isset($_GET['msg_fail']))
{

?>
	        <div class="runtime2">
                <strong>failed to add a category</strong> 
            </div>

<?php	
}
?>
<?php
if(isset($_GET['msg_image_already_exists']))
{

?>
	<div class="runtime2">
 			 <strong>Sorry, file already exists.<strong>
	</div>

<?php	
}
?>
<?php
if(isset($_GET['msg_image_not']))
{

?>
	<div class="runtime2">
 			 <strong>File is not an image<strong>
	</div>

<?php	
}
?>
<?php
if(isset($_GET['msg_image_too_large']))
{

?>
	<div class="runtime2">
 			 <strong>Sorry, your file is too large.<strong>maximum size is 10 MB
	</div>

<?php	
}
?>
<?php
if(isset($_GET['msg_image_format_mismatch']))
{

?>
	<div class="runtime2" >
 			 <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<strong>
	</div>

<?php	
}
?>
<?php
if(isset($_GET['msg_image_not_uploaded']))
{

?>
	<div class="runtime2" >
 			 <strong>Sorry, your file was not uploaded.<strong>
	</div>

<?php	
}
?>

        
      <div class="child">
        <form action="subcategory_add.php" method="POST" enctype="multipart/form-data">
       
            <div class="adjust">
                <select class="textstyle form-control mak" style="width: 250px; height:30px; padding:4px;" required name="categoryid">
                  <option >select category</option>
                 <?php
                 while($row=$response->fetch_array())
                 {
                   ?>
                    <option value="<?php echo $row['c_id'];?>"><?php echo  $row['c_name'];?></option>
                    <?php
                 }
                 ?>  
      
                </select>
                <input type="text" placeholder="sub category name" name="sub_cat_name" style="border-radius: 5px;" class="textstyle" required><br>
                <input type="text" placeholder="sub category description" name="sub_cat_desc" style="border-radius: 5px;" class="textstyle" required><br>
               
                <select name="statuscategory" class="textstyle form-control mak" style="width: 250px; height:30px; padding:4px;" required >
                    <option>status</option>
                    <option value="1">show</option>
                    <option value="0">hide</option>
                </select>
                <input type="file" placeholder="select image" name="sub_cat_image" required><br>
                <input type="submit" name="submit" value="Add sub category" class="btn btn-info">   
            </div>  
        </form>
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

    


                      
						
