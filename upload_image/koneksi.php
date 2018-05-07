<?php
$host = "localhost";
$username = "root";
$pass = "";
$database = "ppl";

$mysqli = new  mysqli($host,$username,$pass,$database);
	if (mysqli_connect_errno()){
		echo "koneksi gagal";

	}
?>
