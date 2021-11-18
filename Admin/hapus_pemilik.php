<?php 
	//koneksi ke database
	include '../config.php';

	//menangkap data id yg dikirim di url
	$no_ktp_pemilik = $_GET ['no_ktp_pemilik'];

	//menghapus data dari database
	mysqli_query($connection, "delete from pemilik_mobil where no_ktp_pemilik='$no_ktp_pemilik'");

	//mengalihkan halaman kembali ke listmahasiswa.php
	echo "<script>alert('Pemilik Mobil berhasil di hapus');window.location='tambah_pemilik.php'</script>";
 ?>