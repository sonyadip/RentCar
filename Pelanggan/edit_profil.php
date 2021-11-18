<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        <a class="nav-item nav-link" href="beranda_pelanggan.php">Beranda</a>
        <a class="nav-item nav-link active" href="">Profil</a>
        <a class="nav-item nav-link" href="../Logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
        <a class="nav-item nav-link" href="#"> | </a>
                <a class="nav-link" href="#" style="font-weight: bold; color:deepskyblue;">
                                            <?php
                                            session_start();
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
        <div class="col-md-1"></div>
            <div class="col-md-3">
                    <div class="card">
                    <form method="post" action="update_profil.php">
                        <div class="panel-heading panel-custom"><h3 class="text-center"><b>Profil</b></h3></div>
                        <div class="panel-body panel-custom">
                            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="" autofocus="on" value="<?php echo $row['nama'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" placeholder="" value="<?php echo $row['email'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">No. KTP</label>
                                    <input type="text" name="no_ktp" class="form-control form-control-sm" id="no_ktp" placeholder="" value="<?php echo $row['no_ktp'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="text" name="no_telp" class="form-control form-control-sm" id="no_telp" placeholder="" value="<?php echo $row['no_telp'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control form-control-sm" id="alamat" placeholder="" value="<?php echo $row['alamat'];?>">
                                </div>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control form-control-sm" id="username" placeholder="" value="<?php echo $row['username'];?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="" value="<?php echo $row['password'];?>">
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-dark btn-block">Edit</button>
                            </form>
                            
                        </div>
                        <br>
                        <div class="panel-footer panel-custom">
                        </div>
                    </div>
                    </form>
                </div>

    <br>
    <div class="col-sm-5">
        <div class="card" style="width: 50rem;">
        <div class="panel-heading panel-custom"><h3 class="text-center">Riwayat Pemesanan</h3></div>
	        <div class="panel-body">
            <div class="col-sm-12">
	            <table class="table table-sm">
	                <thead>
	                    <tr>
	                        <th scope="col">No</th>
	                        <th scope="col">Tanggal Sewa</th>
	                        <th scope="col">Lama Sewa</th>
                            <th scope="col">Harga Sewa</th>
                            <th scope="col">Total Harga</th>
                        <th scope="col">Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                    <?php $no = 1; ?>
                        <?php include ("../config.php"); ?>
                            <?php 
                            
                            
                            include "../config.php";
                            $query = mysqli_query($connection, "SELECT pelanggan.nama, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, transaksi.tgl_sewa, transaksi.id_transaksi, transaksi.lama, transaksi.status, detail_transaksi.id_detail, (harga*lama) as total_harga 
                            FROM pelanggan
                            INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
                            INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil
                            INNER JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi where transaksi.no_ktp = $no_ktp ;"); //where $no_ktp ORDER BY id_transaksi DESC
                            ?>
	                        <?php while($row = $query->fetch_assoc()): 
                                $status = $row['status'];
                                $new_date = date('d-m-Y', strtotime($row['tgl_sewa'])); ?>
                                
	                        <tr>
                            <th scope="row"><?=$no++?></th>
								<td><?=$new_date?></td>
								<td><?=$row['lama']?> Hari</td>
                                <td>Rp. <?=number_format($row["harga"],0,",",".");?>,-/hari</td>
                                <td>Rp. <?=number_format($row["total_harga"],0,",",".");?>,-</td>
	                            <td class="hidden-print">
	                                <div class="btn-group">
                                        <?php 
                                        if($status == '0') { ?>
                                            <a href="detail_transaksi.php?id_detail=<?php echo $row ['id_detail'];?>" style="font-weight: 500" class="btn btn-primary btn-sm">Detail</a>
                                        <?php }
                                        else {?>
                                            <a href="konfirmasi.php?id_detail=<?php echo $row ['id_detail'];?>" style="font-weight: 500" class="btn btn-danger btn-sm">konfirmasi</a>
                                            <a href="detail_transaksi.php?id_detail=<?php echo $row ['id_detail'];?>" style="font-weight: 500" class="btn btn-primary btn-sm">Detail</a>
                                       <?php } ?>
    	                                </div>
	                            </td>
	                        </tr>
                            <?php endwhile ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<!-- 
$query = "SELECT `status` FROM transaksi WHERE `status`='$status'";
                                        $find = mysql_query($query);