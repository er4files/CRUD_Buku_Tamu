<!DOCTYPE html>
<html>
<head>
	<title>Formulir Buku Tamu</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<h1>Formulir Buku Tamu</h1>
	<form method="post" action="tambah.php">
		<label for="nama_lengkap">Nama Lengkap:</label>
		<input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>

		<label for="alamat">Alamat:</label>
		<input type="text" id="alamat" name="alamat" required><br><br>

		<label for="no_telepon">Nomor Telepon:</label>
		<input type="text" id="no_telepon" name="no_telepon" required><br><br>

		<label for="keperluan">Keperluan:</label>
		<input type="text" id="keperluan" name="keperluan" required><br><br>
		<input type="submit" value="Tambahkan"><a href="bukutamu.php">Kembali</a> 
	</form>
</body>
</html>
