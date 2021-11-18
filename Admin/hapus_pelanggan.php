<?php 
	//koneksi ke database
	include '../config.php';

	//menangkap data id yg dikirim di url
	$no_ktp = $_GET ['no_ktp'];

	//menghapus data dari database
	mysqli_query($connection, "delete from pelanggan where no_ktp='$no_ktp'");

	//mengalihkan halaman kembali ke listmahasiswa.php
	echo "<script>alert('Pelanggan berhasil di hapus');window.location='tambah_pelanggan.php'</script>";
 ?>