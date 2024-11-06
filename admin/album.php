<?php
session_start();
include '../config/koneksi.php';
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
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
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

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Album</div>
                <div class="card-body">
                    <form action="../config/aksi_album.php" method="POST">
                        <label class="form-label">Nama Album</label>
                        <input type="text" name="namaalbum" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" required></textarea>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Album</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Album</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$userid'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_album'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['tanggal_di_buat'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['album_id'] ?>">
                                        Edit
                                    </button>

                                    <div class="modal fade" id="edit<?php echo $data['album_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_album.php" method="POST">
                                                        <input type="hidden" name="albumid" value="<?php echo $data['album_id'] ?>">
                                                        <label class="form-label">Nama Album</label>
                                                        <input type="text" name="nama_album" value="<?php echo $data['nama_album'] ?>" class="form-control" required>
                                                        <label class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['album_id'] ?>">
                                        Hapus
                                    </button>

                                    <div class="modal fade" id="hapus<?php echo $data['album_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_album.php" method="POST">
                                                        <input type="hidden" name="albumid" value="<?php echo $data['album_id'] ?>">
                                                        Apakah anda yakin akan menghapus data <strong> <?php echo $data['nama_album'] ?> </strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <center><p>&copy; Uji Kompetensi PPLG 2 Dzaki Waliya Zahran</p></center>
</footer>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
