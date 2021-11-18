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
        text-align:left;
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
                            <li class="nav-item dropdown">
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
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    
    <div class="row">
        <div style="width: 2.7rem;"></div>
        <div class="col-sm-">
        <div class="card" style="width: 82rem;">
        <div class="panel-heading panel-custom">
        <form method="post" enctype="multipart/form-data">
            <label>Cari :</label>
            <input type="text" name="keyword">
            <input type="submit" value="Search" name="cari">
            </form>    
        <h3 class="text-center">Data Transaksi</h3></div>
	        <div class="panel-body">
            <div class="col-sm-12">
	            <table style="font-size:90% " class="table table-sm">
	                <thead>
	                    <tr>
	                        <th scope="col">No</th>
	                        <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nama Mobil</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Plat Mobil</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal Sewa</th>
                            <th scope="col">Lama Sewa</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Action</th>
	                    </tr>
                        </thead>
	                <tbody>
                    <?php
                    include "../config.php";
                        $no = 1;
                        // Langkah 1. Tentukan batas, cek halaman & posisi data
                            $batas = 5;
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

                            if(isset($_POST["cari"])){
                                $search = $_POST['keyword'];
                                $query = "SELECT pelanggan.nama, pelanggan.no_ktp, pelanggan.no_telp, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, mobil.no_mobil, transaksi.tgl_sewa, detail_transaksi.id_transaksi, transaksi.id_transaksi, transaksi.lama, (harga*lama) as total_harga 
                                        FROM pelanggan
                                        INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
                                        INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil
                                        INNER JOIN detail_transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi WHERE nama LIKE '%$search%' LIMIT $posisi, $batas";
                            } else {
                                $query = "SELECT pelanggan.nama, pelanggan.no_ktp, pelanggan.no_telp, pelanggan.email, mobil.harga, mobil.nama_mobil, mobil.merk, mobil.no_mobil, transaksi.tgl_sewa, detail_transaksi.id_transaksi, transaksi.id_transaksi, transaksi.lama, (harga*lama) as total_harga 
                                        FROM pelanggan
                                        INNER JOIN transaksi ON transaksi.no_ktp = pelanggan.no_ktp
                                        INNER JOIN mobil ON transaksi.no_mobil = mobil.no_mobil
                                        INNER JOIN detail_transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi LIMIT $posisi, $batas";
                            }
                        $data = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($data)){
                            $tanggal=$row['tgl_sewa'];
                            $lama=$row['lama'];
                            $ubahtgl1 = date('d-m-Y', strtotime($row['tgl_sewa']));
                            $tglkembali = date('Y-m-d', strtotime("+$lama days", strtotime($tanggal)));
                            $ubahtgl2 = date('d-m-Y', strtotime($tglkembali));
                            ?>
	                        <tr>
                            <th scope="row"><?=$no++?></th>
								<td><?=$row['nama']?></td>
                                <td><?=$row['nama_mobil']?></td>
                                <td><?=$row['merk']?></td>
                                <td><?=$row['no_mobil']?></td>
                                <td>Rp. <?=$row['harga']?>,-/hari</td>
                                <td><?=$ubahtgl1?></td>
                                <td><?=$row['lama']?> Hari</td>
                                <td><?=$ubahtgl2?></td>
                                <td>Rp. <?php echo number_format($row["total_harga"],0,",",".");?></td>
	                            <td class="hidden-print">
	                                <div class="btn-group">
	                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="hapus_transaksi.php?id_transaksi=<?php echo $row ['id_transaksi'];?>" style="font-weight: 500" class="btn btn-danger btn-sm">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
                        <?php
	                    }
		            ?>
	                </tbody>
	            </table>
	        </div>
            <div style="text-align: right;" class="panel-footer panel-custom">
                    <?php include ("../config.php");
                        //Langkah 2. Hitung total data dan halaman serta link 1,2,3
                        $query2		= mysqli_query($connection, "select * from transaksi");
                        $jmldata	= mysqli_num_rows($query2);
                        $jmlhalaman	= ceil($jmldata/$batas);
                        
                echo " Hal : ";

                for($i=1; $i<=$jmlhalaman; $i++)
                if($i != $halaman){
                    echo " <a href=\"data_transaksi.php?halaman=$i\">$i</a> | ";
                }
                else{
                    echo " <b>$i</b> | ";
                } ?>
			</div>
	    </div>
    </div>
</div>
</body>
</html>