<?php 
	//koneksi ke db
	include '../config.php';

	//menangkap data yang dikirim dari form
    $no_ktp = $_POST['no_ktp'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	//update
	mysqli_query($connection, "update pelanggan set nama = '$nama', email='$email', no_telp = '$no_telp', alamat='$alamat', username = '$username', password = '$password' where no_ktp = '$no_ktp'");

	echo "<script>alert('Profil berhasil di update');window.location='beranda_pelanggan.php'</script>";
	//mengalihkan halaman kembali ke listmahasiswa.php
	//header("location:beranda_pelanggan.php");

?>