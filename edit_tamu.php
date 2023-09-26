<!DOCTYPE html>
<html>
<head>
	<title>Edit Tamu</title>
	<link rel="stylesheet" href="edit_tamu.css">
</head>
<body>
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

		// Mendapatkan id tamu yang akan diedit
		$id = $_GET['id'];

		// Mengambil data tamu dari tabel
		$query = "SELECT * FROM buku_tamu WHERE id='$id'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
		} else {
			echo "Tidak ada data tamu yang tersimpan.";
			exit();
		}

		mysqli_close($conn);
	?>

	<h1>Edit Data Tamu</h1>
	<form method="post" action="proses_edit_tamu.php">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<label for="nama_lengkap">Nama Lengkap:</label>
		<input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>"><br><br>
		<label for="alamat">Alamat:</label>
		<input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
		<label for="no_telepon">Nomor Telepon:</label>
		<input type="text" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>"><br><br>
		<label for="keperluan">Keperluan:</label>
		<input type="text" id="keperluan" name="keperluan" value="<?php echo $row['keperluan']; ?>"><br><br>
		<input type="submit" value="Simpan"> <a href="daftar.php">Kembali</a>
	</form>
</body>
</html>