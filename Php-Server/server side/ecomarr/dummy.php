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
  $sql = "DELETE FROM `category_ecom` WHERE `c_id` = $sno";
  $result = mysqli_query($conn, $sql);
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
            $sql = "UPDATE `category_ecom` SET `c_name` = '$name' , `c_desc` = '$description', `c_date` = '$cdate' WHERE `c_id` = $id";
            $result=$conn->query($sql);
             if($result){
                $update = true;
              }
              else{
                echo "Your record is not updated  successfully";
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
         $sql = "UPDATE `category_ecom` SET `c_name` = '$name' , `c_desc` = '$description', `c_date` = '$cdate',`c_image` = '$destfile' WHERE `c_id` = $id";
          $result=$conn->query($sql);
          if($result){
            $update = true;
            }
          else{
            echo "We could not update the record successfully";
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

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>list category</title>


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

            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
          <!--//skycons-icons-->



<style>
.me{
  margin-left: 15%;
}
.foot{
  margin-top: 30%;
}
</style>




</head>

<body>
  <?php
  include 'header.php';
  ?>

  

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">

            <div class="form-group">
              <label for="title">Id</label>
              <input type="text" class="form-control" id="idEdit" name="idEdit" aria-describedby="emailHelp">
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

            <div class="form-group">
              <label for="desc"> Image</label>
              <input type="text" class="form-control" id="imageEdit" name="imageEdit" >
            </div>

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
  ?>

  <div class="container my-4 me">

  
    <table class="table" id="myTable" >
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
          <th scope="col">Image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `category_ecom`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>". $row['c_id'] . "</td>
            <td>". $row['c_name'] . "</td>
            <td>". $row['c_desc'] . "</td>
            <td>". $row['c_date'] . "</td>
            <td>". $row['c_status'] . "</td>
            <td>". $row['c_image'] . "</td>
            
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['c_id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['c_id'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <?php
  include 'sidebar.php';
  ?>
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
        description = tr.getElementsByTagName("td")[2].innerText;
        cdate = tr.getElementsByTagName("td")[3].innerText;
        cimage = tr.getElementsByTagName("td")[5].innerText;
       
        console.log(title, description);
        idEdit.value=id;
        nameEdit.value = title;
        descriptionEdit.value = description;
        dateEdit.value = cdate;
        imageEdit.value=cimage;
    
      
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
          window.location = `/ecomarr/dummy.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>

  <div class="foot">
  <?php
  include 'footer.php';
  ?>
  </div>
</body>

</html>
