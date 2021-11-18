<?php
	$connection = mysqli_connect("localhost","root","","rental_mobil");

	//Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}

	
?>

<!--
$server = "sql305.byethost11.com";
$user = "b11_26804191";
$password = "iputusonyadipratama";
$nama_database = "b11_26804191_AkademikPraktek1";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
-->