<?php
    // Koneksi ke database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "rumah_sakit";

    $conn = mysqli_connect($host, $user, $pass, $db);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mengambil data dari form
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $keperluan = $_POST['keperluan'];

    // Query untuk mengupdate data tamu di tabel
    $query = "UPDATE buku_tamu SET nama_lengkap='$nama_lengkap', alamat='$alamat', no_telepon='$no_telepon', keperluan='$keperluan' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data tamu berhasil diupdate.";
    } else {
        echo "Terjadi kesalahan saat mengupdate data tamu: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    
	//mengalihkan halaman kembali ke index.php
	header("location:daftar.php") ;
?>