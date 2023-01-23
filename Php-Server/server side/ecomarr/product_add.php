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
$name=$_POST['product_name'];
$code=$_POST['product_code'];
$stock=$_POST['product_stock'];
$price=$_POST['product_price'];
$desc=$_POST['product_desc'];
$category_id=$_POST['categoryid'];
$subcategory_id=$_POST['subcategoryid'];
$status=$_POST['statusproduct'];

date_default_timezone_set('asia/kolkata');
$today=date('y-m-d');

// PRODUCT COVER IMAGE
$target_dir = "product_uploads/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);

// PRODUCT MULTIPLE IMAGE 
$t1 = $_FILES["product_multiple_image"]["name"];

$target_file1 = $target_dir . $t1;



$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));






            // Check if file already exists
            if (file_exists($target_file) && file_exists($target_file1) )
            {
                header('location:product_add.php?msg_image_already_exists');
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["product_image"]["size"] > 500000 && $_FILES['product_multiple_image']['size'] > 500000)
            {
                header('location:product_add.php?msg_image_too_large=success');
              $uploadOk = 0;
            }  

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
            && $imageFileType1 != "gif") 
            {
              header('location:product_add.php?msg_image_format_mismatch=success');
              $uploadOk = 0;
            }
            
            

// Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) 
  {
    header('location:product_add.php?msg_image_not_uploaded=success');
                // if everything is ok, try to upload file
  } 
  else 
  {

                if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) 
                {
                      $sql="INSERT INTO `product_ecom`( `c_id`, `s_c_id`, `p_name`,  `p_code`, `p_status`, `p_date`, `p_image`, `p_stock`, `p_price`, `p_desc`) VALUES ('$category_id','$subcategory_id','$name','$code','$status','$today','$target_file','$stock','$price','$desc')";
    
                      if($conn->query($sql)=== TRUE)
                      {
                            $last_id = $conn->insert_id;
                                //multiple image
                                $countfiles = count($_FILES['product_multiple_image']['name']);

                                // Looping all files
                                for($i=0;$i<$countfiles;$i++)
                                {
                                
                                 $filename = $_FILES['product_multiple_image']['name'][$i];
                                
                                 // Upload file
                                 move_uploaded_file($_FILES['product_multiple_image']['tmp_name'][$i],$dir.$filename);
                                 $sql = "INSERT INTO `product_gallery`( `p_id`, `p_image`, `p_status`, `p_date`) VALUES ('$last_id','$target_dir.$filename','$status','$today')";
                                 $result = $conn->query($sql);
                                
                                }

                                if($result)
                                {
                                  header('location:product_add.php?msg_pass=success'); 
                                }
                                else
                                {
                                  header('location:product_add.php?msg_fail=success1');  
                                }
                 
                      } 
                }

               else 
               {
                    header('location:product_add.php?msg_fail=success2');
               }
 }

}
?>







<!DOCTYPE HTML>
<html>
<head>
<title>Add product</title>

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
<!-- ajax link-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--//skycons-icons-->
<style>
.blankpage-main{
  height: 720px;
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
            <a href="product_list.php">list products</a>
        </div>
        
    	<div class="blankpage-main">

        <?php
if(isset($_GET['msg_pass']))
{

?>
	        <div class="runtime">
                <strong>one product added</strong> 
            </div>
            

<?php	
}
?> 
<?php
if(isset($_GET['msg_fail']))
{

?>
	        <div class="runtime2">
                <strong>failed to add a product</strong> 
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
        <form action="product_add.php" method="POST" enctype="multipart/form-data">
       
            <div class="adjust">
                <select class="textstyle form-control mak" style="width: 250px; height:30px; padding:4px;" required name="categoryid" id="categoryid">
                      <option>select category</option>
                      <?php
                         while($row=$response->fetch_array())
                         {
                      ?>
                        <option value="<?php echo $row['c_id'];?>"><?php echo  $row['c_name'];?></option>
                      <?php
                 }
                 ?>
                </select>

                <select class="textstyle form-control mak" style="width: 250px; height:30px; padding:4px;" required name="subcategoryid" id="subcategoryid">
                        
                </select>

                <input type="text" placeholder="product name" name="product_name" style="border-radius: 5px;" class="textstyle" required><br>
                <input type="text" placeholder="product code" name="product_code" style="border-radius: 5px;" class="textstyle" required><br>
                <input type="text" placeholder="product stock" name="product_stock" style="border-radius: 5px;" class="textstyle" required><br>
                <input type="text" placeholder="product price" name="product_price" style="border-radius: 5px;" class="textstyle" required><br>
                <input type="text" placeholder="product description" name="product_desc" style="border-radius: 5px;" class="textstyle" required><br>
                <select name="statusproduct" class="textstyle form-control mak" style="width: 250px; height:30px; padding:4px;" required >
                    <option>status</option>
                    <option value="1">show</option>
                    <option value="0">hide</option>
                </select><br>
                <p style="color:green;font-size: small;">Product Cover Image(Only 1)</p>
                <input type="file" placeholder="select image" name="product_image" required  ><br>
                <p style="color:green;font-size: small;">Product Multiple Images</p>
                <input type="file" placeholder="select multiple image" name="product_multiple_image[]" required multiple ><br>
                <input type="submit" name="submit" value="Add product" class="btn btn-info">   
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

<script>

$(document).ready(function() {
$('#categoryid').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#subcategoryid").html(result);

}
});
}); 
});

</script>

</body>
</html>




                      
						
