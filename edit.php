<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){
	$uname = mysqli_real_escape_string($mysqli, $_POST['uname']);		
	$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);	
	$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);		
		$result = mysqli_query($mysqli, "UPDATE users SET fname='$fname',lname='$lname', email='$email'  WHERE uname='$uname'");
		
		$mysqli->close();
		
		header("Location: admin.php");
	
}

?>


<?php

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT uname,fname,lname,email from users WHERE uname='$id'");

while($res = mysqli_fetch_array($result)){
	$uname =  $res['uname'];
	$fname =  $res['fname'];	
	$lname = $res['lname'];
	$email =  $res['email'];

}



?>


<html>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	
  body{
     
  background: rgb(88,24,69);
  background: radial-gradient(circle, rgba(88,24,69,1) 0%, rgba(199,0,57,1) 52%, rgba(88,24,69,1) 100%); 
  }

  form{
  	 border-radius: 0.5em;
    background-color: rgb(0, 0, 0,0.5);
  }
    input[type=text] {
     border-radius: 1em;
   width: 100%;
   padding: 0.9375em;
   margin: 0.1em 0 0.1em 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;

  font-family: exo;
  }
</style>
<head>	
	<title>Edit Data</title>
	
</head>

<body>
	<header>
    <div class="row">
      
      <!------NavBar----------->
      <div class="navbar col-12">
        <div class="webname col-m-12 col-8">
          <h1>Codether</h1>
        </div>
       
            <input style="width:10%;font-size: 15px" type="submit" value="Admin" onclick="document.location = 'admin.php'"></input>
          
      </div>
    </div>
  </header>

	<form name="form1" method="post" action="edit.php" style="border:0.0625em solid #ccc; width: 50%;padding: 10px">
		<h1>Edit</h1>
		<table border="0">
			
			<tr> 
				<td>First Name:</td>
				<td><input type="text" required="" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Last Name:</td>
				<td><input type="text" required="" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>Email:</td>
				<td><input type="text" required="" name="email" value="<?php echo $email;?>"></td>
			</tr>
		
				<td><input type="hidden" name="uname" value="<?php echo $uname;?>"></td>
				<td ><input type="submit" required="" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
