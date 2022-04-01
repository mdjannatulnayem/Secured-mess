<!DOCTYPE html>
<html>
 <head>
	<link rel='stylesheet' href='style.css'>
	<title>Admin_login</title>
</head>
<body style="background-color:#87CEFA;">
 <h1 class='center'>Secured - mess</h1>
 <h2 class='center'>Admin login</h2>
  <br>
  <br>
  <center>
  <form method='POST' autocomplete='off'>
   <table bgcolor='#A0A0A0'>
   <tr>
   <td align='right'>
   <label for='Username'>Username:</label>
   <input type='text' name='Username'><br><br>
   <label for='Password'><i>Password:</i></label>
   <input type='password' name='Password'>
   </td>
   </tr>
   <tr>
   <td>
    <br>
    <button type='submit' name='Send'>Submit</button>
   </td>
   </tr>
   </table>
  </form>
</body></html>

<?php
    session_start(); //start of new session!
if(isset($_POST['Send']) && isset($_POST['Username'])){
    include 'access.php'; //importing connection!
    $username=mysqli_real_escape_string($connect,$_POST['Username']);
    $password=mysqli_real_escape_string($connect,$_POST['Password']);
    $query = "SELECT * FROM admin_credentials 
        WHERE Username='$username' && Password='$password';";
    $result=mysqli_query($connect,$query);
    $record=mysqli_fetch_assoc($result);
    if($record!=null){
    $_SESSION['Admin_id']=$record['ID'];
    $_SESSION['Admin_name']=$record['Name'];
    $_SESSION['Admin']=$record['Username'];
    $_SESSION['A_pass']=$record['Password'];
    header('location:admin_panel.php');
    }
    else{
        echo "<script>alert('Wrong Username or Password...!!!!');</script>";
    }
}
?>