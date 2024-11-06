<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
         
        </li>
        <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
        <a href="login.php" class="btn btn-outline-succes m-1">Masuk</a>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5><Data>ftar Akun Baru</Data></h5>
                    </div>
                    <form action="config/aksi_register.php"method="POST">
                        <label class="form-label">Username</label>
                        <input type="text" name="username"class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="Password" name="password"class="form-control" required>
                        <label class="form-label">Email</label>
                        <input type="email" name="email"class="form-control" required>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap"class="form-control" required>
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat"class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">DAFTAR</button>
                        </div>
                    </form>
                    <hr>
                    <p>Belum punya akun? <a href="login.php">Login disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flexx justify-content-center border-top mt-3 bg-light fixed-bottom">
<center><p>&copy; Uji Kompetensi PPLG 2 Dzaki Waliya Zahran</p></center>
 
</footer>


<script type="text/javascript" src=""assets/js/bootstrap.min.js"></script>
</body>
</html>