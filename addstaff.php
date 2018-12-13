<!DOCTYPE html>
<html>
<head>
	<title>Staff Form</title>
	<link rel="stylesheet" type="text/css" href="css/inside.css">
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
          
       <li><a href="Admin.html">Back</a></li>
          
        </ul>
       </div>
    </div>
 </div>

 	<div class="regform">
  <div class="container">
  <div class="title">
  	 <p style="text-align: center;">Staff Form</p>
  </div>

<form action="addstaff.php" method="post">
<fieldset>
<legend class="table">Enter The Details</legend>
<table>
	<tr>
	<td>Name</td>
	<td><input type="text" name="name" size="30"></td>
	</tr>
	
	<tr>
	<td>Staff ID</td>
	<td><input type="Number" name="staffno" min="1000" max="9999"></td>
	</tr>
	<tr>
	<td>Email_Id</td>
	<td><input type="email" name="email"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password" size=""></td>
	</tr>
	<tr>
	<td>Contact Number</td>
	<td><input type="text" placeholder="+91" name="cont"></td>
	</tr>
	<br>
	<br>
	<br>
	<tr>
	<td></td>
	<td><input style="font-size: 12px; margin-left: 40px; margin-top: 30px;" type="submit" value="ADD" name=""></td>
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
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = mysql_real_escape_string($_POST['name']);
	$staffId = mysql_real_escape_string($_POST['staffno']);
	$username = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$contact = mysql_real_escape_string($_POST['cont']);

    $bool = true;

	mysql_connect("localhost", "root","") or die(mysql_error()); 
	mysql_select_db("bookmylpg") or die("Cannot connect to database");
	$query = mysql_query("SELECT * FROM tbl_staff AND tbl_login"); 
	while($row = mysql_fetch_array($query)) 
	{
		$staffId_check = $row['staffno']; 
		$username_check = $row['email'];
		if($staffId == $staffId_check||$username==$username_check) 
		{
			$bool = false; 
			Print '<script>alert("Check The Details! Already Entered!");</script>'; 
			Print '<script>window.location.assign("addstaff.php");</script>'; 
		}

		
	
	}

	if($bool) 
	{
	 
		mysql_query("INSERT INTO tbl_staff (name, stf_id, email, password, ph) VALUES ('$name','$staffId','$username','$password','$contact')"); 
		mysql_query("INSERT INTO tbl_login (email, password,role,no) VALUES ('$username','$password','staff','$staffId')"); 
		Print '<script>alert("Successfully Added New Staff!");</script>';
		Print '<script>window.location.assign("addstaff.php");</script>'; 
	}

}
?>