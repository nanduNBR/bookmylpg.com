<?php
session_start();
$name=$_SESSION["name"];
$cn=$_SESSION["cn"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/user.css">
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
          
       <li><a href="Index.html">Logout</a></li>
          
        </ul>
       </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

 </div>
<h1 style="text-align: center; font-family: Century">*Welcome*</h1>
<?php echo "<div style='text-align: center; font-size:30px; font-family: Century'>" . $name . "</div>"; ?><br>
<?php echo "<div style='text-align: center; font-size:30px; font-family: Century'>" . $cn . "</div>"; ?><br><br>


<form action="User.php" method="POST">
<fieldset style="width: 70%; margin: auto;">
<table style="margin: auto;">
    <tr>
        <td align="center"><p style="font-size: 30px; font-family: lucida; font-weight: bold; padding-right: 40px;">Any Complaints/Queries</p></td>
         <td ><textarea required="required" name="comp" rows="10" cols="60" placeholder="INCASE OF NO COMPLAINTS/QUERIES PLEASE ENTER 'NO'" style="" font-size: 15px;"></textarea></td>
    </tr>
    
</table>
</fieldset>
<input style="margin-left: 525px; margin-top: 50px;" class="btn" type="submit" value="CLICK TO BOOK LPG REFILL" name="book">
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>


</body>

</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
   $cn=$_SESSION["cn"];
   $comp = mysql_real_escape_string($_POST['comp']);

  $bool = true;

  mysql_connect("localhost", "root","") or die(mysql_error()); 
  mysql_select_db("bookmylpg") or die("Cannot connect to database");
  $query = mysql_query("SELECT * From tbl_book"); 
  while($row = mysql_fetch_array($query)) 
  {
    $cn_check = $row['cn_no']; 
    $name_check = $row['name'];
    $rc_check = $row['rc_no'];
    if($cn == $cn_check) 
    {
      $bool = false; 
      Print '<script>alert("Already Booked..! Booking Pending..!");</script>'; 
      Print '<script>window.location.assign("User.php");</script>'; 
    }

    
  
  }

  if($bool) 
  {
    mysql_query("INSERT INTO tbl_book (cn_no, comp) VALUES ('$cn','$comp')");
    Print '<script>alert("Successfully Booked LPG Cylinder..! Have A Nice Day..!");</script>';
    Print '<script>window.location.assign("User.php");</script>'; 
  }

}


?>