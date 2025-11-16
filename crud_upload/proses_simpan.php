<?php
// Sertakan file koneksi
include 'koneksi.php';

// 1. Menangkap data dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

// 2. Menangkap data file foto
$foto_name = $_FILES['foto']['name'];      // Nama file
$foto_tmp = $_FILES['foto']['tmp_name'];  // Lokasi file sementara

// 3. Tentukan folder tujuan upload
$upload_path = "images/" . $foto_name;

// 4. Pindahkan file foto dari lokasi sementara ke folder tujuan
if(move_uploaded_file($foto_tmp, $upload_path)) {
    
    // 5. Jika upload foto berhasil, simpan data ke database
    $query = "INSERT INTO siswa (nis, nama, jenis_kelamin, telp, alamat, foto) 
              VALUES ('$nis', '$nama', '$jenis_kelamin', '$telp', '$alamat', '$foto_name')";
    
    $result = mysqli_query($koneksi, $query);

    if($result) {
        // Jika berhasil simpan, redirect ke halaman index.php
        header("location: index.php");
    } else {
        // Jika gagal simpan
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_tambah.php'>Kembali Ke Form</a>";
    }

} else {
    // 6. Jika foto gagal diupload
    echo "Maaf, Foto gagal diupload.";
    echo "<br><a href='form_tambah.php'>Kembali Ke Form</a>";
}
?>