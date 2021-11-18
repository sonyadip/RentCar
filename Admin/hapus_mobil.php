<?php 
	//koneksi ke database
	include '../config.php';

	//menangkap data id yg dikirim di url
	$no_mobil = $_GET ['no_mobil'];

	//menghapus data dari database
	mysqli_query($connection, "delete from mobil where no_mobil='$no_mobil'");

	//mengalihkan halaman kembali ke listmahasiswa.php
	echo "<script>alert('Mobil berhasil di hapus');window.location='tambah_mobil.php'</script>";
 ?>