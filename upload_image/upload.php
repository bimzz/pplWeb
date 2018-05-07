<?php
	include_once "koneksi.php";
	
	class emp{}
	
	$image = $_POST['ktp'];
	$image1 = $_POST['ijazah'];
	$image2 = $_POST['skck'];
	$image3 = $_POST['sks'];
	$image4= $_POST['lainnya'];
	$name = $_POST['nama'];
	$name1 = $_POST['ttl'];
	$name2 = $_POST['alamat'];
	$name3 = $_POST['no'];
	if (empty($name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Please dont empty Name."; 
		die(json_encode($response));
	} else {
		$random = random_word(20);
		$random1 = random_word(20);
		$random2 = random_word(20);
		$random3 = random_word(20);
		$random4 = random_word(20);		
		
		$path = "images/".$random.".png";
		$path1 = "images/".$random1.".png";
		$path2 = "images/".$random2.".png";
		$path3 = "images/".$random3.".png";
		$path4 = "images/".$random4.".png";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://192.168.43.15/android/upload_image/$path";
		$actualpath1 = "http://192.168.43.15/android/upload_image/$path1";
		$actualpath2 = "http://192.168.43.15/android/upload_image/$path2";
		$actualpath3 = "http://192.168.43.15/android/upload_image/$path3";
		$actualpath4 = "http://192.168.43.15/android/upload_image/$path4";
		
		$query = mysqli_query($con, "INSERT INTO client (nama,ttl,alamat,no,ktp,ijazah,skck,sks,lainnya) VALUES ('$name','$name1','$name2','$name3','$actualpath','$actualpath1','$actualpath2','$actualpath3','$actualpath4')");
		
		if ($query){
			file_put_contents($path,base64_decode($image));
			file_put_contents($path1,base64_decode($image1));
			file_put_contents($path2,base64_decode($image2));
			file_put_contents($path3,base64_decode($image3));
			file_put_contents($path4,base64_decode($image4));
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	
