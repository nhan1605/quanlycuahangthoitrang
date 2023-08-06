<?php
$servername = "localhost";
$username ="root";
$password="";
$dbname = "d3nt_clothing";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connect fail:".$conn->connect_error);
}
?>