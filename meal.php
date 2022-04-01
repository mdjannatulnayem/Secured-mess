<?php	session_start();	 //starting session...
	include	 /*dbloading...*/
 /*$connect*/'access.php';
	include 'logwrite.php'; //WRITElog(*file,*string)...
  $id=$_SESSION['ID'];
  $table=$id.'_meal';
    $rice=mysqli_real_escape_string($connect,$_POST['Rice']);
    $vegi=mysqli_real_escape_string($connect,$_POST['Vegi']);
    $fish=mysqli_real_escape_string($connect,$_POST['Fish']);
    $meat=mysqli_real_escape_string($connect,$_POST['Meat']);
    $daal=mysqli_real_escape_string($connect,$_POST['Daal']);
    $nasta=mysqli_real_escape_string($connect,$_POST['Nasta']);
  $query="INSERT INTO $table VALUES 
    (current_timestamp(),'$rice','$vegi',
      '$fish','$meat','$daal','$nasta');";
  $result=mysqli_query($connect,$query);
  if($result!=null){
	  WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']." ".$_SESSION['Name']." "."Meal updated.");
	  header("location:home.php");
    //navigating to home if update succesfull...
  }
  ?>
  <title> $...!!!</title>
  <body style="background-image:url('serverr.png');
		 background-repeat:no-repeat;
		 background-size:250px 250px;
		 background-position:center"></body>
 <script>alert("$___________________Failed to update...!!!!");</script>
<?php if($result==null){
	WRITElog('sitelog.txt',$_SERVER['SCRIPT_NAME']."**Error!!!"." ".$_SESSION['Name']." "."Upadate failed.");
exit("<center><h2>Go back & retry...</center></h2>");}
?>
