<?php	session_start();	 //starting session...
	include	 /*dbloading...*/
 /*$connect*/'access.php';
	include 'logwrite.php'; //WRITElog(*file,*string)...
	$reset=mysqli_real_escape_string($connect,$_POST['reset']);
$repeat=mysqli_real_escape_string($connect,$_POST['repeat']);
$id=$_SESSION['ID'];
if($reset!=null && $repeat!=null 
	&& $reset===$repeat){
$query = "UPDATE members_info SET Password='$reset' WHERE User_id='$id';";
$result=mysqli_query($connect,$query);
if($result!=null){$_SESSION['Password']=$reset;
WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']." ".$_SESSION['Name']." "."Password updated.");
	header("location:home.php");}	//navigating to home if successfull...
}
?>
 <title> $...!!!</title>
 <body style="background-image:url('serverr.png');
		 background-repeat:no-repeat;
		 background-size:250px 250px;
		 background-position:center"></body>
<script>alert("$___________________Blank field or didn't match...!!!!");</script>
<?php if($reset==null || $repeat!=null 
	|| $reset!==$repeat){
WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']."**Error!!!"." "."Update failed.");
exit("<center><h2>Go back & retry...</center></h2>");}?>