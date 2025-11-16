<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h2>Tambah Data Siswa</h2>
    <a href="index.php">Kembali</a>
    <br><br>

    <form action="proses_simpan.php" method="post" enctype="multipart/form-data">
        <label>NIS:</label><br>
        <input type="text" name="nis" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
        <br><br>

        <label>Telepon:</label><br>
        <input type="text" name="telp"><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="4" cols="50"></textarea><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto" required><br><br>

        <input type="submit" value="Simpan">
        <input type="reset" value="Batal">
    </form>
</body>
</html>