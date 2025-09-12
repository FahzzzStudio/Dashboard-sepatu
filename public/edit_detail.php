<?php
require "../function/function.php";
include "../public/sidebar.php";

$id_detail = $_GET['id'];
$detail = penjualandetailbyid($conn, $id_detail);

$daftar_sepatu = tampil("SELECT * FROM sepatu");
$daftar_penjualan = tampil("SELECT * FROM penjualan");  

if(isset($_POST["submit"])) {
    if(updatepenjualandetail($conn, $_POST) > 0) {
        header("location:detailpenjualan.php?edit=data_berhasil_diupdate");
        exit;
    } else {
        header("location:detailpenjualan.php?edit=data_gagal_diupdate");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Detail Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Gaya un  tuk konten utama */
        .main-content {
            margin-left: 250px; /* Lebar sidebar */
            padding: 20px;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="main-content ml-64 p-6">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-6">Edit Data Detail Penjualan</h1>

            <form action="" method="post" class="bg-gray-800 shadow-lg rounded-xl p-6 space-y-6">
                <input type="hidden" name="id_detail" value="<?= $detail['id_detail']; ?>">

                <!-- ID Penjualan -->
                <div>
                    <label for="id_jual" class="block text-sm font-medium mb-2">ID Penjualan</label>
                    <select name="id_jual" id="id_jual" required
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <?php foreach($daftar_penjualan as $p): ?>
                            <option value="<?= $p['id_jual']; ?>" <?= ($detail['id_jual']==$p['id_jual'])?'selected':''; ?>>
                                <?= "Penjualan #".$p['id_jual']." - ".$p['tanggal']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Sepatu -->
                <div>
                    <label for="id_sepatu" class="block text-sm font-medium mb-2">Sepatu</label>
                    <select name="id_sepatu" id="id_sepatu" required
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <?php foreach($daftar_sepatu as $s): ?>
                            <option value="<?= $s['id_sepatu']; ?>" <?= ($detail['id_sepatu']==$s['id_sepatu'])?'selected':''; ?>>
                                <?= "Sepatu #".$s['id_sepatu']." (Rp".number_format($s['harga']).")"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Quantity -->
                <div>
                    <label for="qty" class="block text-sm font-medium mb-2">Quantity</label>
                    <input type="number" name="qty" id="qty" value="<?= $detail['qty']; ?>" required
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Subtotal -->
                <div>
                    <label for="subtotal" class="block text-sm font-medium mb-2">Subtotal</label>
                    <input type="number" name="subtotal" id="subtotal" value="<?= $detail['subtotal']; ?>" required
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" name="submit"
                        class="px-5 py-2 bg-green-600 hover:bg-green-700 rounded-lg font-semibold transition-colors">
                        Simpan Perubahan
                    </button>
                    <a href="detailpenjualan2.php"
                        class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-decoration rounded-lg font-semibold transition-colors">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>