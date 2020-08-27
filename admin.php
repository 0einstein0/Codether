<!DOCTYPE html>
<html>
<!------Head----------->
<?php
session_start();
include("config.php");

$result = mysqli_query($mysqli, "SELECT * from users"); 

?>
<head>
  <title>Codether</title>
  <link href="css/icon2.png" rel="icon">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#data tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

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
  
  
   #nac li{
    margin-left: 0;
    display: inline;
    font-size: 0.55em;
   }

  }


  body{
     
  background: rgb(88,24,69);
  background: radial-gradient(circle, rgba(88,24,69,1) 0%, rgba(199,0,57,1) 52%, rgba(88,24,69,1) 100%); 
  }

 input[type=text] {
     border-radius: 1em;
   width: 40%;
   padding: 0.9375em;
   margin-top: -2.7em;
   margin-right: 2em;
   display: inline-block;
   border: none;
   background: #f1f1f1;

  font-family: exo;
  }

 
.sidenav {
  height: 50%;
  width: 50%;
  padding: 0;
  position: relative;
   float: left;
   background: #161816;
     margin-bottom: 1em;
     border-radius: 10px;
   margin-left: 1em;
      box-shadow: 10px 10px 16px black;
  }

.sidenav a {
 
  text-decoration: none;
  font-size: 1.4em;
  color: #818181;
  
}
.sidenav ul {
 
 list-style-type: none;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

img{
   border-radius: 10px;
  margin-bottom: 2em;
  box-shadow: 10px 10px 16px black;
  width: 50em;
 margin-left: 2em;
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
      <div class="navbar col-m-3 col-12">
        <div class="webname col-m-12 col-8">
          <h1>Codether</h1> 
        </div>
         <input style="width:10%;font-size: 15px" type="submit" value="Home" onclick="document.location = 'index.php'">
      </div>
    </div>
  </header>
<div id="nac" class="sidenav col-m-2 col-3">
  <ul>
 <li style="font-size: 24px">Registered Users</li><input style="float: right;" id="search" type="text" placeholder="Search">


</ul>
</div>
<div style="width: 100%" class="sidenav col-m-12 col-12">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <div ng-app="myApp" ng-controller="myCtrl"> 

<h1 style="margin-left: 1em; color: #C70039;">{{myHeader}}</h1>

</div>
<table  width='100%' border=1>

  <tr >
    
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Created At</th>
   
  
  </tr>
  <tbody id="data"> 
  <?php 
    while($res = mysqli_fetch_array($result)) {     
      echo "<tr>";
      echo "<td>".$res['uname']."</td>";
      echo "<td>".$res['fname']."</td>";
      echo "<td>".$res['lname']."</td>";
      echo "<td>".$res['email']."</td>";
      echo "<td>".$res['created_at']."<br>"."</td>";
      echo "<td><a href=\"edit.php?id=$res[uname]\">Edit</a> | <a href=\"delete.php?id=$res[uname]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
    }
    $mysqli->close();
  ?>
</tbody>
  </table>
 
  
 </div>

 
<script type="text/javascript">

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $timeout) {
  $scope.myHeader = "Hello!";
  $timeout(function () {
      $scope.myHeader = "Welcome to Admin Portal";
  }, 2000);
});
</script>
</script>
  
</body>
</html>