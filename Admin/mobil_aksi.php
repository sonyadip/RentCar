<?php 
//KONEKSI DATABASE
include '../config.php';

//MENANGKAP DATA YANG DIKIRIM DARI FORM
$nama_mobil = $_POST['nama_mobil'];
$merk = $_POST['merk'];
$no_mobil = $_POST['no_mobil'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$pemilik = $_POST['pemilik'];
//die (var_dump($pemilik, $nama_mobil, $merk, $harga, $deskripsi, $status));
$gambar = $_FILES['gambar']['name'];
$namaSementara = $_FILES['gambar']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../img/mobil/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$gambar);

//MENGINPUT DATA KE DATABASE
mysqli_query($connection,"insert into mobil values ( '$no_mobil', '$merk', '$nama_mobil', '$deskripsi', '$gambar', '$harga','$status', '$pemilik')");

//MENGALIHKAN HALAMAN KEMBALI KE listmahasiswa.php
echo "<script>alert('Mobil berhasil di tambah');window.location='tambah_mobil.php'</script>";
?>
<!-- if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$gambar."'>".$gambar."</a>";
} else {
    echo "Upload Gagal!";
}
