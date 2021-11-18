<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>

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
                            <a class="nav-item nav-link active" href="beranda_admin.php">Beranda <span class="sr-only">(current)</span></a>
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Laporan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="data_transaksi.php">Data Transaksi</a>                                
                                <a class="dropdown-item" href="pengembalian.php">Pengembalian</a>                                
                            </div>
                            </li>
                            <a class="nav-item nav-link" href="../Logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" >Logout</a>
                            <a class="nav-item nav-link" href="#"> | </a>
                            <a class="nav-link"  style="font-weight: bold; color:deepskyblue;">
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
    include ("../config.php");
    $query=mysqli_query($connection, "SELECT * FROM mobil");
    $jumlah_mobil = mysqli_num_rows($query);
    ?>
    <a href="tambah_mobil.php">
    <div style="padding: 65px;" class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter" style="padding: 20px;">
        <div class="w3-container w3-red w3-padding-15">
            <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"><img src="../img/dashboard/dashboard_mobil.png" style="height:50px; width:60px"></img></i></div>
            <div class="w3-right">
            <h1><b><?php echo $jumlah_mobil; ?></b></h1>
            </div>
            <div class="w3-clear"></div>
            <h4>Total Mobil</h4>
        </div>
        </div></a>
        <?php
    include ("../config.php");
    $query=mysqli_query($connection, "SELECT * FROM pelanggan");
    $jumlah_pelanggan = mysqli_num_rows($query);
    ?>
    <a href="tambah_pelanggan.php">
        <div class="w3-quarter" style="padding: 20px;">
        <div class="w3-container w3-blue w3-padding-15">
            <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"><img src="../img/dashboard/dashboard_pelanggan.png" style="height:50px; width:60px"></img></i></div>
            <div class="w3-right">
            <h1><b><?php echo $jumlah_pelanggan; ?></b></h1>
            </div>
            <div class="w3-clear"></div>
            <h4>Total Pelanggan</h4>
        </div>
        </div></a>
        <?php
    include ("../config.php");
    $query=mysqli_query($connection, "SELECT * FROM pemilik_mobil");
    $jumlah_pemilik = mysqli_num_rows($query);
    ?>
    <a href="tambah_pemilik.php">
        <div class="w3-quarter" style="padding: 20px;">
        <div class="w3-container w3-teal w3-padding-15">
            <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"><img src="../img/dashboard/dashboard_pemilik.png" style="height:50px; width:60px"></img></i></div>
            <div class="w3-right">
            <h1><b><?php echo $jumlah_pemilik; ?></b></h1>
            </div>
            <div class="w3-clear"></div>
            <h4>Total Pemilik</h4>
        </div>
        </div></a>
        <?php
    include ("../config.php");
    $query=mysqli_query($connection, "SELECT * FROM admin");
    $jumlah_admin = mysqli_num_rows($query);
    ?>
    <a href="tambah_admin.php">
        <div class="w3-quarter" style="padding: 20px;">
        <div class="w3-container w3-orange w3-text-white w3-padding-15">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"><img src="../img/dashboard/dashboard_admin.png" style="height:50px; width:60px"></img></i></div>
            <div class="w3-right">
            <h1><b><?php echo $jumlah_admin; ?></b></h1>
            </div>
            <div class="w3-clear"></div>
            <h4>Total Admin</h4>
        </div>
        </div></a>
    </div>

    
            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
<!--
    <div class="row pt-3">
        <div class="col-md-1"></div>
            <div class="col">
            <div class="card text-white bg-dark mb-3"  style="max-width: 18rem; max-height:8rem">
                <div class="card-header">TOTAL MOBIL</div>
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
            </div>
            </div>
            <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem; max-height:8rem">
                <div class="card-header">TOTAL PELANGGAN</div>
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
            </div>
            </div>
            <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem; max-height:8rem">
                <div class="card-header"><b>TOTAL PEMILIK</div></b>
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                    </div>
            </div>
        </div>
    </div>