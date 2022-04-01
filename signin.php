<?php	session_start();			//creating session...
    include	 /*dbloading...*/
 /*$connect*/'access.php';
	include 'logwrite.php'; //WRITElog(*file,*string)...
$username=mysqli_real_escape_string($connect,$_POST['Username']);
$password=mysqli_real_escape_string($connect,$_POST['Password']);
//Query must use '&&' incase of multiple test conditions... 
$query = "SELECT * FROM members_info 
WHERE Username='$username' && Password='$password';";
$result=mysqli_query($connect,$query);
  $record=mysqli_fetch_assoc($result);
  if($record!=null){			   //setting up session...
			$_SESSION['ID']=$record['User_id'];  
		$_SESSION['Name']=$record['Name'];
	$_SESSION['User']=$record['Username'];
	$_SESSION['Pass']=$record['Password'];
	WRITElog('sitelog.txt',$_SESSION['Name']." "."Signed in ...");
	WRITElog('sitelog.txt',"Session started for ".$_SESSION['Name']);
	header('location:home.php');
  } //navigating to dashboard with stat ok...
 ?>
   <title> $...!!!</title>
  <body style="background-image:url('passerr.png');
		 background-repeat:no-repeat;
		 background-size:350px 350px;
		 background-position:center"></body>
 <script>alert("$_____________Wrong Username or Password...!!!!");</script>
<?php if($record==null){
	WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']."**Error!!!"." ".$username." "."or"." ".$password." "."unauthorized.");
exit("<center><h2>Wrong username or Password.Go back & retry...</center></h2>");}
?>
