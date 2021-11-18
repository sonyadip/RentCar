<?php
//MENGAKTIFKAN SESSION PHP
session_start();

//MENGHUBUNGKAN DENGAN KONEKSI
include 'config.php';

//MENANGKAP DATA YANG DIKIRIM DARI FORM       ---> password?
$username = $_POST['username'];
$password = $_POST['password'];

//MENYELEKSI DATA ADMIN DENGAN USERNAME DAN PASSWORD YANG SESUAI
$data = mysqli_query($connection, "select * from pelanggan where username='$username' and password='$password'");
$data2 = mysqli_query($connection,"select * from admin where username='$username' and password='$password'");

//MENGHITUNG JUMLAH DATA YANG DITEMUKAN
$cek = mysqli_num_rows($data);
$cek2 = mysqli_num_rows($data2);

if($cek > 0){
    while($row = $data->fetch_assoc()) {
        $_SESSION['no_ktp']=$row["no_ktp"];
    }
    $_SESSION['usernam'] = $username;
    $_SESSION['status'] = 'login';
    header('location:pelanggan/beranda_pelanggan.php?pesan=login');
} else if($cek2 > 0){
    $_SESSION['usernam'] = $username;
    $_SESSION['status'] = 'login';
    header('location:admin/beranda_admin.php?pesan=login');
} else{
    header('location:login.php?pesan=gagal');
}
?>