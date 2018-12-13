<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  
  <title>Login Form</title>
  
  
      <link rel="stylesheet" type="text/css" href="css/cssmain.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<div class="complete">
<div class="header">
  <div class="container">

         <div class="logo">
          <img src="Image/logo.png">

         </div>


  </div>
</div>

<div class="nav">
  <div class="container">
     <div class="items">
      <ul>
          <li><a href="Index.html"><img src="Image/home_button.png" style="padding-left:15px; "></a></li>
          <li><a href="Login.php">Login</a></li>
          <li><a href="Register.php">Register</a></li>
          <li><a href="About.html">About</a></li>
          <li><a href="#">Contact</a></li>
          
        </ul>
       </div>
    </div>
</div>

<h1 style="font-family: perpetua;font-size: 50px;margin-top:10px;margin-left:630px;">Login</h1>
  <div class="login-page">
  <div class="form">
    
    <form action="Login.php" method="POST" class="login-form">
      <input type="email" name="username" placeholder="Username" required="required" />
      <input type="password" name="password" placeholder="Password" required="required" />
      <button>login</button>
      
    </form>

  </div>

</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  

  mysql_connect("localhost", "root","") or die(mysql_error()); 
  mysql_select_db("bookmylpg") or die("Cannot connect to database");
  $query = mysql_query("SELECT * FROM tbl_login WHERE email='$username'AND password='$password'");
   while($row = mysql_fetch_array($query)) 
    {
      $role = $row['role']; 
    }
  $query = mysql_query("SELECT * FROM tbl_reg WHERE email='$username'AND password='$password'");
   while($row = mysql_fetch_array($query)) 
    {
      $name = $row['name']; 
      $cn = $row['cn_no']; 
    }
if ($role==user) {
  header('Location: user.php');
   $_SESSION["user"] = "$username";
   $_SESSION["name"] = "$name";
   $_SESSION["cn"] = "$cn";
}

else if ($role==admin) {
  header('Location: Admin.html');
  $_SESSION["user"] = "$username";
}
else if ($role==staff) {
  header('Location: Staff.html');
  $_SESSION["user"] = "$username";
}

else{
  Print '<script>alert("Incorrect Username And Password..!");</script>';
}
}


?>