<html>
<head>



<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
<title>G-Kart-Admin Panel </title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->

 <style>
div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
        margin-top: 100px;
    }
    
</style>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>
</head>
<body>
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                                                    <th scope="col">Category Name</th>
                                                    <th scope="col">Sub Category Name</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php 
                                                    include 'conn.php';
                                                    $sql = "SELECT * FROM category_ecom join sub_category_ecom ON category_ecom.c_id=26 AND sub_category_ecom.c_id=26 JOIN product_ecom ON sub_category_ecom.c_id=26 AND product_ecom.c_id=26";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                       ?>
                                                      
                                                      <td> <?php echo $row['c_name']?></td>
                                                      <td> <?php echo $row['s_c_name']?></td>
                                                      <td> <?php echo $row['p_name']?></td>
                                                      <td> <?php echo $row['p_code']?></td>
                                                      <td> <?php echo $row['p_stock']?></td>
                                                      <td> <?php echo $row['p_price']?></td>
                                                      <td> <?php echo $row['p_desc']?></td>
                                                      <td> <?php echo $row['p_date']?></td>
                                                      <td> 
                                                           <?php
                                                           if( $row['p_status'] == '1')
                                                           {
                                                                ?>
                                                                <a href="product_list.php">Hide</a>
                                                                <?php
                                                           }
                                                           else
                                                           {
                                                                ?>
                                                                <a href="">Show</a>
                                                                <?php
                                                           }
                                                           ?>
                                                      
                                                      
                                                      
                                                      
                                                      </td>
                                                      <td> <img src="<?php echo $row['p_image']?>" height="40px" width="40px" alt="product pic"></td>
                                                      
                                                      <td> me</td>
                                                    </tr>
                                                    <?php 
                                                  } 
                                                    ?>
                                                   







  
            </tr>
        </tbody>
    </table>
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
</body>
</html>