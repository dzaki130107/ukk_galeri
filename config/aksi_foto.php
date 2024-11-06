<?php
    session_start();
    require_once("koneksi.php");

    if(isset($_POST['tambah'])) {
        $judulfoto = $_POST['judulfoto'];
        $deskripsifoto = $_POST['deskripsi'];
        $tanggalunggah = date('Y-m-d');
        $albumid = $_POST['album_id'];
        $userid = $_SESSION['userid'];
        $foto = $_FILES['lokasi_file']['name'];
        $tmp = $_FILES['lokasi_file']['tmp_name'];
        $lokasi = '../assets/img/';
        $namafoto = rand(). '-'.$foto;
        try  {
            move_uploaded_file($tmp, $lokasi.$namafoto);
        } catch (\Exception $e) {
            throw $e;
        }
        

        $query = "INSERT INTO foto (judul_foto, deskripsi_foto, tanggal_unggah, lokasi_file, album_id, user_id) 
          VALUES ('$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$albumid', '$userid')";

        $sql = mysqli_query($koneksi, $query);

        echo "<script>
            alert('Data berhasil disimpan');
            location.href='../admin/foto.php';
        </script>";
    }

    if(isset($_POST['edit'])) {
        $fotoid = $_POST['foto_id'];
        $judulfoto = $_POST['judul_foto'];
        $deskripsifoto = $_POST['deskripsifoto'];
        $tanggalunggah = date('Y-m-d');
        $albumid = $_POST['album_id'];
        $userid = $_SESSION['userid'];
        $foto = $_FILES['lokasi_file']['name'];
        $tmp = $_FILES['lokasi_file']['tmp_name'];
        $lokasi = '../assets/img/';
        $namafoto = rand(). '-'.$foto;

        if($foto == null) {
            $query = "UPDATE foto SET judul_foto='$judulfoto', deskripsi_foto='$deskripsifoto', tanggal_unggah='$tanggalunggah', album_id='$albumid' WHERE foto_id='$fotoid'";
            $sql = mysqli_query($koneksi, $query);
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE foto_id='$fotoid'");

            $data = mysqli_fetch_array($query);
            if(is_file('../assets/img/'.$data['lokasi_file'])) {
                unlink('../assets/img/'.$data['lokasi_file']);
            }
            move_uploaded_file($tmp, $lokasi.$namafoto);
            $sql = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judulfoto', deskripsi_foto='$deskripsifoto', tanggal_unggah='$tanggalunggah', lokasi_file='$namafoto', album_id='$albumid' WHERE foto_id='$fotoid'");
        }
        echo "<script>
            alert('Data berhasil diperbarui');
            location.href='../admin/foto.php';
        </script>";
    }

    if(isset($_POST['hapus'])) {
        $fotoid = $_POST['foto_id'];

        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE foto_id='$fotoid'");
        $data = mysqli_fetch_array($query);
        if(is_file('../assets/img/'.$data['lokasi_file'])) {
            unlink('../assets/img/'.$data['lokasi_file']);
        }

        $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE foto_id='$fotoid'");

        echo "<script>
            alert('Data berhasil dihapus');
            location.href='../admin/foto.php';
        </script>";
    }
?>