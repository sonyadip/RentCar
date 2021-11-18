<?php 
//KONEKSI DATABASE
include '../config.php';

//MENANGKAP DATA YANG DIKIRIM DARI FORM
$no_ktp_pemilik = $_POST['no_ktp_pemilik'];
$nama_pemilik = $_POST['nama_pemilik'];
$email_pemilik = $_POST['email_pemilik'];
$no_telp_pemilik = $_POST['no_telp_pemilik'];
$alamat_pemilik = $_POST['alamat_pemilik'];

$carikode = mysqli_query($connection, "SELECT id_pemilik from pemilik_mobil");
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
   // menjadikan $nilaikode ( int )
   $kode = (int) $jumlah_data;
   // setiap $kode di tambah 1
   $kodeJadi = $kode + 1;

//MENGINPUT DATA KE DATABASE
mysqli_query($connection,"insert into pemilik_mobil values ('$kodeJadi', '$no_ktp_pemilik', '$nama_pemilik', '$email_pemilik', '$no_telp_pemilik', '$alamat_pemilik')");

//MENGALIHKAN HALAMAN KEMBALI KE listmahasiswa.php
echo "<script>alert('pemilik berhasil di tambah');window.location='tambah_pemilik.php'</script>";
?>