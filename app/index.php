<?php
require "../function/function.php";

$konsumen = allkonsumen($conn);
$sepatu = allsepatu($conn);
$penjualan = allpenjualan($conn);
$penjualan_detail = allpenjualandetail($conn);
$log_transaksi = alllogtransaksi($conn);

// $rows = tampil("SELECT * FROM sepatu");

// $no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Data Sepatu</h1><br>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table border="1" class="table table-striped">
            <tr>
                <th>ID Sepatu</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($sepatu as $row) : ?>
            <tr>
                <td><?= $row["id_sepatu"] ?></td>
                <td><?= $row["stok"] ?></td>
                <!-- <td><?= $row["harga"] ?></td> -->
                <td>Rp <?= number_format($row['harga'],0,',','.'); ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_sepatu']; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_sepatu']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="container">
        <h1>Data Konsumen</h1><br>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table border="1" class="table table-striped">
            <tr>
                <th>ID Konsumen</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($konsumen as $row) : ?>
            <tr>
                <td><?= $row["id_konsumen"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_konsumen']; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_konsumen']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

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

    <div class="container">
        <h1>Data Detail Penjualan</h1><br>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table border="1" class="table table-striped">
            <tr>
                <th>ID Detail</th> <!-- Ini tabel detail -->
                <th>Tanggal</th>
                <th>ID Konsumen</th>
                <th>Konsumen</th>
                <th>ID Sepatu</th>
                <th>Harga</th>
                <th>Quantity</th> <!-- Ini tabel detail -->
                <th>SubTotal</th> <!-- Ini tabel detail -->
                <th>Aksi</th>
            </tr>
            <?php foreach ($penjualan_detail as $row) : ?>
            <tr>
                <td><?= $row["id_detail"] ?></td>
                <td><?= $row["tanggal"] ?></td>
                <td><?= $row["id_konsumen"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["id_sepatu"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td><?= $row["qty"] ?></td>
                <td><?= $row["subtotal"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_detail']; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_detail']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="container">
        <h1>Data Log Transaksi</h1><br>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table border="1" class="table table-striped">
            <tr>
                <th>ID Log</th>
                <th>ID Jual</th>
                <th>Konsumen</th>
                <th>Tanggal & Waktu Transaksi</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($log_transaksi as $row) : ?>
            <tr>
                <td><?= $row["id_log"] ?></td>
                <td><?= $row["id_jual"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["waktu_transaksi"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_log']; ?>" class="btn btn-success">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_log']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>