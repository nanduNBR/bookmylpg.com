<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:details.php"); // redirects if user is not logged in
	}

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); 
		mysql_select_db("bookmylpg") or die("Cannot connect to database");
		$id = $_GET['id'];
		mysql_query("DELETE FROM tbl_reg WHERE cn_no='$id'");
		header("location:details.php");
	}
?>