
<?php
if(isset($_POST['submit_contact']))
{
 $size=$_POST['size'];
 $thickness=$_POST['thickness'];
 $density=$_POST['density'];
	
 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 
 mysql_query("insert into contacts values('1','$size','$thickness','$density')");
 echo "submitted";
 exit();
}
?>