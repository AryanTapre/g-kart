<?php
require_once "conn.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($conn,"SELECT * FROM sub_category_ecom where c_id = $category_id");
?>
<option value="">Select sub category</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["s_c_id"];?>"><?php echo $row["s_c_name"];?></option>
<?php
}
?>