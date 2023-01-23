
<?php

include 'conn.php';
function admin_login($username,$password)
{
	global $conn;
	$sql="SELECT * from admin_ecom where a_email='$username' and a_password='$password'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		
		$row=$result->fetch_array();
		$_SESSION['email']=$row['a_email'];
		// header('location:inbox.php');
	}
	else
	{
		header('location:index.php?msg=you entered wrong credentials');

	}
}       



function fetch_valid_category()
{
	global $conn;
	$sql="SELECT * from category_ecom WHERE c_status='1'";
	$result=$conn->query($sql);
	
	return $result;

}

function checkRegisteredUser()
{
	global $conn;
	$sql = "SELECT * FROM user_ecom";
	$result=$conn->query($sql);

	$back = $result->num_rows;
	echo $back;
	
}

function checkFeedback()
{
	global $conn;
	$sql = "SELECT * FROM feedback_ecom";
	$result = $conn->query($sql);

	$back = $result->num_rows;
	echo $back;
}
?>
    



