



<!DOCTYPE html>
<html>

<!------Head----------->
<head>
  <title>Codether</title>
  <link href="icon2.png" rel="icon">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<!------Body----------->
<body>
  
  <!------Home Section----------->
  <section id="homesect">
    <div class="row">
      <div class="bg"></div>
      <div class="bg bg2"></div>
      <div class="bg bg3"></div>

      <!------Header----------->
      <header>

        <!------NavBar----------->
        <div class="row">
          <div class="navbar">
            <div class="webname col-m-12 col-8">
              <h1>Codether</h1>
            </div>
            <ul class="col-m-12 col-4">
              <li><a class="active" href="#home">Home</a></li>
              <li><a href="#aboutsect">About</a></li>
               <?php
include("config.php");
// Initialize the session
session_start();
if(isset($_SESSION["logged"])) {
$cookie_name = "username";
$cookie_value = $_SESSION["username"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{

   echo "  <li><a href='register.php'>Register</a></li>";
  
    
  }
  else{ 
       $user=$_COOKIE[$cookie_name];
       if($user=='admin'){echo "<li><a href='admin.php?'>Admin</a></li>";}
        else{
        echo "<li><a href='profile.php?id=$user'>Profile</a></li>";
      }
  }


?>
             
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
             
              <li><a href="#contactsect">Contact</a></li>
            </ul>
          </div>
        </div>
      </header>

      <!------Main----------->
      <div class="row">
        <div class="col-m-12 col-12 main">
          <h1>Codether</h1>
        </div>
      </div>
      <center>
        <div class="row">
          <div class=" col-m-12 col-12 typewrite">
            <h2 id="cursor">An Interactive Website For Collaborative Coding</h2>
          </div>
        </div><br>
        <br>
        <br>
        <!------Changing Text----------->
        <div class=" flowtext row col-m-12 col-12">
          <div class="item-a">
            <h4>Code</h4>
          </div>
          <div class="item-b">
            <h4>Edit</h4>
          </div>
          <div class="item-c">
            <h4>Create</h4>
          </div>
        </div>
        <div class="row">
          <h1 style="font-size: 2em;">Together</h1>

          <!------Button----------->
          <input style="padding: 1em 9em 1em 2em;" type="submit" value="Create a Project" onclick="document.location = 'signin.php'"></input>
        </div>
      </center>
    </div>
  </section>

  <!------About Section----------->
  <section id="aboutsect">
    <hr>
    <header>
      <div class="row">

        <!------NavBar----------->
        <div class="navbar">
          <div class="webname col-m-12 col-8">
            <h1>Codether</h1>
          </div>
          <ul class="col-m-12 col-4">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="index.php#about">About</a></li>
             <?php
include("config.php");
// Initialize the session


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{

   echo "  <li><a href='register.php'>Register</a></li>";
  
    
  }
  else{ $user=$_COOKIE[$cookie_name];
        if($user=='admin'){echo "<li><a href='admin.php?'>Admin</a></li>";}
        else{
        echo "<li><a href='profile.php?id=$user'>Profile</a></li>";
      }
  }


?>
                          <?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{
   echo " <li><a href='signin.php'>Log In</a></li>";
  
    
  }
  else{
        echo "<li><a href='signout.php'>Log Out</a></li>";
  }


?>
            <li><a href="#contactsect">Contact</a></li>
          </ul>
        </div>
      </div>
    </header>
    <!------AboutUS----------->
    <div class="row" id="about">
      <div class="col-12 col-m-12">
        <h1>About Us</h1>
      </div>
      <div class=" row col-m-3 col-12">
        <div class="item-1">
          <h4>Real-Time Code Collaboration</h4><img class="itimg" src="img/coding_.png">
          <p>Codether is an online real-time<br>
          collaborative code editor. We<br>
          allow the users to collaborate<br>
          in real-time over the internet</p>
        </div>
        <div class="item-2">
          <h4>Chat and Communicate</h4><img class="itimg" src="img/chat.png">
          <p>Chat with your fellow team<br>
          members and follow along<br>
          as everyone navigates through<br>
          the code.</p>
        </div>
        <div class="item-3">
          <h4>Save and Track Your Progress</h4><img class="itimg" src="img/scrum_board.png">
          <p>Start off from where you left.<br>
          Import as well export project<br>
          files. The platform supports<br>
          multile programming<br>
          languages.</p>
        </div>
      </div>
    </div>
  </section>

  <!------Footer----------->
  <footer class="col-12 col-m-12" id="contactsect">
    <div class="row">
      <h1>Contact Us</h1>
        <!------Table1----------->
      <div class="col-8 tab1">
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

