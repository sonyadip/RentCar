<?php
session_start();

$no_ktp = $_SESSION['no_ktp'];

include "../config.php";
// $query = mysqli_query($connection, "SELECT * FROM transaksi WHERE no_ktp='$no_ktp'");
$query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.lama, (harga*lama) as total_harga 
FROM pelanggan
INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil where transaksi.no_ktp = $no_ktp;");
$row = mysqli_fetch_array($query);
$ubahtgl1 = date('d-m-Y', strtotime($row['tgl_sewa']));
$tanggal=$row['tgl_sewa'];
$lama=$row['lama'];
$tglkembali = date('Y-m-d', strtotime("+$lama days", strtotime($tanggal)));
$ubahtgl2 = date('d-m-Y', strtotime($tglkembali));

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
            margin-top: 40px;
            background-size:cover;
        }
        </style>
    <title>Hello, world!</title>
  </head>
  <body>
  <div class="row">
    <div style="width: 6rem;"></div>
    <div class="card">
    <div class="panel-heading panel-custom"><h3 class="text-center">Transaksi Berhasil</h3></div>
    <div class="panel-body panel-custom">
        <table style="width:100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>:  <?php echo $row['nama'];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: <?php echo $row['email'];?></td>
                </tr>
                <tr>
                    <th>Nama Mobil</th>
                    <td>: <?php echo $row['nama_mobil'];?></td>
                </tr>
                <tr>
                    <th>Merk Mobil</th>
                    <td>: <?php echo $row['merk'];?></td>
                </tr>
                <tr>
                    <th>Harga Sewa</th>
                    <td>: Rp. <?php echo number_format($row["harga"],0,",",".");?>,-/hari</td>
                </tr>
                <tr>
                    <th>Lama Sewa</th>
                    <td>: <?php echo $row['lama'];?> hari</td>
                </tr>
                <tr>
                    <th>Tanggal Ambil</th>
                    <td>: <?php echo $ubahtgl1;?></td>
                </tr>
                <tr>
                    <th>Tanggal Kembali</th>
                    <td>: <?php echo $ubahtgl2;?></td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>: Rp. <?php echo number_format($row["total_harga"],0,",",".");?></td>
                </tr>
            </thead>
        </table>
        <hr>
        <h3>Terimakasih</h3>
        <p>
            Transaksi pembelian anda telah berhasil<br>
            Silahkan anda membayar tagihan anda dengan cara transfer via Bank BRI di nomor Rekening : <br>
            <strong>(0986-01-025805-53-8 a/n SEWA MOBIL)</strong> untuk menyelesaikan pembayaran. dan untuk uang muka minimal setengah dari harga sewa.
        </p>
        <p>
            Jika anda sudah melakukan transfer silahkan anda melakukan konfirmasi pembayaran dengan mengunjungi halaman profil akun anda lalu tekan tombol. <i><b>Lihat Profil</b></i>.
        </p>
    </div>
    <div class="panel-footer panel-custom">
        <a href="edit_profil.php?no_ktp=<?php echo $_SESSION['no_ktp']?>" class="btn btn-primary btn-sm">Lihat Profil</a>
    </div>
</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>