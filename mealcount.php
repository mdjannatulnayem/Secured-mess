<?php	session_start();			//starting session...
$User_id=$_GET['user'];
	?>
<html>
<head>
	<title><?php echo $User_id;?>_mealcount
</title>
<style>
	*{color:white;}
	th,td{
		width: 50px;
	text-align: center;
	}
</style>
</head>
<body style="background-color:#87CEFA;">
	<?php
		include 'access.php'; //importing connection!
		$query="SELECT Name FROM members_info 
				WHERE User_id = '$User_id';";
		$result=mysqli_query($connect,$query);
		if($result!=null){
			$recs=mysqli_fetch_assoc($result);
			$tablename=$User_id."_meal";
			$from=date('Y-m-01');
			$until=date('Y-m-d');
			$query = "SELECT SUM(Rice),SUM(Vegi),SUM(Fish),SUM(Meat),
				SUM(Daal),SUM(Nasta) FROM $tablename 
					WHERE (Timestamp>='$from' && Timestamp<='$until');"; 
        	$result=mysqli_query($connect,$query);
			$record=mysqli_fetch_assoc($result);
			echo "//From:".$from." "."//Until:".$until.">>>";
			echo "<a href='admin_panel.php'>Go back</a>";
			echo "<table align='center'>";
			echo "<td colspan='6'>";echo $recs['Name'];echo "</td>";
    		echo "<tr><th>Rice</th><th>Vegi</th><th>Fish</th><th>Meat</th><th>Daal</th><th>Nasta</th></tr>";
    		echo "<tr><td>";echo $record['SUM(Rice)'];echo "</td>";
    		echo "<td>";echo $record['SUM(Vegi)'];echo "</td>";
    		echo "<td>";echo $record['SUM(Fish)'];echo "</td>";
    		echo "<td>";echo $record['SUM(Meat)'];echo "</td>";
    		echo "<td>";echo $record['SUM(Daal)'];echo "</td>";
    		echo "<td>";echo $record['SUM(Nasta)'];echo "</td></tr>";
    		echo "</table>";
		}
	?>
</body>
</html>