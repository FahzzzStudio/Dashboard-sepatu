<?php
require "../function/function.php";
include "../public/sidebar.php";

$total_sepatu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM sepatu"))['jml'];
$total_konsumen = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM konsumen"))['jml'];
$total_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM penjualan"))['jml'];
$total_pendapatan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM penjualan_detail"))['total'];


$keyword = $_GET["keyword"] ?? "";
$sepatu = $_GET["sepatu"] ?? "";
$tanggal = $_GET["tanggal"] ?? "";

$penjualan_detail = searchpenjualandetail($conn, $keyword, $sepatu, $tanggal);
$daftar_sepatu = tampil("SELECT * FROM sepatu"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body class="p-3 mb-2 bg-info-subtle text-info-emphasis">
    <div class="main-content">
        <div class="container">
            <h1 class="mb-4 fw-bold">📊 Data Detail Penjualan</h1><br>
            <form method="get" class="row g-3 align-items-center mb-4">
                <a href="tambah_detail.php" class="btn btn-primary">Tambah Data</a>
                <!-- Form pencarian -->
                <div class="col-auto">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari konsumen atau ID sepatu" value="<?= $keyword ?>">
                </div>
                <div class="col-md-3">
                    <select name="sepatu" class="form-select">
                        <option value="">-- Filter Sepatu --</option>
                        <?php foreach($daftar_sepatu as $s): ?>
                            <option value="<?= $s['id_sepatu'] ?>" <?= ($sepatu==$s['id_sepatu']) ? 'selected' : '' ?>>
                                <?= "Sepatu #" . $s['id_sepatu'] . " (Rp" . number_format($s['harga']) . ")" ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal" class="form-control" value="<?= $tanggal ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100"><i class="fa fa-search"></i> Cari</button>
                </div>
            </form>
            <!-- Statistik -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Sepatu</h5>
                            <p class="card-text fs-4"><?= $total_sepatu ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Konsumen</h5>
                            <p class="card-text fs-4"><?= $total_konsumen ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Transaksi</h5>
                            <p class="card-text fs-4"><?= $total_transaksi ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pendapatan</h5>
                            <p class="card-text fs-4">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel Data -->
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
    </div>
</body>
</html>