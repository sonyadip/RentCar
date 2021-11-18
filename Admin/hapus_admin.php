<?php 
	//koneksi ke database
	include '../config.php';

	//menangkap data id yg dikirim di url
	$id_admin = $_GET ['id_admin'];

	//menghapus data dari database
	mysqli_query($connection, "delete from admin where id_admin='$id_admin'");

	//mengalihkan halaman kembali ke listmahasiswa.php
	echo "<script>alert('Admin berhasil di hapus');window.location='tambah_admin.php'</script>";
 ?>