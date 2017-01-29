<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$judul		= $_POST['judul'];	//membuat variabel $about dan datanya dari inputan about
	$des 		= $_POST['des'];
	$img		= $_FILES['img']['name'];
	$uploaddir	= '../../img/blog/';
	$alamatfile	= $uploaddir.$img;	
	
	//jika query update sukses
	if(move_uploaded_file($_FILES['img']['tmp_name'],$alamatfile)){
		
		echo '<script>alert("Data Berhasil Dirubah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		$update = mysql_query("UPDATE blog SET judul='$judul', des='$des', img='$alamatfile' WHERE id='$id'") or die(mysql_error());
		
	}else if($judul!=""){

		echo '<script>alert("Data Berhasil Dirubah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		$update = mysql_query("UPDATE blog SET judul='$judul', des='$des' WHERE id='$id'") or die(mysql_error());

	}else{
		
		echo '<script>alert("Data Gagal Dirubah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
	echo '<script>window.history.back()</script>';

}
?>