<?php 
	//koneksi ke db
	include '../config.php';

	//menangkap data yang dikirim dari form
	$no_ktp_pemilik = $_POST['no_ktp_pemilik'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $email_pemilik = $_POST['email_pemilik'];
    $no_telp_pemilik = $_POST['no_telp_pemilik'];
    $alamat_pemilik = $_POST['alamat_pemilik'];

    
	//update
	mysqli_query($connection, "update pemilik_mobil set nama_pemilik = '$nama_pemilik', email_pemilik = '$email_pemilik', no_telp_pemilik = '$no_telp_pemilik', alamat_pemilik = '$alamat_pemilik' where no_ktp_pemilik = '$no_ktp_pemilik'");

	echo "<script>alert('Admin berhasil di update');window.location='tambah_pemilik.php'</script>";
	//mengalihkan halaman kembali ke listmahasiswa.php
	//header("location:beranda_pelanggan.php");

?>