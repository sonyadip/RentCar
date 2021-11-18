<?php 
//KONEKSI DATABASE
include '../config.php';

//MENANGKAP DATA YANG DIKIRIM DARI FORM
$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];

//MENGINPUT DATA KE DATABASE
mysqli_query($connection,"insert into pelanggan values ('$no_ktp', '$nama', '$email', '$no_telp', '$alamat', '$username', '$password')");

//MENGALIHKAN HALAMAN KEMBALI KE listmahasiswa.php
echo "<script>alert('Pelanggan berhasil ditambah');window.location='tambah_pelanggan.php'</script>";
?>