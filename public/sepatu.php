<?php
require "../function/function.php";
include "../public/sidebar.php";

$sepatu = allsepatu($conn);

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
            <h1 class="text-3xl font-bold mb-6">Data Sepatu</h1>

            <form action="get" class="flex flex-wrap gap-4 mb-6">
                <a href="../app/tambah.php" 
                class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2">
                + Tambah Data</a>

                <input type="text" name="keyword"
                class="flex-1 px-4 py-2 rounded-lg bg-gray-800 border-gray-700 focus:ring-2 focus:ring-indigo-500"
                placeholder="Cari Sepatu atau ID Sepatu"
                value="<?= $keyword ?>">
            </form>
            
            <div class="overflow-x-auto">
                <table border="1" class="w-full border-collapse bg-gray-800 rounded-xl overflow-hidden">
                <thead class="bg-gray-700 text-gray-300">
                    <tr>
                        <th class="px-4 py-2 text-left">ID Sepatu</th>
                        <th class="px-4 py-2 text-left">Stok</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>    
                    <?php foreach ($sepatu as $row) : ?>
                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                        <td class="px-4 py-2 text-left"><?= $row["id_sepatu"] ?></td>
                        <td class="px-4 py-2 text-left"><?= $row["stok"] ?></td>
                        <!-- <td><?= $row["harga"] ?></td> -->
                        <td class="px-4 py-2 text-left">Rp <?= number_format($row['harga'],0,',','.'); ?></td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="edit.php?id=<?= $row['id_sepatu']; ?>" class="btn btn-success">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_sepatu']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>