<?php
session_start();
include 'conn.php';

if(!isset($_SESSION['email']))
{
header('Location:index.php');
}

if(isset($_GET['hide_subcat']))
{
  $c_id=$_GET['hide_subcat'];
  $sql="UPDATE sub_category_ecom set s_c_status='0' WHERE s_c_id='$c_id'";
  if($conn->query($sql) === TRUE)
  {
    header('location:subcategory_list.php?msg=sub category status has been changed');
  }
  else
  {
    header('location:subcategory_list.php?msg=failed to change sub category status');
  }
}

if(isset($_GET['show_subcat']))
{
  $c_id=$_GET['show_subcat'];
  $sql="UPDATE sub_category_ecom set s_c_status='1' WHERE s_c_id='$c_id'";
  if($conn->query($sql) === TRUE)
  {
    header('location:subcategory_list.php?msg=sub category status has been changed');
  }
  else
  {
    header('location:subcategory_list.php?msg=failed to change sub category status');
  }
}


?>
<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "g_kart";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `sub_category_ecom` WHERE `s_c_id` = $sno";
  $result = mysqli_query($conn, $sql);

  if($result)
  {
    header('location:subcategory_list.php?record_delete_true=yes');
  }
  else
  {
    header('location:subcategory_list.php?record_delete_false=no');

  }

}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $id = $_POST["idEdit"];
    $name = $_POST["nameEdit"];
    $description = $_POST["descriptionEdit"];
    $cdate = $_POST["dateEdit"];
    $image=$_FILES['photo'];
    // print_r($image);

    if($image['name'] == "" )
    {
             // Sql query to be executed
            $sql = "UPDATE `sub_category_ecom` SET `s_c_name` = '$name' , `s_c_desc` = '$description', `s_date` = '$cdate' WHERE `s_c_id` = $id";
            $result=$conn->query($sql);
             if($result){
                $update = true;
                header('location:subcategory_list.php?record_update_true=yes');
              }
              else{
                header('location:subcategory_list.php?record_update_false=no');
                  }
    }
    else
    {
      $filename=$image['name'];
      $filepath=$image['tmp_name'];
      $fileerror=$image['error'];
  
      if($fileerror==0){
        $destfile='uploads/'.$filename;
        move_uploaded_file($filepath,$destfile);  
      }

       // Sql query to be executed
         $sql = "UPDATE `sub_category_ecom` SET `s_c_name` = '$name' , `s_c_desc` = '$description', `s_date` = '$cdate',`s_c_pic` = '$destfile' WHERE `s_c_id` = $id";
          $result=$conn->query($sql);
          if($result){
            $update = true;
            }
          else{
            header('location:subcategory_list.php?record_update_false=no');
            }
    }
}
else{
    $title = $_POST["title"];
    $description = $_POST["description"];

  // Sql query to be executed
  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>




<!DOCTYPE HTML>
<html>
<head>
<title>sub category </title>
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
<link rel ="stylesheet" href="E:\Xampp_Software\Setup file\htdocs\ecomarr\css\fontawesome-free-5.15.2-web\css\all.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->



<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
<style>
  .footadjust{
    margin-top: 500px;
  }
  .acceptme{
    /* margin-left: -20px; */
    width: 90%;
    margin-top: 40px;
  }
  .adjustx{
    margin-top: -15px;
  }
  .edit:hover{
    cursor: pointer;
  }
  .delete:hover{
    cursor: pointer;
  }
  .success{
    color: green;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    margin-left: 450px;
  }
  .unsuccess{
    color: red;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    margin-left: 450px;
  }
  
</style>
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
			<?php include 'header.php'; ?>	
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

                                         <!-- Edit Modal -->
                                         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="editModalLabel">Edit this Record</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                       <div class="adjustx">
                                                    <span aria-hidden="true" >X</span>
                                                       </div>
                                                  </button>
                                                </div>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                    <input type="hidden" name="snoEdit" id="snoEdit">

                                                    <div class="form-group">
                                                      <label for="title" hidden>Id</label>
                                                      <input type="hidden" class="form-control" id="idEdit" name="idEdit" aria-describedby="emailHelp">
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="title">Name</label>
                                                      <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="desc"> Description</label>
                                                      <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="desc"> Date</label>
                                                      <input type="date" class="form-control" id="dateEdit" name="dateEdit" >
                                                    </div>

                                                    <!-- <div class="form-group">
                                                      <label for="desc"> Image</label>
                                                      <input type="text" class="form-control" id="imageEdit" name="imageEdit" >
                                                    </div> -->

                                                    <div class="form-group">
                                                      <label for="desc"> Change Image</label>
                                                      <input type="file" class="form-control" id="change" name="photo" >
                                                    </div>
                                                    
                                                  </div>
                                                  <div class="modal-footer d-block mr-auto">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>



                                            <?php
                                            if($insert){
                                              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              <strong>Success!</strong> Your note has been inserted successfully
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";
                                            }
                                            ?>
                                            <?php
                                            if($delete){
                                              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              <strong>Success!</strong> Your record has been deleted successfully
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";
                                            }
                                            ?>
                                            <?php
                                            if($update){
                                              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              <strong>Success!</strong> Your record has been updated successfully
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";
                                            }
                                            



                                            if(isset($_GET['record_update_true'] )== "yes")
                                             {
                                               ?>
                                              <p class="success">One Record Affected... </p>
                                              <?php
                                             } 
                                             if(isset($_GET['record_update_false']) == "no")
                                             {
                                              ?>
                                              <p class="unsuccess">Failed To Update One Record...</p>
                                              <?php
                                             }

                                             if(isset($_GET['record_delete_false']) == "no")
                                             {
                                              ?>
                                              <p class="unsuccess">Failed To Delete One Record...</p>
                                              <?php
                                             }

                                             if(isset($_GET['record_delete_true']) == "yes")
                                             {
                                              ?>
                                              <p class="success"> One Record Deleted...</p>
                                              <?php
                                             }



                                             ?>

                                            <div class="container my-5 acceptme">


                                              <table  id="myTable" class="mytable" >
                                                <thead>
                                                  <tr>
                                                  <th scope="col" hidden>sub category id</th>
                                                    <th scope="col">Sub Category Name</th>
                                                    <th scope="col">Category Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Actions</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                    $sql = "SELECT * FROM sub_category_ecom JOIN category_ecom ON sub_category_ecom.c_id=category_ecom.c_id";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                      ?>
                                                      <td hidden> <?php echo $row['s_c_id']?></td>
                                                      <td> <?php echo $row['s_c_name']?></td>
                                                      <td> <?php echo $row['c_name']?></td>
                                                      <td> <?php echo $row['s_c_desc']?></td>
                                                       <td> <?php echo $row['s_date']?></td>
                                                      <td> 
                                                      <?php
                                                           if($row['s_c_status'] == '1' )
                                                           {
                                                                ?>
                                                                <a href="subcategory_list.php?hide_subcat=<?php echo $row['s_c_id'];?>">Hide</a>
                                                                <?php
                                                           }
                                                           else
                                                           {
                                                                ?>
                                                                <a href="subcategory_list.php?show_subcat=<?php echo $row['s_c_id'];?>">Show</a>
                                                                <?php
                                                           }
                                                           ?>
                                                      
                                                      
                                                      
                                                      </td>
                                                      <td> <img src="<?php echo $row['s_c_pic']?>" height="40px" width="40px" alt="sub category pic"></td>
                                                      
                                                      <td> <i class='edit fa fa-edit' id="<?php echo $row['s_c_id'];?>"></i> &nbsp; &nbsp; &nbsp; &nbsp; <i class='delete fa fa-trash' id="d<?php echo $row['s_c_id'];?>"></i>  </td>
                                                    </tr>
                                                    <?php
                                                  } 
                                                    ?>


                                                </tbody>
                                              </table>
                                            </div>
                                            <hr>
                                            <!-- Optional JavaScript -->
                                            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                                            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                                              integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                                              crossorigin="anonymous"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                                              integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                                              crossorigin="anonymous"></script>
                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                                              integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                                              crossorigin="anonymous"></script>
                                            <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                                            <script>
                                              $(document).ready(function () {
                                                $('#myTable').DataTable();

                                              });
                                            </script>
                                            <script>
                                              edits = document.getElementsByClassName('edit');
                                                  Array.from(edits).forEach((element) => {
                                                  element.addEventListener("click", (e) => {
                                                    console.log("edit ");
                                                    tr = e.target.parentNode.parentNode;
                                                    id = tr.getElementsByTagName("td")[0].innerText;
                                                    title = tr.getElementsByTagName("td")[1].innerText;
                                                    description = tr.getElementsByTagName("td")[3].innerText;
                                                    cdate = tr.getElementsByTagName("td")[4].innerText;
                                                    // cimage = tr.getElementsByTagName("td")[5].innerText;
                                                  
                                                    console.log(title, description);
                                                    idEdit.value=id;
                                                    nameEdit.value = title;
                                                    descriptionEdit.value = description;
                                                    dateEdit.value = cdate;
                                                    // imageEdit.value=cimage;
                                                
                                                  
                                                    snoEdit.value = e.target.id;
                                                    console.log(e.target.id)
                                                    $('#editModal').modal('toggle');
                                                  })
                                                })


                                              deletes = document.getElementsByClassName('delete');
                                              Array.from(deletes).forEach((element) => {
                                                element.addEventListener("click", (e) => {
                                                  console.log("edit ");
                                                  sno = e.target.id.substr(1);

                                                  if (confirm("Are you sure you want to delete this note!")) {
                                                    console.log("yes");
                                                    window.location = `/ecomarr/subcategory_list.php?delete=${sno}`;
                                                    // TODO: Create a form and use post request to submit a form
                                                  }
                                                  else {
                                                    console.log("no");
                                                  }
                                                })
                                              })
                                            </script>



















