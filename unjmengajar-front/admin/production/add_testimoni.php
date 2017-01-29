<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['add'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$judul		= $_POST['judul'];	//membuat variabel $nis dan datanya dari inputan NIS
	$des		= $_POST['des'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$nama		= $_POST['nama'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	// $jurusan	= $_POST['jurusan'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO testimoni VALUES(NULL, '$judul', '$des,', '- $nama')") or die(mysql_error());
	
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