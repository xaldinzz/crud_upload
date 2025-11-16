<?php
include 'koneksi.php';

// 1. Mengambil ID dari URL
$id = $_GET['id'];

// 2. Mengambil nama file foto sebelum menghapus data
$query_select = "SELECT foto FROM siswa WHERE id = '$id'";
$result_select = mysqli_query($koneksi, $query_select);
$data = mysqli_fetch_assoc($result_select);
$foto_lama = $data['foto'];

// 3. Hapus data dari database
$query_delete = "DELETE FROM siswa WHERE id = '$id'";
$result_delete = mysqli_query($koneksi, $query_delete);

if ($result_delete) {
    // 4. Jika data berhasil dihapus dari database, hapus file fotonya
    if (file_exists("images/" . $foto_lama)) {
        unlink("images/" . $foto_lama);
    }
    
    // 5. Redirect kembali ke index.php
    header("location: index.php");

} else {
    echo "Data gagal dihapus.";
}
?>