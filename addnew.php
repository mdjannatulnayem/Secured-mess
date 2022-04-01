<!DOCTYPE html>
<html>
 <head>
	<link rel='stylesheet' href='style.css'>
	<title>Add new</title>
</head>
<body style="background-color:#87CEFA;">
    <br>
  <center>
    <h1>
        <i>+ member</i>
    </h1>
  <form method='POST' autocomplete='off'>
   <table bgcolor='#A0A0A0'>
   <tr>
   <td align='right'>
    <label for='User_id'>User id:</label>
   <input type='number' name='User_id' required><br><br>
   <label for='Name'>Name:</label>
   <input type='text' name='Name' required><br><br>
   <label for='Inst'>Institution:</label>
   <input type='text' name='Inst' required><br><br>
   <label for='Dept'>Department:</label>
   <input type='text' name='Dept' required><br><br>
   <label for='Username'>Username:</label>
   <input type='text' name='Username' required><br><br>
   <label for='Password'><i>Password:</i></label>
   <input type='password' name='Password' required>
   </td>
   </tr>
   <tr>
   <td><br><button type='submit' name='Send'>Submit</button>
   </td>
   </tr>
   </table>
  </form>
  <br>
  <br>
  <br>
  <a href='admin_panel.php' style="text-decoration: none;"><h3>Go back</h3></a>
 </center>
 </body></html>

 <?php
 if(isset($_POST['Send']) && isset($_POST['User_id'])){
    include 'access.php'; //import connection...!
    $userid=mysqli_real_escape_string($connect,$_POST['User_id']);
    $name=mysqli_real_escape_string($connect,$_POST['Name']);
    $inst=mysqli_real_escape_string($connect,$_POST['Inst']);
    $dept=mysqli_real_escape_string($connect,$_POST['Dept']);
    $username=mysqli_real_escape_string($connect,$_POST['Username']);
    $password=mysqli_real_escape_string($connect,$_POST['Password']);
    $Query="INSERT INTO members_info 
        VALUES ('$userid','$name','$inst','$dept','$username','$password');";
    $result=mysqli_query($connect,$Query);
    $table = $userid.'_meal';
    $Query="CREATE TABLE $table ( `Timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `Rice` INT(1) NOT NULL , `Vegi` INT(1) NOT NULL , `Fish` INT(1) NOT NULL , `Meat` INT(1) NOT NULL , `Daal` INT(1) NOT NULL , `Nasta` INT(1) NOT NULL , PRIMARY KEY (`Timestamp`));";
    $result=mysqli_query($connect,$Query);
 }

?>

