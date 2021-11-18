<?php 
	//koneksi ke db
	include '../config.php';

	//menangkap data yang dikirim dari form
	$id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	//update
	mysqli_query($connection, "update admin set nama_admin = '$nama_admin', username = '$username', password = '$password' where id_admin = '$id_admin'");

	echo "<script>alert('Admin berhasil di update');window.location='tambah_admin.php'</script>";
	//mengalihkan halaman kembali ke listmahasiswa.php
	//header("location:beranda_pelanggan.php");

?>