<?php		session_start();	//starting session...
    include	 /*dbloading...*/
 /*$connect*/'access.php';
	include 'logwrite.php'; //WRITElog(*file,*string)...
$essentials=mysqli_real_escape_string($connect,$_POST['Essentials']);
$vegitables=mysqli_real_escape_string($connect,$_POST['Vegetables']);
$fish=mysqli_real_escape_string($connect,$_POST['Fish']);
$meat=mysqli_real_escape_string($connect,$_POST['Meat']);
$note=mysqli_real_escape_string($connect,$_POST['details']);
$others=mysqli_real_escape_string($connect,$_POST['Others']);
$submitted=$_SESSION['ID'];//Following session value ...!
$query="INSERT INTO cost_expended 
	VALUES (current_timestamp(),'$essentials',
		'$vegitables','$fish','$meat','$others','$note','$submitted');";
$result=mysqli_query($connect,$query);
If($result!=null){
	WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']." ".$_SESSION['Name']." "."Cost updated.");
	header("location:home.php");	//navigating to home if successfull...
}
?>
 <title> $...!!!</title>
 <body style="background-image:url('serverr.png');
		 background-repeat:no-repeat;
		 background-size:250px 250px;
		 background-position:center"></body>
<script>alert("$___________________Failed to update...!!!!");</script>
<?php If($result==null){
	 WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']."**Error!!!"." ".$_SESSION['Name']." "."Upadate failed.");
exit("<center><h2>Go back & retry...</center></h2>");}
?>