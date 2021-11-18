<?php

include '../config.php';
session_start();
$no_ktp = $_SESSION['no_ktp'];
$query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.status, mobil.merk, transaksi.tgl_sewa, transaksi.lama, transaksi.bukti, transaksi.id_transaksi, mobil.no_mobil, (harga*lama) as total_harga 
FROM pelanggan 
INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil where transaksi.no_ktp = $no_ktp;");
$row = mysqli_fetch_array($query);
$no_mobil = $row['no_mobil'];

    mysqli_query($connection, "update mobil set status = '1' where no_mobil = '$no_mobil'");
    //die (var_dump($no_mobil,$row['status']));
     echo "<script>alert('Konfirmasi Pengembalian Berhasil');document.location='pengembalian.php'</script>";

  ?>