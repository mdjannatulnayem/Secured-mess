<?php	session_start();			//starting session...
	?>
 <html>
<head>
	<title>Dashboard>>
</title>
	  <script src="jscript.js"></script>
 </head>
<body style="background-color:#87CEFA;">
	<script>
		function getconfirm(){
		var res=confirm("$_________Do you really wanna sign out???");
		if(res==true){window.location.href='signout.php';}
		}
	</script>
	<center>
		<?php 
			$name=$_SESSION['Name'];
			 echo '<h1>Wellcome...</h1>'.''.$name;
		?></center><br>
	<br><table align='center'>
	<tr>
	<td><button onclick="redirect('meal.html')">Meal taken...</button></td>
	<td><button onclick="redirect('update.html')">Submit todays expense...</a></td>
	<td><button onclick="redirect('change.html')">Change password...</a></td>
	<td><button onclick="getconfirm()">Sign out</button></td>
	</tr>
	</table>
</body>
</html>