<?php
session_start();
include 'function.php';

if(isset($_POST['Sign_In']))
{
	$username=$_POST['email'];
	$pwd=$_POST['password'];
	$res=admin_login($username,$pwd);
}
 
if(isset($_SESSION['email']))
{
	header('Location:dashboard.php');
}  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <link rel="shortcut icon" type="ico" href="favicon.ico" />
     <link rel="stylesheet" type="text/css" href="examplestyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    input[type="text"] {
      width: 250px;
      height: -90px;
      border: 2px solid #aaa;
      border-radius: 4px;
      margin: 8px 0;
      outline: none;
      padding: 8px;
      box-sizing: border-box;
      transition: 0.3s;
    }

    input[type="password"] {
      width: 250px;
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

    input[type="password"]:focus {
      border-color: dodgerBlue;
      box-shadow: 0 0 8px 0 pink;
    }


    .inputWithIcon input[type="text"] {
      padding-left: 40px;


    }

    .inputWithIcon input[type="password"] {
      padding-left: 40px;
    }

    .inputWithIcon {
      position: relative;
       padding-left: -20px;
    }

    .inputWithIcon i {
      position: absolute;
      left: 0px;
      top: 10px;
      padding: 9px 8px;
      color: #aaa;
      transition: 0.3s;
      height: 42px;
      width: 33px;

    }

    .inputWithIcon input[type="text"]:focus+i {
      color: dodgerBlue;
    }

    .inputWithIcon.inputIconBg i {
      background-color: #aaa;
      color: #fff;
      padding: 9px 4px;
      border-radius: 20px 0 0 20px;
    }
    
    .inputWithIcon.inputIconBg input[type="text"]:focus+i {
      color: #fff;
      background-color: dodgerBlue;
    }

    .inputWithIcon.inputIconBg input[type="password"]:focus+i {
      color: #fff;
      background-color: green;
    }

    .adjust {
      margin-left: -23px;
      margin-bottom: -7px;
    }

    input[type=password] {
      margin-bottom: 20px;

    }

    input[type=submit] {
      margin-left: 16%;
    }
  </style>
</head>

<body class="bgimg">

<?php
if(isset($_GET['msg']))
{

?>
	<div class="alert alert-danger" role="alert">
 			 <strong>Something went wrong! </strong>Enter right credentials and try again.
	</div>

<?php	
}
?>
<?php
if(isset($_GET['msg2']))
{
		
		?>
	<div class="alert alert-success" role="alert">
  			You logged out <strong>successfully</strong>
	</div>
		<?php
}
?>



    <div class="centerdiv">

      <img src="logo.png" height="80px" width="80px" style="border-radius: 50%; " id="logopic">

      <div class="title_gkart">
        <p> Administrator Area </p>
       

      </div>

      <form action="index.php" method="POST">

        <div class="adjust">
          <div class="inputWithIcon inputIconBg">
            <input type="text" placeholder="Your email" name="email" style="border-radius: 20px; ">
            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>
        </div>


        <div class="adjust">
          <div class="inputWithIcon inputIconBg">
            <input type="password" placeholder="Your password" name="password" style="border-radius: 20px">
            <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
          </div>
        </div>


        <input type="submit" name="Sign_In" value="Login" id="input_round_login">
    </div>
    </form>
  </div>
  <div class="footerstyle">
  <?php
  include 'footer.php';
  ?>
</div>

</body>

</html>
						
