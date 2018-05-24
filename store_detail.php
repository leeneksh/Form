
<?php

//if(isset($_POST['submit_contact']))
//{
//echo "jai hind";
 $length=$_POST['length'];
 $breadth=$_POST['breadth'];
 $thickness=$_POST['thickness'];
 $density=$_POST['density'];
	
 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);
 
 mysql_query("insert into contacts values('','$length','$breadth','$thickness','$density')");
 echo "submitted";
 //exit();
//}
?>