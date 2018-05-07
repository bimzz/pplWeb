<?php
include 'koneksi.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='delete'){
	$query = "delete from client where id = ".$mysqli->real_escape_string($_GET['id'])."";
	if($mysqli->query($query)){
		echo "Data dihapus";
	}else{
		echo "Gagal";
	}
}
$query = "select * from client";

$result = $mysqli->query($query);

$num_result=$result->num_rows;

if($num_result>0){
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Nama</th>";
	echo "<th>Tempat/Tanggal Lahir</th>";
	echo "<th>Alamat</th>";
	echo "<th>No HP</th>";
	echo "</tr>";
while($row = $result->fetch_assoc()){
	extract($row);
	
	echo "<tr>";
	echo "<td>{$nama}</td>";
	echo "<td>{$ttl}</td>";
	echo "<td>{$alamat}</td>";
	echo "<td>{$no}</td>";
	echo "<td>";
	echo "<a href='home.php?page=tolak&id={$id}'>Tolak</a>";
	echo "/";
	echo "<a href='home.php?page=detail&id={$id}'>Detail</a>";
	echo "/";
	echo "<a href='#' onclick='delete_data({$id});'>Hapus</a>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
}else{
	echo "Data tidak ditemukan";
}
$result->free();
$mysqli->close();
?>
<script type='text/javascript'>
	function delete_data(id){
		var answer = confirm('Yakin Hapus?');
		if(answer){
			window.location = 'home.php?page=data&action=delete&id=' + id;
		}
	}
</script>
