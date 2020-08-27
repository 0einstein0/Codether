 <?php
      
include("config.php");
$pid=$_POST['pid']; 
$code=$_POST['code']; 
 $sql="UPDATE projects SET codeFile='$code' WHERE pid='$pid'" ; 

if (mysqli_query($mysqli, $sql)) {
  echo "Record added successfully";
} 
else 
{
    echo "failed";
}
?>

