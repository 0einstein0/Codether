<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table

$sql = "DELETE FROM users WHERE uname='$id'";

if (mysqli_query($mysqli, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "<script>alert('Cannot delete record: A Foreign Key constraint violated');</script>";
}


$mysqli->close();


header("Location:admin.php");
?>


