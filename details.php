<!DOCTYPE html>
<html>
<head>
	<title>Consumer Details</title>
	<link rel="stylesheet" type="text/css" href="css/inside.css">
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" type="text/css" href="css/view.css">
</head>
<?php
	/*session_start();                        //starts the session
	if($_SESSION['user']){                 //checks if user is logged in
	}
	else{
		header("location:index.html");         // redirects if user is not logged in
	}
	$user = $_SESSION['user'];*/            //assigns user value

?>
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
          
       <li><a href="Staff.html">Back</a></li>
          
        </ul>
       </div>
    </div>
 </div>
<div class="tdivd">
	<h1 align="center">CONSUMER DETAILS</h1>
		<table border="1px" width="100%" style="border-style: solid;border-collapse: collapse;width: 98%;margin: auto; height: 30px;text-align: center;font-size: 20px;">
			<tr>
				<td><h4>CONSUMER NO</h4></td>
				<td><h4>NAME</h4></td>
				<td><h4>RATION CARD NO</h4></td>
				<td style="width: 40px;"><h4>ADDRESS</h4></td>
				<td><h4>EMAIL ID</h4></td>
				<td><h4>CONTACT NO</h4></td>
				<td><h4>DELETE</h4></td>
			</tr>
<?php
		mysql_connect("localhost", "root","") or die(mysql_error()); 
		mysql_select_db("bookmylpg") or die("Cannot connect to database");
		$query = mysql_query("Select * from tbl_reg"); 
			while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['cn_no'] . "</td>";
						Print '<td align="center">'. $row['name'] . "</td>";
						Print '<td align="center">'. $row['rc_no'] . "</td>";
						Print '<td align="center">'. $row['address'] . "</td>";
						Print '<td align="center">'. $row['email'] . "</td>";
						Print '<td align="center">'. $row['ph'] . "</td>";
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['cn_no'].')"><img src="Image/x.png" /></a> </td>';

					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delcon.php?id=" + id);
			  }
			}
		</script>

	</div>
</div>
</body>
</html>