</div>
<!--market updates updates-->
	
<!--market updates end here-->
<!--mainpage chit-chating-->

<!--main page chit chating end here-->
<!--main page chart start here-->

<!--main page chart layer2-->
<div class="chart-layer-2">
	
	<div class="col-md-6 chart-layer2-right">
 
	</div>
	<div class="col-md-6 chart-layer2-left">
		<div class="">			
				
				
						<script>
							var radarChartData = {
								labels : ["","","","","","",""],
								datasets : [
									{
										fillColor : "rgba(104, 174, 0, 0.83)",
										strokeColor : "#68ae00",
										pointColor : "#68ae00",
										pointStrokeColor : "#fff",
										data : [65,59,90,81,56,55,40]
									},
									{
										fillColor : "rgba(236, 133, 38, 0.82)",
										strokeColor : "#ec8526",
										pointColor : "#ec8526",
										pointStrokeColor : "#fff",
										data : [28,48,40,19,96,27,100]
									}
								]
								
							};
							new Chart(document.getElementById("radar").getContext("2d")).Radar(radarChartData);
						</script>
		</div>
	</div>
  <div class="clearfix"> </div>
</div>

<!--climate start here-->
<div class="">
	<div class="col-md-4 climate-grids">
		<div class="">
			<div class="">
				<div class="col-md-6 ">
					
										  
								</div>
				<div class="clearfix"> </div>
			</div>
			<div class="">
				<div class="col-md-4 ">
					
					</div>
					<div class="col-md-4 ">
				
					</div>
					<div class="col-md-4 ">
				
					</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="col-md-4 ">
		
	</div>
	<div class="col-md-4 ">
		<div class="">
			<div class="">
			
				<div class="col-md-6 ">
			
				</div>
			  <div class="clearfix"> </div>
			</div>
			<div class="">
				
			
			  <div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
<!--climate end here-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="footadjust">
<?php include 'footer.php';?>	
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <?php include 'sidebar.php';?>
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