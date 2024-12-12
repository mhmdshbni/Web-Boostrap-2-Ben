<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nisn = $_GET['nisn'];
    $nama = $_GET['nama'];
    $kelas = $_GET['kelas'];
    $jurusan = $_GET['jurusan'];
    $alamat = $_GET['alamat'];

 // Query untuk menyimpan data
 $query = "INSERT INTO  siswa (nama, nisn, kelas, jurusan, alamat) VALUES ('$nisn','$nama','$kelas','$jurusan','$alamat')";

 // Eksekusi query dan cek apakah berhasil
 if (mysqli_query($koneksi, $query)) {
         echo "Data berhasil disimpan";
         
// header
 header("Location: menampilkandata.php");
         exit();
     } else {
         echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
     }
 } 
?>
