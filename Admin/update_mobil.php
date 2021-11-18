<?php 
//KONEKSI DATABASE
include '../config.php';

//ambil data berdasarkan parameter GET id

//MENANGKAP DATA YANG DIKIRIM DARI FORM
$nama_mobil = $_POST['nama_mobil'];
$merk = $_POST['merk'];
$no_mobil = $_POST['no_mobil'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$id_pemilik = $_POST['id_pemilik'];

$gambar = $_FILES['gambar']['name'];
$namaSementara = $_FILES['gambar']['tmp_name'];
$lama=$_POST['gambar_lama'];
// die(var_dump($_FILES['gambar_lama'] ));

if(!empty($namaSementara)){
    $save=mysqli_query($connection, "update mobil set merk = '$merk', nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', gambar = '$gambar', harga = '$harga', status = '$status',  id_pemilik = '$id_pemilik' where no_mobil = '$no_mobil'");

    unlink("../img/mobil/".$lama); //hapus foto lama
        move_uploaded_file($namaSementara,"../img/$gambar");    //upload foto baru

    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
            echo "<script>alert('Mobil berhasil di update');document.location='tambah_mobil.php'</script>";
    }  
    else{  //jika update gagal maka muncul pesan
     echo "<script>alert('Proses update gagal, coba kembali');document.location='edit_mobil.php'</script>";
    }
}else{
    $save=mysqli_query($connection, "update mobil set merk = '$merk', nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', harga = '$harga', status = '$status', id_pemilik = '$id_pemilik' where no_mobil = '$no_mobil'");
    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
        echo "<script>alert('Mobil berhasil di update');document.location='tambah_mobil.php'</script>";
    }  
    else{  //jika update gagal maka muncul pesan
     echo "<script>alert('Proses update gagal, coba kembali');document.location='edit_mobil.php'</script>";
    }
}
    




        
?>
<!-- // tentukan lokasi file akan dipindahkan
$dirUpload = "../img/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$gambar);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$gambar."'>".$gambar."</a>";
} else {
    echo "Upload Gagal!";
}


if(!empty($namaSementara)){
            $save=mysqli_query($connection, "update mobil set merk = '$merk', nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', harga = '$harga', status = '$status' where no_mobil = '$no_mobil'");
            if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
                       echo "<script>alert('Data Produk Berhasil disimpan ke database');document.location='tambah_mobil.php'</script>";
            }
        unlink('../img/'.$lama); //hapus foto lama
        move_uploaded_file($gambar,"../img/$namaSementara");    //upload foto baru
    
        $save=mysqli_query($connection, "update mobil set merk = '$merk', nama_mobil = '$nama_mobil', deskripsi = '$deskripsi', gambar = '$gambar', harga = '$harga', status = '$status' where no_mobil = '$no_mobil'");
        
        if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
            echo "<script>alert('Data Produk Berhasil disimpan ke database');document.location='tambah_mobil.php'</script>";
        }else{  //jika update gagal maka muncul pesan
             echo "<script>alert('Proses simpan gagal, coba kembali');document.location='edit_mobil.php'</script>";
        }
    }