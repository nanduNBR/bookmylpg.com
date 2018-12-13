<!DOCTYPE html>
<html>
<head>
	<title>bookmylpg</title>
	<link rel="stylesheet" type="text/css" href="css/cssmain.css">
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



<div class="regform">
  <div class="container2">
  <div class="title">
  	 <p>Registration Form</p>
  </div>

<form action="Register.php" method="POST">
<fieldset>
<legend class="table">Enter The Details</legend>
<table>
	<tr>
	<td>Name</td>
	<td><input type="text" name="name" size="30" required="required"></td>
	</tr>
	
	<tr>
	<td>Consumer Number</td>
	<td><input type="Number" name="cn" min="1000" max="9999" required="required"></td>
	</tr>
	<tr>
	<td>Ration Card Number</td>
	<td><input type="text" name="rc" size="20" required="required"></td>
	</tr>
	<tr>
	<td>Address</td>
	<td><textarea rows="10" cols="60" name="address" required="required"></textarea></td>
	</tr>
	<tr>
	<td>Contact Number</td>
	<td><input type="text" placeholder="+91" name="cont" size="10"></td>
	</tr>
	<tr>
	<td>Email_Id</td>
	<td><input type="email" name="username" required="required"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password"  required="required"></td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
	<td></td>
	<td><input type="submit" value="Register"></td>
	</tr>

	
</table>
</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = mysql_real_escape_string($_POST['name']);
	$cn = mysql_real_escape_string($_POST['cn']);
	$rc = mysql_real_escape_string($_POST['rc']);
	$address = mysql_real_escape_string($_POST['address']);
	$contact = mysql_real_escape_string($_POST['cont']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

    $bool = true;
    $c=0;

	mysql_connect("localhost", "root","") or die(mysql_error()); 
	mysql_select_db("bookmylpg") or die("Cannot connect to database");

	
	
$query = mysql_query("Select * from tbl_con"); 
	while($row = mysql_fetch_array($query)) 
	{
		$cn_verify = $row['cn_no']; 
		$rc_verify = $row['rc_no'];
		if ($cn==$cn_verify && $rc=$rc_verify) 
		{


								$query = mysql_query("Select * from tbl_reg,tbl_login"); 
								while($row = mysql_fetch_array($query)) 
									{
										$cn_check = $row['cn_no']; 
										$username_check = $row['email'];
										$rc_check = $row['rc_no'];
										if($cn == $cn_check||$username==$username_check||$rc==$rc_check) 
											{
												$bool = false; 
												Print '<script>alert("Check The Details! Already Registered!");</script>'; 
												Print '<script>window.location.assign("register.php");</script>'; 
											}

		
	
									}

										if($bool) 
											{
												$c=1;
												mysql_query("INSERT INTO tbl_reg (name, cn_no, rc_no, address, ph, email, password) VALUES ('$name','$cn','$rc','$address','$contact',  '$username','$password')"); 
												mysql_query("INSERT INTO tbl_login (email, password,role,no) VALUES ('$username','$password','user','$cn')");
												
												Print '<script>alert("Successfully Registered!");</script>';
												Print '<script>window.location.assign("register.php");</script>'; 
											}



		}




	}


		if ($c==0) 
		{
			Print '<script>alert("Unauthorized Consumer..!");</script>';
			Print '<script>window.location.assign("register.php");</script>'; 
	
		}
}
?>