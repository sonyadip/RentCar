<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <a class="nav-item nav-link active" href="index.php">Beranda <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="pelanggan/daftar.php">Daftar</a>
        <a class="nav-item nav-link" href="login.php">Login</a>
        </div>
    </div>
    </div>
    </nav>

    <section id="portfolio" class="portfolio pb-4 pt-4">
    <div class="container">
        <div class="row mb-2">
            <div class="col text-left pt-5">
                <h2><img src="img/logo/logo.png" width="7%"> LIST MOBIL</h2>
            </div>
        </div>

    <div class="row">
    <?php
            include ("config.php");
            $no = 1;
            // Langkah 1. Tentukan batas, cek halaman & posisi data
            $batas = 6;
            $halaman = @$_GET['halaman'];
                if(empty($halaman)){
            $posisi = 0;
            $halaman = 1;
            }
            else {
                $posisi = ($halaman-1) * $batas;
            }
            //echo "<p>Total Anggota : <b>$jmldata</b> orang</p>";
            
            //Langkah 3. Sesuaikan query dengan posisi dan batas 
            $query = "SELECT * FROM mobil LIMIT $posisi, $batas"; 
                $no = 1;
            $data = mysqli_query($connection,$query);
            while($row = mysqli_fetch_array($data)){
                            ?>
    <div class="col pb-3">
        <div class="card" style="width:20.9rem">
        <a href="img/mobil/<?=$row['gambar']?>" class="fancybox">
				<img class="card-img-top" src="img/mobil/<?=$row['gambar']?>" style="height:200px; width:333px" alt="Card image cap <?=$row['judul']?>"/> <!--style="height:184px; width:306px" -->
			</a>
            <div class="card-body">
            <h3><?=$row["merk"]?> <?=$row["nama_mobil"]?></h3>
                <h5><h6>Price</h6> <?=$row["harga"]?></h5>
                <h6><?=$row["no_mobil"]?></h6>
                <span class="badge badge-<?=($row['status']) ? "success" : "danger" ?>"><?=($row['status']) ? "Tersedia" : "Tidak Tersedia" ?></span>
                <p>
                    <br>
                    <a class="btn btn-<?=($row['status']) ? "primary" : "primary disabled" ?>" 
                    href="<?=($row['status']) ? "cek_status.php?no_mobil=$row[no_mobil]" : "#" ?>" 
                    <?=($row['status']) ? "Tersedia" : "Tidak Tersedia" ?><?=($row['status']) 
                    ?: "" ?>>Sewa Sekarang!</a>
			    </p>
            </div>
        </div>
    </div>
    <?php
	}
    ?>
</div>
</section>
<div class="text-center">
<?php include ("config.php");
 

                        //Langkah 2. Hitung total data dan halaman serta link 1,2,3
                        $query2		= mysqli_query($connection, "select * from mobil");
                        $jmldata	= mysqli_num_rows($query2);
                        $jmlhalaman	= ceil($jmldata/$batas);
                        
echo " Hal : ";

for($i=1; $i<=$jmlhalaman; $i++)
if($i != $halaman){
    echo " <a href=\"index.php?halaman=$i\">$i</a> | ";
}
else{
    echo " <b>$i</b> | ";
} 
echo "<p>Total Mobil : <b>$jmldata</b> Unit</p>";
?>
</div>
<br>
<br>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>