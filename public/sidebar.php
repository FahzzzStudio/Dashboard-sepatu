<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Mengatur body agar konten bisa bergeser ke kanan */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7f6;
    }

    /* Gaya untuk sidebar */
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #ffffff;
        padding-top: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Gaya untuk logo atau judul */
    .sidebar .logo {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }

    /* Gaya untuk menu navigasi */
    .sidebar nav {
        width: 100%;
    }

    .sidebar nav a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 16px;
        color: #555;
        display: block;
        transition: background-color 0.3s, color 0.3s;
        border-left: 5px solid transparent; /* Garis indikator */
    }

    .sidebar nav a:hover {
        background-color: #e9ecef;
        color: #007bff;
        border-left: 5px solid #007bff;
    }

    .sidebar nav a.active {
        background-color: #e9ecef;
        color: #007bff;
        border-left: 5px solid #007bff;
        font-weight: bold;
    }

    .sidebar nav a i {
        margin-right: 15px;
        width: 20px;
    }
</style>

<div class="sidebar">
    <div class="logo">
        Sepatu
    </div>
    <nav>
        <a href="home.php" class="active">
            <i class="fas fa-chart-line"></i>
            Home
        </a>
        <a href="sepatu.php">
            <i class="fas fa-shoe-prints"></i>
            Data Sepatu
        </a>
        <a href="penjualan.php">
            <i class="fas fa-shopping-cart"></i>
            Data Penjualan
        </a>
        <a href="konsumen.php">
            <i class="fas fa-users"></i>
            Data Konsumen
        </a>
        <a href="#penjualan_detail.php">
            <i class="fas fa-users"></i>
            Data Penjualan Detail
        </a>
        <a href="#log_transaksi.php">
            <i class="fas fa-users"></i>
            Data Log Transaksi
        </a>
        <a href="#logout.php">
            <i class="fas fa-sign-out-alt"></i>
            Keluar
        </a>
    </nav>
</div>