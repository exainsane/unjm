<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$name		= $_POST['name'];	
	$email		= $_POST['email'];
	$message	= $_POST['message'];	
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO contact VALUES(NULL, '$name', '$email', '$message')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo '<script>alert("Pesan Berhasil Dikirim");</script>';
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo '<script>window.history.back()</script>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>