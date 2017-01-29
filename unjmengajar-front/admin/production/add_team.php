<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['add'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nama		= $_POST['nama'];	
	$des		= $_POST['des'];
	$job		= $_POST['job'];
	$img		= $_FILES['img']['name'];
	$uploaddir	= '../../img/team/';
	$alamatfile	= $uploaddir.$img;
		
	//jika query input sukses
	if(move_uploaded_file($_FILES['img']['tmp_name'],$alamatfile)){
		
		echo '<script>alert("Data Berhasil Ditambah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		$input = mysql_query("INSERT INTO team VALUES(NULL, '$nama', '$des', 'img/team/$img', '$job')") or die(mysql_error());
		
	}else{
		
		echo '<script>alert("Data Gagal Ditambah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>