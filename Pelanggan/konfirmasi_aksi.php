<?php

include '../config.php';
session_start();
$no_ktp = $_SESSION['no_ktp'];
$query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.lama, transaksi.bukti, transaksi.id_transaksi, mobil.no_mobil, (harga*lama) as total_harga 
FROM pelanggan 
INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil where transaksi.no_ktp = $no_ktp;");
// $query = mysqli_query($connection, "SELECT * FROM transaksi WHERE no_ktp='$no_ktp'");
$row = mysqli_fetch_array($query);

$no_mobil = $row['no_mobil'];
$id_transaksi = $row['id_transaksi'];
$gambar = $_FILES['bukti']['name'];
$namaSementara = $_FILES['bukti']['tmp_name'];

if(!empty($namaSementara)){
    $save=mysqli_query($connection, "update mobil set status = '0' where no_mobil = '$no_mobil'");
    $save=mysqli_query($connection, "update transaksi set status = '0' where id_transaksi = '$id_transaksi'");
    $save=mysqli_query($connection, "update transaksi set bukti = '$gambar' where id_transaksi = '$id_transaksi'");
        move_uploaded_file($namaSementara,"../img/bukti/$gambar");    //upload foto baru

    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
            echo "<script>alert('Bukti pembayaran berhasil di upload');document.location='edit_profil.php?no_ktp=$no_ktp'</script>";
    }  
    else{  //jika update gagal maka muncul pesan
     echo "<script>alert('Proses simpan gagal, coba kembali');document.location='konfirmasi_transaksi.php'</script>";
    }
}

  ?>
  <!--
  if(($_FILES['bukti']['name'] == "")){
    echo alert("File bukti transaksi harus ada!", "konfirmasi.php?id_transaksi=$row[id_transaksi]");
    exit;
  }

  $x = explode('.', $_FILES['bukti']['name']);
  $bukti = $_SESSION["pelanggan"]["id"].date('dmYHis').'.'.strtolower(end($x));
  @move_uploaded_file($_FILES['bukti']['tmp_name'], '../img/bukti/'.$bukti);
  if ($connection->query("INSERT INTO konfirmasi VALUES(NULL, $_POST[_id], '$bukti')")) {
      $connection->query("UPDATE transaksi SET `status`='1' WHERE id_transaksi=$_POST[_id]");
      echo alert("Konfirmasi Berhasil!", "edit_profil.php?no_ktp=$row[no_ktp]");
  } else {
      echo alert("Konfirmasi Gagal!", "konfirmasi.php?id_transaksi=$row[id_transaksi]");
  }


  $gambar = $_FILES['gambar']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../img/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$gambar);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$gambar."'>".$gambar."</a>";
} else {
    echo "Upload Gagal!";
}

$query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.lama, transaksi.bukti, (harga*lama) as total_harga 
FROM pelanggan 
INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil;");

if(!empty($namaSementara)){
    $save=mysqli_query($connection, "update transaksi set status = '1' where id_transaksi = '$id_transaksi'");
    $save=mysqli_query($connection, "INSERT INTO transaksi (bukti) VALUES ('$gambar')");
        move_uploaded_file($namaSementara,"../img/bukti/$gambar");    //upload foto baru

    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
            echo "<script>alert('Data Produk Berhasil disimpan ke database');document.location='edit_profil.php'</script>";
    }  
    else{  //jika update gagal maka muncul pesan
     echo "<script>alert('Proses simpan gagal, coba kembali');document.location='edit_mobil.php'</script>";
    }
}


session_start();
$no_ktp = $_SESSION['no_ktp'];


// tentukan lokasi file akan dipindahkan
$dirUpload = "../img/bukti/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$gambar);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$gambar."'>".$gambar."</a>";
} else {
    echo "Upload Gagal!";
}
mysqli_query($connection, "INSERT INTO transaksi (bukti) VALUES ('$gambar')");
mysqli_query($connection, "update transaksi set status = '1' where id_transaksi = '$id_transaksi'");

header("location:edit_profil.php?no_ktp= echo $_SESSION ['no_ktp']");