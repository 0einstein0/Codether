

<!DOCTYPE html>
<html>
<head>
    <title>Codether</title>
    <link rel="icon" href="icon2.png" />
<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 

<!------Style----------->
  <style>


form{
 border-radius: 1em;
  margin-top: 3.125em;
  background-color: rgb(0, 0, 0,0.5);
  width: 50%;
  margin-bottom: 5em;

}
 
#err{
  color: red;
  font-weight: bold;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 0.9375em;
  margin: 0.3125em 0 1.375em 0;
  display: inline-block;
  border: none;
 border-radius: 1em;
font-family: exo;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 0.0625em solid #f1f1f1;
  margin-bottom: 1.5625em;
}

  input[type=submit] {
    
   color: white;
   padding: 0.875em 1.25em;
   margin: 0.5em 0;
   border: none;
   cursor: pointer;
   width: 100%;

  font-family: exo;
   opacity: 0.9;
  }

  input[type=submit]:hover {
   opacity:1;
  }



.container {

  padding: 1em;
  text-align: left;
}




}
</style>

</head>


<!------Body----------->
<body>

 
      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<!------Header----------->
<header>
<div class="row">

  <!------Navbar----------->
  <div class="navbar col-12">
    <div  class="webname col-m-12 col-8 ">
      <h1>Codether</h1>
    </div>
    <ul class=" col-m-12 col-4 ">
      <li><a  href="index.php">Home</a></li>
       <li><a href="index.php#aboutsect">About</a></li>
  <li><a  href="register.php">Register</a></li>
  <li><a class="active" href="signin.php">Log In</a></li>
  <li><a href="index.php#contactsect">Contact</a></li>
    </ul>

  </div>
</div>
</header>

<!------Div for Align----------->
<div class="col-3"></div>

<!------Form----------->
<div class="form">
<form id="lform" class="col-m-12 col-6"  method="post" action=""  style="border:0.0625em solid #ccc">
  <div class=" container">
    <h1>Log In</h1>
 
    <hr>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label>
       <?php
      
include("config.php");
 session_start();
 if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
  header("location: project.php");
 exit;
}
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
  $user = mysqli_real_escape_string($mysqli, $_POST['uname']);
  $pass = mysqli_real_escape_string($mysqli, $_POST['psw']);
 //Checking is user existing in the database or not
  

 $result=mysqli_query($mysqli, "SELECT * FROM `users` WHERE uname='$user' and password=md5('$pass')") or die("Username already exists");    

            // Redirect user to index.php
 if(mysqli_num_rows($result) == 1){
    session_start();
                            
           $_SESSION["logged"] = true;
           $_SESSION["id"] = $id;
           $_SESSION["username"] = $user; 


           if($user === 'admin'){
             header("Location: admin.php");
           } 
           else{
     header("Location: project.php?id=$user");
   }
   }
    else{
      echo "<p id='err'>Username or Password Incorrect</p>";
      
    }
  }
?>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:0.9375em"> Remember me
    </label>
 <p >Don't Have an Account? <a href="register.php" style="color:orange">Register Here</a></p>
    <div >
      
      <!------Button----------->
      <input type="submit" name="submit"  id="submit" class="signupbtn" 
     value="Log In">
    </div>
  </div>

</form>
</div>


<!------Footer----------->
<footer class="col-12 col-m-12" id="contactsect">
<div class="row">
  <h1 >Contact Us</h1>

    <!------Table1----------->
  <div class=" col-8 tab1">
<table >
    <tr><td><img src="img/add.png"></td>
        <td>Silicon Valley<br>California, USA
    </td></tr>
    <tr>
      <td><img src="img/cont.png"></td>
      <td>408-920-5006</td></tr>
    <tr>
      <td><img src="img/email.png"></td>
      <td>fzulfiqar@codether.co.uk</td></tr> 
</table>
</div>

  <!------Table2----------->
<div class=" col-4 tab2">
<table  >
  <tr>
    <td><img src="img/fb.png"></td>
    <td>codether@facebook
  </td></tr>
    <tr>
      <td><img src="img/twi.png"></td>
      <td>codether@twitter</td></tr>
    <tr>
      <td><img src="img/link.png"></td>
      <td>codether@linkedin</td></tr> 
</table>
</div>
</div>
</footer>

</body>
</html>