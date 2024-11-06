<?php
session_start();
include '../config/koneksi.php';

$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="home.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="../config/aksi_logout.php" class="btn btn-outline-danger">Keluar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-3">
    Album:
    <?php 
    // Query untuk menampilkan album berdasarkan user
    $album = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$userid'");
    while ($row = mysqli_fetch_array($album)) { ?>
        <a href="home.php?album_id=<?php echo $row['album_id'] ?>" class="btn btn-outline-primary"><?php echo $row['nama_album'] ?></a>
    <?php } ?>
    
    <div class="row">
        <?php
        // Memeriksa jika parameter album_id ada di URL
        if (isset($_GET['album_id'])) {
            $album_id = $_GET['album_id']; // Mengambil album_id dari URL
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE user_id='$userid' AND album_id='$album_id'"); // Menampilkan foto berdasarkan album_id

            // Cek jika query menghasilkan data
            if (mysqli_num_rows($query) == 0) {
                echo "<p>Tidak ada foto di album ini.</p>";
            }

            // Menampilkan foto berdasarkan album_id
            while ($data = mysqli_fetch_array($query)) {
                $fotoid = $data['foto_id'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$fotoid' AND user_id='$userid'");
                ?>
                <div class="col-md-3 mt-2"> 
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" alt="card-img-top" style="height:12rem; object-fit:cover;" title="<?php echo $data['judul_foto'] ?>">
                        <div class="card-footer text-center">
                            <?php if (mysqli_num_rows($ceksuka) == 1) { ?>
                                <a href="../config/proses_like.php?foto_id=<?php echo $fotoid ?>" class="btn btn-link"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                                <a href="../config/proses_like.php?foto_id=<?php echo $fotoid ?>" class="btn btn-link"><i class="fa-regular fa-heart"></i></a>
                            <?php } ?>
                            
                            <?php   
                            $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$fotoid'");
                            echo mysqli_num_rows($like) . ' suka';
                            ?>
                            <a href="#" class="btn btn-link"><i class="fa-regular fa-comment"></i></a> 120 komentar
                        </div>
                    </div>
                </div>
            <?php } 
        } else {
            // Jika tidak ada album_id, tampilkan semua foto pengguna
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE user_id='$userid'");
            
            // Debugging: tampilkan jumlah foto yang ditemukan
            echo "<p>Total foto ditemukan: " . mysqli_num_rows($query) . "</p>";
            
            if (mysqli_num_rows($query) == 0) {
                echo "<p>Tidak ada foto untuk pengguna ini.</p>";
            }
            
            while ($data = mysqli_fetch_array($query)) {
                $fotoid = $data['foto_id'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$fotoid' AND user_id='$userid'");
                ?>
                <div class="col-md-3 mt-2"> 
                    <div class="card">
                        <img style="height:12rem; object-fit:cover;" src="../assets/img/<?php echo $data['lokasi_file'] ?>" alt="card-img-top" title="<?php echo $data['judul_foto'] ?>">
                        <div class="card-footer text-center">
                            <?php if (mysqli_num_rows($ceksuka) == 1) { ?>
                                <a href="../config/proses_like.php?foto_id=<?php echo $fotoid ?>" class="btn btn-link"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                                <a href="../config/proses_like.php?foto_id=<?php echo $fotoid ?>" class="btn btn-link"><i class="fa-regular fa-heart"></i></a>
                            <?php } ?>

                            <?php   
                            $like = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$fotoid'");
                            echo mysqli_num_rows($like) . ' suka';
                            ?>
                            <a href="#" class="btn btn-link"><i class="fa-regular fa-comment"></i></a> 120 komentar
                        </div>
                    </div>
                </div>
            <?php } 
        } ?>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <center><p>&copy; Uji Kompetensi PPLG 2 Dzaki Waliya Zahran</p></center>
</footer>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
