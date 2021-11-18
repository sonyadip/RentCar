<?php
include '../config.php';

    session_start();

    $query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.lama, transaksi.tgl_kembali, mobil.harga, (harga*lama) as total_harga 
    FROM pelanggan
    INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
    INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil where $no_ktp ORDER BY id_transaksi DESC;");
    $row = mysqli_fetch_array($query);

    $lama = $_POST['lama'];
    $tgl_sewa = $_POST['tgl_sewa'];
    $status = 1;
    $no_mobil = $_POST['no_mobil'];
    $no_ktp = $_SESSION['no_ktp'];
    $harga =$row['harga'];

    $date = str_replace('/', '-', $tgl_sewa); 
    $newDate = date("Y-m-d", strtotime($date));

    $total_harga=$harga*$lama;

//MENGINPUT DATA KE DATABASE
mysqli_query($connection,"insert into transaksi (no_ktp, no_mobil, tgl_sewa, lama, status)  values ('$no_ktp', '$no_mobil', '$newDate', '$lama', '$status')");
$query2 = mysqli_query($connection, "SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1;");
    $row2 = mysqli_fetch_array($query2);
    $id = $row2['id_transaksi'];
    //$idbaru = (int) $id + 1;
mysqli_query($connection,"insert into detail_transaksi (id_detail, id_transaksi)  values ('', '$id')");

//MENGALIHKAN HALAMAN KEMBALI KE listmahasiswa.php
header ("location:detail_transaksi.php"); 
?>

<!-- mysqli_query($connection,"insert into transaksi (no_ktp, no_mobil, tgl_sewa, lama, tgl_kembali, status)  values ('$no_ktp', '$no_mobil', '$newDate', '$lama', '$newDate2' '$status')");
$ubahkembali = date('Y-m-d', strtotime("+$lama days", strtotime($date)));
    $kembali = str_replace('/', '-', $ubahkembali);
    $newDate2 = date("Y-m-d", strtotime($ubahkembali));
    // die (var_dump($newDate2, $newDate,$no_ktp, $no_mobil, $lama, $status)); -->















<!-- // if(isset($submit)){
    // if(empty($nama) or empty($penulis) or empty($tanggal)){
    // echo"<script>window.alert('Maaf,Form tidak boleh kosong....!!!');window.location=('transaksi.php');</script>";
    // }else{
    // $ins = mysqli_query($connection,"insert into buku(judul,penulis,tgl_terbit) values ('$nama','$penulis','$tgl_terbit')");
    // echo"<script>window.alert('Data Berhasil diupload');window.location=('transaksi.php');</script>";
    // }
    // }
    
    function ubahTanggal($tanggal){
        $pisah = explode('/',$tanggal);
        $array = array($pisah[2],$pisah[0],$pisah[1]);
        $satukan = implode('-',$array);
        // $satukan = format('yyyy-mm-dd',$tanggal);
        return $satukan;
        }
        
        $tgl_terbit = ubahTanggal($tgl_sewa);