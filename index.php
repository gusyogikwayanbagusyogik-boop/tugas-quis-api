<?php
include 'class/Mahasiswa.php';
$mhs = new Mahasiswa();
$daftarMhs = $mhs->ambilSemua();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa - UTS NIM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php" class="btn">[+] Tambah Data Baru</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Gender</th>
            <th>Tempat Lahir</th>
            <th>Aksi</th>
        </tr>
        <?php if(mysqli_num_rows($daftarMhs) > 0): ?>
            <?php while($data = mysqli_fetch_assoc($daftarMhs)): ?>
            <tr>
                <td><?= $data['NIM'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_jurusan'] ?></td>
                <td><?= $data['gender'] ?></td>
                <td><?= $data['tempat'] ?></td>
                <td>
                    <a href="edit.php?nim=<?= $data['NIM'] ?>">Edit</a> |
                    <a href="hapus.php?nim=<?= $data['NIM'] ?>" onclick="return confirm('Yakin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6" style="text-align:center">Belum ada data.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>