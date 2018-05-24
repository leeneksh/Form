<?php

 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysqli_connect($host,$username,$password,$databasename);

 $html = "<form action=\"?action=putData\" method=\"POST\">";
 $html1 = "<center>Length: <select name='length'><option value=\"\">Please select length</option>";
 $html2 = "Breadth: <select name='breadth'><option value=\"\">Please select breadth</option>";
 $html3 = "Thickness: <select name='thickness'><option value=\"\">Please select thickness</option>";
 $html4 = "Density: <select name='density'><option value=\"\">Please select density</option>";
 $html5 = "Quantity: <select name='quantity'><option value=\"\">Please select quantity</option>";

 $query = "SELECT * from contacts";
 $output = mysqli_query ($connect, $query) or die ("Error in connection..!!");

 while ($row = mysqli_fetch_array($output)) {
 	$length = $row['length']; 
 	$breadth = $row['breadth'];
 	$thickness = $row['thickness']; 
 	$density = $row['density'];
 	$html1 .= "<option value='$length'>$length</option>";
 	$html2 .= "<option value='$breadth'>$breadth</option>";
 	$html3 .= "<option value='$thickness'>$thickness</option>";
 	$html4 .= "<option value='$density'>$density</option>";
   }

   for ($x = 1; $x <= 10; $x++) {
    $html5 .= "<option value='$x'>$x</option>";
}

   $html1 .= "</select><br/><br/>";
   $html2 .= "</select><br/><br/>";
   $html3 .= "</select><br/><br/>";
   $html4 .= "</select><br/><br/>";
   $html5 .= "</select><br/><br/>";
   $html .= $html1.$html2.$html3.$html4.$html5."<input type=\"submit\" value\"Add\"><input type=\"reset\" value=\"Reset\"></form><br>";
   $html .= "<form action = \"?action=showData\" method=\"POST\"><input type=\"hidden\" value=\"\"></form><br><br><hr><br><br>";

   echo ($html);

if(isset($_GET['action'])=='putData') {
    putData();
}
    if(isset($_GET['action'])=='showData') {
    showData();
}
?>

<?php 
   function putData () {

   	$length = $_POST['length'];
   	$breadth = $_POST['breadth'];
   	$thickness = $_POST['thickness'];
   	$density = $_POST['density'];
   	$quantity = $_POST['quantity'];
   	$weight = $length * $breadth * $thickness * $density * $quantity;

$host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysqli_connect($host,$username,$password,$databasename);

$query = "insert into temp values ('$length', '$breadth', '$thickness', '$density', '$quantity', '$weight')";
mysqli_query($connect, $query);

   }
?>

<?php 
   function showData () {

$host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysqli_connect($host,$username,$password,$databasename);
 $var = 1;

$query = "select *from temp";
$output = mysqli_query($connect,$query);

while ($row = mysqli_fetch_array($output)) {
 	$length = $row['length']; 
 	$breadth = $row['breadth'];
 	$thickness = $row['thickness']; 
 	$density = $row['density'];
 	$quantity = $row['quantity'];
 	$weight = $row['weight'];

$html = "<p align =\"left\">Item ".$var."</p>";

$html .= "<table width=\"700\"><tr><td>Quantity</td><td>Length</td><td>Breadth</td><td>Thickness</td><td>Density</td><td>Weight</td></tr><tr><td>".$length."</td><td>".$breadth."</td><td>".$thickness."</td><td>".$density."</td><td>".$quantity."</td><td>".$weight."</td></tr></table><br><br>";

   echo ($html);
   $var++;
   }
}
?>