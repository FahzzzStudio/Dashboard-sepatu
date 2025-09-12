<?php
require "../function/function.php";
include "../public/sidebar.php";
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
            <h1>Tambah Data Detail Penjualan</h1><br>

            <form action="" method="post">

            <div class="mb-3">
                <label for="id_jual" class="form-label ">ID Penjualan</label><br>
                <input type="text" name="id_jual" id="id_jual" class="form-control">
            </div>

            <label for="id_sepatu" class="form-label">ID Sepatu</label><br>
            <input type="text" name="id_sepatu" id="id_sepatu" class="form-control">

            <label for="qty" class="form-label">Quantity</label><br>
            <input type="number" name="qty" id="qty" class="form-control">

            <label for="subtotal" class="form-label">Subtotal</label><br>
            <input type="text" class="form-control"><br>

            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
            <a href="../public/detailpenjualan.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>