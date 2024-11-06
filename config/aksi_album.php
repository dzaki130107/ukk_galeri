<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('', '$namaalbum', '$deskripsi', '$tanggal', '$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $album = $_POST['albumid']; 
    $namaalbum = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];



    $sql = mysqli_query($koneksi, "UPDATE album SET nama_album='$namaalbum', deskripsi='$deskripsi', tanggal_di_buat='$tanggal' WHERE album_id='$album'");

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['hapus'])) {
  $album = $_POST['albumid'];

  $sql = mysqli_query($koneksi, "DELETE FROM album WHERE album_id='$album'");

  echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/album.php';
    </script>";
}

?>
