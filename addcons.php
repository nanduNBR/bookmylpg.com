<!DOCTYPE html>
<html>
<head>
	<title>Consumer Form</title>
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
  <div class="container2">
  <div class="title">
  	 <p style="text-align: center;">Consumer Form</p>
  </div>

<form action="addcons.php" method="post">
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
	<td>Contact Number</td>
	<td><input type="text" placeholder="+91" name="cont" required="required"></td>
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
	$cn = mysql_real_escape_string($_POST['cn']);
	$rc = mysql_real_escape_string($_POST['rc']);
	$contact = mysql_real_escape_string($_POST['cont']);
	

    $bool = true;

	mysql_connect("localhost", "root","") or die(mysql_error()); 
	mysql_select_db("bookmylpg") or die("Cannot connect to database");
	$query = mysql_query("Select * from tbl_con"); 
	while($row = mysql_fetch_array($query)) 
	{
		$cn_check = $row['cn_no']; 
		$name_check = $row['name'];
		$rc_check = $row['rc_no'];
		if($cn == $cn_check||$name==$name_check||$rc_check==$rc) 
		{
			$bool = false; 
			Print '<script>alert("Check The Details! Already Entered!");</script>'; 
			Print '<script>window.location.assign("addcons.php");</script>'; 
		}

		
	
	}

	if($bool) 
	{
		mysql_query("INSERT INTO tbl_con (name, cn_no, rc_no, ph) VALUES ('$name','$cn','$rc','$contact')");
		Print '<script>alert("Successfully Added New Consumer!");</script>';
		Print '<script>window.location.assign("addcons.php");</script>'; 
	}

}
?>