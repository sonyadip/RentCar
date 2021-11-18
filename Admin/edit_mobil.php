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
                            <a class="nav-item nav-link" href="beranda_admin.php">Beranda <span class="sr-only">(current)</span></a>
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
    
    if(isset($_GET['no_mobil'])){
        $no_mobil = $_GET['no_mobil'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "../config.php";
    $query = mysqli_query($connection, "SELECT mobil.nama_mobil, mobil.merk, mobil.no_mobil, mobil.deskripsi, mobil.harga, mobil.gambar, mobil.status, pemilik_mobil.nama_pemilik, pemilik_mobil.no_telp_pemilik, pemilik_mobil.id_pemilik 
    FROM mobil INNER JOIN pemilik_mobil USING (id_pemilik) WHERE no_mobil='$no_mobil'");

    $row = mysqli_fetch_array($query);
?>

<div class="row">
            <div class="col-md-" style="width: 1.5rem;"></div>
            <div class="col-md-3">
                <div class="card" style="width: 20rem; border-color: #F9E16F">
                <div style="background-color:#fcf8e3; border-color:#F9E16F" class="panel-heading panel-custom "><h3 style="color:#CBA906" class="text-center">EDIT</h3></div>
                        <div style="border-color: #F9E16F" class="panel-body panel-custom">
                            <form method="POST" action="update_mobil.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="nama">Nama Mobil</label>
                                    <input type="text" name="nama_mobil" class="form-control form-control-sm" id="nama_mobil" placeholder="" value="<?php echo $row['nama_mobil'];?>" autofocus="on" required>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk Mobil</label>
                                    <input type="text" name="merk" class="form-control form-control-sm" id="merk" placeholder="" value="<?php echo $row['merk'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_mobil">Plat Mobil</label>
                                    <input type="text" name="no_mobil" class="form-control form-control-sm" id="no_mobil" placeholder="" value="<?php echo $row['no_mobil'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control form-control-sm" id="deskripsi" placeholder="Maksimal Penumpang, AC Mati/Hidup dll" value="<?php echo $row['deskripsi'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Gambar">Gambar</label>
                                    <input type="file" name="gambar" class="form-control-file" id="gambar" required>
                                    <?php echo "<img src='../img/mobil/$row[gambar]' width='140rem' />";?>
                                    <input type="hidden" name="gambar_lama" value="<?php echo $row['gambar'];?>"/></td>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" class="form-control form-control-sm" id="harga" placeholder="" value="<?php echo $row['harga'];?>" required>                                </div>
                                <div class="form-group">
                                    <label for="pemilik">Pemilik</label>
                                    <select class="custom-select custom-select-sm" name="id_pemilik" id="id_pemilik" required>
                                        <?php                                 
                                        include "../config.php";
                                        $sql_pemilik = mysqli_query($connection, "SELECT * FROM pemilik_mobil");
                                        while ($data_pemilik=mysqli_fetch_array($sql_pemilik)) {
                                        if ($data['nama_pemilik']==$data_pemilik['id_pemilik']) {
                                        $select="selected";
                                        }
                                        else{
                                        $select="";
                                        }
                                        $idpem = $data_pemilik ['id_pemilik'];
                                        echo "<option value= '$idpem' $select>".$data_pemilik['nama_pemilik']."</option>";
                                    } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select custom-select-sm" name="status" id="status" required>
                                    <option value="">----</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                </div>
                                <form>
                                <button type="submit" style="font-weight: 500" class="btn btn-warning btn-block">Simpan</button>
                                <a href="tambah_mobil.php" style="font-weight: 450" class="btn btn-dark btn-block">Batal</a>
                            </form>
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
        <h3 class="text-center mb-4">DAFTAR MOBIL</h3></div>
	        <div class="panel-body">
            <div class="col-sm-12">
	            <table style="font-size:90% ;" class="table table-sm">
	                <thead>
                    <tr>
	                        <th scope="col">No</th>
	                        <th scope="col">Nama</th>
	                        <th scope="col">Merk</th>
                            <th scope="col">Plat</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                    <?php
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
                            $query = "SELECT mobil.nama_mobil, mobil.merk, mobil.no_mobil, mobil.deskripsi, mobil.harga, mobil.status,mobil.gambar, pemilik_mobil.nama_pemilik, pemilik_mobil.no_telp_pemilik 
                            FROM mobil INNER JOIN pemilik_mobil USING (id_pemilik) WHERE nama_mobil LIKE '%$search%' OR merk LIKE '%$search%' OR no_mobil LIKE '%$search%'  LIMIT $posisi, $batas";
                        } else {
                            $query = "SELECT mobil.nama_mobil, mobil.merk, mobil.no_mobil, mobil.deskripsi, mobil.harga, mobil.status,mobil.gambar, pemilik_mobil.nama_pemilik, pemilik_mobil.no_telp_pemilik 
                            FROM mobil INNER JOIN pemilik_mobil USING (id_pemilik) LIMIT $posisi, $batas";                            }
                        $data = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($data)){
                            ?>
	                        <tr>
                            <th scope="row"><?=$no++?></th>
								<td><?=$row['nama_mobil']?></td>
								<td><?=$row['merk']?></td>
                                <td><?=$row['no_mobil']?></td>
                                <td><?=$row['deskripsi']?></td>
                                <td><?=$row['harga']?></td>
                                <td><?=$row['nama_pemilik']?></td>
                                <td><?php echo "<img src='../img/mobil/$row[gambar]' width='140rem'/>";?></td>
                                <td><a class="badge badge-<?=($row['status']) ? "success" : "danger" ?>"><?=($row['status']) ? "Tersedia" : "Tidak Tersedia" ?></a></td>
	                            <td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="edit_mobil.php?no_mobil=<?php echo $row ['no_mobil'];?>" style="font-weight: 500" class="btn btn-warning btn-sm">Edit</a>
	                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="hapus_mobil.php?no_mobil=<?php echo $row ['no_mobil'];?>" style="font-weight: 500" class="btn btn-danger btn-sm">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
                            <?php
	                    }
		            ?>
	                </tbody>
	            </table>
	        </div>
            <div style="text-align: right;" class="panel-footer panel-custom"><?php include ("../config.php");
            

            //Langkah 2. Hitung total data dan halaman serta link 1,2,3
            $query2		= mysqli_query($connection, "select * from mobil");
            $jmldata	= mysqli_num_rows($query2);
            $jmlhalaman	= ceil($jmldata/$batas);
            
            echo " Hal : ";

            for($i=1; $i<=$jmlhalaman; $i++)
            if($i != $halaman){
            echo " <a href=\"tambah_mobil.php?halaman=$i\">$i</a> | ";
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
<!--
                                include "../config.php";
                                    $sql_pemilik = mysqli_query($connection, "SELECT mobil.nama_mobil, mobil.merk, mobil.no_mobil, mobil.deskripsi, mobil.harga, mobil.gambar, mobil.status, pemilik_mobil.nama_pemilik, pemilik_mobil.no_telp_pemilik, pemilik_mobil.id_pemilik 
                                    FROM mobil INNER JOIN pemilik_mobil USING (id_pemilik) WHERE no_mobil='$no_mobil'");
                                    while ($data_pemilik=mysqli_fetch_array($sql_pemilik)) {
                                        if ($data['nama_pemilik']==$data_pemilik['id_pemilik']) {
                                        $select="selected";
                                        }else{
                                        $select="";
                                        }
                                        echo "<option $select>".$data_pemilik['nama_pemilik']."</option>";

                                    } ?>