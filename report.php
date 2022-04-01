<?php	session_start();	 //starting session...
	include	 /*dbloading...*/
  /*$connect*/'access.php';
  $report=$_POST['fback'];
  $default="e.g.;I am having problem with...";
  if($report!=null && $report!==$default){
  $query="INSERT INTO page_reports (Report) VALUES ('$report');";
  @mysqli_query($connect,$query);}
  ?>
  <title>Report feedback ...</title>
<script>alert("$_______Report sent...😊");
window.location.href='signin.html';</script>