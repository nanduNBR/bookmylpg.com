<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:vstaff.php"); // redirects if user is not logged in
	}

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); 
		mysql_select_db("bookmylpg") or die("Cannot connect to database");
		$id = $_GET['id'];
		mysql_query("DELETE FROM tbl_staff WHERE stf_id='$id'");
		mysql_query("DELETE FROM tbl_login WHERE no='$id'");
		header("location: vstaff.php");
	}
?>