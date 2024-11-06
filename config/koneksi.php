<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb ='';
$namedb = 'ukk_galerifoto';

$koneksi = mysqli_connect($hostname,$userdb,$passdb,$namedb);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

?>