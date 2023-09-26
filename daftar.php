<!DOCTYPE html>
<html>
<head>
	<title>Daftar Tamu</title>
	<link rel="stylesheet" href="daftar.css">
</head>
<body>
	<br>
	<div><a href="bukutamu.php">Kembali</a></div>
	<div>
		<form action="" method="GET">
			<label for="search">Cari Tamu:</label>
			<input type="text" name="search" id="search" placeholder="Masukkan nama tamu...">
			<input type="submit" value="Cari">
		</form>
		<br>
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

			// Mengambil data tamu dari tabel
			if (isset($_GET['search'])) {
				$search = $_GET['search'];
				$query = "SELECT * FROM buku_tamu WHERE nama_lengkap LIKE '%$search%' ORDER BY tanggal DESC, waktu DESC";
			} else {
				$query = "SELECT * FROM buku_tamu ORDER BY tanggal DESC, waktu DESC";
			}
			
			$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) > 0) {
				// Menampilkan data tamu ke dalam tabel
				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Nama Lengkap</th><th>Alamat</th><th>Nomor Telepon</th><th>Keperluan</th><th>Tanggal</th><th>Waktu</th><th></th><th></th></tr>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['nama_lengkap'] . "</td>";
					echo "<td>" . $row['alamat'] . "</td>";
					echo "<td>" . $row['no_telepon'] . "</td>";
					echo "<td>" . $row['keperluan'] . "</td>";
					echo "<td>" . $row['tanggal'] . "</td>";
					echo "<td>" . $row['waktu'] . "</td>";
					echo "<td><a href='edit_tamu.php?id=" . $row['id'] . "'>Edit</a></td>";
					echo "<td><a href='hapus_tamu.php?id=" . $row['id'] . "'>Hapus</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "Tidak ada data tamu yang tersimpan.";
			}

			mysqli_close($conn);
		?>
	</div>
</body>
</html>
