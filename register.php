
<!DOCTYPE html>

<html>
<!------Head----------->
<head>
  <title>Codether</title>
  <link href="icon2.png" rel="icon">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

  <script type="text/javascript">

function check(email,pass1,pass2){

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

if(email.value.match(mailformat))
{
 email.setCustomValidity("");
 if(pass1.value.match(passw)) 
{  pass1.setCustomValidity("");
    if(pass1.value==pass2.value){
   
<?php
include("config.php");

if(isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['psw1'];

  
    mysqli_query($mysqli, "INSERT INTO users(uname,fname,lname, email, password) VALUES('$uname','$fname','$lname', '$email', md5('$pass'))")
      or die("Username or Email already exists");
      
    
    header("Location: signin.php");
  
} else {
  echo "Something Went Wrong.";
}
?>

    return;
  }
  else{
    pass2.setCustomValidity("Passwords do not match");
    return;
  }
}
else{
   pass1.setCustomValidity("Passwords must contain 6-20 characters,at least one number,at least one uppercase letter and one lowercase letter");
 return;
 }
}
else{
  
    email.setCustomValidity("Enter Correct Email");
return;
 }
 return;
}
</script>
  <!------Style----------->
  <style>
 
.error {
  color: red;
  margin-left: 5px;
}

label.error {
  display: inline;
}
  form{
     border-radius: 1em;
   margin-top: 3.125em;
   background-color: rgb(0, 0, 0,0.5);
   width: 50%;
   margin-bottom: 2em;
  }
  
  input[type=text], input[type=password] {
     border-radius: 1em;
   width: 100%;
   padding: 0.9375em;
   margin: 0.3125em 0 1.375em 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;

  font-family: exo;
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
  <!------Style----------->
</head>

<!------Body----------->
<body>
 
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <!------Header----------->
  <header>
    <div class="row">
      
      <!------NavBar----------->
      <div class="navbar col-12">
        <div class="webname col-m-12 col-8">
          <h1>Codether</h1>
        </div>
        <ul class=" col-m-12 col-4">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="index.php#aboutsect">About</a>
          </li>
          <li>
            <a class="active" href="register.php">Register</a>
          </li>
          <li>
            <a href="signin.php">Log In</a>
          </li>
          <li>
            <a href="index.php#contactsect">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

   <!------Div for Align----------->
  <div class="col-3"></div>

   <!------Form----------->
  <form name="regform" id="regform" action="" method="post"  class="col-m-12 col-6" style="border:0.0625em solid #ccc">
    <div class="container">
      <h1>Register</h1>
      <hr>
      <label  for="fname"><b>First Name</b></label> <input name="fname" required="" id="fname" placeholder="Enter First Name"  type="text"> 
      <label for="lname"><b>Last Name</b></label> <input name="lname" id="lname" placeholder="Enter Last Name" required="" type="text" > 
      <label for="uname"><b>Username</b></label> <input name="uname" required="" id="uname" placeholder="Enter Username"  type="text"> 
      <label id="msg" for="email"><b>Email</b></label> <input name="email" id="email"  placeholder="Enter Email" required="" type="text"> 
      <label for="psw"><b>Password</b></label> <input name="psw1" id="psw1"   placeholder="Enter Password" required="" type="password"> 
      <label for="psw-repeat"><b>Repeat Password</b></label> <input name="psw2" id="psw2"  placeholder="Repeat Password" required="" type="password">
      <p>Already a User? <a href="signin.php" style="color:orange">Log In Here</a></p>
      <div>
        <input name="submit" id="submit" class="register" type="submit" value="Register" onclick="check(document.regform.email,document.regform.psw1,document.regform.psw2)">
      </div>
    </div>
  </form>

  <!------Footer----------->
  <footer class="col-12 col-m-12" id="contactsect">
    <div class="row">
      <h1>Contact Us</h1>

       <!------Table1----------->
      <div class=" col-8 tab1">
        <table>
          <tr>
            <td><img src="img/add.png"></td>
            <td>Silicon Valley<br>
            California, USA</td>
          </tr>
          <tr>
            <td><img src="img/cont.png"></td>
            <td>408-920-5006</td>
          </tr>
          <tr>
            <td><img src="img/email.png"></td>
            <td>fzulfiqar@codether.co.uk</td>
          </tr>
        </table>
      </div>

       <!------Table2----------->
      <div class=" col-4 tab2">
        <table>
          <tr>
            <td><img src="img/fb.png"></td>
            <td>codether@facebook</td>
          </tr>
          <tr>
            <td><img src="img/twi.png"></td>
            <td>codether@twitter</td>
          </tr>
          <tr>
            <td><img src="img/link.png"></td>
            <td>codether@linkedin</td>
          </tr>
        </table>
      </div>
    </div>
  </footer>
</body>
</html>