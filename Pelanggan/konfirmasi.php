<?php
session_start();

$no_ktp = $_SESSION['no_ktp'];

include "../config.php";
// $query = mysqli_query($connection, "SELECT * FROM transaksi WHERE no_ktp='$no_ktp'");
$query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.lama, transaksi.bukti, (harga*lama) as total_harga 
FROM pelanggan 
INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil;");
$row = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .panel-footer.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
    .panel-heading.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel-body.panel-custom {
        padding: 10px 15px;
        background-color: white;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        body {
            margin-top: 70px;
            background-size:cover;
        }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Tenklee Mobil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="beranda_pelanggan.php">Beranda</a>
        <a class="nav-item nav-link active" href="">Profil</a>
        <a class="nav-item nav-link" href="../Logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
        <a class="nav-item nav-link" href="#"> | </a>
                <a class="nav-link" href="#" style="font-weight: bold; color:deepskyblue;">
                                            <?php
                                            
                                            $username=$_SESSION['username'];
                                            echo $username
                                            ?></a>
        </div>
    </div>
    </div>
    </nav>


    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6">
                    <div class="card">
                    <form method="post" action="konfirmasi_aksi.php" enctype="multipart/form-data" >
                        <div class="panel-heading panel-custom"><h3 class="text-center"><b>Konfirmasi</b></h3></div>
                        <div class="panel-body panel-custom">
                                <div class="form-group">
                                    <label for="bukti">Bukti Pembayaran</label>
                                    <input type="file" name="bukti" class="form-control form-control-sm" id="bukti" placeholder="" autofocus="on">
                                </div>
                                <button type="submit" class="btn btn-dark btn-block">Simpan</button>
                        </div>
                        <br>
                        <div class="panel-footer panel-custom">
                        </div>
                    </div>
                    </form>
                </div>
                
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>