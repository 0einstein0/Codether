<?php
include("config.php");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{
    header("location: signin.php");
    exit;
  }

$id =  $_SESSION["username"];

if(isset($_POST['submit'])) {
  $pname = $_POST['pname'];
  $type = $_POST['type'];
  $lang = $_POST['lang'];
 
  $m1 = $_POST['m1'];
  $m2 = $_POST['m2'];
  $m3 = $_POST['m3'];
   
    $res=mysqli_query($mysqli, "INSERT INTO projects(pname,lang,type) VALUES('$pname','$lang','$type' )")
      or die("Could not execute the res query.");

      $p=mysqli_query($mysqli, "SELECT pid FROM projects WHERE pname='$pname' ")
      or die("Could not execute the pid query.");
     $row = mysqli_fetch_row($p);
     $pid = $row[0];

      $add=mysqli_query($mysqli, "INSERT INTO workson(proj,member) VALUES('$pid','$id')")or die("Could not execute the add query.");
      
      if(mysqli_num_rows(mysqli_query($mysqli, "SELECT uname FROM users WHERE uname='$m1' "))==1) {
    $res1=mysqli_query($mysqli, "INSERT INTO workson(proj,member) VALUES('$pid','$m1')")
      or alert("Could not execute the res1 query.");
      }
       if(mysqli_num_rows(mysqli_query($mysqli, "SELECT uname FROM users WHERE uname='$m2' "))==1){
    $res2=mysqli_query($mysqli, "INSERT INTO workson(proj,member) VALUES('$pid','$m2')")
      or alert("Could not execute the res2 query.");
      }
       if(mysqli_num_rows(mysqli_query($mysqli, "SELECT uname FROM users WHERE uname='$m3' "))==1){
    $res3=mysqli_query($mysqli, "INSERT INTO workson(proj,member) VALUES('$pid','$m3')")
      or alert("Could not execute the res3 query.");
      }
     
    echo "Registration successfully";
  header("Location: editor.php?pid=$pid");
}

else {
 echo "Something Went Wrong.";
}

?>

<!DOCTYPE html>
<html>
<!------Head----------->
<head>
  <title>Codether</title>
  <link href="icon2.png" rel="icon">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!------Style----------->
  <style>
  
  form{
   margin-top: 3.125em;
    border-radius: 1em;
   background-color: rgb(0, 0, 0,0.5);
   width: 50%;
   margin-bottom: 2em;
  }

  input[type=text], input[type=password], input[type=date] {
   width: 100%;
   padding: 0.9375em;
   margin: 0.3125em 0 1.375em 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;
   font-family: Exo;
  }

  input[type=text]:focus, input[type=password]:focus {
   background-color: #ddd;
   outline: none;
  }

  select{
      width: 100%;
   padding: 0.9375em;
   margin: 0.3125em 0 1.375em 0;
   display: inline-block;
   border: none;
   color: #343635;
   font-family: Exo;
   background: #f1f1f1;

  }

  hr {
   border: 0.0625em solid #f1f1f1;
   margin-bottom: 1.5625em;
  }


  
  input[type=submit] {
     background-color: orange;
   color: white;
   padding: 0.875em 1.25em;
   margin: 0.5em 0;
   border: none;
   cursor: pointer;
   width: 100%;
   opacity: 0.9;

  font-family: exo;
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
            <a href="register.php">Register</a>
          </li>
          <li>
            <a href="signout.php">Log Out</a>
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
  <form  method="post" action=""   class="col-m-12 col-6" style="border:0.0625em solid #ccc">
    <div class="container">
      <h1 style="text-align: center;">Project</h1>
      <hr>
      <label for="pname"><b>Project Name</b></label> <input name="pname" placeholder="Enter Project Name" required="" type="text">

         <!------DropDown----------->
      <label for="type"><b>Project Type</b></label> <select name="type" >
        <option value=" Mobile Application">
          Mobile Application
        </option>
        <option value="Web Application">
          Web Application
        </option>
        <option value=" Desktop Application">
          Desktop Application
        </option>
        <option value="Database">
          Database
        </option>
        <option value=" Game">
          Game
        </option>
      </select> 
       <!------DropDown----------->
      <label for="lang"><b>Language</b></label> <select name="lang">
        <option  selected  id="js" value="JavaScript">
            JavaScript
          </option>
          <option id="php" value="PHP">
            PHP
          </option>
          <option id="c"  value="C">
            C
          </option>
          <option id="cpp" value="C++">
            C++
          </option>
          <option id="html" value="HTML">
            Html
          </option>
           <option id="mysql" value="MySQL">
            MySQL
          </option>
           <option id="css" value="CSS">
            CSS
          </option>
           <option id="ruby" value="Ruby">
            Ruby
          </option>
           <option id="xml" value="XML">
            XML
          </option>
          <option id="python3" value="Python3">
            Python3
          </option>
          <option id="java" value="Java">
            Java
          </option>
      </select> 
     
        <label for="team"><b>Team Members</b></label> <input name="m1" placeholder="Add Username of Member 1"  type="text">
         <input name="m2" placeholder="Add Username of Member 2"  type="text">
          <input name="m3" placeholder="Add Username of Member 3"  type="text">
          
      <div>
         <!------Button----------->
        <input type="submit" name="submit"  id="submit" 
     value="Create Project">
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