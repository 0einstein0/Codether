<!DOCTYPE html>
<html>
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
$cookie_name = "username";
$cookie_value = $_SESSION["username"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$pid = $_GET['pid'];
$name=mysqli_query($mysqli, "SELECT pname FROM projects WHERE pid='$pid' ");
$row1 = mysqli_fetch_row($name);
$pname = $row1[0];
$type=mysqli_query($mysqli, "SELECT type FROM projects WHERE pid='$pid' ");
$row2 = mysqli_fetch_row($type);
$ptype = $row2[0];
$lang=mysqli_query($mysqli, "SELECT lang FROM projects WHERE pid='$pid' ");  
$row3 = mysqli_fetch_row($lang);
$plang = $row3[0];
$code_=mysqli_query($mysqli, "SELECT codefile FROM projects WHERE pid='$pid' ");  
$row4 = mysqli_fetch_row($code_);
$pcode = strval($row4[0]);
$mem1=mysqli_query($mysqli, "SELECT member FROM workson WHERE proj='$pid' ");  

$data = array();
while ($row = mysqli_fetch_assoc($mem1)) {
$data[] = $row['member'];
}
$m2="";
$m3="";
$m4="";
$a="@";
$m1 = $data[0];

if(count($data)===2){
$m2 = $data[1];
}
else if(count($data)===3){
$m2 = $data[1];
$m3 = $data[2];
}
else if(count($data)===4){
$m2 = $data[1];
$m3 = $data[2];
$m4 = $data[3];
}



?>
<!------Head----------->
<head>
  <title>Codether</title>

  <link href="icon2.png" rel="icon">

   <script data-require="angular.js@*" data-semver="1.4.0-beta.4" src="https://code.angularjs.org/1.4.0-beta.4/angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/eligrey/FileSaver.js/5ed507ef8aa53d8ecfea96d96bc7214cd2476fd2/FileSaver.min.js"></script>

  <link href="css/style.css" rel="stylesheet" type="text/css">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <script src="script/script.js"></script>
    <script src="script/file.js"></script>
  <!------Style----------->
  <style type="text/css">
   body{

   background: rgb(88,24,69);
  background: radial-gradient(circle, rgba(88,24,69,1) 0%, rgba(199,0,57,1) 52%, rgba(88,24,69,1) 100%);
   }
    #editor {
  
  border-radius: 2px;
     float: right;
     margin: 0;
     width: 80%;
     height: 38em;
     margin-top: 2em;
     font-size: 1.04em;
    
  }

  .buttons{
    margin: 0;
    padding: 0;
    float: right;
  }
.team{
  margin-top: 4em;
}
  select{
      width: 20%;
   padding: 0.6em;
   margin-top:10px;
   display: inline-block;
   border: none;
   color: #343635;
   font-family: Exo;
   background: #f1f1f1;

  }
.text{
  font-size: 0.79em;
color: white;
}
  .btn{
  background-image: linear-gradient(to right, #a73737 0%, #7a2828 51%);

   color: white;
   padding: 0.875em 1.25em;
   margin: 0.5em 0;
   border: none;
   cursor: pointer;
   width: 10%;
   opacity: 0.9;
   border-radius: 1px;
  clear: both;
  }


  .codeSide {
     box-shadow: 10px 10px 16px black;
     background: #161816;
     height: 53em;
     padding-left: 2em;
     padding-right: 2em;
     border-radius: 10px;
     padding-top: 1em;
     margin-bottom:4em;
  }
button{
    background-image: linear-gradient(to right, #a70035 0%, #9c0b39 50%);
  border-radius:5px;
}
input[type=submit]{
    background-image: linear-gradient(to right, #a70035 0%, #9c0b39 50%);
   border-radius:5px;
}
  .selectpicker{
   float: right;
   margin-left: 4px;
   margin-right: 4px;
  }

  #export {
     
     float: right;
  }
  .sidepanel{
   margin-top:-1.2em;
   float: left;
  }

  .memb img{
   clear: left;
   float: left;
  }
  .memb h5{

   float: left;
   clear: right;
  }
  #save{
    margin-top: 0.5em;
  }
  </style>
 
  
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

   echo "  <li><a href='register.php'>Register</a></li>";
  
    
  }
  else{ $user=$_COOKIE[$cookie_name];
        if($user=='admin'){echo "<li><a href='admin.php?'>Admin</a></li>";}
        else{
        echo "<li><a href='profile.php?id=$user'>Profile</a></li>";
      }
  }


