<?php	session_start();			//starting session...
	?>
<html>
<head>
	<title>Admin_panel
</title>
	  <script src="jscript.js"></script>
	  <style>
	  	th,td,label{
	  		color: white;
	  	}
	  </style>
 </head>
<body style="background-color:#87CEFA;">
	<script>
		function getconfirm(){
			var result=confirm("Terminate session?");
			if(result==true){
				window.location.href='admin_signout.php';
			}
		}
	</script>
	<center>
		<h1>Admin panel</h1>
		<?php 
			echo "Admin >> ". $_SESSION['Admin_name'];
		?></center><br>
	<br>
	<table align='center'>
	<tr>
		<td>
			<button onclick="redirect('addnew.php')">
			Add new member</button>
		</td>
		<td>
			<button onclick="getconfirm()">Sign out</button>
		</td>
	</tr>
	</table>
	<br><br>
	<form align='center' method="GET" action='mealcount.php'>
		<input type='number' name='user' required 
		placeholder='User_id' style='width: 131px;'>
		<input type="submit" name='submit'>
	</form>
	<form align=center method='post' autocomplete='off'>
		<label for='from'>From</label>
		<input type='date' name='from' required>
		<label for='until'>To</label>
		<input type='date' name='until' required>
		<button type='submit' name='submit'>Summarize</button>
	</form>
</body>
</html>

<?php
	if(isset($_POST['from'])){
		include 'access.php'; //importing connection!
		$from=mysqli_real_escape_string($connect,$_POST['from']);
    	$until=mysqli_real_escape_string($connect,$_POST['until']);
    	$query = "SELECT SUM(Essentials),SUM(Vegitables),SUM(Fish),SUM(Meat),SUM(Others) FROM cost_expended 
        WHERE (Timestamp>='$from' && Timestamp<='$until');";
    	$result=mysqli_query($connect,$query);
    	$record=mysqli_fetch_assoc($result);
    	echo "<table align='center'>";
    	echo "<tr><th>Essentials</th><th>Vegitables</th><th>Fish</th><th>Meat</th><th>Others</th><th>Total</th></tr>";
    	echo "<tr><td>";echo $record['SUM(Essentials)'];echo "</td>";
    	echo "<td>";echo $record['SUM(Vegitables)'];echo "</td>";
    	echo "<td>";echo $record['SUM(Fish)'];echo "</td>";
    	echo "<td>";echo $record['SUM(Meat)'];echo "</td>";
    	echo "<td>";echo $record['SUM(Others)'];echo "</td>";
    	echo "<td>"; echo $record['SUM(Essentials)']+$record['SUM(Vegitables)']+$record['SUM(Fish)']+$record['SUM(Meat)']+$record['SUM(Others)'];echo "</td></tr>";
    	echo "</table>";
    	
	}
?>

