<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    .panel-footer.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
    .panel-heading.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel-body.panel-custom {
        padding: 10px 15px;
        background-color: white;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        body {
            margin-top: 70px;
            background-size:cover;
        }

    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tenklee Mobil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link " href="beranda_admin.php">Beranda <span class="sr-only">(current)</span></a>
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Input
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="tambah_mobil.php">Mobil</a>
                                <a class="dropdown-item" href="tambah_admin.php">Admin</a>
                                <a class="dropdown-item" href="tambah_pelanggan.php">Pelanggan</a>
                                <a class="dropdown-item" href="tambah_pemilik.php">Pemilik Mobil</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Laporan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="data_transaksi.php">Data Transaksi</a>        
                                <a class="dropdown-item" href="pengembalian.php">Pengembalian</a>                                
                        
                            </div>
                            </li>
                            <a class="nav-item nav-link" href="../Logout.php"onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
                            <a class="nav-item nav-link" href="#"> | </a>
                            <a class="nav-link"  style="font-weight: bold; color:deepskyblue;">
                                <?php
                                $username=$_SESSION['username'];
                                echo $username
                                ?></a>
                        </div>
                    </div>
        </div>
    </nav>

    <?php
    if(isset($_GET['no_ktp'])){
        $no_ktp = $_GET['no_ktp'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "../config.php";
    $query = mysqli_query($connection, "SELECT * FROM pelanggan WHERE no_ktp='$no_ktp'");
    $row = mysqli_fetch_array($query);
?>

<div class="row">
        <div class="col-md-" style="width: 1rem;"></div>
            <div class="col-md-3">
                <div class="card" style="width: 20rem; border-color: #F9E16F">
                    <div style="background-color:#fcf8e3; border-color:#F9E16F" class="panel-heading panel-custom"><h3 class="text-center">TAMBAH</h3></div>
                        <div style="border-color: #F9E16F" class="panel-body panel-custom">
                        <form method="post" action="pelanggan_aksi.php" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo $row['nama'];?>" placeholder="" autofocus="on" required>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" value="<?php echo $row['email'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">No. KTP</label>
                                    <input type="text" name="no_ktp" class="form-control form-control-sm" id="no_ktp" value="<?php echo $row['no_ktp'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="text" name="no_telp" class="form-control form-control-sm" id="no_telp" value="<?php echo $row['no_telp'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control form-control-sm" id="alamat" value="<?php echo $row['alamat'];?>" placeholder="" required>
                                </div>
                                <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control form-control-sm" id="username" value="<?php echo $row['username'];?>" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm" id="password" value="<?php echo $row['password'];?>" placeholder="" required>
                                </div>
                                <button type="submit" style="font-weight: 500" class="btn btn-warning btn-block">Simpan</button>
                                <a href="tambah_admin.php" style="font-weight: 450" class="btn btn-dark btn-block">Batal</a>                            
                            </form>
                    </div>
                </div>
            </div>
</div>
<div class="col-sm-">
        <div class="card" style="width: 62rem;">
        <div class="panel-heading panel-custom">
        <form method="post" enctype="multipart/form-data">
            <label>Cari :</label>
            <input type="text" name="keyword">
            <input type="submit" value="Search" name="cari">
            </form>      
        <h3 class="text-center mb-4">DAFTAR PELANGGAN</h3></div>
	        <div class="panel-body">
            <div class="col-sm-12">
	            <table class="table table-sm">
	                <thead>
	                    <tr>
	                        <th scope="col">No</th>
	                        <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. KTP</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                    <?php
                        $no = 1;
                            $batas = 10;
                            $halaman = @$_GET['halaman'];
                                if(empty($halaman)){
                            $posisi = 0;
                            $halaman = 1;
                            }
                            else {
                                $posisi = ($halaman-1) * $batas;
                            }
                        $nohal = 5;
                        $mulai = ($halaman>1) ? ($halaman * $nohal) - $nohal : 0;

                        $no = $mulai+1;
                        include ("../config.php");

	                    if(isset($_POST["cari"])){
                            $search = $_POST['keyword'];
                            $query = "SELECT * FROM pelanggan WHERE nama LIKE '%$search%' OR Email LIKE '%$search%' OR no_ktp LIKE '%$search%' OR no_telp LIKE '%$search%' OR username LIKE '%$search%' OR alamat LIKE '%$search%'  LIMIT $posisi, $batas";
                        } else {
                            $query = "SELECT * FROM pelanggan LIMIT $posisi, $batas";
                        }
                        $data = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($data)){
                            ?>
                            <th scope="row"><?=$no++?></th>
															<td><?=$row['nama']?></td>
															<td><?=$row['email']?></td>
                                                            <td><?=$row['no_ktp']?></td>
                                                            <td><?=$row['no_telp']?></td>
                                                            <td><?=$row['alamat']?></td>
                                                            <td><?=$row['username']?></td>
	                            <td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="edit_pelanggan.php?no_ktp=<?php echo $row ['no_ktp'];?>" style="font-weight: 500" class="btn btn-warning btn-sm">Edit</a>
	                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="hapus_pelanggan.php?no_ktp=<?php echo $row ['no_ktp'];?>" style="font-weight: 500" class="btn btn-danger btn-sm">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
	                    <?php } ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
        </div>
    </div>
    


<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
    
</body>
</html>