?>
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
  <div class="col-1"></div>
  <div class=" cm row col-m-12 col-10">
    <!-- Editor -->
    <div class="col-m-12 col-12 codeSide">
      <div class="col-12">
     <div class="buttons" ng-app="app" ng-controller="sample">
      <button  style="border: none;" type="button" file-browser>
        Import
      </button>
       <input class="btn col-m-3" id="export" type="submit" value="Export" onclick="download();">
    </div>
        <!-- Language Selection -->
        <select class="selectpicker" id="mode" name="Language" onchange="modeSelect()">
          <option  selected  id="js" value="javascript">
            JavaScript
          </option>
          <option id="php" value="php">
            PHP
          </option>
          <option id="c"  value="c_cpp">
            C
          </option>
          <option id="cpp" value="c_cpp">
            C++
          </option>
          <option id="html" value="html">
            Html
          </option>
           <option id="mysql" value="mysql">
            MySQL
          </option>
           <option id="css" value="css">
            CSS
          </option>
           <option id="ruby" value="ruby">
            Ruby
          </option>
           <option id="xml" value="xml">
            XML
          </option>
          <option id="python3" value="python3">
            Python3
          </option>
          <option id="java" value="java">
            Java
          </option>
        </select>
          <!-- Language Selection -->
        <select class="selectpicker" id="theme" name="theme" onchange="themeSelect()">
          <optgroup label="Dark">
           <option selected value="ace/theme/monokai">Monokai</option>
            <option value="ace/theme/ambiance">Ambiance</option>
             <option value="ace/theme/solarized_dark">Solarized Dark</option>
           <option value="ace/theme/cobalt">Cobalt</option>
         </optgroup>
         <optgroup label="Bright">
          <option id="iplastic" value="ace/theme/iplastic">
            IPlastic
          </option>
          <option value="ace/theme/chrome">Chrome</option>
            <option value="ace/theme/kuroir">Kuroir</option>
                  <option value="ace/theme/clouds">Clouds</option>
          </optgroup>
        </select>
        <div class="sidepanel col-2">
          <div class="proj">
            <h1 style="margin-bottom: .8em;font-size: 2.4em;">Project</h1>
            <h2 style=" color: #9c0b39 ">Name:<br><span class="text"  id="pname"><?php echo $pname; ?></span></h2>
            
            <h2 style=" color: #9c0b39 ">Type:<br><span class="text" id="ptype"><?php echo $ptype; ?></span></h2>
            <h2 style=" color: #9c0b39 ">Lang:<br><span class="text" id="plang"><?php echo $plang; ?></span></h2>
          </div>
          <div class=" team">
            <h1>Team</h1>
            <div class="memb">
              <a href="profile.html"><img src="img/m1.png"></a>
              <h5><?php  echo $m1; ?></h5>
            </div>
            <div class="memb">
              <img src="img/m3.png">
              <h5><?php  echo $m2; ?></h5>
            </div>
            <div class="memb">
              <img src="img/m2.png">
              <h5><?php  echo $m3; ?></h5>
            </div>
             <div class="memb">
              <img src="img/m1.png">
              <h5><?php  echo $m4; ?></h5>
            </div>
          </div>

        </div>
        <div class="edit">
          <div id="editor"></div>
          <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
        
<script>
  
  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/javascript");
var x = `<?php echo strval($pcode); ?>`;
editor.getSession().setValue(x);
  
  function modeSelect() {
     var x = document.getElementById("mode").value;
    var lang="ace/mode/";
    var mode=lang+x;
     editor.session.setMode(mode);
  }  
   function themeSelect() {
     var theme = document.getElementById("theme").value;
     editor.setTheme(theme);
  }  
  function download() {

  var filename = prompt("Enter file name: ");
  var selector=document.getElementById("mode");
  var ext= selector[selector.selectedIndex].id;
  var savefile=filename+"."+ext;
  var save = editor.getValue();
  var blob = new Blob([save], {
    type: "text/plain;charset=utf-8"
  });
  saveAs(blob, savefile);
}
  
</script>

 <input class="btn col-m-3" id="save" type="submit" value="Save" style="float:right;" onclick="pl()" onmousedown="change(this.id)">

 <script>
function pl(){ 
  var pid = '<?php echo $pid ;?>';
  var code = editor.getValue();
$.ajax({ 
url:'save.php', 
method:'post', 
data:{code:code, pid:pid}, 
success:function(data) 
{ 
document.getElementById('save').style.backgroundColor = "#9c0b39";
document.getElementById('save').value = 'Save';
}
 
});

}

 function change(id){
    document.getElementById(id).style.background = 'green';
     document.getElementById(id).value = 'Saved!';
}
 </script>
        </div>
      </div>
    </div>
  </div>

 
  
</body>
</html>