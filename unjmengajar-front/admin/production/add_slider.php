<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['add'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$judul		= $_POST['judul'];	
	$des		= $_POST['des'];
	$class		= $_POST['class'];	
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO slider VALUES(NULL, '$judul', '$des', 'item $class')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo '<script>alert("Data Berhasil Ditambah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo '<script>alert("Data Gagal Ditambah");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>