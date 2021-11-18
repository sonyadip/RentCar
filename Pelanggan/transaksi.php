  <!DOCTYPE html>
  <html>
  <Head>

<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <link href="../jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="../jquery-ui-1.11.4/external/jquery/jquery.js"></script>
    <script src="../jquery-ui-1.11.4/jquery-ui.js"></script>
    <script src="../jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="../jquery-ui-1.11.4/jquery-ui.theme.css">
    <script>
    $(document).ready(function(){
        $("#tanggal").datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true
        });
    });
    </script>

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
            margin-top: 35px;
            background-size:cover;
        }
        /* Bootstrap css */
@import "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css";

/* Google Material icons */
@import "http://fonts.googleapis.com/icon?family=Material+Icons";

/* Propeller css */
@import "dist/css/propeller.min.css";

/* Bootstrap datetimepicker */
@import "datetimepicker/css/bootstrap-datetimepicker.css";

/* Propeller datetimepicker */
@import "datetimepicker/css/pmd-datetimepicker.css";
    </style>

  </head>
  <body>
  <?php
  include ("../config.php");
    $query=mysqli_query($connection, "SELECT * FROM pelanggan");
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tenklee Mobil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link" href="beranda_pelanggan.php">Beranda <span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link" href="edit_profil.php?no_ktp=<?php
                                                                                session_start(); echo
                                                                                $_SESSION['no_ktp']?>">Profil</a>
                            <a class="nav-item nav-link" href="../Logout.php">Logout</a>
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
    $query = mysqli_query($connection, "SELECT * FROM mobil WHERE no_mobil='$no_mobil'");
    $row = mysqli_fetch_array($query);
?>
<div class="container">
<div class="row">
    <div class="col-sm">



    <form method="post" action="transaksi_aksi.php">
        <div class="row pb-4 pt-5">
            <div class="col-md-"></div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="panel-heading panel-custom"><h3 class="text-center"><b>Sewa Mobil</b></h3></div>
                        <div class="panel-body panel-custom">
                            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="needs-validation" novalidate>
                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Lama Sewa</label>
                                <select class="form-control form-control-sm" name="lama" id="exampleFormControlSelect1">
                                    <option value="1">1 Hari</option>
                                    <option value="2">2 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="4">4 Hari</option>
                                    <option value="5">5 Hari</option>
                                    <option value="6">6 Hari</option>
                                    <option value="7">7 Hari</option>
                                    <!-- <?php for ($i=1; $i<=7; $i++): ?>
                                    <option value="<?=$i?>"><?=$i?> Hari</option>
                                    <?php endfor; ?> -->
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Sewa</label>
                                    <input type="text" name="tgl_sewa" class="form-control form-control-sm" id="tanggal" placeholder="" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="no_mobil" value="<?php echo $no_mobil;?>" class="form-control form-control-sm" required />
                                </div>
                                <form>
                                    </script>
                                <button onclick="return confirm('Apakah anda yakin ingin menyewa ?')" type="submit" class="btn btn-dark btn-block">Sewa</button>
                            </form>
                            
                        </div>
                        <script>
                            bootbox.confirm("This is the default confirm!", function(result){ 
                            console.log('This was logged in the callback: ' + result); 
                        });
                        </script>
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
                        
                        <!-- <div class="panel-footer panel-custom">
                            
                        </div> -->
                    </div>
                </div>
    <br>
    
    <div class="col-sm">
        <div class="card">
            <a href="../img/mobil/<?=$row['gambar']?>" class="fancybox">
                <img class="card-img-top" src="../img/mobil/<?=$row['gambar']?>" alt="Card image cap">
            </a>
                <div class="card-body">
                    <b><p class="card-text">DESKRIPSI MOBIL</p></b>
                    <p class="card-text"><?=$row['deskripsi']?></p>
                </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  </html>

  <!-- ?id_transaksi=<php session_start(); echo $_SESSION['id_transaksi']?>