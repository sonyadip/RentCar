<?php 
	//koneksi ke db
	include '../config.php';

	//menangkap data yang dikirim dari form
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	//update
    mysqli_query($connection,"insert into admin values ( '', '$nama_admin', '$username', '$password')");

	echo "<script>alert('Admin berhasil di tambah');window.location='tambah_admin.php'</script>";
	//mengalihkan halaman kembali ke listmahasiswa.php
	//header("location:beranda_pelanggan.php");

?>