<?php
session_start();
require_once("./connect/connect.php");

echo $_SESSION['all_gio_hang'];
echo $_SESSION["gio_hang"]["tong_so"];
echo $_SESSION['gio_hang']['tong_tien'];
?>