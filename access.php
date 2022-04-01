<?php				//setting up authentication values...
$dbhost='localhost';
$dbuser='root';$dbpass='';
$dbname='secured_mess';
$connect=@mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($connect==null){$file=fopen('sitelog.txt','a');
fwrite($file,"Failed accessing database..."."\n");
fclose($file);
exit("<center>Can not access database...!!!</center>"); }
?>