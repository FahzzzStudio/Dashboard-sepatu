<?php
require "../function/function.php";
include "../public/sidebar.php";

$penjualan = allpenjualan($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya untuk konten utama */
        .main-content {
            margin-left: 250px; /* Lebar sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h1>Data Penjualan</h1><br>
            <a href="tambah.php" class="btn btn-primary">Tambah Data</a><br><br>
            <table border="1" class="table table-striped">
                <tr>
                    <th>ID Penjualan</th>
                    <th>Tanggal</th>
                    <th>ID Konsumen</th>
                    <th>Konsumen</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($penjualan as $row) : ?>
                <tr>
                    <td><?= $row["id_jual"] ?></td>
                    <td><?= $row["tanggal"] ?></td>
                    <td><?= $row["id_konsumen"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["alamat"] ?></td>
                    <td><?= $row["total"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_jual']; ?>" class="btn btn-success">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_jual']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>