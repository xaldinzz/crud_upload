<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        /* Atur ukuran gambar di dalam tabel */
        td img { width: 60px; height: 80px; object-fit: cover; }
    </style>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="form_tambah.php" style="margin-bottom: 10px; display: block;">+ Tambah Data Siswa</a>

    <table>
        <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = "SELECT * FROM siswa ORDER BY nama ASC";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                // Tampilkan foto. Pastikan path-nya benar
                echo "<td><img src='images/".$row['foto']."' ></td>";
                echo "<td>".$row['nis']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['jenis_kelamin']."</td>";
                echo "<td>".$row['telp']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>";
                // Link Ubah & Hapus (akan kita buat nanti)
                echo "<a href='form_ubah.php?id=".$row['id']."'>Ubah</a> | ";
                echo "<a href='proses_hapus.php?id=".$row['id']."'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data siswa</td></tr>";
        }
        ?>
    </table>
</body>
</html>