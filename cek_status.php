<?php
if (isset($_SESSION['username'])) {
//MENGALIHKAN HALAMAN KEMBALI KE listmahasiswa.php
header("location:pelanggan/transaksi.php"); 

} else {
header("location:login.php");
}
?>