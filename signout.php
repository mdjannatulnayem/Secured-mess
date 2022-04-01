<?php
	include 'logwrite.php'; //WRITElog(*file,*string)
	session_start();
	WRITElog('sitelog.txt',$_SESSION['Name']." "."Signed out...");
	WRITElog('sitelog.txt',"Session terminated for"." ".$_SESSION['Name']);
	session_unset();	//terminating session ...!
	header("location:signin.html");
?>