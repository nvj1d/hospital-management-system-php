<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = 'hopital';
$dbh =null;
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
}
catch(PDOException $e)
{
   echo $e->getMessage();
}
?>

