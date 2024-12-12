<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>

<body class= "p-5">
    <h2 class= "mb-5">Tambah Data Siswa</h2>
    <form action="../action/store.php" method="POST">
        <label for="Nama">Nama :</label>
        <input type="text" id="Nama" name="Nama" required><br><br>
        <label for="NISN">NISN :</label>
        <input type="number" id="NISN" name="NISN" required><br><br>
        <label for="Kelas">Kelas :</label>
        <input type="text" id="Kelas" name="Kelas" required><br><br>
        <label for="NISN">Jurusan :</label>
        <input type="text" id="Jurusan" name="Jurusan" required><br><br>
        <label for="Alamat">Alamat :</label><br>
        <textarea id="Alamat" name="Alamat" rows="3" required></textarea><br><br>
        <button type="submit">Simpan</button>
    </script>
    </form>
</body>

</html>