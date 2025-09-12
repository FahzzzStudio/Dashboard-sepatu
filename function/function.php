<?php

$conn = mysqli_connect("localhost","root","","db_tokosepatu");

// Fungsi semua tampil

function tampil($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}

function allsepatu($conn) {
    $query = "SELECT * FROM sepatu";
    $result = mysqli_query($conn, $query);

    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $result;
}

function allkonsumen($conn) {
    $query = "SELECT * FROM konsumen";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $result;
}

function allpenjualan($conn) {
    $query = "SELECT p.id_jual, p.id_konsumen, p.tanggal, p.total, k.nama, k.alamat 
            FROM penjualan p
            INNER JOIN konsumen k ON p.id_konsumen = k.id_konsumen";
    $result = mysqli_query($conn, $query);
    return $result;
}

function allpenjualandetail($conn) { 
    $query = "SELECT d.id_detail, p.tanggal, p.id_konsumen, k.nama, d.id_sepatu,
            s.harga, d.qty, d.subtotal
            FROM penjualan_detail d
            INNER JOIN sepatu s ON d.id_sepatu = s.id_sepatu
            INNER JOIN penjualan p ON d.id_jual = p.id_jual
            INNER JOIN konsumen k ON p.id_konsumen = k.id_konsumen";
    $result = mysqli_query($conn,$query);
    return $result;
}

function alllogtransaksi($conn) {
    $query = "SELECT l.id_log, l.waktu_transaksi, p.id_jual, k.nama
            FROM log_transaksi l
            INNER JOIN penjualan p ON l.id_jual = p.id_jual
            INNER JOIN konsumen k ON p.id_konsumen = k.id_konsumen";
    $result = mysqli_query($conn,$query);
    return $result;
}

// Fungsi Edit
function penjualandetailbyid($conn, $id_detail) {
    $query = "SELECT * FROM penjualan_detail WHERE id_detail = $id_detail";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function updatepenjualandetail($conn, $data) {
    $id_detail = $data['id_detail'];
    $id_jual = htmlspecialchars($data['id_jual']);
    $id_sepatu = htmlspecialchars($data['id_sepatu']);
    $qty = htmlspecialchars($data['qty']);
    $subtotal = htmlspecialchars($data['subtotal']);

    $query = "UPDATE penjualan_detail
            SET id_jual='$id_jual', id_sepatu='$id_sepatu', qty='$qty', subtotal='$subtotal'
            WHERE id_detail=$id_detail";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahdetailpenjualan($conn, $data) {
    $id_jual = htmlspecialchars($data['id_jual']);
    $id_sepatu = htmlspecialchars($data['id_sepatu']);
    $qty = htmlspecialchars($data['qty']);
    $subtotal = htmlspecialchars($data['subtotal']);

    $query = "INSERT INTO penjualan_detail (id_jual, id_sepatu, qty, subtotal)
            VALUES ('$id_jual','$id_sepatu','$qty','$subtotal')";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function searchpenjualandetail($conn, $keyword = "", $sepatu = "", $tanggal = "") {
    $query = "SELECT d.id_detail, d.qty, d.subtotal, 
                s.id_sepatu, s.harga,
                p.tanggal,
                k.id_konsumen, k.nama
            FROM penjualan_detail d
            JOIN sepatu s ON d.id_sepatu = s.id_sepatu
            JOIN penjualan p ON d.id_jual = p.id_jual
            JOIN konsumen k ON p.id_konsumen = k.id_konsumen
            WHERE 1=1";

    if(!empty($keyword)) {
        $query .= " AND (k.nama LIKE '%keyword%' OR s.id_sepatu LIKE '%keyword%')";
    }

    if(!empty($sepatu)) {
        $query .= " AND s.id_sepatu = '%sepatu$'";
    }

    if(!empty($tanggal)) {
        $query .= " AND p.tanggal = '$tanggal'";
    }

    $query .= " ORDER BY p.tanggal DESC";
    $result = mysqli_query($conn, $query);
    $rows = [];
    
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;       
}
?>