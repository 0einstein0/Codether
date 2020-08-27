<!DOCTYPE html>
<?php
// including the database connection file
include_once("config.php");
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{
    header("location: signin.php");
    exit;
  }


$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE uname='$id' ");

while($res = mysqli_fetch_array($result)){
  $uname =  $res['uname'];
  $fname =  $res['fname'];  
  $lname =  $res['lname'];
  }
  $proj=mysqli_query($mysqli, "SELECT pname,pid,lang FROM projects as p, workson w WHERE p.pid=w.proj && w.member='$id'");  

$data = array();
$data1 = array();
$data2 = array();
while ($row = mysqli_fetch_assoc($proj)) {
$data[] = $row['pname'];
$data1[] = $row['lang'];
$data2[] = $row['pid'];
}


$m1 = $data[0];$m11 = $data1[0];$m111 = $data2[0];
$m2 = $data[1];$m22 = $data1[1];$m222 = $data2[1];
$m3 = $data[2];$m33 = $data1[2];$m333 = $data2[2];
$m4 = $data[3];$m44 = $data1[3];$m444 = $data2[3];


?>
<html>

<!------Head----------->
<head>
  <title>Codether</title>
  <link href="icon2.png" rel="icon">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!------Style----------->
  <style>


   @media only screen and (max-width: 780px) {
   /* For mob: */
   .col-m-1 {width: 8.33%;}
   .col-m-2 {width: 16.66%;}
   .col-m-3 {width: 25%;}
   .col-m-4 {width: 33.33%;}
   .col-m-5 {width: 41.66%;}
   .col-m-6 {width: 50%;}
   .col-m-7 {width: 58.33%;}
   .col-m-8 {width: 66.66%;}
   .col-m-9 {width: 75%;}
   .col-m-10 {width: 83.33%;}
   .col-m-11 {width: 91.66%;}
   .col-m-12 {width: 100%;}
  .name{
   position: relative;
   margin-top:20em;
   text-align: center;
  left: 15em;
  }
  .user img{
   position: relative;
   margin-top:-10em;
  }
  .mproj{
    position: relative;
   top: -3.4em;
  }
  .projs{
   margin-left:-5em;

  }
  .extra img{
   float: left;
  margin-left: -2em;
  }

  .interest ul{
   font-size:0.8em; 
   margin-top: -1em;
   margin-left: -4em;
   margin-right: 8em;
  }
  .projs p{
   position: relative;
   top: -2em;
   margin-left: 1em;
  }
  .extra{
   margin-top:-6em;
   font-size: 0.7em;
  }
   #detail{
     clear: both;
  display: none;
   }
   .userside{

  position: relative;
  text-align: center;
  left:-3em;
   }
  }


  body{
     
  background: rgb(88,24,69);
  background: radial-gradient(circle, rgba(88,24,69,1) 0%, rgba(199,0,57,1) 52%, rgba(88,24,69,1) 100%); 
  }


  #central{
    padding: 1.3em;
    border-radius: 5px;
    border:0.1em solid gray;color: white;
     padding-right: 5em;
     margin: 0;
     
     width: 93%;
     height: 28em;
     margin-top: 2em;
     margin-left: 2em;
     font-size: 1.04em;
     background-color: #272822;
  }

  .profile{
   width: 100%;

  }

  .userside {

     background: #161816;
     height: 45em;
     width: 60em;
     padding-left: 2em;
     padding-right: 2em;
     border-radius: 10px;
     margin-bottom:4em;
     margin-left: 10em;
      box-shadow: 10px 10px 16px black;
  }
  .name{

   position: relative;
   margin-top: 2em;
   margin-right: 20em;
  float: left;
  }
  .username {
   color: #C70039;
   font-size: 0.7em;
   float: left;
  }
  .user{
  position: relative;
  top: 4em;
   float: left;
  }
  .user img{
   position: relative;
   top: -4em;
   margin-left: -1.4em;
  float: left;
   width: 10em;
  height: 10em;
  }
  .profile ul{
     list-style-type: circle;

  }
  .projs{
  float: left;
   clear: both;
  }
  #central img{
   float: left;
  }
  .projs img{
   margin-left: 6em;
 
  }
  #central p{
   float: left;
   margin-right: 0.2em;
  }


  </style>
<!------Style----------->

</head>

<!------Body----------->
<body>

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
        
          <?php
include("config.php");
// Initialize the session

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{
   echo " <li><a href='signin.php'>Log In</a></li>";
  
    
  }
  else{
        echo "<li><a href='signout.php'>Log Out</a></li>";
  }


?>
          <li>
            <a href="index.php#contactsect">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!--------Profile------->
  <div class="profile row col-m-12 col-10">

    <div class="col-m-12 col-11 userside">
    
      <div class=" user col-2 col-m-2">
        <img src="img/user1.png">
       
      </div> 
      <div ><h1 style="margin-top: 1.4em"><?php echo $fname." ".$lname; ?><br>
      <span class="username"><?php echo "@".$uname; ?></span></h1></div>
      <div class=" col-12 col-m-12" id="central">
        <h2>Projects</h2>
        <hr>
        <br>
        <br>
        <div class="mproj">
          <div class="projs">
            <?php echo "<a href='editor.php?pid=",$m111,"'><img class='img2' src='img/sched.png'></a>"
            ?>
            <p><?php echo $m1; ?><br>
            <?php echo $m11; ?></p>  <?php echo "<a href='editor.php?pid=",$m222,"'><img class='img2' src='img/sched.png'></a>"
            ?>
            <p><?php echo $m2; ?><br>
            <?php echo $m22; ?></p>
          </div>
          <div class="projs">
              <?php echo "<a href='editor.php?pid=",$m333,"'><img class='img2' src='img/sched.png'></a>"
            ?>
            <p><?php echo $m3; ?><br>
            <?php echo $m33; ?></p>  <?php echo "<a href='editor.php?pid=",$m444,"'><img class='img2' src='img/sched.png'></a>"
            ?>
            <p><?php echo $m4; ?><br>
            <?php echo $m44; ?></p>
          </div>
        </div>
        <div style="clear: both;">
          <br>
        </div>
        <div class="extra col-m-9">
          <hr>
          <br>
          <a href="project.php?id=$user"><img src="img/proj.png"></a>

          <h3>Create a New Project</h3><br>
         
        </div>
      </div>
      
    </div>
  </div>

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