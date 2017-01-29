<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$judul		= $_POST['judul'];	//membuat variabel $about dan datanya dari inputan about
	$icon		= $_POST['class'];
	$des 		= $_POST['des'];

	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE slider SET judul='$judul', des='$des', class='item $class' WHERE id='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo '<script>alert("Data Berhasil Dirubah");</script>';
		echo '<script>window.history.back()</script>';
		
	}else{
		
		echo '<script>alert("Data Gagal Dirubah");</script>';
		echo '<script>window.history.back()</script>';	
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
	echo '<script>window.history.back()</script>';

}
?>