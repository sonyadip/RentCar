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
        td {
            text-align: center;    
            }
        th {
            text-align: center;    
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
                            <a class="nav-item nav-link" href="../Logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
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
        <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="card">
                    <div class="panel-heading panel-custom"><h3 class="text-center">TAMBAH</h3></div>
                        <div class="panel-body panel-custom">
                            <form method="POST" action="admin_aksi.php" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama_admin" class="form-control form-control-sm" id="nama_admin" placeholder="" autofocus="on" required>
                                </div>
                                <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control form-control-sm" id="username" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="" required>
                                </div>
                                <form>
                                <button type="submit" class="btn btn-dark btn-block">Simpan</button>
                            </form>
                    </div>
                </div>
            </div>
</div>
<div class="col-sm-5">
        <div class="card" style="width: 35rem;">
        <div class="panel-heading panel-custom"><h3 class="text-center">DAFTAR ADMIN</h3></div>
	        <div class="panel-body">
            <div class="col-sm-12">
	            <table class="table table-sm">
	                <thead>
	                    <tr>
	                        <th scope="col">No</th>
	                        <th scope="col">Nama</th>
	                        <th scope="col">Username</th>
                            <th scope="col">Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
                        <?php include ("../config.php"); ?>
	                    <?php if ($query = $connection->query("SELECT * FROM admin")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
                            <th scope="row"><?=$no++?></th>
															<td><?=$row['nama_admin']?></td>
															<td><?=$row['username']?></td>
	                            <td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="edit_admin.php?id_admin=<?php echo $row ['id_admin'];?>" style="font-weight: 500" class="btn btn-warning btn-sm">Edit</a>
	                                    <a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="hapus_admin.php?id_admin=<?php echo $row ['id_admin'];?>" style="font-weight: 500" class="btn btn-danger btn-sm">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
	                        <?php endwhile ?>
	                    <?php endif ?>
	                </tbody>
	            </table>
	        </div>
            <div class="panel-footer panel-custom">
			        <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
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
