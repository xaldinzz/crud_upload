<?php
include 'koneksi.php';

// 1. Mengambil ID dari URL
$id = $_GET['id'];

// 2. Mengambil data siswa berdasarkan ID
$query = "SELECT * FROM siswa WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Siswa</title>
</head>
<body>
    <h2>Ubah Data Siswa</h2>
    <a href="index.php">Kembali</a>
    <br><br>

    <form action="proses_ubah.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>">

        <label>NIS:</label><br>
        <input type="text" name="nis" required value="<?php echo $data['nis']; ?>"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required value="<?php echo $data['nama']; ?>"><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" 
            <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?> required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" 
            <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> required> Perempuan
        <br><br>

        <label>Telepon:</label><br>
        <input type="text" name="telp" value="<?php echo $data['telp']; ?>"><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="4" cols="50"><?php echo $data['alamat']; ?></textarea><br><br>

        <label>Foto Saat Ini:</label><br>
        <img src="images/<?php echo $data['foto']; ?>" width="100px">
        <br><br>

        <label>Ganti Foto (Kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="foto"><br><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>