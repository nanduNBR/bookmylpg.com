<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:vcons.php"); // redirects if user is not logged in
	}

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); 
		mysql_select_db("bookmylpg") or die("Cannot connect to database");
		$id = $_GET['id'];
		mysql_query("DELETE FROM tbl_con WHERE cn_no='$id'");
		mysql_query("DELETE FROM tbl_reg WHERE cn_no='$id'");
		mysql_query("DELETE FROM tbl_login WHERE no='$id'");
		header("location: vcons.php");
	}
?>