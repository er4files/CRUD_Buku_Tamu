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

	// Menambahkan data tamu ke dalam tabel
	$nama_lengkap = $_POST['nama_lengkap'];
	$alamat = $_POST['alamat'];
	$no_telepon = $_POST['no_telepon'];
	$keperluan = $_POST['keperluan'];
	$tanggal = date("Y-m-d");
	$waktu = date("H:i:s");

	$query = "INSERT INTO buku_tamu(nama_lengkap, alamat, no_telepon, keperluan, tanggal, waktu)
	VALUES ('$nama_lengkap', '$alamat', '$no_telepon', '$keperluan', '$tanggal', '$waktu')";

	if (mysqli_query($conn, $query)) {
	    echo "Data tamu berhasil ditambahkan.";
	} else {
	    echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	//mengalihkan halaman kembali ke index.php
	header("location:bukutamu.php") ;
?>
