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
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="main-content ml-64 p-6">
        <div class="container mx-auto">
        
        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-6">📊 Data Detail Penjualan</h1>

        <!-- Form Pencarian -->
        <form method="get" class="flex flex-wrap gap-4 mb-6">
            <a href="tambah_detail.php" 
            class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Data
            </a>
            
            <input type="text" name="keyword" 
                class="flex-1 px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500" 
                placeholder="Cari konsumen atau ID sepatu" 
                value="<?= $keyword ?>">

            <select name="sepatu" 
                    class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500">
            <option value="">-- Filter Sepatu --</option>
            <?php foreach($daftar_sepatu as $s): ?>
                <option value="<?= $s['id_sepatu'] ?>" <?= ($sepatu==$s['id_sepatu']) ? 'selected' : '' ?>>
                <?= "Sepatu #" . $s['id_sepatu'] . " (Rp" . number_format($s['harga']) . ")" ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input type="date" name="tanggal" 
                class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500" 
                value="<?= $tanggal ?>">

            <button type="submit" 
                    class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg shadow">
            🔍 Cari
            </button>
        </form> 

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-gray-800 rounded-xl overflow-hidden">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                <th class="px-4 py-2 text-left">ID Detail</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-left">ID Konsumen</th>
                <th class="px-4 py-2 text-left">Konsumen</th>
                <th class="px-4 py-2 text-left">ID Sepatu</th>
                <th class="px-4 py-2 text-left">Harga</th>
                <th class="px-4 py-2 text-left">Quantity</th>
                <th class="px-4 py-2 text-left">SubTotal</th>
                <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan_detail as $row) : ?>
                <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                <td class="px-4 py-2"><?= $row["id_detail"] ?></td>
                <td class="px-4 py-2"><?= $row["tanggal"] ?></td>
                <td class="px-4 py-2"><?= $row["id_konsumen"] ?></td>
                <td class="px-4 py-2"><?= $row["nama"] ?></td>
                <td class="px-4 py-2"><?= $row["id_sepatu"] ?></td>
                <td class="px-4 py-2"><?= $row["harga"] ?></td>
                <td class="px-4 py-2"><?= $row["qty"] ?></td>
                <td class="px-4 py-2"><?= $row["subtotal"] ?></td>
                <td class="px-4 py-2 space-x-2">
                    <a href="edit_detail.php?id=<?= $row['id_detail']; ?>" 
                    class="bg-blue-600 hover:bg-blue-500 px-3 py-1 rounded-lg text-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_detail']; ?>" 
                    class="bg-red-600 hover:bg-red-500 px-3 py-1 rounded-lg text-sm">Hapus</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

        </div>
    </div>
</body>
</html>
