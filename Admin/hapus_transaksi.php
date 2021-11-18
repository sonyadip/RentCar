<?php 
	//koneksi ke database
	include '../config.php';

	//menangkap data id yg dikirim di url
	//$id_detail = $_GET ['id_detail'];
    $id_transaksi = $_GET ['id_transaksi'];

	//menghapus data dari database
    mysqli_query($connection, "DELETE detail_transaksi, transaksi
    FROM detail_transaksi
    JOIN transaksi
    ON detail_transaksi.id_transaksi = transaksi.id_transaksi
    AND detail_transaksi.id_transaksi = '$id_transaksi'");

	//mysqli_query($connection, "delete from detail_transaksi where id_transaksi='$id_transaksi'");
    //mysqli_query($connection, "delete from transaksi where id_transaksi='$id_transaksi'");

	//mengalihkan halaman kembali ke listmahasiswa.php
	echo "<script>alert('Data transaksi berhasil di hapus');window.location='data_transaksi.php'</script>";
 ?>