<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:index.php');
}
?>



<?php
if(isset($_POST['save']))
{
    include 'conn.php';
    $id=$_POST['id'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $contactno=$_POST['contactno'];
    $dob=$_POST['dob'];
    $profilephoto=$_FILES['profile_photo'];

    $filename=$profilephoto['name'];
    $filepath=$profilephoto['tmp_name'];
    $fileerror=$profilephoto['error'];
    
     if($filename == ""){

                      $sql="UPDATE admin_ecom SET a_name='$name',a_email='$email',a_password='$password',a_contact_no='$contactno',a_address='$address',a_city='$city',a_d_o_b='$dob' where a_id='$id' ";
                      if($conn->query($sql)=== TRUE)
                      {
                        //echo "updated...";
                      }
                      else
                      {
                        //echo "failed to update..";
                      }



     }
     else{

                  if($fileerror==0)
                  {
                    $destfile='admin_upload/'.$filename;
                    move_uploaded_file($filepath,$destfile); 
                    $sql="UPDATE admin_ecom SET a_name='$name',a_email='$email',a_password='$password',a_contact_no='$contactno',a_address='$address',a_city='$city',a_d_o_b='$dob',profile_photo='$destfile' where a_id='$id' ";
                    if($conn->query($sql)=== TRUE)
                    {
                      //echo "updated...";
                    }
                    else
                    {
                      //echo "failed to update..";
                    }
              
                  }

         } 

    // $sql="";
    // if($conn->query($sql) === TRUE)
    // {
    //     header('location:dashboard.php');
    // }
}


?>
<!DOCTYPE html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="profile_style.css" type="text/css">


<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

<link rel="shortcut icon" type="ico" href="favicon.ico" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">     
     -->


<title>profile update </title>
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
.buttonadj{
  margin-top: 10px;
}

.adjust{
  position: relative;
  margin-top:-810px;
  margin-left: 1040px;

}
.adjustprofile{
  position: relative;
  margin-top: -2px;
  margin-left: 100px;
}
.foot{
    margin-top:650px;
}
input[type="email"] {
      width: 250px;
      height: 32px;
      border: 2px solid #aaa;
      border-radius: 4px;
      margin: 8px 0;
      outline: none;
      padding: 8px;
      box-sizing: border-box;
      transition: 0.3s;
    }
.contact{
       width: 250px;
      height: 35px;
      border: 2px solid #aaa;
      border-radius: 4px;
      margin: 8px 0;
      outline: none;
      padding: 8px;
      box-sizing: border-box;
      transition: 0.3s;
      
}

    input[type="email"]:focus {
      box-shadow: 0 0 8px 0 lightskyblue;
    }
    
  
    .adjust_new {
      margin-top: -6px;
    }
    .adjust_new_two{
      margin-top: -8px;
    }
  
    input[type=email] {
      width:100%;
      border-color: lightblue;
    }

.con{
  width:30%;
}



    

</style>
</head>
<body>
<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.html"> <h1>G-Kart</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
						
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
			
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										
											<div class="profile_img">	
												<span class="prfil-img">
                          <?php
                          include 'conn.php';
                          $sql="SELECT profile_photo,a_name from admin_ecom where a_id='64033210'";
                          $result=$conn->query($sql);
                          if($result->num_rows > 0){
                            $row=$result->fetch_array();
                          }
                            ?>
                          <img src="<?php echo $row['profile_photo']?>" alt="" height="70px" width="70px" style="margin-right:-690px; margin-top:5px; position:relative; border-radius:50%" > 
                          <?php

                          ?>
                        
                        </span> 
												<div class="user-name">
                          <div class="adjustprofile">
													<p><?php echo $row['a_name'];?></p>
                          <span>Administrator</span>
                          </div>
                          
					
											
                        <div class="clearfix"></div>	
											</div>	
										</a>
										
									</li>
								</ul>
							</div>
							<!-- <div class="clearfix"> </div>				 -->
						</div>
				     <div class="clearfix"> </div>	
                </div>
                
                

<!-- container starts-->
<div class="col-xl-7 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                  <?php
                  include 'conn.php';
                  $sql="SELECT * from admin_ecom";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0)
                  {
                    $row=$result->fetch_array();
        
                  
                  ?>
                <h6 class="heading-small text-muted mb-4"> information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" >id</label>
                        <input type="text" name="id" id="input-username" class="form-control form-control-alternative" placeholder="" value="<?php echo $row['a_id']; ?>" required >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <!-- <div class="form-group focused">
                        <label class="form-control-label" >Email address</label>
                        <input type="email" name="email" id="input-email" class=" form-control form-control-alternative " placeholder="" value="<?php echo $row['a_email']; ?>" >
                      </div> -->
                      <div class="adjust_new"> 
                      <!-- <div class="form-group focused"> -->
                    <label class="form-control-label" >Email address</label><br>
                     <input type="email"  id="input-email" placeholder="Your email"  name="email" style=" border-size:50px; border-radius: 5px; border-color:lightcyan;" value="<?php echo $row['a_email'];?>" required>
                    <!-- </div> -->
                    </div>
 

                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" >name</label>
                        <input type="text" name="name" id="input-first-name" class="form-control form-control-alternative" placeholder="" value="<?php echo $row['a_name']; ?>" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" >password</label>
                        <input type="password" name="password" id="input-last-name" class="form-control form-control-alternative"  value="<?php echo $row['a_password']; ?>" required>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label">change profile photo</label>
                        <input type="file" name="profile_photo" id="profile-photo" class="form-control form-control-alternative"   style="height: 40px;">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label"> profile photo</label>
                        <input type="text" name="profile_photo-text" id="profile-photo-text" class="form-control form-control-alternative"  value="<?php echo $row['profile_photo']; ?>" style="height: 40px;">
                      </div>
                    </div>

                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" >Address</label>
                        <input type="text" name="address" class="form-control form-control-alternative"  value="<?php echo $row['a_address']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" >City</label>
                        <input type="text" name="city" id="input-city" class="form-control form-control-alternative" placeholder="" value="<?php echo $row['a_city']; ?>" required >
                      </div>
                    </div>

                   
                    
                   

                    
                    <div class="col-lg-11">
                      <div class="form-group">
                        <label class="form-control-label" >Date of birth</label>
                        <input type="date" name="dob" id="input-postal-code" class="form-control form-control-alternative" value="<?php echo $row['a_d_o_b']; ?>" required>
                      </div>
                      
                    </div>
                   

                    <div class="con">
                    <div class="col-lg-12">
                      <div class="form-group focused">
                        <label class="form-control-label" >contact no</label>
                        <input type="text" name="contactno" id="input-contact" class="form-control form-control-alternative" placeholder="" value="<?php echo $row['a_contact_no']; ?>" required>
                      </div>
                    </div>
                    </div><br><br>
                   

                  </div>
                </div>
                <!-- <hr class="my-4"> -->
                <!-- Description -->
                <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div> -->
                <?php
                  }
                  ?>
                

                  <div class="adjust">
                           <div class="form-group mb-0">
                               
                            
                            
                            <input type="submit" class="btn btn-info" onclick="popup()" name="save" value="save changes">
                            <div class="buttonadj">
                            <a href="dashboard.php" class="btn btn-info" style="width: 120px;"> Home</a>
                            </div>
                            <script>
                                function popup(){
                                    alert("profile updated successfully");
                                }
                             </script>                         
                            </div>  
                          </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <!-- <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p> -->
        
            <div class="foot">
                <?php
            include 'footer.php';
            ?>
            </div>
        </div>
      </div>
    </div>
  </footer>         
</body>
</html>