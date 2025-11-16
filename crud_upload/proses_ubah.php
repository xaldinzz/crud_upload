<?php
include 'koneksi.php';

// 1. Menangkap data dari form
$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$foto_lama = $_POST['foto_lama'];

// 2. Cek apakah user mengupload foto baru
if (!empty($_FILES['foto']['name'])) {
    // Jika user upload foto baru
    $foto_name_baru = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $upload_path = "images/" . $foto_name_baru;

    // 3. Pindahkan foto baru ke folder images
    if (move_uploaded_file($foto_tmp, $upload_path)) {
        
        // 4. Hapus foto lama agar tidak menumpuk
        if (file_exists("images/" . $foto_lama)) {
            unlink("images/" . $foto_lama);
        }
        
        // 5. Siapkan nama foto baru untuk query update
        $foto_to_save = $foto_name_baru;

    } else {
        echo "Gagal mengupload foto baru.";
        exit; // Hentikan skrip jika upload gagal
    }

} else {
    // 6. Jika user TIDAK upload foto baru, gunakan nama foto lama
    $foto_to_save = $foto_lama;
}

// 7. Query untuk update data ke database
$query = "UPDATE siswa SET 
            nis = '$nis', 
            nama = '$nama', 
            jenis_kelamin = '$jenis_kelamin', 
            telp = '$telp', 
            alamat = '$alamat', 
            foto = '$foto_to_save' 
          WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    // Jika berhasil, redirect ke index.php
    header("location: index.php");
} else {
    // Jika gagal
    echo "Maaf, Terjadi kesalahan saat mencoba untuk mengubah data.";
    echo "<br><a href='form_ubah.php?id=$id'>Kembali Ke Form</a>";
}
?>