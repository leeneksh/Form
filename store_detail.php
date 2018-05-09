
<?php
if(isset($_POST['submit_contact']))
{
 $name=$_POST['name'];
 $email=$_POST['email'];
 $reason=$_POST['reason'];
 $message=$_POST['message'];
	
 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 
 mysql_query("insert into contacts values('','$name','$email','$reason','$message')");
 echo "submitted";
 exit();
}
?>