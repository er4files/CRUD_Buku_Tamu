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

    // Mengambil ID tamu yang akan dihapus
    $id = $_GET['id'];

    // Query untuk menghapus tamu dari tabel
    $query = "DELETE FROM buku_tamu WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data tamu berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data tamu: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    
	//mengalihkan halaman kembali ke index.php
	header("location:daftar.php") ;
?>