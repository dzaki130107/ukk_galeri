<?php
session_start();
include 'koneksi.php';

$fotoid = $_GET['foto_id']; // Ensure the key matches what you sent in the URL
$userid = $_SESSION['userid'];

$ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$fotoid' AND user_id='$userid'");

if (mysqli_num_rows($ceksuka) ==1 ) {
   while($row = mysqli_fetch_array($ceksuka)){
    $likeid = $row['like_id'];
    $query = mysqli_query($koneksi, "DELETE FROM like_foto WHERE like_id='$likeid'");

    echo "<script>
    location.href='../admin/home.php';
    </script>";
   }
}else{
    $tanggallike = date('Y-m-d'); // Correctly formatted date string
    $query = mysqli_query($koneksi, "INSERT INTO like_foto VALUES('', '$fotoid', '$userid', '$tanggallike')");
    
    if ($query) {
        echo "<script>
        location.href='../admin/home.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
}

// Fix the date format by putting it in quotes
 // Handle query error
}
?>
