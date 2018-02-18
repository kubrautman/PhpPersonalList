<?php
$servername="localhost";
$username="root";
$password="";
$db_name="deneme";
$baglanti=mysqli_connect($servername,$username,$password,$db_name);
if(!$baglanti){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}





//mysql_close($baglanti); // MYSQL sunucusu ile bağlantımızı koparttık
?>
